<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Livewire\Component;
use App\Events\CommentEvent;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Event;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\Notification;


class MakeComment extends Component
{
    use WithPagination;

    public $post;
    public $text;
    public $col;  //represents the reply ID

    protected $rules = [
        'text' => 'required',
    ];

    public function mount(Post $post, $col)
    {
        $this->post = $post;
        $col == 0 ? $this->col = null : $this->col =$col;  //check if the reply id is set to null then add it as a comment other wise it will be a reply
    }

    public function restForm()
    {
        $this->text = "";
    }

    public function addComment(User $user, Comment $comment)
    {
        //validation
        $this->validate();
        
        auth()->user()->comments()->create([
            'text' => $this->text,
            'post_id' => $this->post->id,
            'reply_id' => $this->col
        ]);

        $this->text = "";

        $owner = $this->post->user;
        if( $owner->id !== auth()->user()->id ) 
        {

            $comment = [
                'text' => $this->text,
                'post' => $this->post->title,
                'user' => auth()->user()->name,
            ];
            
            Notification::send($owner, new CommentNotification($comment));
        }


        //emit the comment

        $this->emit('commentCreated');

    }

    public function render()
    {
        return view('livewire.make-comment')->extends('layouts.app');
    }
}

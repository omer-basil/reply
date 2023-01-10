<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Post;
use App\Models\Dislike;
use Livewire\Component;
use App\Notifications\LikeNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class React extends Component
{
    use AuthorizesRequests;

    public $post;
    public $likes;
    public $dislikes;
    public $LikeActive;
    public $dislikeActive;

    protected $listeners = ['load_values' => '$refresh'];
    protected $with = ['post'];

    public function mount(Post $post)
    {
        $this->post = $post;

        $this->checkIfLiked();
        $this->checkIfDisliked();
    }
    public function checkIfLiked()
    {
        $this->post->doesUserLikedPost() ? $this->likeActive = true : $this->likeActive = false;
    }
    public function checkIfDisliked()
    {
        $this->post->doesUserDislikedPost() ? $this->dislikeActive = true : $this->dislikeActive = false;
    }
    public function like()
    {
        if($this->post->doesUserLikedPost())
        {
            Like::where('user_id', auth()->id())->where('post_id', $this->post->id)->delete();
            $this->likeActive = false;
        }
        else
        {
            $this->post->likes()->create([
                'user_id' => auth()->id()
            ]);

            $this->disableDislike();
            $this->LikeActive = true;

        }
        $owner = $this->post->user;

            if( $owner->id !== auth()->user()->id ) 
            {

                $like = [
                    'user' => auth()->user()->name,
                    'post' => $this->post->title,
                ];
                
                Notification::send($owner, new LikeNotification($like));
                
            }
        $this->emit('load_values');
    }
    public function disableDislike()
    {
        Dislike::where('user_id', auth()->id())->where('post_id', $this->post->id)->delete();
        $this->dislikeActive = false;
    }
    public function dislike()
    {
        if($this->post->doesUserDislikedPost())
        {
            Dislike::where('user_id', auth()->id())->where('post_id', $this->post->id)->delete();
            $this->dislikeActive = false;
        }
        else
        {
            $this->post->dislikes()->create([
                'user_id' => auth()->id()
            ]);

            $this->disablelike();
            $this->DislikeActive = true;

        }
        $this->emit('load_values');
    }
    public function disableLike()
    {
        Like::where('user_id', auth()->id())->where('post_id', $this->post->id)->delete();
        $this->likeActive = false;
    }
    public function render()
    {
        $this->likes = $this->post->likes->count();
        $this->dislikes = $this->post->dislikes->count();
        return view('livewire.react')->extends('layouts.app');
    }
}

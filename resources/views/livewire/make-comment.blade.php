<div>
    <div class="flex" x-data="{ open:false }">
        <div class="flex-shrink-0 mr-3">
            <!--     -->
        </div>
        <div class="flex-1 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
            <strong>{{ auth()->user()->name }}</strong> <span class="text-xs text-gray-400"></span>

            <div class="flex flex-wrap -mx-3 mb-6 divide-y-2 divide-gray-400">
                <div class="w-full md:w-full px-3 mt-2">
                    <textarea wire:model="text" class="focus:outline-none rounded border-none leading-normal resize-none w-full h-20 font-medium placeholder-gray-700 focus:bg-white" name="text" placeholder='Type Your Comment' @click.prevent="open = !open"></textarea>
                </div>
                <div class="w-full md:w-full flex items-start md:w-full px-3" x-show="open">
                    <div class="-mr-1">
                        <button href="" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" wire:click.prevent="restForm">Cancel</button>
                        <button href="" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Post Comment' wire:click.prevent="addComment">Post Comment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
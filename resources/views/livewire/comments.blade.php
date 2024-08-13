<div>
    <div class="mb-4">
        <textarea wire:model.defer="newComment" class="w-full p-2 border rounded-lg"
            placeholder="Add a comment"></textarea>
          @error('newComment') <span class="text-red-500">{{ $message }}</span> @enderror
            <button wire:click="addComment" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg">Comment</button>
    </div>

    <!-- Existing Comments -->
    <div class="space-y-6">
        @foreach($comments as $comment)
            <div wire:key="comment-{{ $comment->id }}" class="p-4 border rounded-lg bg-gray-50">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ $comment->user->profile_image }}"
                            alt="User Image">
                    </div>
                    <div class="ml-4 w-full">
                        @if($editingCommentId == $comment->id)
                            <textarea wire:model.defer="editingCommentContent"
                                class="w-full p-2 border rounded-lg"></textarea>
                            @error('newComment') <span class="text-red-500">{{ $message }}</span> @enderror
                                <div class="mt-2 flex space-x-2">
                                    <button wire:click="updateComment"
                                        class="px-4 py-2 bg-blue-500 text-white rounded-lg">Save</button>
                                    <button wire:click="$set('editingCommentId', null)"
                                        class="px-4 py-2 bg-gray-500 text-white rounded-lg">Cancel</button>
                                </div>
                            @else
                                <div class="text-sm font-semibold text-gray-900">{{ $comment->user->name }}</div>
                                <div class="text-sm text-gray-600">{{ $comment->content }}</div>
                                <div class="mt-2 flex items-center space-x-2 text-sm text-gray-500">
                                    <span>Posted on
                                        {{ $comment->created_at->format('M d, Y') }}</span>
                                    <button wire:click="setReplyTo({{ $comment->id }})"
                                        class="text-blue-600 hover:underline">Reply</button>
                                    @if($comment->user_id == Auth::id())
                                        <button
                                            wire:click="setEditingComment({{ $comment->id }}, '{{ $comment->content }}')"
                                            class="text-yellow-600 hover:underline">Edit</button>
                                        <button wire:click="deleteComment({{ $comment->id }})"
                                            class="text-red-600 hover:underline">Delete</button>
                                    @endif
                                </div>
                            @endif

                            <!-- Reply Form -->
                            @if($replyTo == $comment->id)
                                <div class="mt-4">
                                    <textarea wire:model.defer="newReply" class="w-full p-2 border rounded-lg"
                                        placeholder="Add a reply"></textarea>
                                    @error('newComment') <span class="text-red-500">{{ $message }}</span> @enderror
                                        <button wire:click="addReply({{ $comment->id }})"
                                            class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg">Reply</button>
                                </div>
                            @endif

                            <!-- Replies -->
                            <div class="ml-12 mt-4 space-y-4">
                                @foreach($comment->replies as $reply)
                                    <div wire:key="reply-{{ $reply->id }}" class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <img class="h-8 w-8 rounded-full"
                                                src="{{ $reply->user->profile_image }}" alt="User Image">
                                        </div>
                                        <div class="ml-3 w-full">
                                            @if($editingCommentId == $reply->id)
                                                <textarea wire:model.defer="editingCommentContent"
                                                    class="w-full p-2 border rounded-lg"></textarea>
                                               
                                                    @error('newComment') <span class="text-red-500">{{ $message }}</span> @enderror
                                                    <div class="mt-2 flex space-x-2">
                                                        <button wire:click="updateComment"
                                                            class="px-4 py-2 bg-blue-500 text-white rounded-lg">Save</button>
                                                        <button wire:click="$set('editingCommentId', null)"
                                                            class="px-4 py-2 bg-gray-500 text-white rounded-lg">Cancel</button>
                                                    </div>
                                                @else
                                                    <div class="text-sm font-semibold text-gray-900">
                                                        {{ $reply->user->name }}</div>
                                                    <div class="text-sm text-gray-600">{{ $reply->content }}</div>
                                                    <div class="mt-2 flex items-center space-x-2 text-sm text-gray-500">
                                                        <span>Posted on
                                                            {{ $reply->created_at->format('M d, Y') }}</span>
                                                        @if($reply->user_id == Auth::id())
                                                            <button
                                                                wire:click="setEditingComment({{ $reply->id }}, '{{ $reply->content }}')"
                                                                class="text-yellow-600 hover:underline">Edit</button>
                                                            <button wire:click="deleteComment({{ $reply->id }})"
                                                                class="text-red-600 hover:underline">Delete</button>
                                                        @endif
                                                    </div>
                                                @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
</div>
@foreach ($comments as $comment)
{{-- {{ auth()->user()->type == 'teacher' ? $course->slug .'/subjects' : 'course/'. $course->slug }} --}}
    <div class="mb-6 {{ $comment->parent_id != null ? 'ml-10' : '' }}">
        <div class="flex relative flex-col rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 mb-2">
            <div class="flex flex-col w-full lg:flex-row px-3 py-2">
                <div class="grid flex-grow w-11/12 h-auto card rounded-box place-items-start">
                    <div class="flex items-center justify-center gap-2">
                        <label tabindex="0" class="avatar">
                            <div class="w-10 rounded-full">
                                <img src="https://ui-avatars.com/api/?name={{ $comment->user->name }}" />
                            </div>
                        </label>
                        <h2 class="text-sm font-semibold md:text-base">{{ $comment->user->name }}</h2>
                    </div>
                    <p class="text-xs md:text-sm mt-2 ml-1">{{ $comment->body }}</p>
                </div> 
                <div class="divider lg:divider-horizontal"></div> 
                <div class="grid flex-grow w-2/12 h-auto card rounded-box place-items-center">
                    <div class="flex w-auto -ml-3">
                        {{-- <a href="#" title="Love it" class="btn btn-counter" data-count="0"><span>&#x2764;</span></a> --}}
                        {{-- <form action="javascript:void(0)"> --}}
                        <form action="/discussion/comment/likes/{{ $comment->id }}" method="POST"> 
                            @method('put') 
                            @csrf
                            <input type="hidden" name="likes" id="likes" value="{{ $comment->likes+1 }}">
                            <button class="btn btn-counter w-auto btn-sm rounded-r-none capitalize">
                                <span class="text-sm">Setuju</span>
                            </button>
                        </form>
                        <div class="border rounded rounded-l-none w-12 flex relative items-center">
                            <span class="mx-auto">{{ $comment->likes}}</span>
                        </div>
                        {{-- <form action="/discussion/comment/likes/{{ $comment->id }}" method="POST"> 
                            @method('put') 
                            @csrf
                            <input type="hidden" name="likes" id="likes" value="{{ $comment->likes-1 }}">
                            <button class="btn btn-counter w-auto btn-sm rounded-l-none capitalize {{ $comment->likes == 0 ? 'hidden' : '' }}" >
                                <span class="text-sm">Batal</span>
                            </button>
                        </form> --}}
                        {{-- <form id="like{{ $comment->id }}" action="/like-comment/{{ $comment->id }}" method="POST" class="flex">
                            @csrf
                            <button
                            class="btn btn-sm rounded-r-none capitalize {{ $comment->liked() ? 'btn-neutral' : '' }} ">
                            Setuju
                            </button>
                            <div class="border rounded rounded-l-none w-12 flex relative items-center">
                                <span class="mx-auto"> {{ $comment->likeCount }}</span>
                            </div>
                        </form>
                        <form id="unlike{{ $comment->id }}" action="/unlike-comment/{{ $comment->id }}" method="POST" class="inline">
                            @csrf
                            <button
                                class="btn btn-sm rounded-l-none capitalize  {{ $comment->liked() ? 'block' : 'hidden'  }} btn-error">
                                Batal
                            </button>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- <a href="" id="reply"></a> --}}
        <form method="POST" action="/discussion/comment">
            @csrf
            <textarea id="body" name="body" rows="1" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6 mb-1" placeholder="Ketikan pendapatmu.."></textarea>
            <input type="hidden" name="discussion_id" id="discussion_id" value="{{ $discussion_id }}" />
            <input type="hidden" name="likes" id="likes" value="0" />
            <input type="hidden" name="parent_id" id="parent_id" value="{{ $comment->id }}" />
            <div class="mb-3">
                <input type="submit" class="btn btn-sm capitalize" value="Reply" />
            </div>
        </form>
        @include('discuss.commentsDisplay', ['comments' => $comment->replies])
    </div>

    {{-- Jquery cdn link --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('body').on('click', '#saveLikes', function() {
            // var comment_id = $('#comment_id').val();
            var likes = $('#likes').val();

            // alert({{ $comment->id }})
            // Ajax request send
            $.ajax({
                url : '/likes/'+ {{ $comment->id }} + '/' +likes,
                method : 'get',
            })
            
        })
    </script> --}}
{{-- <script>
    $(document).ready(function() {
        $('#saveLikes').on('click', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ url('/discussion/comment/likes/ . $comment->id') }}',
                type: 'POST',
                data: $('#likes').serialize(),
                success: function(response) {
                    
                }
            })
        })
    })
</script> --}}
@endforeach
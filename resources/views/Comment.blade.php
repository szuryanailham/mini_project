
@extends('partials.Scleton')
@section('container-fluid')
<section>
   
  @extends('partials.Sidebar')
  <main class="sm:ml-64 w-full h-contain">
    {{-- NAVBAR  --}}

    <nav class="w-full h-22 shadow-lg flex posts-center z-30 p-5">
      <div class="ml-[30%]">
    {{-- logo --}}
    <img class="w-7 h-7 mx-auto mb-3" src="/img/logo-medsos.png" alt="logo">
    {{-- Mode show --}}
    <div class="flex flex-row w-[200px] justify-between">
      <a class="font-semibold text-white" href="#">For you</a>
      <a class="font-semibold text-white" href="#">Following</a>
    </div>
      </div>
    </nav>
    {{-- END NAVBAR --}}
    <div class="flex flex-row">
      <div class="overscroll-contain h-fit w-1/2 max-h-screen overflow-y-auto p-7">
    {{-- SAMPLE CARD--}}

         {{-- profile --}}
          {{-- SAMPLE CARD--}}
      {{-- @dd($post->user->name); --}}
     <div class="w-full h-fit rounded-md bg-transparent border-2 border-white p-5 mb-5 ">
      <div class="flex flex-row justify-between">
        {{-- profile --}}
        <div class="flex flex-row posts-center gap-5 mb-5">
         <img class="w-10  h-10 rounded-full p-5" src="https://github.com/shadcn.png" alt="Profile">
         <div>
           <p class="text-white font-semibold">{{ $post->user->name }}</p>
           <span class="text-white text-xs italic">{{ $post->created_at->diffForHumans() }}</span>
           <p class="mt-2">{{ $post->deskripsi }}</p>
         </div>
         
       </div>
       {{-- bookmard icon --}}
       <a href="/add-bookmark/{{ $post->kode_post }}">
        <i class="bi bi-bookmark-fill text-xl text-white"></i>
       </a>

      </div>
      {{-- Image post --}}
      @if ($post->image)
      <img class="img-fluid" style="width:700px;max-height:350px;overflow:hidden" src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->judul }}">
      @else
      <img class="w-full h-[450px] rounded-lg object-cover p-5" src="/img/sample.jpg" alt="Image Post">
      @endif
      <hr class="border-t-2 border-gray-300 my-4">
      <div class="w-[250px] h-fit flex flex-row justify-between p-2">
           <div class="text-xl flex justify-between gap-2">
          
            <a href="/post/like/{{ $post->kode_post }}">
              <i class="bi bi-heart"></i>
            </a>
             <p class="text-xs">{{ $post->likes_count }}</p>
           </div>

           <div class="text-xl flex justify-around gap-1">
            <i class="bi bi-chat-left"></i>
             <p class="text-xs">comment</p>
           </div>
          
      </div>
     
     
     
     </div>
   {{-- SAMPLE CARD END --}}
    
      </div>
     {{-- =============================================COMMENT ============================== --}}
        <section class="bg-black py-8 lg:py-16 antialiased overflow-y-auto">
            <div class="max-w-sm mx-auto px-4">
                <div class="flex justify-between items-center mb-6">
                  <h2 class="text-lg lg:text-2xl font-bold text-white">Discussion ({{ $comment->count()}})</h2>
              </div>
              <form method="POST" action="/add-comment" class="mb-6">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                  <div class="py-2 px-4 mb-4 bg-black rounded-lg rounded-t-lg border border-gray-200">
                      <label for="comment" class="sr-only">Your comment</label>
                      <textarea id="comment" rows="6"
                      name="comment"
                          class="bg-black px-0 w-full text-sm text-white border-0 focus:ring-0 focus:outline-none"
                          placeholder="Write a comment..." required></textarea>
                  </div>
                  <button type="submit"
                      class="inline-flex items-center py-2.5 px-4 border border-white rounded-lg text-xs font-medium text-center text-white bg-primary-700 focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                      Post comment
                  </button>
              </form>
              @foreach ($comment as $item)
              <article class="p-6 text-base bg-black rounded-lg">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center mr-3 text-sm text-white font-semibold"><img
                                class="mr-2 w-6 h-6 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                alt="Michael Gough">{{ $item->user->name }}</p>
                        <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-08"
                                title="February 8th, 2022">{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</time></p>
                    </div>
                  
                </footer>
                <p class="text-gray-500">{{ $item->content }}</p>
                <div class="flex flex-col items-center mt-4 space-x-4">
                  {{-- FORM SUBCOMMENT --}}
                    <form class="w-full hidden" method="POST" action="/sub-comment">
                      @csrf
                      <input type="hidden" name="comment_id" value="{{ $item->id }}">
                      <textarea id="comment" rows="6"
                      name="sub_comment"
                          class="bg-dark p-3 rounded-md w-full text-sm text-black border-0 focus:ring-0 focus:outline-none"
                          placeholder="Write a comment..." required></textarea>
                          <button type="submit" class="px-2 py-1 mt-3 border border-white rounded-md">Submit</button>
                    </form>
                     {{-- END FORM SUBCOMMENT --}}
                     <button id="replay" type="button"
                   
                      class="flex items-center text-sm text-gray-500 hover:underline font-medium">
                      <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                      </svg>
                      Reply
                  </button>
                </div>
                @if ($item->subcomment)
                @foreach ($item->subcomment as $subcomment)
                <div class="mt-5 ml-10">
                  <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-sm text-white font-semibold"><img
                      class="mr-2 w-6 h-6 rounded-full"
                      src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                      alt="Jese Leos">{{ $subcomment->user->name }}</p>
                      <p class="text-sm text-white dark:text-gray-400"><time pubdate datetime="{{ $subcomment->created_at->toDateString() }}"
                        title="{{ $subcomment->created_at->toFormattedDateString() }}">{{ $subcomment->created_at->toFormattedDateString() }}</time></p>
                  </div>
                  <p class="text-md mt-3 text-gray-500">{{ $subcomment->content }}</p>
              </div>
                @endforeach
          
                @endif
                {{-- Subcomment --}}
           
            </article>
          
              @endforeach
           
         
       {{-- =========================================END COMMENT ============================== --}}
  </main>
</section>
@endsection




@extends('partials.Scleton')
@section('container-fluid')
<section>
  @extends('partials.Sidebar')
  <main class="sm:ml-64 w-full">
    {{-- NAVBAR  --}}

    <nav class="w-full h-22 shadow-lg flex items-center z-30 p-5">
      <div class="ml-[30%]">
    {{-- logo --}}
    <img class="w-7 h-7 mx-auto mb-3" src="/img/logo-medsos.png" alt="logo">
    {{-- Mode show --}}
    <div class="flex flex-row w-[200px] justify-between">
      <a class="font-semibold text-white" href="/home">For you</a>
      <a class="font-semibold text-white" href="/following">Following</a>
    </div>
      </div>
    </nav>
    {{-- END NAVBAR --}}
    <div class="flex flex-row">
      <div class="overscroll-contain h-fit w-1/2 max-h-screen overflow-y-auto p-7">
    {{-- SAMPLE CARD--}}

         {{-- profile --}}
     @foreach ($posts as $item)
          {{-- SAMPLE CARD--}}
      {{-- @dd($item->user->name); --}}
     <div class="w-full h-fit rounded-md bg-transparent border-2 border-white p-5 mb-5 ">
      <div class="flex flex-row justify-between">
        {{-- profile --}}
        <div class="flex flex-row items-center gap-5 mb-5">
         <img class="w-10  h-10 rounded-full p-5" src="https://github.com/shadcn.png" alt="Profile">
         <div>
           <p class="text-white font-semibold">{{ $item->user->name }}</p>
           <span class="text-white text-xs italic">{{ $item->created_at->diffForHumans() }}</span>
           <p class="mt-2">{{ $item->deskripsi }}</p>
         </div>
         
       </div>
       {{-- bookmard icon --}}
       <a href="/add-bookmark/{{ $item->kode_post }}">
        <i class="bi bi-bookmark-fill text-xl text-white"></i>
       </a>

      </div>
      {{-- Image post --}}
      @if ($item->image)
      <img class="img-fluid" style="width:700px;max-height:350px;overflow:hidden" src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->judul }}">
      @else
      <img class="w-full h-[450px] rounded-lg object-cover p-5" src="/img/sample.jpg" alt="Image Post">
      @endif
      <hr class="border-t-2 border-gray-300 my-4">
      <div class="w-[250px] h-fit flex flex-row justify-between p-2">
           <div class="text-xl flex justify-between gap-2">
          
            <a href="/post/like/{{ $item->kode_post }}">
              <i class="bi bi-heart"></i>
            </a>
             <p class="text-xs">{{ $item->likes_count }}</p>
           </div>

           <div class="text-xl ">
            <a class="flex justify-around gap-1" href="/detail-post/{{ $item->kode_post  }}">
              <i class="bi bi-chat-left"></i>
              <p class="text-xs">comment</p>
            </a>
            
           </div>
      </div>
     </div>
   {{-- SAMPLE CARD END --}}
     @endforeach
    
      </div>
    
      {{-- ===========RECOMENDASI ================ --}}
      <div class="w-[40%] p-10">
        <div>
          <div class="mb-5">
          <h1 class="font-bold">Siapa yang Harus diikuti</h1>
          <p class="text-xs">Orang yang mungkin anda kenal</p>
        </div>
        {{-- card imge --}}
        <div>
          {{-- card --}}
         @foreach ($recommend as $item)
         <div class="w-[70%] h-fit rounded-md flex justify-between items-center space-x-4 p-4 border-2 border-white shadow-md mb-3">
          <div class="flex flex-row gap-3">
           <img class="w-10 h-10 rounded-full" src="https://github.com/shadcn.png" alt="Profile">
           <div class="flex flex-col items-center justify-between">
             <p>{{ $item->name }}</p>
             <p class="text-xs">Lorem ipsum </p>
          </div>
           </div>
           <a href="/followUp/{{ $item->id }}">
            <p class="p-2 font-bold text-red-600">Follow</p>
           </a>
         </div>
         @endforeach
        {{-- end card image --}}
        <hr class="border-t-2 w-[70%] border-gray-300 my-4">
        <p class="text-wrap w-[70%]">Lorem ipsum dolor sit, amet consectetur adipisicing .</p>
        </div>
      </div>
       {{-- =========== ENDRECOMENDASI ================ --}}
    </div>
  </main>
</section>
@endsection




@extends('partials.Scleton')
@extends('partials.Sidebar')
<main class="sm:ml-64 w-full">
    {{-- NAVBAR  --}}
    <nav class="w-full h-22 shadow-lg flex items-center z-30 p-5">
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
    <div class="flex flex-row">
      <div class="overscroll-contain h-fit w-1/2 max-h-screen overflow-y-auto p-7">
    {{-- ======================= CONTAIN =================================== --}}
        {{-- ======================== RESULT SEARCH ============================= --}}
        @foreach ($bookmarks as $item)
        <div class="w-full border flex flex-row justify-between border-white h-fit gap-5 p-5 mb-5">
            {{-- image --}}
            @if ($item->post->image)
            <img class="img-fluid" style="width:100px;max-height:250px;overflow:hidden" src="{{ asset('storage/'.$item->post->image) }}" alt="{{ $item->post->judul }}">
            @else
            <img class="w-full h-[450px] rounded-lg object-cover p-5" src="/img/sample.jpg" alt="Image Post">
            @endif
           <div class="item-center">
            <p>{{ $item->post->judul }}</p>
            <span class="mt-2 text-xs">{{ $item->post->deskripsi }}</span>
           </div>
           <p class="p-2 font-bold text-red-600">Hapus</p>
        </div>
        @endforeach
       
          {{-- ======================== END SEARCH ============================= --}}
      </div>
      
      {{-- ======================= END CONTAIN =================================== --}}
      <div class="w-[40%] p-10">
        <div class="mb-5">
          <h1 class="font-bold">Siapa yang Harus diikuti</h1>
          <p class="text-xs">Orang yang mungkin anda kenal</p>
        </div>
        {{-- card imge --}}
        <div>
          {{-- card --}}
          <div class="w-[70%] h-fit rounded-md flex justify-between items-center space-x-4 p-4 border-2 border-white shadow-md mb-3">
           <div class="flex flex-row gap-3">
            <img class="w-10 h-10 rounded-full" src="https://github.com/shadcn.png" alt="Profile">
            <div class="flex flex-col items-center justify-between">
              <p>Ilham Suryana</p>
              <p class="text-xs">Lorem ipsum </p>
           </div>

            </div>
            <p class="text-red-400">Follow</p>
          </div>
          <div class="w-[70%] h-fit rounded-md flex justify-between items-center space-x-4 p-4 border-2 border-white shadow-md mb-3">
            <div class="flex flex-row gap-3">
             <img class="w-10 h-10 rounded-full" src="https://github.com/shadcn.png" alt="Profile">
             <div class="flex flex-col items-center justify-between">
               <p>Ilham Suryana</p>
               <p class="text-xs">Lorem ipsum </p>
            </div>
 
             </div>
             <p class="text-red-400">Follow</p>
           </div>
          
          {{-- end card --}}
        </div>
        {{-- end card image --}}
        <hr class="border-t-2 w-[70%] border-gray-300 my-4">
        <p class="text-wrap w-[70%]">Lorem ipsum dolor sit, amet consectetur adipisicing .</p>
      </div>
    </div>
  </main>
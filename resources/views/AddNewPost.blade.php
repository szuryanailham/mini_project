
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
      <form method="POST" action="/posts" class="overscroll-contain h-fit w-1/2 max-h-screen overflow-y-auto p-7" enctype="multipart/form-data">
        @csrf
        {{-- ======================= CONTAIN =================================== --}}
        {{-- Judul Postingan --}}
        <div class="mb-5">
            <label for="judul" class="block mb-2 text-sm font-medium text-white">Judul post</label>
            <input type="text" id="judul" name="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Judul post ...." required />
        </div>

        {{-- deskripsi --}}
        <div class="mb-5">
          <label for="deskripsi" class="block mb-2 text-sm font-medium text-white">deskripsi</label>
          <input type="text" id="deskripsi" name="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="deskripsi post ...." required />
      </div>
    
        {{-- Upload Gambar --}}
        <div class="mb-5">
            <label for="dropzone-file" class="block mb-2 text-sm font-medium text-white">Upload</label>
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input name="image" id="dropzone-file" type="file" class="hidden" />
                </label>
            </div>
        </div>
    
        {{-- Submit Button --}}
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-5">Submit</button>
    </form>
    

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
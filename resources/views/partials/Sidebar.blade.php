<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto text-white bg-gray-800">
       <ul class="space-y-2 font-medium">
         @guest
         <li class="flex flex-row items-center gap-5 mb-5">
            <img class="w-10 h-10 rounded-full" src="https://github.com/shadcn.png" alt="Profile">
             <a class="font-semibold text-xl" href="/login">Login</a>
          </li>
         @endguest
         @auth
         <li class="flex flex-row items-center gap-5 mb-5">
            <img class="w-10 h-10 rounded-full" src="https://github.com/shadcn.png" alt="Profile">
            <p class="text-white font-semibold">{{ auth()->user()->name }}</p>
          </li>
         @endauth
       
          {{-- home --}}
          <li>
             <a href="/home" class="flex items-center p-2 text-gray-900 rounded-lg group">
              <i class="bi bi-house-fill text-xl text-white"></i>
                <span class="flex-1 ms-3 whitespace-nowrap text-white">Home</span>
             </a>
          </li>
          {{-- explore --}}
          <li>
            <a href="/search" class="flex items-center p-2 rounded-lg text-white  group">
              <i class="bi bi-search text-xl text-white"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Search</span>
            </a>
         </li>
         {{-- notifikasi --}}
         @auth
         <li>
            <a href="/notif" class="flex items-center p-2 rounded-lg text-white  group">
              <i class="bi bi-bell-fill text-xl text-white"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Notifikasi</span>
            </a>
         </li>
     @endauth
       {{-- tambah postingan  --}}
       @auth
       <li>
        <a href="/add-post" class="flex items-center p-2 rounded-lg text-white  group">
          <i class="bi bi-plus-circle text-xl text-white"></i>
           <span class="flex-1 ms-3 whitespace-nowrap">add post</span>
        </a>
     </li>
     @endauth
     {{-- bookmartk --}}
     @auth
     <li>
      <a href="#" class="flex items-center p-2 rounded-lg text-white  group">
        <i class="bi bi-bookmark-fill text-xl text-white"></i>
         <span class="flex-1 ms-3 whitespace-nowrap">Bookmark</span>
      </a>
   </li>
     @endauth
         {{-- Login --}}
         @auth
         <li>
            <a href="/logout" class="flex items-center p-2 rounded-lg text-white   group">
              <i class="bi bi-box-arrow-in-left text-xl text-white"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
            </a>
         </li> 
         @endauth
         @guest
         <li>
            <a href="/login" class="flex items-center p-2 rounded-lg text-white   group">
              <i class="bi bi-box-arrow-in-right text-xl text-white"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Login</span>
            </a>
         </li> 
         @endguest
       
       </ul>
    </div>
  </aside>
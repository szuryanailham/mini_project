@extends('main')
@section('container')
{{-- SIDEBAR --}}
   {{-- SIDEBAR SECTION  --}}
   <div class="offcanvas offcanvas-start sidebar-nav text-white bg-dark" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-body p-0">
    {{-- CONTAIN SIDEBAR SECTION --}}
    <nav class="navbar-dark mt-3">
      <ul class="navbar-nav">
        <li>
          {{-- head line --}}
          <div class="small fw-bold text-uppercase px-3">
            CORE
          </div>
        </li>
        {{-- home component --}}
        <li>
          <a href="/news" class="nav-link px-3 active">
            <span class="me-2"><i class="bi bi-house-door-fill"></i></span>
            <span>Home</span>
          </a>
        </li>
        {{-- news page --}}
        <li>
          <a href="/dashboard" class="nav-link px-3 active">
            <span class="me-2"><i class="bi bi-newspaper"></i></i></span>
            <span> All News</span>
          </a>
        </li>
       
        {{-- Category --}}
        <li>
          <a href="/dashboard/categories" class="nav-link px-3 active">
            <span class="me-2"><i class="bi bi-bookmarks"></i></span>
            <span>Category</span>
          </a>
        </li>
        <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
         {{-- features setttings --}}
        <li>
         
          <div class="small fw-bold text-uppercase px-3 mb-3">
            News Settings
          </div>
        </li>

         {{-- your news --}}
         <li>
          <a href="/dashboard/newsAuthor/{{auth()->user()->username}}" class="nav-link px-3 active">
            <span class="me-2"><i class="bi bi-journals"></i></span>
            <span>Your News</span>
          </a>
        </li>
        
        {{-- write news --}}
        <li>
          <a href="/dashboard/addNews" class="nav-link px-3">
            <span class="me-2"><i class="bi bi-pencil-square"></i></span>
            <span>add news</span>
          </a>
        </li>
         {{-- administrator --}}
         @can('admin')
         <li>
          <a href="/dashboard/admin" class="nav-link px-3">
            <span class="me-2"><i class="bi bi-card-list"></i></span>
            <span>Administrasi</span>
          </a>
        </li>
        
        <li>
          <a href="/dashboard/category" class="nav-link px-3">
            <span class="me-2"><i class="bi bi-bookmark-plus"></i></span>
            <span>Settings Category</span>
          </a>
        </li>
         @endcan
        <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
        <li>
          <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
            Addons
          </div>
        </li>
      </ul>
    </nav>
    {{-- logo profile --}}
     {{-- Garis Pemisah --}}
     <hr class="dropdown-divider bg-dark my-4">

     {{-- Logo dan Nama Profil --}}
     <div style="width: 100px; bottom:0" class="profile-section d-flex justify-content-between">
      <i class="bi bi-person-circle fs-3"></i>
         <div class="profile-name mt-2 ">
             <span class="fw-bold p-1">{{ auth()->user()->username }}</span>
         </div>
     </div>
    {{-- END CONTAIN SIDEBAR SECTION --}}
    </div>
  </div>
  {{-- END SIDEBAR SECTION --}}
{{-- MAIN --}}

{{-- RECOMMENT --}}
@endsection
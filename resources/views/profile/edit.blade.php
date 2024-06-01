@extends('partials.Scleton')
@section('container-fluid')
@dd($profile);
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- aploud image --}}
            <form action="/upload-profile" method="post" enctype="multipart/form-data">
                @csrf
                <div class="relative left-[260px]">
                    <img id="profileImage" class="w-20 h-20 rounded-full" src="https://github.com/shadcn.png" alt="Profile">
                    <span class="bottom-0 left-[55px] absolute w-5 h-5 bg-green-400 border-2 border-white rounded-full flex items-center justify-center">
                        <i class="bi bi-camera-fill text-white text-xs"></i>
                    </span>
                    <input name="image" type="file" id="fileInput" class="hidden" accept="image/*">
                    <label for="fileInput" class="absolute inset-0 w-20 h-20 bg-black bg-opacity-50 flex items-center justify-center rounded-full cursor-pointer opacity-0 hover:opacity-100 transition-opacity duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7"></path>
                        </svg>
                    </label>
                </div>
                <div class="mx-auto w-full flex items-center">
                    <button type="submit" class="mx-auto mt-5 text-sm italic text-black bg-slate-200 py-2 px-2 rounded-lg">Upload Photo</button>
                </div>
            </form>
    

            <div class="p-4 sm:p-8 bg-black shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-black shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-black shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
    @endsection

@extends('partials.Scleton')
@section('container-fluid')
<section class="bg-dark">
    <div class="flex flex-col items-center justify-center p-20 mx-auto md:h-[20%] lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-white">
            <img class="w-8 h-8 mr-2" src="/img/logo-medsos.png" alt="logo">
            Amandemy  
        </a>
        <div class="w-full bg-slate-800 rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-white md:text-2xl">
                    Create an account
                </h1>
                <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('register') }}">
                    @csrf
                    {{-- NAME --}}
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Your Name</label>
                        <input 
                            id="name" 
                            type="text" 
                            name="name" 
                            :value="old('name')" 
                            required 
                            autofocus 
                            autocomplete="name" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                            placeholder="your name ....">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    {{-- Email  --}}
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-white">Your email</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    {{-- password  --}}
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    {{-- verifikasi password --}}
                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-white">Confirm password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    
                    <button type="submit" class="w-full bg-blue-600 text-white hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create an account</button>

                    <p class="text-sm font-light text-white">
                        Already have an account? <a href="/login" class="font-medium text-primary-600 hover:underline">Login here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>  
@endsection

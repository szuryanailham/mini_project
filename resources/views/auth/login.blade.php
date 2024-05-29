@extends('partials.Scleton')
@section('container-fluid')
<section class="bg-dark">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-white">
            <img class="w-8 h-8 mr-2" src="/img/logo-medsos.png" alt="logo">
            Amandemy
        </a>
        <div class="w-full bg-gray-800 rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-white md:text-2xl">
                    Sign in to your account
                </h1>
                <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-white">Your email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 placeholder-gray-400" placeholder="name@company.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
                        <input id="password"
                               type="password"
                               name="password"
                               required autocomplete="current-password"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 placeholder-gray-400" 
                               placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    
                    <button type="submit" class="w-full text-white bg-blue-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign in</button>
                    <p class="text-sm font-light text-white">
                        Don’t have an account yet? <a href="/register" class="font-medium text-primary-600 hover:underline">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

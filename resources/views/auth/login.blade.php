@extends('layouts.guest')
@section('content')
    <x-section>
        <x-page-tittle :h1="''" :p="'Sign in to start your session'"></x-page-tittle>
        <!-- Session Status -->
        <div class="items-center row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div class="form-group">
                <label for="email">
                    Email
                </label>
                <input  class="form-control" id="email" type="email" name="email" required="required" autofocus="autofocus"
                        autocomplete="username">
            </div>

            <!-- Password -->
            <div class="mt-4 form-group">
                <label for="password">
                    Password
                </label>

                <input  class="form-control" id="password" type="password" name="password" required="required" autocomplete="current-password">

            </div>

            <!-- Remember Me -->
            <div class="form-group mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="form-group items-center justify-content-between mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="http://localhost:8000/forgot-password">
                    Forgot your password?
                </a>
                @endif

                <button type="submit" class="btn btn-primary btn-sm ">
                    Log in
                </button>
            </div>
        </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </x-section>
@endsection

@extends('layouts.auth')

@section('content')
    <section class="min-h-[95vh] lg:min-h-screen flex flex-col lg:flex-row">
        <div class="min-h-[20vh]  p-4 md:px-12 py-6 md:py-10 w-full bg-primary-100 lg:min-w-[50%]    ">
            <div class="flex items-center gap-2 text-white">
                <span class="text-2xl">
                    <i class='bx bx-arrow-back'></i>
                </span>
                <a href="/" class="text-white font-medium text-lg">Back</a>
            </div>
            <div class="hidden lg:flex items-center justify-center h-full">
                <img src="{{ asset('assets/others/login.svg') }}" alt="" class="w-full max-w-[70%]">
            </div>
        </div>
        <form
            action="{{route('login')}}"
            method="post"
            class="flex flex-col lg:justify-center gap-16 px-4 md:px-12  py-8 rounded-tr-3xl bg-white flex-1 lg:min-w-[40%] transform -translate-y-4 md:-translate-y-8  ">
            @csrf
            @method('POST')
            <div>
                <div class="mb-7 ">
                    <h1 class="text-2xl md:text-3xl text-neutral-600 font-semibold ">
                        Login Account
                    </h1>
                </div>
                <div class="flex flex-col gap-5 ">
                    <x-form.input-label :label="'Username/Email'" :name="'credential'" :type="'text'"
                                        :placeholder="'example / example@gmail.com '"/>
                    <x-form.input-label :label="'password'" :name="'password'" :type="'password'"
                                        :placeholder="'....'"/>
                </div>
            </div>
            <div>
                <button class="w-full p-3 md:p-4 text-lg bg-primary-100 text-white rounded-lg font-medium mb-5 md:mb-6">
                    Login
                </button>
                <p class="text-sm md:text-lg text-neutral-400">Don't Have Account? <a href="/register"
                                                                                      class="text-primary-100">Register</a>
                </p>
            </div>
        </form>
    </section>
@endsection

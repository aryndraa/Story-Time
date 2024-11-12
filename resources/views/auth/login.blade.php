@extends('layout')

@section('content')
    <section class="min-h-screen flex items-center justify-center">
        <form action="{{route('login')}}" method="post" class="p-6 border border-neutral-50/5 w-[28rem]" >
            <div class="mb-6 pb-6 border-b border-neutral-50/5">
                <h1 class="text-3xl font-semibold  mb-2">
                    Welcome Back!
                </h1>
                <p class="text-sm text-neutral-500">
                    Please Login Into Your Account
                </p>
            </div>
            <div class="flex flex-col gap-6 mb-10">
                <x-form.input-label :label="'Username/Email'" :name="'credentials'" :type="'text'" :placeholder="'example / example@gmail.com '"/>
                <x-form.input-label :label="'password'" :name="'password'" :type="'password'" :placeholder="'....'"/>
            </div>
            <button class="w-full p-3 text-lg bg-primary font-medium mb-5">
                Confirm
            </button>
            <p class="text-sm text-neutral-400">Don't Have Account? <a href="/register" class="text-primary">Register</a></p>
        </form>
    </section>
@endsection

@extends('layout')

@section('content')
    <section class="min-h-screen flex items-center justify-center">
        <form action="{{route('register')}}" method="post" class="p-6 border border-neutral-50/5 w-[28rem] mt-16" >
            @csrf
            <div class="mb-6 pb-6 border-b border-neutral-50/5">
                <h1 class="text-3xl font-semibold  mb-2">
                    Confirm Account
                </h1>
                <p class="text-sm text-neutral-500">
                    Create New Your Account
                </p>
            </div>
            <div class="flex flex-col gap-6 mb-10">
                <x-form.input-label :label="'Password'" :name="'password'" :type="'password'" :placeholder="'....'"/>
                <x-form.input-label :label="'Confirm Password'" :name="'confirm_password'" :type="'password'" :placeholder="'....'"/>
                <input type="hidden" name="name" value="{{$data['name']}}">
                <input type="hidden" name="username" value="{{$data['username']}}">
                <input type="hidden" name="email" value="{{$data['email']}}">
            </div>
            <button class="w-full p-3 text-lg bg-primary font-medium mb-5" type="submit">
                Confirm
            </button>
        </form>
    </section>
@endsection

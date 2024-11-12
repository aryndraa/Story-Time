@extends('layout')

@section('content')
    <section class="min-h-screen flex items-center justify-center">
        <form action="{{route('confirm')}}" method="get" class="p-6 border border-neutral-50/5 w-[28rem] mt-16" >
            <div class="mb-6 pb-6 border-b border-neutral-50/5">
                <h1 class="text-3xl font-semibold  mb-2">
                    Register Account
                </h1>
                <p class="text-sm text-neutral-500">
                   Create New Your Account
                </p>
            </div>
            <div class="flex flex-col gap-6 mb-10">
                <x-form.input-label :label="'Name'" :name="'name'" :type="'text'" :placeholder="'example'"/>
                <x-form.input-label :label="'Username'" :name="'username'" :type="'text'" :placeholder="'example.user'"/>
                <x-form.input-label :label="'Email'" :name="'email'" :type="'email'" :placeholder="'example@gmail.com'"/>
{{--                <x-form.input-label :label="'Password'" :name="'password'" :type="'password'" :placeholder="'....'"/>--}}
{{--                <x-form.input-label :label="'Confirm Password'" :name="'confirm_password'" :type="'password'" :placeholder="'....'"/>--}}
            </div>
            <button class="w-full p-3 text-lg bg-primary font-medium mb-5" type="submit">
                Continue
            </button>
            <p class="text-sm text-neutral-400">Already Have Account? <a href="/login" class="text-primary">Login</a></p>
        </form>
    </section>
@endsection

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
                <img src="{{ asset('assets/others/register.svg') }}" alt="" class="w-full max-w-[70%]">
            </div>
        </div>
        <form
            action="{{route('confirm')}}"
            method="get"
            class="flex flex-col lg:justify-center gap-16 px-4 md:px-12  py-8 rounded-tr-3xl bg-white flex-1 lg:min-w-[40%] transform -translate-y-4 md:-translate-y-8  ">
            @csrf
            @method('POST')
            <div>
                <div class="mb-7 ">
                    <h1 class="text-2xl md:text-3xl text-neutral-600 font-semibold ">
                        Register Account
                    </h1>
                </div>
                <div class="flex flex-col gap-5 ">
                    <x-form.input-label :label="'Name'" :name="'name'" :type="'text'" :placeholder="'example'"/>
                    <x-form.input-label :label="'Username'" :name="'username'" :type="'text'"
                                        :placeholder="'example.user'"/>
                    <x-form.input-label :label="'Email'" :name="'email'" :type="'email'"
                                        :placeholder="'example@gmail.com'"/>
                </div>
            </div>
            <div>
                <button class="w-full p-3 md:p-4 text-lg bg-primary-100 text-white rounded-lg font-medium mb-5 md:mb-6">
                    Register
                </button>
                <p class="text-sm md:text-lg text-neutral-400">Already ave Account? <a href="/login"
                                                                                       class="text-primary-100">Login</a>
                </p>
            </div>
        </form>
    </section>
@endsection

{{--<section class="min-h-screen flex items-center justify-center">--}}
{{--    <form action="{{route('confirm')}}" method="get" class="p-6 border border-neutral-50/5 w-[28rem] mt-16" >--}}
{{--        <div class="mb-6 pb-6 border-b border-neutral-50/5">--}}
{{--            <h1 class="text-3xl font-semibold  mb-2">--}}
{{--                Register Account--}}
{{--            </h1>--}}
{{--            <p class="text-sm text-neutral-500">--}}
{{--                Create New Your Account--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="flex flex-col gap-6 mb-10">--}}

{{--            --}}{{--                <x-form.input-label :label="'Password'" :name="'password'" :type="'password'" :placeholder="'....'"/>--}}
{{--            --}}{{--                <x-form.input-label :label="'Confirm Password'" :name="'confirm_password'" :type="'password'" :placeholder="'....'"/>--}}
{{--        </div>--}}
{{--        <button class="w-full p-3 text-lg bg-primary font-medium mb-5" type="submit">--}}
{{--            Continue--}}
{{--        </button>--}}
{{--        <p class="text-sm text-neutral-400">Already Have Account? <a href="/login" class="text-primary">Login</a></p>--}}
{{--    </form>--}}
{{--</section>--}}

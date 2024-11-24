<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    {{--  Title  --}}
    <title>{{$data['title']}} / StoryMedia</title>

    {{--  Tailwind  --}}
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    {{--  CDN Icon  --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />
</head>
<body class="bg-primary-50">

    {{--  Header  --}}
    <x-template.navigation.header/>

    {{--  Sidebar  --}}
{{--    <x-template.navigation.sidebar/>--}}

    {{--  Main Content  --}}
    <main>
        @yield('content')
    </main>

    {{--  Footer  --}}
{{--    <x-template.footer/>--}}

    {{--  script  --}}
    @vite('resources/js/app.js')

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


</body>
</html>

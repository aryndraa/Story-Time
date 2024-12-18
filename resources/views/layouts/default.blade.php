
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
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
</head>
<body class="md:ml-24 lg:ml-56 xl:ml-64 ">

{{--  Sidebar  --}}
<x-template.navigation.navbar/>

{{--  Main Content  --}}
<main>
    @yield('main')
</main>
{{--  Footer  --}}
{{--    <x-template.footer/>--}}

{{--  script  --}}
@vite('resources/js/app.js')
</body>
</html>

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

    {{--  CDN Icon  --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="ml-64 min-h-screen bg-gradient-to-r from-dark to-neutral-900">

    {{--  Header  --}}
    <x-template.navigation.header/>

    {{--  Sidebar  --}}
    <x-template.navigation.sidebar/>

    {{--  Main Content  --}}
    <main>
        @yield('content')
    </main>

    {{--  Footer  --}}
    <footer>

    </footer>

    {{--  script  --}}
    @vite('resources/js/app.js')
</body>
</html>

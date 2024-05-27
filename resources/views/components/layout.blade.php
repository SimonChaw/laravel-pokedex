<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <title>{{ $title ?? "Pokedex App" }}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    </style>
    <script src=""></script>
    <x-navbar />
    <body>
        <main>
            {{ $slot }}
        </main>
    </body>
</html>
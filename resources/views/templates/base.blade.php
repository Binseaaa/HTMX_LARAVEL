<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>HTMX</title>
</head>
<body class="bg-gray-300">
    <div class="mx-auto bg-white shadow-lg flex min-h-[100dvh]">
        <section class="bg-blue-600 text-white w-64 p-4 flex flex-col space-y-4">
            <h1>HTMX LARAVEL</h1>
            <a class="py-2 px-4 bg-blue-700 hover:bg-blue-800 rounded" href="/">Home</a>
            <a class="py-2 px-4 bg-blue-700 hover:bg-blue-800 rounded" href="/about">About</a>
            <a class="py-2 px-4 bg-blue-700 hover:bg-blue-800 rounded" href="/products">Products</a>
            <a class="py-2 px-4 bg-blue-700 hover:bg-blue-800 rounded" href="/contact">Contact</a>
        </section>
        <article id="content" class="p-5 w-full">
            @yield('content')
        </article>
    </div>
</body>
</html>

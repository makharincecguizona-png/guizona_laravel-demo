<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Task Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-red-80 min-h-screen text-black p-8 antialiased flex items-center justify-center">
    <div class="w-full max-w-4xl bg-[#F5F5DC] rounded-xl border-2 border-gray-500 shadow-2xl overflow-hidden">
        <div class="bg-gray-800 h-2 w-full"></div>
        
        <div class="p-8">
            @yield('content')
        </div>
    </div>
</body>
</html>
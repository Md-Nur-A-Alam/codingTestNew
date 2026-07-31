<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- DaisyUI CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-base-200 min-h-screen p-6">

    <div class="max-w-6xl mx-auto bg-base-100 p-6 rounded-xl shadow-xl">
        <!-- Navigation Bar using DaisyUI Navbar -->
        <div class="navbar bg-base-200 rounded-box mb-6 shadow-sm">
            <div class="flex-1">
                <a class="btn btn-ghost text-xl">MicroMac_CodingTest </a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal px-1 gap-2">
                    <li><a href="{{ route('brands.index') }}" class="{{ request()->routeIs('brands.index') ? 'active bg-primary text-primary-content' : '' }}">Brand</a></li>
                    <li><a href="{{ route('models.index') }}" class="{{ request()->routeIs('models.index') ? 'active bg-primary text-primary-content' : '' }}">Model</a></li>
                    <li><a href="{{ route('items.index') }}" class="{{ request()->routeIs('items.index') ? 'active bg-primary text-primary-content' : '' }}">Item</a></li>
                </ul>
            </div>
        </div>
        @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
        @endif

        @yield('content')
    </div>

    @yield('scripts')
</body>

</html>
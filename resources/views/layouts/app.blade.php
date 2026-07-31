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
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <!-- Toastify JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>

<body class="bg-base-200 min-h-screen p-6">

    <div class="max-w-6xl mx-auto bg-base-100 p-6 rounded-xl shadow-xl">
        <!-- Navigation Bar using DaisyUI Navbar -->
        <div class="navbar bg-base-200 rounded-box mb-6 shadow-sm">
            <div class="flex-1">
                <a href="{{ route('brands.index') }}" class="btn btn-ghost text-xl h-auto py-2">
                    <img src="{{ asset('assets/mmtv_icon.png') }}" alt="MMTV Logo" class="h-15 w-auto" />
                </a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal px-1 gap-2">
                    <li><a href="{{ route('brands.index') }}" class="{{ request()->routeIs('brands.index') ? 'active bg-[#EE2726] text-white' : '' }}">Brand</a></li>
                    <li><a href="{{ route('models.index') }}" class="{{ request()->routeIs('models.index') ? 'active bg-[#EE2726] text-white' : '' }}">Model</a></li>
                    <li><a href="{{ route('items.index') }}" class="{{ request()->routeIs('items.index') ? 'active bg-[#EE2726] text-white' : '' }}">Item</a></li>
                </ul>
            </div>
        </div>
        <script>
            window.showToast = function(message, type = 'success') {
                let bgColor = "#10b981"; // success green
                if (type === 'danger' || type === 'error') {
                    bgColor = "#ef4444"; // error red
                } else if (type === 'warning') {
                    bgColor = "#f59e0b"; // warning orange
                } else if (type === 'info') {
                    bgColor = "#3b82f6"; // info blue
                }

                Toastify({
                    text: message,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    style: {
                        background: bgColor,
                        color: "white",
                        borderRadius: "8px",
                        boxShadow: "0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)"
                    }
                }).showToast();
            };
        </script>

        @if(session('success'))
            <script>showToast("{!! session('success') !!}", "success");</script>
        @endif
        @if(session('error'))
            <script>showToast("{!! session('error') !!}", "danger");</script>
        @endif
        @if(session('warning'))
            <script>showToast("{!! session('warning') !!}", "warning");</script>
        @endif

        @yield('content')
    </div>

    @yield('scripts')
</body>

</html>
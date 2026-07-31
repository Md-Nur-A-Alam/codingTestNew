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

<body class="bg-gradient-to-br from-gray-50 to-gray-200 min-h-screen p-4 sm:p-8 text-gray-800 antialiased font-sans">

    <div class="max-w-6xl mx-auto bg-white/80 backdrop-blur-xl p-6 sm:p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/60">
        <!-- Navigation Bar using DaisyUI Navbar -->
        <div class="navbar bg-white/60 backdrop-blur-md rounded-2xl mb-8 shadow-sm border border-gray-100 px-4">
            <div class="navbar-start">
                <a href="{{ route('brands.index') }}" class="btn btn-ghost h-auto py-2 hover:scale-105 transition-transform duration-300 px-2">
                    <img src="{{ asset('assets/mmtv_logo.png') }}" alt="MMTV Logo" class="h-12 sm:h-15 w-auto drop-shadow-sm" />
                </a>
            </div>
            <div class="navbar-center flex flex-col items-center justify-center text-center hidden lg:flex">
                <h1 class="text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight leading-tight">MicroMac Techno Valley Ltd.</h1>
                <h2 class="text-xs sm:text-sm font-medium text-gray-500 tracking-wide mt-0.5">Assessment of Standard Coding</h2>
            </div>
            <div class="navbar-end">
                <ul class="menu menu-horizontal px-1 gap-1 sm:gap-2 font-medium">
                    <li><a href="{{ route('brands.index') }}" class="{{ request()->routeIs('brands.index') ? 'active bg-[#EE2726] text-white shadow-md shadow-red-500/20' : 'hover:bg-red-50 hover:text-[#EE2726] transition-colors' }}">Brand</a></li>
                    <li><a href="{{ route('models.index') }}" class="{{ request()->routeIs('models.index') ? 'active bg-[#EE2726] text-white shadow-md shadow-red-500/20' : 'hover:bg-red-50 hover:text-[#EE2726] transition-colors' }}">Model</a></li>
                    <li><a href="{{ route('items.index') }}" class="{{ request()->routeIs('items.index') ? 'active bg-[#EE2726] text-white shadow-md shadow-red-500/20' : 'hover:bg-red-50 hover:text-[#EE2726] transition-colors' }}">Item</a></li>
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
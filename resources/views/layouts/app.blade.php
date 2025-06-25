<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        <style>
            body {
                min-height: 100vh;
            }
            .sidebar {
                min-height: 100vh;
                width: auto;
                background-color: #f8f9fa;
                border-right: 1px solid #ddd;
            }
            .sidebar a {
                display: block;
                padding: 12px 16px;
                color: #333;
                text-decoration: none;
            }
            .sidebar a.active, .sidebar a:hover {
                background-color: #e2e6ea;
            }
        </style>

    </head>
    <body class="font-sans antialiased">
    @include('layouts.navigation')
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar pl-5 pr-5">
            <h4>Inventory</h4>
            <a href="{{ route('products.index') }}" class="{{ request()->is('products*') ? 'active' : '' }} mt-5">Products</a>
            <a href="{{ route('sales.create') }}" class="{{ request()->is('sales*') ? 'active' : '' }} mt-2">Sales</a>
            <a href="{{ route('reports.index') }}" class="{{ request()->is('reports*') ? 'active' : '' }} mt-2">Reports</a>
        </div>

        <!-- Main Content -->
        <div class="container py-4">
            @yield('content')
        </div>
    </div>


    </body>
</html>

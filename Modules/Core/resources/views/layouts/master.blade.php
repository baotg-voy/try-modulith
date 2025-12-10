@extends('core::layouts.root')

@push('styles')
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Figtree', sans-serif;
    }

    .layout-wrapper {
        display: flex;
        min-height: 100vh;
    }

    .sidebar {
        width: 250px;
        background-color: #b3d9f2;
        position: fixed;
        height: 100vh;
        left: 0;
        top: 0;
        padding-top: 70px;
        z-index: 1000;
    }

    .sidebar-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-menu li {
        margin: 0;
    }

    .sidebar-menu a {
        display: block;
        padding: 15px 25px;
        color: #2c3e50;
        text-decoration: none;
        transition: background-color 0.3s ease;
        font-weight: 500;
    }

    .sidebar-menu a:hover {
        background-color: #9ac9e8;
    }

    .sidebar-menu a.active {
        background-color: #7fb8dd;
        border-left: 4px solid #1e5a7d;
    }

    .header {
        position: fixed;
        top: 0;
        left: 250px;
        right: 0;
        height: 70px;
        background-color: #1e5a7d;
        color: white;
        display: flex;
        align-items: center;
        padding: 0 30px;
        z-index: 1001;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .header h1 {
        margin: 0;
        font-size: 24px;
        font-weight: 600;
    }

    .main-content {
        margin-left: 250px;
        margin-top: 70px;
        padding: 30px;
        width: calc(100% - 250px);
        min-height: calc(100vh - 70px);
    }

    .pagination-container > nav {
        flex-grow: 1;
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 200px;
        }

        .header {
            left: 200px;
        }

        .main-content {
            margin-left: 200px;
            width: calc(100% - 200px);
        }
    }
</style>
@endpush

@section('app')
<div class="layout-wrapper">
    <!-- Sidebar -->
    <aside class="sidebar">
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('categories.index') }}" class="{{ request()->is('categories*') ? 'active' : '' }}">
                    Manage Categories
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}" class="{{ request()->is('products*') ? 'active' : '' }}">
                    Manage Products
                </a>
            </li>
            <li>
                <a href="{{ route('reviews.index') }}" class="{{ request()->is('reviews*') ? 'active' : '' }}">
                    Manage Reviews
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content Area -->
    <div style="flex: 1;">
        <!-- Header -->
        <header class="header">
            <h1>TAME Admin</h1>
        </header>

        <!-- Content -->
        <main class="main-content">
            @yield('content')
        </main>
    </div>
</div>
@endsection
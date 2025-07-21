<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Pointage</title>
    <link href="{{ asset('styles/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 220px;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
        }
        .sidebar img {
            width: 100px; /* Taille du logo */
            height: auto;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .sidebar a {
            color: #ffffff;
            padding: 10px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #495057;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <!-- Logo -->
        <img src="{{ asset('images/logo-white.png') }}" alt="Logo">
        <h4 class="text-center mb-4">Dashboard</h4>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Accueil</a>
        <a href="{{ route('agents.index') }}" class="{{ request()->routeIs('agents.*') ? 'active' : '' }}">Agents</a>
        <a href="{{ route('pointages.index') }}" class="{{ request()->routeIs('pointages.*') ? 'active' : '' }}">Présences</a>
        <a href="{{ route('parametres.index') }}" class="{{ request()->routeIs('parametres.*') ? 'active' : '' }}">Paramètres</a>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

</body>
</html>

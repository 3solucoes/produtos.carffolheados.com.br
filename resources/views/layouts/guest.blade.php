<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Login') }}</title>

        <!-- Site favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('styles/core.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('styles/icon-font.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('styles/style.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('scripts/core.js') }}"  defer></script>
        <script src="{{ asset('scripts/script.min.js') }}"  defer></script>
        <script src="{{ asset('scripts/process.js') }}"  defer></script>
        <script src="{{ asset('scripts/layout-settings.js') }}"  defer></script>
    </head>
    <body class="login-page">
        <x-jet-banner />
        <div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
                <div class="brand-logo">
                    <a href="login.html">
                        <img src="https://www.carffolheados.com.br/wp-content/themes/carf/img/carf.webp" alt="">
                    </a>
                </div>
                <div class="login-menu">
                    <ul>
                        <li><a href="/register">Cadastre-se</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center" >
            {{ $slot }}
        </div>
    </body>
    <!-- add sweet alert js & css in footer -->
	<script src="{{ asset('src/plugins/sweetalert2/sweetalert2.all.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/sweetalert2/sweetalert2.css')}}">
	<script src="{{ asset('src/plugins/sweetalert2/sweet-alert.init.js')}}"></script>
</html>

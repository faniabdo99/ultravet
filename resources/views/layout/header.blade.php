<!doctype html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>UltraVet - Your one stop shop for your pet needs</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('public')}}/css/all.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{url('public')}}/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('public')}}/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('public')}}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('public')}}/favicon-16x16.png">
    <link rel="manifest" href="{{url('public')}}/site.webmanifest">
    <link rel="mask-icon" href="{{url('public')}}/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#ffffff">
    @auth
    <meta name="user_token" content="{{getUserId()}}">
    @endauth
    <meta name="currency" content="{{session()->get('currency')}}">
    <meta name="exchange-rate" content="{{getExchangeRate()}}">
    {{-- @vite(['resources/js/app.js']) --}}
</head>

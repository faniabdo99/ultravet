<!doctype html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>UltraVet - {{$PageTitle ?? 'Your one stop shop for your pet needs'}}</title>
    <!-- SEO Related -->
    <meta name="description" content="{{$PageDescription ?? getSystemSettings('description')}}">
    <!-- OG Tags -->
    <meta name="og:type" content="Website">
    <meta name="og:url" content="{{url()->current()}}">
    <meta name="og:image" content="{{$PageImage ?? url('public').'/images/banner/offer_banner_bg_img_1.jpg'}}">
    <meta name="og:site_name" content="Ultravet">
    <meta name="og:description" content="{{$PageDescription ?? getSystemSettings('description')}}">
    <meta name="fb:page_id" content="43929265776">
    <meta name="application-name" content="Ultravet">
    <meta name="og:email" content="{{getSystemSettings('email')}}">
    <meta name="og:phone_number" content="{{getSystemSettings('phone_number')}}">
    <!-- Styles & Other meta tags -->
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
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YDNGNCZZGS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-YDNGNCZZGS');
    </script>
</head>

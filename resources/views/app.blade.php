<!DOCTYPE html>
<html lang="es" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-bs-theme="light">

<head></head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/logo_abg.ico">

    <title >Aforos y bombas Guzmán</title>

    <!-- Fonts
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />-->

<!--<link href="/public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/public/assets/css/icons_ti.min.css" rel="stylesheet" type="text/css">
<link href="/public/assets/css/icons.min.css" rel="stylesheet" type="text/css">
<link href="/public/assets/css/app.min.css" rel="stylesheet" type="text/css">
<link href="/public/assets/css/custom.min.css" rel="stylesheet" type="text/css">-->

{{--@vite(["public/assets/css/bootstrap.min.css" ,"public/assets/css/icons_ti.min.css" ,"public/assets/css/icons.min.css" ,"public/assets/css/app.min.css", "public/assets/css/custom.min.css",

"public/assets/js/layout.js",
"public/assets/libs/bootstrap/js/bootstrap.bundle.min.js",
"public/assets/libs/simplebar/simplebar.min.js",
"public/assets/js/plugins.js" ,
"public/assets/js/pages/password-addon.init.js",
"public/assets/libs/swiper/swiper-bundle.min.js",
//---------------------------------------------------//
"public/assets/js/pages/invoice-create.init.js",
"public/jquery-3.6.0.min.js",
"public/assets/libs/list.js/list.min.js",
"public/assets/libs/list.pagination.js/list.pagination.min.js",
"public/assets/libs/sweetalert2/sweetalert2.min.js",
"public/assets/js/pages/invoice-list.init.js",
"public/assets/libs/sweetalert2/sweetalert2.min.css",
] )--}}

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.ts', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia

</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TechnoCake</title>
   <link rel="icon" type="image/x-icon" href="{{asset('admin_assets/img/logo2.png')}}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.bunny.net">
   <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

   <!-- Styles -->
   <!-- <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}.z-10{z-index: 10}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}
        </style> -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600&display=swap">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
   <!-- custom css file link  -->
   <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet">
</head>

<body class="antialiased">
   <!-- <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"> -->
   <!-- @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif -->
   <!-- </div> -->
   <header class="header">

      <div id="menu-btn" class="fas fa-bars icons"></div>
      <div id="search-btn" class="fas fa-search icons"></div>

      <nav class="navbar">
         <!-- <a href="#home">inicio</a> -->
         <a href="#about">acerca</a>
         <!-- <a href="#reviews">reviews</a> -->
         <!-- <a href="#blogs">blogs</a> -->
         <a href="#contact">contacto</a>
         <span class="space"></span>
         @if (Auth::check())
         <a href="#menu">productos</a>
         <!-- <a href="{{ route('dashboard') }}">Dashboard</a> -->
         <a href="{{ route('logout') }}">Logout</a>
         @else
         <a href="{{ route('login') }}">Login</a>
         <a href="{{ route('register') }}">Register</a>
         @endif
      </nav>
      <div class="shopping">
         <a class="fas fa-shopping-cart icons"></a>
         <span class="quantity">0</span>
      </div>

      <a href="#home" class="logo"><img src="{{ asset('admin_assets/img/logo.png')}}" alt=""></a>

      <form action="" class="search-form">
         <input type="search" name="" placeholder="search here..." id="search-box">
         <label for="search-box" class="fas fa-search icons"></label>
      </form>

   </header>


   <!-- header section ends  -->

   <!-- home section starts  -->

   <section class="home" id="home">

      <div class="content">
         <img data-aos="fade-up" data-aos-delay="150" src="{{ asset('admin_assets/img/cake-banner.png')}}" alt="" width="300" height="350">
         <h3 data-aos="fade-up" data-aos-delay="200">Bienvenido a <br> <strong>TechnoCake</strong></h3>
         <div data-aos="fade-up" data-aos-delay="450">
            <p>Donde los sabores se convierten en momentos mágicos..</p>
            <a data-aos-delay="500" href="#menu" class="btn">Nuestros Productos</a>
         </div>
      </div>

   </section>

   <!-- home section ends -->

   <!-- service sectioin starts  -->

   <section class="service" style="background-color: white;">

      <div class="box" data-aos="fade-up" data-aos-delay="150">
         <i class="fas fa-birthday-cake"></i>
         <h3>Mejor calidad</h3>
         <p>Siempre tendremos los mejores pasteles para ti, de la mejor calidad.</p>
      </div>

      <div class="box" data-aos="fade-up" data-aos-delay="300">
         <i class="fas fa-shipping-fast"></i>
         <h3>Envío Rápido</h3>
         <p>En <strong>TechnoCake</strong> te enviaremos tu pastel lo más rápido posible.</p>
      </div>

      <div class="box" data-aos="fade-up" data-aos-delay="450">
         <i class="fas fa-headset"></i>
         <h3>Soporte 24/7</h3>
         <p>Trataremos siempre de estar contigo en todo momento.</p>
      </div>

   </section>

   <!-- service sectioin ends -->

   <!-- menu section starts  -->

   <section class="menu" id="menu">


      <div class="heading">
         <img src="images/title-img.png" alt="">
         <h3>Nuestros Productos</h3>
      </div>
      <div class="container py-5">
         <h1 class="text-center">Popular Dishes</h1>
         <div id="list" class="row row-cols-1 row-cols-md-3 g-4 py-5">

            <!-- <div class="list"> -->
            <!--<div class="col" data-aos="fade-up" data-aos-delay="450">
         <div class="card">
             <img src="./pics/product-1.png" alt width="330" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title">TIRAMISU CAKE</h5>
               <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                  dignissimos accusantium amet similique velit iste.</p>
            </div>
            <div class="mb-5 d-flex justify-content-around">
               <h3>190$</h3>
               <button class="btn btn-primary">Buy Now</button>
            </div>
         </div>
      </div>

      <div class="col" data-aos="fade-up" data-aos-delay="450">
         <div class="card">
            <img src="./pics/product-2.png" alt width="330" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title">TIRAMISU CAKE</h5>
               <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                  dignissimos accusantium amet similique velit iste.</p>
            </div>
            <div class="mb-5 d-flex justify-content-around">
               <h3>190$</h3>
               <button class="btn btn-primary">Buy Now</button>
            </div>
         </div>
      </div>

      <div class="col" data-aos="fade-up" data-aos-delay="450">
         <div class="card">
            <img src="./pics/product-3.png" alt width="330" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title">TIRAMISU CAKE</h5>
               <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                  dignissimos accusantium amet similique velit iste.</p>
            </div>
            <div class="mb-5 d-flex justify-content-around">
               <h3>190$</h3>
               <button class="btn btn-primary">Buy Now</button>
            </div>
         </div>
      </div>

      <div class="col" data-aos="fade-up" data-aos-delay="450">
         <div class="card">
            <img src="./pics/product-4.png" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title">TIRAMISU CAKE</h5>
               <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                  dignissimos accusantium amet similique velit iste.</p>
            </div>
            <div class="mb-5 d-flex justify-content-around">
               <h3>190$</h3>
               <button class="btn btn-primary">Buy Now</button>
            </div>
         </div>
      </div>

      <div class="col" data-aos="fade-up" data-aos-delay="450">
         <div class="card">
            <img src="./pics/product-5.png" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title">TIRAMISU CAKE</h5>
               <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                  dignissimos accusantium amet similique velit iste.</p>
            </div>
            <div class="mb-5 d-flex justify-content-around">
               <h3>190$</h3>
               <button class="btn btn-primary">Buy Now</button>
            </div>
         </div>
      </div>

      <div class="col" data-aos="fade-up" data-aos-delay="450">
         <div class="card">
            <img src="./pics/product-6.png" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title">TIRAMISU CAKE</h5>
               <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                  dignissimos accusantium amet similique velit iste.</p>
            </div>
            <div class="mb-5 d-flex justify-content-around">
               <h3>190$</h3>
               <button class="btn btn-primary">Buy Now</button>
            </div>-->
            <!-- </div> -->
         </div>
      </div>

      </div>
      </div>


   </section>

   <!-- menu section ends -->

   <!-- about section starts  -->

   <section class="about" id="about" style="background: url('/admin_assets/img/back.jpg'); position: relative;
    opacity: 0.95;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
      <div class="image" data-aos="fade-right" data-aos-delay="150">
         <img src="{{ asset('admin_assets/img/about-image.png')}}" alt="" height="550">
      </div>
      <div class="content" data-aos="fade-left" data-aos-delay="300">
         <strong>
            <h3 class="title">Acerca de TechnoCake</h3>
            <p>Somos una pastelería que ahora se ha transformado a la era digital</p>
            <div class="icons">
               <h3> <i class="fas fa-check"></i> mejores precios </h3>
               <h3> <i class="fas fa-check"></i> el mejor servicio </h3>
               <h3> <i class="fas fa-check"></i> Fresh Ingredient </h3>
               <h3> <i class="fas fa-check"></i> backed buns </h3>
               <h3> <i class="fas fa-check"></i> natural cheese </h3>
               <h3> <i class="fas fa-check"></i> veg & non-veg </h3>
            </div>
         </strong>
         <a href="#" class="btn">read more</a>
      </div>

   </section>

   <!-- about section ends -->

   <!-- reviews section starts  -->
   <section id="our-testimonial" id="reviews" class="padding">
      <link rel="stylesheet" href="{{asset('admin_assets/css/style-tes.css')}}">
      <div class="container">
         <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
               <img src="images/title-img.png" alt="">
               <div class="heading-title bottom30 wow fadeInUp" data-wow-delay="300ms"> <span>Testimonials</span>
                  <h2 class="darkcolor">What People Say</h2>
               </div>
            </div>
         </div>
         <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-md-12 col-sm-12">
               <div id="testimonial-slider" class="owl-carousel">
                  <div class="item">
                     <div class="testimonial-wrapp"> <span class="quoted"><i class="fa fa-quote-right"></i></span>
                        <div class="testimonial-text">
                           <p class="bottom40">Donec semper euismod nisi quis feugiat. Nullam finibus metus eget orci
                              volutpat porta. Morbi quis arcu vulputate, dignissim mi ac, varius magna.</p>
                        </div>
                        <div class="testimonial-photo"><img alt="" src="images/pic-1.png"></div>
                        <div class="stars">
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h4 class="darkcolor">Sam David</h4>
                        <small class="defaultcolor">Businessman</small>
                     </div>
                  </div>
                  <div class="item">
                     <div class="testimonial-wrapp"> <span class="quoted"><i class="fa fa-quote-right"></i></span>
                        <div class="testimonial-text">
                           <p class="bottom40">Donec semper euismod nisi quis feugiat. Nullam finibus metus eget orci
                              volutpat porta. Morbi quis arcu vulputate, dignissim mi ac, varius magna.</p>
                        </div>
                        <div class="testimonial-photo"><img alt="" src="images/pic-2.png"></div>
                        <div class="stars">
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h4 class="darkcolor">Jams Shah</h4>
                        <small class="defaultcolor">Businessman</small>
                     </div>
                  </div>
                  <div class="item">
                     <div class="testimonial-wrapp"> <span class="quoted"><i class="fa fa-quote-right"></i></span>
                        <div class="testimonial-text">
                           <p class="bottom40">Donec semper euismod nisi quis feugiat. Nullam finibus metus eget orci
                              volutpat porta. Morbi quis arcu vulputate, dignissim mi ac, varius magna.</p>
                        </div>
                        <div class="testimonial-photo"><img alt="" src="images/pic-3.png"></div>
                        <div class="stars">
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h4 class="darkcolor">Zubin Zucker</h4>
                        <small class="defaultcolor">Businessman</small>
                     </div>
                  </div>
                  <div class="item">
                     <div class="testimonial-wrapp"> <span class="quoted"><i class="fa fa-quote-right"></i></span>
                        <div class="testimonial-text">
                           <p class="bottom40">Donec semper euismod nisi quis feugiat. Nullam finibus metus eget orci
                              volutpat porta. Morbi quis arcu vulputate, dignissim mi ac, varius magna.</p>
                        </div>
                        <div class="testimonial-photo"><img alt="" src="images/pic-1.png"></div>
                        <div class="stars">
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h4 class="darkcolor">David Zucker</h4>
                        <small class="defaultcolor">Businessman</small>
                     </div>
                  </div>
                  <div class="item">
                     <div class="testimonial-wrapp"> <span class="quoted"><i class="fa fa-quote-right"></i></span>
                        <div class="testimonial-text">
                           <p class="bottom40">Donec semper euismod nisi quis feugiat. Nullam finibus metus eget orci
                              volutpat porta. Morbi quis arcu vulputate, dignissim mi ac, varius magna.</p>
                        </div>
                        <div class="testimonial-photo"><img alt="" src="images/pic-2.png"></div>
                        <div class="stars">
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h4 class="darkcolor">Akten Jansen</h4>
                        <small class="defaultcolor">Businessman</small>
                     </div>
                  </div>
                  <div class="item">
                     <div class="testimonial-wrapp"> <span class="quoted"><i class="fa fa-quote-right"></i></span>
                        <div class="testimonial-text">
                           <p class="bottom40">Donec semper euismod nisi quis feugiat. Nullam finibus metus eget orci
                              volutpat porta. Morbi quis arcu vulputate, dignissim mi ac, varius magna.</p>
                        </div>
                        <div class="testimonial-photo"><img alt="" src="images/pic-3.png"></div>
                        <div class="stars">
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h4 class="darkcolor">Doe Raleway</h4>
                        <small class="defaultcolor">Businessman</small>
                     </div>
                  </div>
                  <div class="item">
                     <div class="testimonial-wrapp"> <span class="quoted"><i class="fa fa-quote-right"></i></span>
                        <div class="testimonial-text">
                           <p class="bottom40">Donec semper euismod nisi quis feugiat. Nullam finibus metus eget orci
                              volutpat porta. Morbi quis arcu vulputate, dignissim mi ac, varius magna.</p>
                        </div>
                        <div class="testimonial-photo"><img alt="" src="images/pic-1.png"></div>
                        <div class="stars">
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h4 class="darkcolor">Shamoun Raleway</h4>
                        <small class="defaultcolor">Businessman</small>
                     </div>
                  </div>
                  <div class="item">
                     <div class="testimonial-wrapp"> <span class="quoted"><i class="fa fa-quote-right"></i></span>
                        <div class="testimonial-text">
                           <p class="bottom40">Donec semper euismod nisi quis feugiat. Nullam finibus metus eget orci
                              volutpat porta. Morbi quis arcu vulputate, dignissim mi ac, varius magna.</p>
                        </div>
                        <div class="testimonial-photo"><img alt="" src="images/pic-3.png"></div>
                        <div class="stars">
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h4 class="darkcolor">Albugdadi Raleway</h4>
                        <small class="defaultcolor">Businessman</small>
                     </div>
                  </div>
                  <div class="item">
                     <div class="testimonial-wrapp"> <span class="quoted"><i class="fa fa-quote-right"></i></span>
                        <div class="testimonial-text">
                           <p class="bottom40">Donec semper euismod nisi quis feugiat. Nullam finibus metus eget orci
                              volutpat porta. Morbi quis arcu vulputate, dignissim mi ac, varius magna.</p>
                        </div>
                        <div class="testimonial-photo"><img alt="" src="images/pic-3.png"></div>
                        <div class="stars">
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h4 class="darkcolor">Albugdadi Raleway</h4>
                        <small class="defaultcolor">Businessman</small>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- reviews section ends -->

   <!-- contact section starts  -->

   <section class="contact" id="contacto" style="background: url('/admin_assets/img/back2.jpg'); position: relative;
    opacity: 0.95;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

      <div class="heading">
         <img src="images/title-img.png" alt="">
         <h3>¡Contáctanos!</h3>
      </div>

      <div class="row">

         <iframe data-aos="fade-up" data-aos-delay="150" class="map" src="https://www.google.com/maps/d/u/0/embed?mid=1J9dlxGF65_JOGsJkAl9_rhZ7WY4D54M&ehbc=2E312F" allowfullscreen=""></iframe>


         <div class="form" style="background-color: #f979ae; border-radius: 5rem">

            <div class="icons-container">

               <div class="icons" data-aos="fade-up" data-aos-delay="150">
                  <i class="fas fa-map"></i>
                  <h3>Direccion :</h3>
                  <p>TechnoCake</p>
               </div>

               <div class="icons" data-aos="fade-up" data-aos-delay="300">
                  <i class="fas fa-envelope"></i>
                  <h3>Correo :</h3>
                  <p>technocake@gmail.com</p>
                  <!-- <p>DomainName@gmail.com</p> -->
               </div>

               <div class="icons" data-aos="fade-up" data-aos-delay="450">
                  <i class="fas fa-phone"></i>
                  <h3>telefono :</h3>
                  <p>+123-456-7890</p>
                  <!-- <p>+111-222-3333</p> -->
               </div>

            </div>

            <form action="">
               <input data-aos="fade-up" data-aos-delay="150" type="text" placeholder="Nombre" class="box">
               <input data-aos="fade-up" data-aos-delay="300" type="email" placeholder="Correo" class="box">
               <input data-aos="fade-up" data-aos-delay="450" type="number" placeholder="Telefono" class="box">
               <textarea data-aos="fade-up" data-aos-delay="600" name="" placeholder="Mensaje" class="box" id="" cols="30" rows="10"></textarea>
               <a data-aos="fade-up" data-aos-delay="750" type="submit" value="Enviar" class="btn">Enviar</a>
            </form>

         </div>

      </div>

   </section>

   <!-- contact section ends -->


   <!-- blogs section ends -->

   <!-- footer section starts  -->

   <section class="footer">

      <div class="links">
         <a href="#home" class="btn">home</a>
         <a href="#menu" class="btn">menu</a>
         <a href="#about" class="btn">about</a>
         <a href="#reviews" class="btn">reviews</a>
         <a href="#contact" class="btn">contact</a>
         <a href="#blogs" class="btn">blogs</a>
      </div>

      <p class="credit"><span><a href="https://www.instagram.com/TechnoCakeOfficial/">TechnoCake</a></span> | created by <strong>TON-618</strong> </p><br>

   </section>
   <div class="cardShop">
      <br>
      <br>
      <br>
      <br>
      <br>
      <h1><strong>Carrito</strong></h1>
      <ul class="listShop">
      </ul>
      <div class="checkOut">
         <button class="total">0</button>
         <div class="closeShopping">Close</div>
      </div>
   </div>

   <!-- footer section ends -->

   <!-- custom js file link      -->
   <script>
      let searchBtn = document.querySelector('#search-btn');
      let searchForm = document.querySelector('.header .search-form');

      searchBtn.onclick = () => {
         searchBtn.classList.toggle('fa-times');
         searchForm.classList.toggle('active');
         menuBtn.classList.remove('fa-times');
         navbar.classList.remove('active');
      }

      let menuBtn = document.querySelector('#menu-btn');
      let navbar = document.querySelector('.header .navbar');

      menuBtn.onclick = () => {
         menuBtn.classList.toggle('fa-times');
         navbar.classList.toggle('active');
         searchBtn.classList.remove('fa-times');
         searchForm.classList.remove('active');
      }

      window.onscroll = () => {
         searchBtn.classList.remove('fa-times');
         searchForm.classList.remove('active');
         menuBtn.classList.remove('fa-times');
         navbar.classList.remove('active');
      }
   </script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

   <script>
      AOS.init({
         duration: 800,
      });
   </script>
   <script>
      jQuery(function($) {
         "use strict";
         var $window = $(window);
         var windowsize = $(window).width();
         var $root = $("html, body");
         var $this = $(this);


         /*Testimonials 3columns*/
         $("#testimonial-slider").owlCarousel({
            items: 10,
            autoplay: 2500,
            autoplayHoverPause: true,
            loop: true,
            margin: 30,
            dots: true,
            nav: false,
            responsive: {
               1280: {
                  items: 9,
               },
               1280: {
                  items: 8,
               },
               1280: {
                  items: 7,
               },
               1280: {
                  items: 6,
               },
               1280: {
                  items: 5,
               },
               1280: {
                  items: 4,
               },
               1280: {
                  items: 3,
               },
               600: {
                  items: 2,
               },
               320: {
                  items: 1,
               },
            }
         });


      });
   </script>

   <!--Owl Slider-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
<script src="{{ asset('admin_assets/js/product2.js')}}"></script>


</html>
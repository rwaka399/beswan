<!--
=========================================================
* Material Kit 3 - v3.1.0
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-kit
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>



    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('cms2/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('cms2/assets/img/favicon.png') }}">

    <title>

        Material Kit 3 by Creative Tim

    </title>



    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />

    <!-- Nucleo Icons -->
    <link href="{{ asset('cms2/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('cms2/assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- CSS Files -->



    <link id="pagestyle" href="{{ asset('cms2/assets/css/material-kit.css?v=3.1.0') }}" rel="stylesheet" />


</head>

<body class="index-page bg-gray-200">


    <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav
                    class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 p-2 start-0 end-0 mx-4">
                    <div class="container-fluid px-0">
                        <a class="navbar-brand font-weight-bolder ms-sm-3 text-sm"
                            href="https://demos.creative-tim.com/material-kit/index" rel="tooltip"
                            title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
                            Home
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                            <ul class="navbar-nav navbar-nav-hover ms-auto">
                                <li class="nav-item dropdown dropdown-hover mx-2">
                                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center font-weight-semibold"
                                        id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-symbols-rounded opacity-6 me-2 text-md">dashboard</i>
                                        Pages
                                        <img src="{{ asset('cms2/assets/img/down-arrow-dark.svg') }}" alt="down-arrow"
                                            class="arrow ms-auto ms-md-2">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3"
                                        aria-labelledby="dropdownMenuPages">
                                        <div class="d-none d-lg-block">
                                            <h6
                                                class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                                Landing Pages
                                            </h6>
                                            <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
                                                <span>About Us</span>
                                            </a>
                                            <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
                                                <span>Contact Us</span>
                                            </a>
                                            <a href="./pages/author.html" class="dropdown-item border-radius-md">
                                                <span>Author</span>
                                            </a>
                                            <h6
                                                class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1 mt-3">
                                                Account
                                            </h6>
                                            <a href="./pages/sign-in.html" class="dropdown-item border-radius-md">
                                                <span>Sign In</span>
                                            </a>
                                        </div>

                                        <div class="d-lg-none">
                                            <h6
                                                class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                                Landing Pages
                                            </h6>

                                            <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
                                                <span>About Us</span>
                                            </a>
                                            <a href="./pages/contact-us.html" class="dropdown-item border-radius-md">
                                                <span>Contact Us</span>
                                            </a>
                                            <a href="./pages/author.html" class="dropdown-item border-radius-md">
                                                <span>Author</span>
                                            </a>

                                            <h6
                                                class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1 mt-3">
                                                Account
                                            </h6>
                                            <a href="./pages/sign-in.html" class="dropdown-item border-radius-md">
                                                <span>Sign In</span>
                                            </a>

                                        </div>

                                    </div>
                                </li>

                                <li class="nav-item dropdown dropdown-hover mx-2">
                                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center font-weight-semibold"
                                        id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-symbols-rounded opacity-6 me-2 text-md">article</i>
                                        Docs
                                        <img src="{{ asset('cms2/assets/img/down-arrow-dark.svg') }}" alt="down-arrow"
                                            class="arrow ms-auto ms-md-2">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive mt-0 mt-lg-3 p-3 border-radius-lg"
                                        aria-labelledby="dropdownMenuDocs">
                                        <div class="d-none d-lg-block">
                                            <ul class="list-group">
                                                <li class="nav-item list-group-item border-0 p-0">
                                                    <a class="dropdown-item py-2 ps-3 border-radius-md"
                                                        href=" https://www.creative-tim.com/learning-lab/bootstrap/overview/material-kit ">
                                                        <h6
                                                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                            Getting Started</h6>
                                                        <span class="text-sm">All about overview, quick start, license
                                                            and contents</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item list-group-item border-0 p-0">
                                                    <a class="dropdown-item py-2 ps-3 border-radius-md"
                                                        href=" https://www.creative-tim.com/learning-lab/bootstrap/colors/material-kit ">
                                                        <h6
                                                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                            Foundation</h6>
                                                        <span class="text-sm">See our colors, icons and
                                                            typography</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item list-group-item border-0 p-0">
                                                    <a class="dropdown-item py-2 ps-3 border-radius-md"
                                                        href=" https://www.creative-tim.com/learning-lab/bootstrap/alerts/material-kit ">
                                                        <h6
                                                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                            Components</h6>
                                                        <span class="text-sm">Explore our collection of fully designed
                                                            components</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item list-group-item border-0 p-0">
                                                    <a class="dropdown-item py-2 ps-3 border-radius-md"
                                                        href=" https://www.creative-tim.com/learning-lab/bootstrap/datepicker/material-kit ">
                                                        <h6
                                                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                            Plugins</h6>
                                                        <span class="text-sm">Check how you can integrate our
                                                            plugins</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item list-group-item border-0 p-0">
                                                    <a class="dropdown-item py-2 ps-3 border-radius-md"
                                                        href=" https://www.creative-tim.com/learning-lab/bootstrap/utilities/material-kit ">
                                                        <h6
                                                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                            Utility Classes</h6>
                                                        <span class="text-sm">For those who want flexibility, use our
                                                            utility classes</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="row d-lg-none">
                                            <div class="col-md-12 g-0">
                                                <a class="dropdown-item py-2 ps-3 border-radius-md"
                                                    href="./pages/about-us.html">
                                                    <h6
                                                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                        Getting Started</h6>
                                                    <span class="text-sm">All about overview, quick start, license and
                                                        contents</span>
                                                </a>

                                                <a class="dropdown-item py-2 ps-3 border-radius-md"
                                                    href="./pages/about-us.html">
                                                    <h6
                                                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                        Foundation</h6>
                                                    <span class="text-sm">See our colors, icons and typography</span>
                                                </a>

                                                <a class="dropdown-item py-2 ps-3 border-radius-md"
                                                    href="./pages/about-us.html">
                                                    <h6
                                                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                        Components</h6>
                                                    <span class="text-sm">Explore our collection of fully designed
                                                        components</span>
                                                </a>

                                                <a class="dropdown-item py-2 ps-3 border-radius-md"
                                                    href="./pages/about-us.html">
                                                    <h6
                                                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                        Plugins</h6>
                                                    <span class="text-sm">Check how you can integrate our
                                                        plugins</span>
                                                </a>

                                                <a class="dropdown-item py-2 ps-3 border-radius-md"
                                                    href="./pages/about-us.html">
                                                    <h6
                                                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                        Utility Classes</h6>
                                                    <span class="text-sm">For those who want flexibility, use our
                                                        utility classes</span>
                                                </a>
                                            </div>
                                        </div>

                                    </ul>
                                </li>

                                <li class="nav-item my-auto ms-3 ms-lg-0 mx-2">

                                    <a href="{{ route('login-page') }}"
                                        class="btn  bg-gradient-dark  mb-0 mt-2 mt-md-0">Login</a>

                                </li>

                                <li class="nav-item my-auto ms-3 ms-lg-0">

                                    <a href="{{ route('register-page') }}"
                                        class="btn  bg-gradient-dark  mb-0 mt-2 mt-md-0">Registrasi</a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>



















    <header class="header-2">
        <div class="page-header min-vh-75 relative"
            style="background-image: url('{{ asset('cms2/assets/img/beswan-home.jpg') }}">
            <span class="mask bg-gradient-dark opacity-4"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 text-center mx-auto">
                        <h1 class="text-white font-weight-black pt-3 mt-n5">BESWAN COURSE</h1>
                        <p class="lead text-white mt-3">Free & Open Source Web <br />
                            Join over 1.6 million developers around the world. </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">

        <section class="pt-3 pb-4" id="count-stats">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 mx-auto py-3">
                        <div class="row">
                            <div class="col-md-4 position-relative">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-dark"><span id="state1" countTo="70">0</span>+
                                    </h1>
                                    <h5 class="mt-3">Coded Elements</h5>
                                    <p class="text-sm font-weight-normal">From buttons, to inputs, navbars, alerts or
                                        cards, you are covered</p>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-md-4 position-relative">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-dark"> <span id="state2"
                                            countTo="15">0</span>+</h1>
                                    <h5 class="mt-3">Design Blocks</h5>
                                    <p class="text-sm font-weight-normal">Mix the sections, change the colors and
                                        unleash your creativity</p>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 text-center">
                                    <h1 class="text-gradient text-dark" id="state3" countTo="4">0</h1>
                                    <h5 class="mt-3">Pages</h5>
                                    <p class="text-sm font-weight-normal">Save 3-4 weeks of work when you use our
                                        pre-made pages for your website</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="my-5 py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
                        <div class="rotating-card-container">
                            <div
                                class="card card-rotate card-background card-background-mask-primary shadow-dark mt-md-0 mt-5">
                                <div class="front front-background"
                                    style="background-image: url(https://images.unsplash.com/photo-1569683795645-b62e50fbf103?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80); background-size: cover;">
                                    <div class="card-body py-7 text-center">
                                        <i class="material-symbols-rounded text-white text-4xl my-3">touch_app</i>
                                        <h3 class="text-white">Feel the <br /> Material Kit</h3>
                                        <p class="text-white opacity-8">All the Bootstrap components that you need in a
                                            development have been re-design with the new look.</p>
                                    </div>
                                </div>
                                <div class="back back-background"
                                    style="background-image: url(https://images.unsplash.com/photo-1498889444388-e67ea62c464b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1365&q=80); background-size: cover;">
                                    <div class="card-body pt-7 text-center">
                                        <h3 class="text-white">Discover More</h3>
                                        <p class="text-white opacity-8"> You will save a lot of time going from
                                            prototyping to full-functional code because all elements are implemented.
                                        </p>
                                        <a href=".//sections/page-sections/hero-sections.html" target="_blank"
                                            class="btn btn-white btn-sm w-50 mx-auto mt-3">Start with Headers</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ms-auto">
                        <div class="row justify-content-start">
                            <div class="col-md-6">
                                <div class="info">
                                    <i
                                        class="material-symbols-rounded text-gradient text-success text-3xl">content_copy</i>
                                    <h5 class="font-weight-bolder mt-3">Full Documentation</h5>
                                    <p class="pe-5">Built by developers for developers. Check the foundation and you
                                        will find everything inside our documentation.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <i
                                        class="material-symbols-rounded text-gradient text-success text-3xl">flip_to_front</i>
                                    <h5 class="font-weight-bolder mt-3">Bootstrap 5 Ready</h5>
                                    <p class="pe-3">The world’s most popular front-end open source toolkit, featuring
                                        Sass variables and mixins.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-start mt-5">
                            <div class="col-md-6 mt-3">
                                <i
                                    class="material-symbols-rounded text-gradient text-success text-3xl">price_change</i>
                                <h5 class="font-weight-bolder mt-3">Save Time & Money</h5>
                                <p class="pe-5">Creating your design from scratch with dedicated designers can be
                                    very expensive. Start with our Design System.</p>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="info">
                                    <i class="material-symbols-rounded text-gradient text-success text-3xl">devices</i>
                                    <h5 class="font-weight-bolder mt-3">Fully Responsive</h5>
                                    <p class="pe-3">Regardless of the screen size, the website content will naturally
                                        fit the given resolution.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="my-5 py-5">
            <div class="container">
                <div class="row">
                    <div class="row justify-content-center text-center my-sm-5">
                        <div class="col-lg-6">
                            <span class="badge bg-success mb-3">Infinite combinations</span>
                            <h2 class="text-dark mb-0">Huge collection of sections</h2>
                            <p class="lead">We have created multiple options for you to put together and customise
                                into pixel perfect pages. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-sm-5 mt-3">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="position-sticky pb-lg-5 pb-3 mt-lg-0 mt-5 ps-2" style="top: 100px">
                            <h3>Elements</h3>
                            <h6 class="text-secondary font-weight-normal pe-3">70+ carefully crafted small elements
                                that come with multiple colors and shapes. These are only a few of them.</h6>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="row mt-3">
                            <!-- Buttons color -->
                            <div class="col-12">
                                <div class="position-relative border-radius-xl overflow-hidden shadow-lg mb-7">
                                    <div class="container border-bottom">
                                        <div class="row justify-space-between py-2">
                                            <div class="col-lg-3 me-auto">
                                                <p class="lead text-dark pt-1 mb-0">Buttons color</p>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="nav-wrapper position-relative end-0">
                                                    <ul class="nav nav-pills nav-fill flex-row p-1" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link mb-0 px-0 py-1 active"
                                                                data-bs-toggle="tab" href="#preview-btn-color"
                                                                role="tab" aria-controls="preview"
                                                                aria-selected="true">
                                                                <i class="fas fa-desktop text-sm me-2"></i> Preview
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab"
                                                                href="#code-btn-color" role="tab"
                                                                aria-controls="code" aria-selected="false">
                                                                <i class="fas fa-code text-sm me-2"></i> Code
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <footer class="footer pt-5 mt-5">
                                        <div class="container">
                                            <div class=" row">
                                                <div class="col-md-3 mb-4 ms-auto">
                                                    <div>
                                                        <a href="https://www.creative-tim.com/product/material-kit">
                                                            <img src="{{ asset('cms2/assets/img/logo-ct-dark.png') }}"
                                                                class="mb-3 footer-logo" alt="main_logo">
                                                        </a>
                                                        <h6 class="font-weight-bolder mb-4">Material Kit 3</h6>
                                                    </div>
                                                    <div>
                                                        <ul class="d-flex flex-row ms-n3 nav">
                                                            <li class="nav-item">
                                                                <a class="nav-link pe-1"
                                                                    href="https://www.facebook.com/CreativeTim"
                                                                    target="_blank">
                                                                    <i class="fab fa-facebook text-lg opacity-8"></i>
                                                                </a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link pe-1"
                                                                    href="https://twitter.com/creativetim"
                                                                    target="_blank">
                                                                    <i class="fab fa-twitter text-lg opacity-8"></i>
                                                                </a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link pe-1"
                                                                    href="https://dribbble.com/creativetim"
                                                                    target="_blank">
                                                                    <i class="fab fa-dribbble text-lg opacity-8"></i>
                                                                </a>
                                                            </li>


                                                            <li class="nav-item">
                                                                <a class="nav-link pe-1"
                                                                    href="https://github.com/creativetimofficial"
                                                                    target="_blank">
                                                                    <i class="fab fa-github text-lg opacity-8"></i>
                                                                </a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link pe-1"
                                                                    href="https://www.youtube.com/channel/UCVyTG4sCw-rOvB9oHkzZD1w"
                                                                    target="_blank">
                                                                    <i class="fab fa-youtube text-lg opacity-8"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>



                                                <div class="col-md-2 col-sm-6 col-6 mb-4">
                                                    <div>
                                                        <h6 class="text-sm">Company</h6>
                                                        <ul class="flex-column ms-n3 nav">
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    href="https://www.creative-tim.com/presentation"
                                                                    target="_blank">
                                                                    About Us
                                                                </a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    href="https://www.creative-tim.com/templates/free"
                                                                    target="_blank">
                                                                    Freebies
                                                                </a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    href="https://www.creative-tim.com/templates/premium"
                                                                    target="_blank">
                                                                    Premium Tools
                                                                </a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    href="https://www.creative-tim.com/blog"
                                                                    target="_blank">
                                                                    Blog
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-sm-6 col-6 mb-4">
                                                    <div>
                                                        <h6 class="text-sm">Resources</h6>
                                                        <ul class="flex-column ms-n3 nav">
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="https://iradesign.io/"
                                                                    target="_blank">
                                                                    Illustrations
                                                                </a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    href="https://www.creative-tim.com/bits"
                                                                    target="_blank">
                                                                    Bits & Snippets
                                                                </a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    href="https://www.creative-tim.com/affiliates/new"
                                                                    target="_blank">
                                                                    Affiliate Program
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-sm-6 col-6 mb-4">
                                                    <div>
                                                        <h6 class="text-sm">Help & Support</h6>
                                                        <ul class="flex-column ms-n3 nav">
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    href="https://www.creative-tim.com/contact-us"
                                                                    target="_blank">
                                                                    Contact Us
                                                                </a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    href="https://www.creative-tim.com/knowledge-center"
                                                                    target="_blank">
                                                                    Knowledge Center
                                                                </a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    href="https://services.creative-tim.com/?ref=ct-mk2-footer"
                                                                    target="_blank">
                                                                    Custom Development
                                                                </a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    href="https://www.creative-tim.com/sponsorships"
                                                                    target="_blank">
                                                                    Sponsorships
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">
                                                    <div>
                                                        <h6 class="text-sm">Legal</h6>
                                                        <ul class="flex-column ms-n3 nav">
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    href="https://www.creative-tim.com/knowledge-center/terms-of-service"
                                                                    target="_blank">
                                                                    Terms & Conditions
                                                                </a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    href="https://www.creative-tim.com/knowledge-center/privacy-policy"
                                                                    target="_blank">
                                                                    Privacy Policy
                                                                </a>
                                                            </li>

                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    href="https://www.creative-tim.com/license"
                                                                    target="_blank">
                                                                    Licenses (EULA)
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="text-center">
                                                        <p class="text-dark my-4 text-sm font-weight-normal">
                                                            All rights reserved. Copyright ©
                                                            <script>
                                                                document.write(new Date().getFullYear())
                                                            </script> Material Kit by <a
                                                                href="https://www.creative-tim.com"
                                                                target="_blank">Creative Tim</a>.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </footer>



                                    <!--   Core JS Files   -->
                                    <script src="{{ asset('cms2/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
                                    <script src="{{ asset('cms2/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
                                    <script src="{{ asset('cms2/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>




                                    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
                                    <script src="{{ asset('cms2/assets/js/plugins/countup.min.js') }}"></script>





                                    <script src="{{ asset('cms2/assets/js/plugins/choices.min.js') }}"></script>



                                    <script src="{{ asset('cms2/assets/js/plugins/prism.min.js') }}"></script>
                                    <script src="{{ asset('cms2/assets/js/plugins/highlight.min.js') }}"></script>



                                    <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
                                    <script src="{{ asset('cms2/assets/js/plugins/rellax.min.js') }}"></script>
                                    <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
                                    <script src="{{ asset('cms2/assets/js/plugins/tilt.min.js') }}"></script>
                                    <!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
                                    <script src="{{ asset('cms2/assets/js/plugins/choices.min.js') }}"></script>
















                                    <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
                                    <!--  Google Maps Plugin    -->

                                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
                                    <script src="{{ asset('cms2/assets/js/material-kit.min.js?v=3.1.0') }}" type="text/javascript"></script>


                                    <script type="text/javascript">
                                        if (document.getElementById('state1')) {
                                            const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
                                            if (!countUp.error) {
                                                countUp.start();
                                            } else {
                                                console.error(countUp.error);
                                            }
                                        }
                                        if (document.getElementById('state2')) {
                                            const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
                                            if (!countUp1.error) {
                                                countUp1.start();
                                            } else {
                                                console.error(countUp1.error);
                                            }
                                        }
                                        if (document.getElementById('state3')) {
                                            const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
                                            if (!countUp2.error) {
                                                countUp2.start();
                                            } else {
                                                console.error(countUp2.error);
                                            };
                                        }
                                    </script>
</body>

</html>

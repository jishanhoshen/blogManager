<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">
    <!-- <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css')}}" /> -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/theme.css')}}" />

</head>

<body>

    <header id="header">

        <div id="nav">

            <div id="nav-fixed">
                <div class="container">

                    <div class="nav-logo">
                        <a href="index-2.html" class="logo"><img src="img/xlogo.png.pagespeed.ic.s-UgktC5Y3.png" alt=""></a>
                    </div>


                    <ul class="nav-menu nav navbar-nav">
                        <li><a href="category.html">News</a></li>
                        <li><a href="category.html">Popular</a></li>
                        <li class="cat-1"><a href="category.html">Web Design</a></li>
                        <li class="cat-2"><a href="category.html">JavaScript</a></li>
                        <li class="cat-3"><a href="category.html">Css</a></li>
                        <li class="cat-4"><a href="category.html">Jquery</a></li>
                    </ul>


                    <div class="nav-btns">
                        <button class="aside-btn"><i class="fa fa-bars"></i></button>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                        <div class="search-form">
                            <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                            <button class="search-close"><i class="fa fa-times"></i></button>
                        </div>
                        @guest
                        <a href="{{ route('login') }}">login</a>
                        <a href="{{ route('register') }}">registration</a>
                        @else
                        {{ Str::title(Auth::user()->name) }}
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @endguest
                    </div>

                </div>
            </div>


            <div id="nav-aside">

                <div class="section-row">
                    <ul class="nav-aside-menu">
                        <li><a href="index-2.html">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="#">Join Us</a></li>
                        <li><a href="#">Advertisement</a></li>
                        <li><a href="contact.html">Contacts</a></li>
                    </ul>
                </div>


                <div class="section-row">
                    <h3>Recent Posts</h3>
                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="img/xwidget-2.jpg.pagespeed.ic.183VIkUWUH.jpg" alt=""></a>
                        <div class="post-body">
                            <h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website
                                    Design Mockup Into Code Automatically</a></h3>
                        </div>
                    </div>
                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="img/xwidget-3.jpg.pagespeed.ic.NkT9v3Xk_w.jpg" alt=""></a>
                        <div class="post-body">
                            <h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The
                                    Backend Development Block!</a></h3>
                        </div>
                    </div>
                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="img/xwidget-4.jpg.pagespeed.ic.KoyoxijWdu.jpg" alt=""></a>
                        <div class="post-body">
                            <h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And
                                    Development Tools</a></h3>
                        </div>
                    </div>
                </div>


                <div class="section-row">
                    <h3>Follow us</h3>
                    <ul class="nav-aside-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>


                <button class="nav-aside-close"><i class="fa fa-times"></i></button>

            </div>

        </div>

    </header>


    @yield('content')



    <footer id="footer">

        <div class="container">

            <div class="row">
                <div class="col-md-5">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index-2.html" class="logo"><img src="img/xlogo.png.pagespeed.ic.s-UgktC5Y3.png" alt=""></a>
                        </div>
                        <ul class="footer-nav">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Advertisement</a></li>
                        </ul>
                        <div class="footer-copyright">
                            <span>&copy;
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This
                                template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="../../../external.html?link=https://colorlib.com/" target="_blank">Colorlib</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-widget">
                                <h3 class="footer-title">About Us</h3>
                                <ul class="footer-links">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="#">Join Us</a></li>
                                    <li><a href="contact.html">Contacts</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-widget">
                                <h3 class="footer-title">Catagories</h3>
                                <ul class="footer-links">
                                    <li><a href="category.html">Web Design</a></li>
                                    <li><a href="category.html">JavaScript</a></li>
                                    <li><a href="category.html">Css</a></li>
                                    <li><a href="category.html">Jquery</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget">
                        <h3 class="footer-title">Join our Newsletter</h3>
                        <div class="footer-newsletter">
                            <form>
                                <input class="input" type="email" name="newsletter" placeholder="Enter your email">
                                <button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
                            </form>
                        </div>
                        <ul class="footer-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </footer>


    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/theme.js')}}"></script>

</body>

</html>
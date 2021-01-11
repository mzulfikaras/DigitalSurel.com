				<!-- Header -->
                <header id="header">
                    <div class="inner">

                        <!-- Logo -->
                            <a href="{{route('user.home')}}" class="logo">
                                <span class="fa fa-at"></span> <span class="title">DigitalSurel.com</span>
                            </a>

                        <!-- Nav -->
                            <nav>
                                <ul>
                                    <li><a href="#menu">Menu</a></li>
                                </ul>
                            </nav>

                    </div>
                </header>

            <!-- Menu -->
                <nav id="menu">
                    <h2>Menu</h2>
                    <ul>
                        <li><a href="{{route('user.home')}}" class="active">Home</a></li>

                        <li><a href="{{route('user.product')}}">Products</a></li>

                        <li><a href="checkout.html">Checkout</a></li>

                        <li>
                            <a href="#" class="dropdown-toggle">About</a>

                            <ul>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="testimonials.html">Testimonials</a></li>
                                <li><a href="terms.html">Terms</a></li>
                            </ul>
                        </li>

                        <li><a href="{{route('user.contact')}}">Contact Us</a></li>
                    </ul>
                </nav>

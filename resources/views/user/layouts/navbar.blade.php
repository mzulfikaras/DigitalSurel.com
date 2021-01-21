<!-- Header -->
<style>
#lblCartCount {
    font-size: 12px;
    background: #ff0000;
    color: #fff;
    padding: 0 5px;
    vertical-align: top;
    margin-left: -10px;
}
.badge {
  padding-left: 9px;
  padding-right: 9px;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}

.label-warning[href],
.badge-warning[href] {
  background-color: #c67605;
}
</style>
<header id="header">
    <div class="inner">

        <!-- Logo -->
        <a href="{{route('user.home')}}" class="logo">
            <span class="fa fa-at"></span> <span class="title">DigitalSurel.com</span>
        </a>

        <!-- Nav -->
        <nav>
            <ul>
                @auth
                    <a href="{{route('user.cart')}}">
                        <li>
                            @yield('cart-icon')
                        </li>
                    </a>
                @endauth
                @if (Route::is('password.email') || Route::is('password.request') || Route::is('password.reset') || Route::is('password.confirm') || Route::is('password.update'))
                @else
                    <li><a href="#menu">Menu</a></li>
                @endif
            </ul>
        </nav>

    </div>
</header>

 <!-- Menu -->
<nav id="menu">
    <h2>Menu</h2>
    <ul>
        @if (Route::has('login'))
            @auth
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Logout</button>
                </form>
            </li>
                @else
                    @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>
            @endauth
        @endif
        <li><a href="{{route('user.home')}}" class="active">Home</a></li>

        <li><a href="{{route('user.product')}}">Products</a></li>


        <li><a href="{{route('user.invoice')}}">Invoice</a></li>

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

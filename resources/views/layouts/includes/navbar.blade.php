<nav class="navbar navbar-expand-sm text-white navbar-white py-3 bg-dark border-bottom" id="nav-top">
    <div class="container">
        <a href="{{route('shop.home')}}" class="logo-img"></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav-collapse">
            <div class="col-md-4">
                <div class="headings">
                    <h3><a href="{{route('shop.home')}}" class="text-secondary"><b class="text-danger">Get</b>Fast</a></h3>
                </div>
            </div>
            <div class="col-md-4">
                <form action="{{route('all')}}">
                    <div class="input-group input-group-sm m-1">
                        <input type="text" name="term" value="{{request('term')}}" class="form-control" placeholder="Search ...">
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <ul class="navbar-nav ml-auto">
                @if(Auth::check() == false)
                    <li class="nav-item px-2">
                        <a href="{{url('login')}}" class="nav-link text-danger"><i class="fas fa-user-lock"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('register')}}" class="nav-link"><i class="fas fa-user"></i> Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active text-light" href="#" data-toggle="dropdown">
                            <span class="image-circle"><img src="{{Auth::user()->image? Auth::user()->image_url:Auth::user()->default_img}}" width="30" alt=""></span>
                            {{Auth::user()->name}}
                        @if(Cart::content()->count())
                            <span class="badge bg-light text-danger">{{Cart::content()->count()}}</span>
                        @endif
                        </a>
                        <div class="dropdown-menu">
                            @if(Auth::user()->role->name == "Admin")
                                <a class="dropdown-item" href="{{route('admin.home')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-muted"></i>
                                    Admin Page
                                </a>
                            @elseif(Auth::user()->role->name == "User")
                                <a class="dropdown-item" href="{{route('user.home')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-muted"></i>
                                    Profile
                                </a>
                            @else
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-muted"></i>
                                    Profile
                                </a>
                            @endif
                            <a class="dropdown-item" href="{{route('cart')}}"><i class="fas fa-shopping-cart fa-sm fa-fw mr-2 text-muted"></i>
                                Troli
                                @if(Cart::content()->count())
                                            <span class="badge bg-secondary text-light">{{Cart::content()->count()}}</span>
                                @endif
                            </a>
                            <a class="dropdown-item" href="{{url('logout')}}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-muted"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

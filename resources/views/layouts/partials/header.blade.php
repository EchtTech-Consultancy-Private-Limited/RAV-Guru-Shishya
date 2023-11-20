<nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-bs-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="#" onClick="return false;" class="bars"></a>
                <a class="navbar-brand"  >
                    <!-- <img src="{{ asset('assets/images/rav-logo.png') }}" alt="" /> -->
                   <!-- @if(Auth::user()->user_type==1)
                    <p class="logo-name" style="font-size:18px;"> Guru Shishya Admin </p>
                    @elseif(Auth::user()->user_type==2)
                    <p class="logo-name" style="font-size:18px;"> Guru </p>
                    @elseif(Auth::user()->user_type==3)
                    <p class="logo-name" style="font-size:18px;"> Shishya </p>
                    @endif -->
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="pull-left">
                    <li>
                        <a href="#" onClick="return false;" class="sidemenu-collapse">
                            <i data-feather="menu"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Full Screen Button -->
                     <li class="fullscreen">
                        <a href="javascript:;" class="fullscreen-btn">
                            <i class="fas fa-expand"></i>
                        </a>
                    </li> 
                   
                     <!-- <li class="dropdown user_profile" style="padding-right:15px;">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{asset('uploads/1681384030user.png')}}" alt="user" width="25px;">
                        </div>
                        <ul class="dropdown-menu pullDown">
                            <li class="body">
                                <ul class="user_dw_menu">
                                    <li>
                                        <a href="{{ url('logout') }}">
                                            <i class="material-icons"></i>Logout
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </li> -->
                    <!-- #END# Tasks -->
                    
                    <li class="dropdown user_profile" style="padding-right:15px;">
                        <div class="dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{asset('uploads/'.Auth::user()->user_image)}}" alt="user" width="25px;">
                        </div>
                        <ul class="dropdown-menu pullDown">
                            <li class="body">
                                <ul class="user_dw_menu">
                                    <li>
                                        <a href="{{ url('profile') }}">
                                            <i class="material-icons">person</i>Profile
                                        </a>
                                    </li>
                                    
                                    <!-- <li>
                                        <a href="#" onClick="return false;">
                                            <i class="material-icons">help</i>Help
                                        </a>
                                    </li> -->
                                    <li>
                                        <a href="{{ url('logout') }}">
                                            <i class="material-icons">power_settings_new</i>Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
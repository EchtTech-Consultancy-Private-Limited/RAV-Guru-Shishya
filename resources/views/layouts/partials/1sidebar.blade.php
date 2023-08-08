
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
              
            <!-- Menu -->
            <div class="menu">
            <div class="logo-brand">
                    <img src="{{ asset('assets/images/rav-logo.png') }}" alt="" />
                    <p class="logo-name">RAV Guru Shishya </p>
                </div>
                <ul class="list">
                    <li class="sidebar-user-panel active">
                        <div class="user-panel">
                           <div class=" image">
                                <img src="{{ asset('assets/images/usrbig.jpg') }}" class="user-img-style" alt="User Image" />
                                <p class="text-center h4" style="color:#000;padding:5px;">{{ Auth::user()->firstname }}</p>
                                <!--<p class="text-center h4" style="color:#000;padding:5px;">Admin Login</p>-->
                            </div>
                        </div>
                        <div class="profile-usertitle">
                            <!-- <div class="sidebar-userpic-name"> {{ Auth::user()->firstname }}</div> -->
                            
                        </div>
                    </li>
                    
                    <li class="{{ Request::is('dashboard')?'active':''; }}" > 
                        <a href="{{url('/dashboard')}}" >
                            <i data-feather="check-circle"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ (Request::is('users') || Request::is('shishya-list') || Request::is('rav-admin'))?'active':''; }}">
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="monitor"></i>
                            <span>Manage Users</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('users')?'active':''; }}">
                                <a href="{{ route('users.index') }}">Guru</a>
                            </li>
                            <li  class="{{ Request::is('shishya-list')?'active':''; }}">
                                <a href="{{ url('shishya-list') }}">Shishya</a>
                            </li>
                            <li  class="{{ Request::is('rav-admin')?'active':''; }}">
                                <a href="{{ url('rav-admin') }}">RAV Admin</a>
                            </li>

                        </ul>
                    </li>
                   
                    <li >
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="monitor"></i>
                            <span>Drug Details</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="active">
                                <li><a href="#">Add Drug Details</a></li>
                            </li>
                            <li>
                                <a href="#">List of Drug Details</a>
                            </li>
                            
                        </ul>
                    </li>
                     <li >
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="monitor"></i>
                            <span>Paitient Details</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="active">
                                <li><a href="#">In Patients (Admited Patients)</a></li>
                            </li>
                            <li>
                                <a href="#">Out Patients (O.P.D Patients)</a>
                            </li>
                            <li>
                                <a href="#">Follow Up Patients</a>
                            </li>
                            
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="{{url('logout')}}">
                            <i data-feather="message-circle"></i>
                            <span>Logout</span>
                        </a>
                    </li> -->
                   
                   <!-- @foreach(main_menu() as  $item)
                             @if(count(main_child($item->id)) > 0 )
                    <li>
                        <a href="{{$item->url}}" onClick="return false;" class="menu-toggle">
                            <i data-feather="anchor"></i>
                            <span>{{$item->name}}</span>
                        </a>
                        <ul class="ml-menu">
                            @foreach(main_child($item->id) as  $items)
                            <li>
                                <a target="_blank" href="{{$items->url}}">{{$items->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @else
                    <li>
                        <a href="{{$item->url}}">
                            <i data-feather="check-circle"></i>
                            <span>{{ $item->name }}</span>
                        </a>
                    </li>
                     @endif

                @endforeach -->
                <!-- <li>
                        <a href="{{ url('/add-menu') }}">
                            <i data-feather="message-circle"></i>
                            <span>Add Menu</span>
                        </a>
                    </li> -->
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->

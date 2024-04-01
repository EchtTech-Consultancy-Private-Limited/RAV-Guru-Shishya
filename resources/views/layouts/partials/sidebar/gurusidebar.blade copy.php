
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
        <div class="logo-brand">
                    <img src="{{ asset('assets/images/rav-logo.png') }}" alt="" />
                    <p class="logo-name">RAV Guru Shishya </p>
                </div>
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="sidebar-user-panel active">
                        <div class="user-panel">
                            <div class=" image">
                                <img src="{{ asset('assets/images/usrbig.jpg') }}" class="user-img-style" alt="User Image" />
                                <p class="text-center h5" style="color:#000;padding:10px;">{{ Auth::user()->firstname }} </p>
                            </div>
                        </div>
                        <div class="profile-usertitle">
                           <!--  <div class="sidebar-userpic-name"> {{ Auth::user()->user_type }} </div> -->
                            
                        </div>
                    </li>
                    
                    <li class="{{ Request::is('dashboard')?'active':''; }}">
                        <a href="{{url('/dashboard')}}">
                            <i data-feather="check-circle"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/profile')}}" >
                            <i data-feather="check-circle"></i>
                            <span>Manage Profile</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('shishya-list')?'active':''; }}">
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="monitor"></i>
                            <span>Manage Shishya</span>
                        </a>
                        <ul class="ml-menu">
                           
                            <li class="{{ Request::is('shishya-list')?'active':''; }}">
                                <a href="{{ url('shishya-list') }}">Shishya</a>
                            </li>
                            
                            
                        </ul>
                    </li>

                    <li onclick="unclick();">
                        <a href="{{url('/profile')}}" class="disabled" >
                            <i data-feather="check-circle"></i>
                            <span>Notification</span>
                        </a>
                    </li>
                    <li onclick="unclick();">
                        <a href="{{url('/profile')}}" class="disabled">
                            <i data-feather="check-circle"></i>
                            <span>History Sheet</span>
                        </a>
                    </li>
                    <li onclick="unclick();">
                        <a href="{{url('/profile')}}"class="disabled">
                            <i data-feather="check-circle"></i>
                            <span>Daily History Sheet</span>
                        </a>
                    </li>

                     
                   
                    <!-- <li class="disabled">
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
                     <li class="disabled">
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="monitor"></i>
                            <span>Paitient Details</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="active">
                                <li><a href="#">In Patients (Admitted Patients)</a></li>
                            </li>
                            <li>
                                <a href="#">Out Patients (O.P.D Patients)</a>
                            </li>
                            <li>
                                <a href="#">Follow Up Patients</a>
                            </li>
                            
                        </ul>
                    </li> -->
                    <!-- <li >
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="monitor"></i>
                            <span>Manage Users</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="active">
                                <li><a href="{{ route('users.index') }}">Guru</a></li>
                            </li>
                            <li>
                                <a href="{{ url('shishya-list') }}">Shishya</a>
                            </li>
                            <li class="active">
                                <li><a href="{{ url('rav-admin') }}">RAV Admin</a></li>
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
                            <span>Paitient Ded</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="active">
                                <li><a href="#">In Patients (Admitted Patients)</a></li>
                            </li>
                            <li>
                                <a href="#">Out Patients (O.P.D Patients)</a>
                            </li>
                            <li>
                                <a href="#">Follow Up Patients</a>
                            </li>
                            
                        </ul>
                    </li> -->
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
<script>
    function unclick()
    {
        alert("Not Accessable");
    }
</script>
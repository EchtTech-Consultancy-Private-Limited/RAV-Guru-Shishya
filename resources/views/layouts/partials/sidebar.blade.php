
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
              
            <!-- Menu -->
            <div class="menu">
            <div class="logo-brand">

                   <img src="{{ asset('assets/images/rav-logo.png') }}" alt="" />

                    <!-- <img src="{{ asset('assets/images/rav-logo.png') }}" alt="" /> -->

                    <p class="logo-name">RAV Guru Shishya </p>
                </div>
                <ul class="list">
                    <li class="sidebar-user-panel active">
                        <div class="user-panel">
                           <div class=" image">
                                <img src="{{ asset('assets/images/usrbig.jpg') }}" class="user-img-style" alt="User Image" />
                            </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name">
                             @if(Auth::user()->user_type==1)
                             {{ Auth::user()->firstname }}
                             <br> ( Admin )</div>
                             @elseif(Auth::user()->user_type==4)
                             {{ Auth::user()->firstname }}<br>
                             ( Super Admin )
                             @elseif(Auth::user()->user_type==2)
                             {{ Auth::user()->firstname }}<br>
                             ( Guru - {{ Auth::user()->gurutype }} )

                             @elseif(Auth::user()->user_type==3)
                              {{ Auth::user()->firstname }}<br>
                             ( Shishya - {{ Auth::user()->shishyatype }} )

                             @endif


                            
                        </div>
                    </li>
                    
                 <!--    <li class="{{ Request::is('dashboard')?'active':''; }}" > 
                        <a href="{{url('/dashboard')}}" >
                            <i data-feather="check-circle"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin-patient-list')?'active':''; }}">
                        <a href="{{url('/admin-patient-list')}}" id="notify_phr_admin">
                            <i data-feather="check-circle"></i>
                            <span>Notification</span>
                        </a>
                    </li>

                    <li class="{{ (Request::is('users') || Request::is('users') || Request::is('users/*') || Request::is('shishya-list') || Request::is('rav-admin') || Request::is('attendance-list'))?'active':''; }}">
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="monitor"></i>
                            <span>Manage Users</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{{ (Request::is('users.index') || Request::is('users') || Request::is('users/*'))?'active':''; }}">
                                <a href="{{ route('users.index') }}">Guru</a>
                            </li>
                            <li  class="{{ Request::is('shishya-list')?'active':''; }}">
                                <a href="{{ url('shishya-list') }}">Shishya</a>
                            </li>
                            
                            <li  class="{{ Request::is('rav-admin')?'active':''; }}">
                                <a href="{{ url('rav-admin') }}">RAV Admin</a>
                            </li>

                            <li  class="{{ Request::is('attendance-list')?'active':''; }}">
                                <a href="{{ url('attendance-list') }}">Attendances</a>
                            </li>

                        </ul>
                    </li>
                   
                    <li class="{{ (Request::is('admin-drug-report-history') || Request::is('follow-up-sheet'))?'active':''; }}">
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="monitor"></i>
                            <span>Drug Details</span>
                        </a>
                        <ul class="ml-menu">
                            

                            <li class="{{ Request::is('admin-drug-report-history')?'active':''; }}">
                                <a href="{{url('/admin-drug-report-history')}}">List of Drug Details</a>
                            </li>
                            
                        </ul>
                    </li>
                     <li class="{{ (Request::is('patients/In-Patient') || Request::is('patients/*') || Request::is('patients/OPD-Patient'))?'active':''; }}">
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="monitor"></i>
                            <span>Patient Details</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('patients/In-Patient')?'active':''; }}">
                                <a href="{{url('/patients/In-Patient')}}">In Patients (Admited Patients)</a>
                            </li>
                            <li class="{{ Request::is('patients/OPD-Patient')?'active':''; }}">
                                <a href="{{url('/patients/OPD-Patient')}}">Out Patients (O.P.D Patients)</a>
                            </li>
                            <li>
                                <a href="{{url('/follow-up-patients')}}">Follow Up Patients</a>
                            </li>
                            
                        </ul>
                    </li>

                    
                     <li class="{{ (Request::is('admin-models') || (Request::is('model-routes') || Request::is('admin-routes')))?'active':''; }}">
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="monitor"></i>
                            <span>Masters</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('admin-models')?'active':''; }}">
                                <a href="{{url('admin-models')}}" >
                                    <i data-feather="check-circle"></i>
                                    <span> Modules </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin-routes')?'active':''; }}">
                                <a href="{{url('admin-routes')}}" >
                                    <i data-feather="check-circle"></i>
                                    <span> Routes </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('model-routes')?'active':''; }}">
                                <a href="{{url('model-routes')}}" >
                                    <i data-feather="check-circle"></i>
                                    <span> Module Routes </span>
                                </a>
                            </li>
                           
                            
                            
                        </ul>
                    </li> -->
                    <!-- <li>
                        <a href="{{url('logout')}}">
                            <i data-feather="message-circle"></i>
                            <span>Logout</span>
                        </a>
                    </li> -->
                     
                  
                    @foreach(main_menu() as  $item)
                        @if(count(main_child($item->id)) > 0 )

                            @php $is_route=false; @endphp
                            @foreach(main_child($item->id) as  $key=>$items)
                               @if(Request::is($items->route)) @php $is_route=true;  @endphp @break; @endif 
                            @endforeach
                            @php $is_pharmacy=false; @endphp
                            @foreach(main_child($item->id) as  $key=>$items)
                               @if($items->route=='add-drug-report' || $items->route=='drug-report-history') @php $is_pharmacy=true;  @endphp @break; @endif 
                            @endforeach
                            @if(($item->user_type==0 && (Auth::user()->user_type!=3 || $is_pharmacy==false)) || ((Auth::user()->user_type==$item->user_type) && $is_pharmacy==false) || (Auth::user()->user_type==3 && Auth::user()->shishyatype=='Pharmacy' && $is_pharmacy==true))
                            <li class="{{ ($is_route)?'active':''; }}">

                                @if(Auth::user()->user_type==$item->user_type || $item->user_type==0)

                                <a   class="menu-toggle">
                                    <i data-feather="monitor"></i> 
                                    <span>{{$item->name}} </span>
                                </a>
                                @endif
                                <ul class="ml-menu">
                                    @foreach(main_child($item->id) as  $items)
                                    <li class="{{ Request::is($items->route)?'active':''; }}">
                                        @if(Auth::user()->user_type==$items->user_type || $items->user_type==0)
                                        <a  href="{{ url('/').'/'.$items->route}}">{{$items->name}}</a>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                        @else
                            <li class="{{ Request::is($item->route)?'active':''; }}" >
                                @if(Auth::user()->user_type==$item->user_type || $item->user_type==0)
                                <a href="{{ url('/').'/'.$item->route}}">
                                    <i data-feather="check-circle"></i>
                                    <span>{{ $item->name }} </span>
                                </a>
                                @endif
                            </li>
                              @endif
                    @endforeach 
                <!-- <li>
                        <a href="{{ url('/add-menu') }}">
                            <i data-feather="message-circle"></i>
                            <span>Add Menu</span>
                        </a>
                    </li> -->
                    <!-- <li>
                        <a href="{{ route('system-configration') }}">
                            <i data-feather="message-circle"></i>
                            <span>System Configratution</span>
                        </a>
                    </li>  -->

                    <!-- <li class="{{ (Request::is('admin-models') || (Request::is('model-routes') || Request::is('admin-routes')))?'active':''; }}">
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="monitor"></i>
                            <span>Masters</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{{ Request::is('admin-models')?'active':''; }}">
                                <a href="{{url('admin-models')}}" >
                                    <i data-feather="check-circle"></i>
                                    <span> Modules </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('admin-routes')?'active':''; }}">
                                <a href="{{url('admin-routes')}}" >
                                    <i data-feather="check-circle"></i>
                                    <span> Routes </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('model-routes')?'active':''; }}">
                                <a href="{{url('model-routes')}}" >
                                    <i data-feather="check-circle"></i>
                                    <span> Module Routes </span>
                                </a>
                            </li>
                           
                            
                            
                        </ul>
                    </li> -->
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->

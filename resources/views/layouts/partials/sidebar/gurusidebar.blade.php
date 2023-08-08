
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
                              
                            </div>
                        </div>
                        <div class="profile-usertitle">
                           <div class="sidebar-userpic-name"> 
                                {{ Auth::user()->firstname }}<br>
                                ( @if(Auth::user()->user_type==2)Guru {{ Auth::user()->gurutype }}
                                  @endif )
                           </div>
                            
                        </div>
                    </li>
                    

                    <!-- <li class="{{ Request::is('dashboard')?'active':''; }}">
                        <a href="{{url('/dashboard')}}">
                            <i data-feather="check-circle"></i>
                            <span>Dashboard</span>
                        </a>
                    </li> -->
                    
                    <!-- <li class="{{ Request::is('guru-patient-list')?'active':''; }}">
                        <a href="{{url('/guru-patient-list')}}" >
                            <i data-feather="check-circle"></i>
                            <span>Notification</span>
                        </a>
                    </li>


                    <li class="{{ Request::is('profile')?'active':''; }}">
                        <a href="{{url('/profile')}}" >
                            <i data-feather="check-circle"></i>
                            <span>Manage Profile</span>
                        </a>
                    </li>

                   <li class="{{ (Request::is('shishya-list') || Request::is('attendance-list') || Request::is('add-attendance'))?'active':''; }}">
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="monitor"></i>
                            <span>Manage Shishya</span>
                        </a>
                        <ul class="ml-menu">
                           
                            <li class="{{ Request::is('shishya-list')?'active':''; }}">
                                <a href="{{ url('shishya-list') }}">Shishya List</a>
                            </li>

                            <li class="{{ (Request::is('attendance-list')|| Request::is('add-attendance'))?'active':''; }}">
                                <a href="{{ url('attendance-list') }}">Attendances</a>
                            </li>
                            
                            
                        </ul>
                    </li>
                    
                    <li class="{{ (Request::is('phr-history-sheet') || Request::is('new-patient-registration') || Request::is('follow-up-patients') || Request::is('add-history-sheet') || Request::is('add-follow-up-sheet') || Request::is('follow-up-sheet'))?'active':''; }}">
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="monitor"></i>
                            <span>Manage Patients</span>
                        </a>
                        <ul class="ml-menu">
                            
                            <li class="{{ (Request::is('phr-history-sheet'))?'active':''; }}">
                               <a href="{{url('/phr-history-sheet')}}">New Patients (PHR)</a>
                            </li>
                            

                            <li class="{{ ( Request::is('follow-up-patients') || Request::is('follow-up-sheet') || Request::is('add-follow-up-sheet/*') || Request::is('view-follow-up-sheet/*'))?'active':''; }}">
                                <a href="{{url('/follow-up-patients')}}">Follow up Patients</a>
                            </li>
                            
                        </ul>
                    </li>
                   
                   
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i data-feather="monitor"></i>
                            <span>Drug Details</span>
                        </a>
                        <ul class="ml-menu">
                            
                            <li>
                                <a href="#">List of Drug Details</a>
                            </li>
                            
                        </ul>
                    </li> -->

                   @foreach(main_menu() as  $item)
                        @if(count(main_child($item->id)) > 0 )
                    <li>
                        @if(Auth::user()->user_type==$item->user_type || $item->user_type==0 )
                        <a href="{{$item->route}}" onClick="return false;" class="menu-toggle">
                            <i data-feather="anchor"></i>
                            <span>{{$item->name}} </span>
                        </a>
                        @endif
                        <ul class="ml-menu">
                            @foreach(main_child($item->id) as  $items)
                            <li>
                                <a target="_blank" href="{{ url('/').$items->route}}">{{$items->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @else
                    <li>
                        @if(Auth::user()->user_type==$item->user_type || $item->user_type==0)
                        <a href="{{ url('/').$item->route}}">
                            <i data-feather="check-circle"></i>
                            <span>{{ $item->name }}</span>
                        </a>
                       @endif
                    </li>
                     @endif

                @endforeach 
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
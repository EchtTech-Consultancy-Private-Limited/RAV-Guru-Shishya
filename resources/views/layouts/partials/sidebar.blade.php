<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- Menu -->
    <div class="menu">
        <div class="logo-brand">
            <img src="{{ asset('assets/images/rav-logo.png') }}" alt="" />
        </div>
        <ul class="list sidebar-manu slimScrollBar">
            <li class="sidebar-user-panel active">
                <div class="user-panel">
                    <div class=" image">
                        <img src="{{ asset('assets/images/usrbig.jpg') }}" class="user-img-style" alt="User Image" />
                    </div>
                </div>
                <div class="profile-usertitle">
                    <div class="sidebar-userpic-name">
                        @if (Auth::user()->user_type == 1)
                            {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                            <br><span class="designation"> ( Admin )</span>
                    </div>
                @elseif(Auth::user()->user_type == 4)
                    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}<br>
                    <span class="designation">( Super Admin )</span>
                @elseif(Auth::user()->user_type == 2)
                    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}<br>
                    <span class="designation"> ( Guru - {{ Auth::user()->gurutype }} )</span>
                @elseif(Auth::user()->user_type == 3)
                    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}<br>
                    <span class="designation"> ( Shishya - {{ Auth::user()->shishyatype }} )</span>
                    @endif
                </div>
            </li>
            @foreach (main_menu() as $item)
                @if (count(main_child($item->id)) > 0)
                    @php $is_route=false; @endphp
                    @foreach (main_child($item->id) as $key => $items)
                        @if (Request::is($items->route))
                        @php $is_route=true;  @endphp @break;
                        @endif
                    @endforeach
                    @php $is_pharmacy=false; @endphp
                    @foreach (main_child($item->id) as $key => $items)
                        @if ($items->route == 'add-drug-report' || $items->route == 'drug-report-history')
                        @php $is_pharmacy=true;  @endphp @break;
                        @endif
                    @endforeach
                    @if (
                        ($item->user_type == 0 && (Auth::user()->user_type != 3 || $is_pharmacy == false)) ||
                            (Auth::user()->user_type == $item->user_type && $is_pharmacy == false) ||
                            (Auth::user()->user_type == 3 && Auth::user()->shishyatype == 'Pharmacy' && $is_pharmacy == true))
                        <li class="{{ $is_route ? 'active' : '' }}">
                            @if(in_array(check_permission($item->id), [1, 2, 3]))
                                @if (Auth::user()->user_type == $item->user_type || $item->user_type == 0)
                                    <a class="menu-toggle">
                                        <i data-feather="monitor"></i>
                                        <span>{{ $item->name }} </span>
                                    </a>
                                @endif
                                <ul class="ml-menu">
                                    @foreach (main_child($item->id) as $items)
                                        <li class="{{ Request::is($items->route) ? 'active' : '' }}">
                                            @if (Auth::user()->user_type == $items->user_type || $items->user_type == 0)
                                                <a href="{{ url('/') . '/' . $items->route }}">{{ $items->name }}</a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            @if(Auth::user()->user_type == 4)
                                @if (Auth::user()->user_type == $item->user_type || $item->user_type == 0)
                                    <a class="menu-toggle">
                                        <i data-feather="monitor"></i>
                                        <span>{{ $item->name }} </span>
                                    </a>
                                @endif
                                <ul class="ml-menu">
                                    @foreach (main_child($item->id) as $items)
                                        <li class="{{ Request::is($items->route) ? 'active' : '' }}">
                                            @if (Auth::user()->user_type == $items->user_type || $items->user_type == 0)
                                                <a href="{{ url('/') . '/' . $items->route }}">{{ $items->name }}</a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
                @else
                    @if(in_array(check_permission($item->id), [1, 2, 3]))
                        <li class="{{ Request::is($item->route) ? 'active' : '' }}">
                            @if (Auth::user()->user_type == $item->user_type || $item->user_type == 0)
                                <a href="{{ url('/') . '/' . $item->route }}">
                                    <i data-feather="check-circle"></i>
                                    <span>{{ $item->name }} </span>
                                </a>
                            @endif
                        </li>
                    @endif
                    @if(Auth::user()->user_type == 4)
                    <li class="{{ Request::is($item->route) ? 'active' : '' }}">
                        @if (Auth::user()->user_type == $item->user_type || $item->user_type == 0)
                            <a href="{{ url('/') . '/' . $item->route }}">
                                <i data-feather="check-circle"></i>
                                <span>{{ $item->name }} </span>
                            </a>
                        @endif
                    </li>
                    @endif
                @endif
            @endforeach
            
                <!--  Guru -->
                @if(Auth::user()->user_type == 2)
                    <li class="{{ Request::is('guru-view-phr-report') ? 'active' : '' }}">
                        <a href="{{url('guru-view-phr-report')}}">
                            <i data-feather="check-circle"></i>
                            <span>PHR Reporting</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('phr-notification-list-guru') ? 'active' : '' }}">
                        <a href="{{url('phr-notification-list-guru')}}">
                            <i data-feather="check-circle"></i>
                            <span>PHR Notification</span>
                        </a>
                    </li>
                @endif
                
                 <!--  Admin -->
                @if(Auth::user()->user_type == 1)
                    <li class="{{ Request::is('guru-view-phr-report') ? 'active' : '' }}">
                        <a href="{{url('guru-view-phr-report')}}">
                            <i data-feather="check-circle"></i>
                            <span>PHR Reporting</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('phr-notification-list-guru') ? 'active' : '' }}">
                        <a href="{{url('phr-notification-list-guru')}}">
                            <i data-feather="check-circle"></i>
                            <span>PHR Notification</span>
                        </a>
                    </li>
                @endif 
                
                <!--  Shishya -->
                @if(Auth::user()->user_type == 3)
                
                    <li class="{{ Request::is('phr-report') ? 'active' : '' }}">
                        <a href="{{url('phr-report')}}">
                            <i data-feather="check-circle"></i>
                            <span>PHR Reporting</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('phr-notification-list') ? 'active' : '' }}">
                        <a href="{{url('phr-notification-list')}}">
                            <i data-feather="check-circle"></i>
                            <span>PHR Notification</span>
                        </a>
                    </li>
                @endif
        </ul>
    </div>
<!-- #Menu -->
</aside>
<!-- #END# Left Sidebar -->

<script>
    (function($) {
        $(window).on("load", function() {
            $(".slimScrollDiv").mCustomScrollbar();
        });
    })(jQuery);
</script>

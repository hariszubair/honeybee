 <!-- MENU SIDEBAR-->
        <!-- <aside class="menu-sidebar d-none d-lg-block"> -->
            <!-- <div class="logo"> -->
               <!-- <a href="#">
                    <img src="{{ asset('public/images/honey_bee.jpeg') }}" alt="Honey Bee" />
                </a>
                -->
            <!-- </div> -->
            <div class="menu-sidebar__content js-scrollbar1" style='display:none'>
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                     
                    @if(Auth::user()->hasRole(['Client', 'Candidate']))
                        <li class="active ">
                            <a style="color: #238DB7 !important;font-size: 15px;" href="{{ URL('/profile') }}">
                                <i style="color: #238DB7 !important" class="fas fa-table"></i>Profile</a>
                        </li>
                        @endif
                    @if(Auth::user()->hasRole(['Client']))
                         <li >
                            <a style="color: #238DB7 !important;font-size: 15px;" href="{{ URL('/candidate_search_view') }}">
                                <i style="color: #238DB7 !important " class="fas fa-users"></i>Candidate Search</a>
                        </li>
                        <li >
                            <a style="color: #238DB7 !important;font-size: 15px;" href="{{ URL('/selected_candidates') }}">
                                <i style="color: #238DB7 !important;" class="fas fa-user"></i>Short Listed <b><span style="float: right;padding-right: 20px;color: red" id='count_selected_candidates'>{{Auth::user()->selected_candidates->count()}}</span></b></a>
                        </li>
                        @endif
                       
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
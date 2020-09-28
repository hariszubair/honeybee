 <!-- PAGE CONTAINER-->
 @php
  $current_user=Auth::user();
 @endphp
      <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop" style="background-color: #f5f5f5">
                <div style="padding-left:5%;padding-right: 5% ">
                    <a href="#" >
                    <img style="width: 200px;height: 50px" src="{{ asset('public/images/honey_bee.jpeg') }}" alt="Honey Bee" />
                </a> 
                </div>
               
                
                <div class="section__content section__content--p30">

                    <div class="container-fluid">
                
                
                        <div class="header-wrap">
                            
                            <div class="header-button">
                               <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 1px solid #238db7;background-color: #f5f5f5;color:#272f66">
   {{$current_user->name}}
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"  style="position: absolute;z-index: 2">
    <a class="dropdown-item" href="{{ URL('/change_password') }}">Change Password</a>
    <a  class="dropdown-item" href="{{ URL('/logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                                     <i class="zmdi zmdi-power"></i> {{ __('Logout') }}
                             </a>
    
  </div>
</div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group list-group-horizontal" id="list-tab" role="tablist" style="width: 50%;padding-left: 5%;padding-right: 5%;font-size: 14px;ba" >
     @if($current_user->hasRole(['Client', 'Candidate']))
     <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" role="tab" aria-controls="profile" style="color: #238DB7 !important;width: auto !important ; padding-right: 0;padding-left: 0;margin-right: 20px" href="profile">
                               Profile
                           </a>
    @endif
                    @if($current_user->hasRole(['Client']) && $current_user->userinfo)
                    @if($current_user->userinfo->proceed == 0)
                    <a class="list-group-item list-group-item-action" id="list-candidate_search_view-list" data-toggle="list" role="tab" aria-controls="candidate_search_view"  href="candidate_search_view" style="color: #238DB7 !important;width: auto !important;padding-right: 0;padding-left: 0;margin-right: 20px">
                                Candidate Search</a>
                    @else
                            <a class="list-group-item list-group-item-action" id="list-selected_candidates-list" data-toggle="list" role="tab" aria-controls="selected_candidates"  href="selected_candidates" style="color: #238DB7 !important;width: auto !important;padding-right: 0;padding-left: 0;margin-right: 20px">
                               Short Listed</a>
                               @endif
                    @endif
      
    </div>
                </div>
                
            
            </header>
            <!-- HEADER DESKTOP-->


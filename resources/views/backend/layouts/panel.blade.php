<!-- <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ route('dashboard.index') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                </li>

                <li>
                    <a href="{{ route('dashboard.disbursement.index') }}"><i class="menu-icon fa fa-money"></i>Disbursement</a>
                </li>

                <li>
                    <a href="{{ route('dashboard.partner.order.index') }}"><i class="menu-icon fa fa-money"></i>Order</a>
                </li>

                <li>
                    <a href="{{ route('dashboard.partner.feeByPartner.index') }}"><i class="menu-icon fa fa-cog"></i>Fee Management</a>
                </li>

                @can('isAdmin', Auth::user())
                <li>
                    <a href="{{ route('dashboard.user.admin.userlist') }}"><i class="menu-icon fa fa-users"></i>User List </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.user.admin.money-collection.index') }}"><i class="menu-icon fa fa-users"></i>Money Collection </a>
                </li>
                @endcan
            </ul>
        </div>
    </nav>
</aside> -->


 <!-- .app-aside -->
 <aside id="left-panel" class="app-aside app-aside-expand-md app-aside-light left-panel">
        <!-- .aside-content -->
        <div class="aside-content">
          <!-- .aside-header -->
          <header class="aside-header d-block d-md-none">
            <!-- .btn-account -->
            <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="user-avatar user-avatar-md"><img src="{{asset('assets')}}/images/avatars/profile.jpg" alt=""></span> <span class="account-summary pr-lg-4 d-none d-lg-block"><span class="account-name">{{Auth::user()->name}}</span></span></button> <!-- .dropdown-menu -->
            <!-- .dropdown-aside -->
           
            <div id="dropdown-aside" class="dropdown-aside collapse">
              <!-- dropdown-items -->
              <div class="pb-3">
                <a class="dropdown-item" href="{{ route('dashboard.user.show') }}"><span class="dropdown-icon oi oi-person"></span> Profile</a> 
                @can('isAdmin', Auth::user())
                    <a class="dropdown-item" href="{{ route('dashboard.admin.setting.index') }}"><span class="dropdown-icon fa fa-cog"></span> App Settings</a> 
                @endcan

                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="dropdown-icon oi oi-account-logout"></span> {{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div><!-- /dropdown-items -->
            </div><!-- /.dropdown-aside -->
          </header><!-- /.aside-header -->
          <!-- .aside-menu -->
            <div id="aside-menu" class="aside-menu overflow-hidden">
            <!-- .stacked-menu -->
            <nav id="stacked-menu" class="stacked-menu">
              <!-- .menu -->
                <ul class="menu">
                    <!-- .menu-item -->
                    <li class="menu-item">
                    <a href="{{ route('dashboard.index') }}" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
                    </li><!-- /.menu-item -->
                    
                    <!-- .menu-item -->
                    <li class="menu-item">
                    <a href="{{ route('dashboard.disbursement.index') }}" class="menu-link"><span class="menu-icon fas fa-money-bill"></span> <span class="menu-text">Disbursement</span></a> <!-- child menu -->
                    
                    </li><!-- /.menu-item -->

                    <!-- .menu-item -->
                    <li class="menu-item">
                        <a href="{{ route('dashboard.partner.feeByPartner.index') }}" class="menu-link"><span class="menu-icon fas fa-cog"></span> <span class="menu-text">Fee Management</span> </a> <!-- child menu -->
                    
                    </li><!-- /.menu-item -->

                    @can('isAdmin', Auth::user())
                    <li class="menu-item"> 
                        <a href="{{ route('dashboard.user.admin.userlist') }}"class="menu-link"><span class="menu-icon fas fa-users"></span> <span class="menu-text">User List</span> </a> 
                        <!-- child menu -->                   
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('dashboard.user.admin.money-collection.index') }}" class="menu-link"><span class="menu-icon fas fa-users"></span> <span class="menu-text">Money Collection</span> </a> <!-- child menu -->
                    </li>
                    @endcan
               
                </ul><!-- /.menu -->
            </nav><!-- /.stacked-menu -->
            </div><!-- /.aside-menu -->
         <!-- Skin changer -->
        <footer class="aside-footer border-top p-2">
        <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
        </footer><!-- /Skin changer -->
    </div><!-- /.aside-content -->
</aside><!-- /.app-aside -->

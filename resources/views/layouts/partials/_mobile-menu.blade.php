{{-- <div class="mobile-menu md:hidden">
      <div class="mobile-menu-bar">
        <a href="#" class="flex mr-auto">
          <img
            alt="Nassa Funaab"
            class="w-6"
            src="{{ asset('dist/images/logo.jpg') }}"
          />
        </a>
        <a href="javascript:;" id="mobile-menu-toggler">
          <i
            data-feather="bar-chart-2"
            class="w-8 h-8 text-white transform -rotate-90"
          ></i>
        </a>
      </div>

      <ul class="border-t border-theme-24 py-5 hidden">        
        @role('student')
        <li>
          <a href="{{ route('user.dashboard') }}" class="menu menu--@yield('active-user.dashboard')">
            <div class="menu__icon"><i data-feather="home"></i></div>
            <div class="menu__title">Dashboard</div>
          </a>
        </li>

        <li>
          <a href="{{ route('user.transactions') }}" class="menu menu--@yield('active-user.transactions')">
            <div class="menu__icon"><i data-feather="activity"></i></div>
            <div class="menu__title">Transactions</div>
          </a>
        </li>

        <li>
          <a href="{{ route('user.profile') }}" class="menu menu--@yield('active-user.profile')">
            <div class="menu__icon"><i data-feather="user"></i></div>
            <div class="menu__title">Profile</div>
          </a>
        </li>

        <li>
          <a href="{{ route('user.vote') }}" class="menu menu--@yield('active-user.vote')">
            <div class="menu__icon"><i data-feather="user"></i></div>
            <div class="menu__title">Profile</div>
          </a>
        </li>
        @endrole


        @role('admin')
        <li>
          <a href="{{ route('admin.dashboard') }}" class="menu menu--active">
            <div class="menu__icon"><i data-feather="home"></i></div>
            <div class="menu__title">Dashboard</div>
          </a>
        </li>

        <li>
          <a href="javascript:;" class="menu menu--@yield('active-admin.vote')">
            <div class="menu__icon"><i data-feather="box"></i></div>
            <div class="menu__title">
              Vote Section
              <i data-feather="chevron-down" class="menu__sub-icon"></i>
            </div>
          </a>
          <ul class="">
            <li>
              <a href="{{ route('admin.category.all') }}" class="menu">
                <div class="menu__icon"><i data-feather="activity"></i></div>
                <div class="menu__title">Category</div>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.contest.all') }}" class="menu">
                <div class="menu__icon"><i data-feather="activity"></i></div>
                <div class="menu__title">Contests</div>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.contestant.all') }}" class="menu">
                <div class="menu__icon"><i data-feather="activity"></i></div>
                <div class="menu__title">Contestants</div>
              </a>
            </li>
            <li>
              <a href="{{ route('admin.vote.all') }}" class="menu">
                <div class="menu__icon"><i data-feather="activity"></i></div>
                <div class="menu__title">Votes</div>
              </a>
            </li>
          </ul>
        </li>
        @endrole
        
        <li class="nav__devider my-6"></li>
      </ul>
    </div> --}}
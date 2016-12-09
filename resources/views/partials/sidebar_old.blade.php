<div class="navbar-default sidebar" role="navigation">

        <ul class="nav" id="side-menu">
            <li class="sidebar-avatar">
                <div class="dropdown">
                    <div>
                        <img alt="avatar" class="img-circle" width="100" src="{{ Auth::user()->present()->avatar }}">
                    </div>
                    <div class="name"><strong> Auth::user()->present()->nameOrEmail }}</strong></div>
                </div>
            </li>

            <li class="{{ Request::is('/') ? 'active open' : ''  }}">
                <a href="{{ url('dashboard') }}" class="{{ Request::is('/') ? 'active' : ''  }}">
                    <i class="fa fa-area-chart fa-fw"></i> @lang('app.dashboard')
                </a>
            </li>

            <li class="{{ Request::is('user*') ? 'active open' : ''  }}">
                <a href="{{ url('user.list') }}" class="{{ Request::is('user*') ? 'active' : ''  }}">
                    <i class="fa fa-users fa-fw"></i> All Members
                </a>
            </li>

            <li class="{{ Request::is('staff*') ? 'active open' : ''  }}">
                <a href="{{ url('staff.list') }}" class="{{ Request::is('staff*') ? 'active' : ''  }}">
                    <i class="fa fa-life-ring fa-fw"></i> All Staff
                </a>
            </li>

            <li class="{{ Request::is('membership/create*') ? 'active open' : ''  }}">
                <a href="{{ url('membership/create') }}" class="{{ Request::is('membership/create*') ? 'active' : ''  }}">
                    <i class="fa fa-user-plus fa-fw"></i> Assign Membership
                </a>
            </li>

            <li class="{{ Request::is('membership/suspend*') ? 'active open' : ''  }}">
                <a href="{{ url('membership/suspend') }}" class="{{ Request::is('membership/suspend*') ? 'active' : ''  }}">
                    <i class="fa fa-user-plus fa-fw"></i> Suspend Membership
                </a>
            </li>

            <li class="{{ Request::is('calendar*') ? 'active open' : ''  }}">
                <a href="{{ url('calendar.list') }}" class="{{ Request::is('calendar*') ? 'active' : ''  }}">
                    <i class="fa fa-calendar fa-fw"></i> Appointments
                </a>
            </li>

            <li class="{{ Request::is('activity*') ? 'active open' : ''  }}">
                <a href="{{ url('activity.index') }}" class="{{ Request::is('activity*') ? 'active' : ''  }}">
                    <i class="fa fa-list fa-fw"></i> @lang('app.activity_log')
                </a>
            </li>

        </ul>

</div>
<div class="navbar-default sidebar navbar-custom" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard fa-fw"></i>
                    @lang('app.dashboard')
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">@lang('app.home')</a>
                    </li>
                    <li>
                        <a href="#">@lang('app.estimators')</a>
                    </li>
                    <li>
                        <a href="#">@lang('app.leads')</a>
                    </li>
                    <li>
                        <a href="#">@lang('app.follow_up')</a>
                    </li>
                    <li>
                        <a href="#">@lang('app.production')</a>
                    </li>
                    <li>
                        <a href="#">@lang('app.completed_jobs')</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-users fa-fw"></i>
                    @lang('app.users')
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.user.list') }}">@lang('app.all_users')</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.role.list') }}">@lang('app.users_roles')</a>
                    </li>
                </ul>
            </li>
           
            
            <li>
              <a href="{{ url('/clients') }}"><i class="fa fa-users fa-fw"></i> @lang('app.clients')</a>
            </li>    
            
            <li>
                <a href="#">
                    <i class="fa fa-users fa-fw"></i>
                    @lang('app.admin')
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/emailtpls') }}">@lang('app.mailtpls')</a>
                    </li>
                   
                    
                     <li>
                        <a href="{{ url('/ls') }}">@lang('app.ls')</a>
                    </li>
                    <li>
                        <a href="{{ url('/pe') }}">@lang('app.pe')</a>
                    </li>
                   <li>
                        <a href="{{ url('/qb') }}">@lang('app.qbintegration')</a>
                    </li>
                </ul>
            </li>
            
            <li>
                <a href="{{ url('/audit') }}"><i class="fa fa-archive"></i>&nbsp;@lang('app.audit')</a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-bars fa-fw"></i>
                    @lang('app.reports')
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                   
                    <li>
                        <a href="{{ url('/estimators_dashboard') }}">@lang('app.estimators_dashboard')</a>
                    </li>
                     <li>
                        <a href="{{ url('/leads_dashboard') }}">@lang('app.leads_dashboard')</a>
                    </li>
                    <li>
                        <a href="{{ url('/follow_up_dashboard') }}">@lang('app.follow_up_dashboard')</a>
                    </li>

                    <li>
                        <a href="{{ url('/production_dashboard') }}">@lang('app.production_dashboard')</a>
                    </li>

                    <li>
                        <a href="{{ url('/completed_jobs_dashboard') }}">@lang('app.completed_jobs_dashboard')</a>
                    </li>
                    
                    <li>
                        <a href="{{ url('/days_to_meet_with_client') }}">@lang('app.days_to_meet_with_client')</a>
                    </li>
                    <li>
                        <a href="{{ url('/days_to_submit_an_estimate') }}">@lang('app.days_to_submit_an_estimate')</a>
                    </li>
                    <li>
                        <a href="{{ url('/days_to_sign_contract') }}">@lang('app.days_to_sign_contract')</a>
                    </li>
                   
                </ul>
            </li>

            
        </ul>
    </div>
</div>
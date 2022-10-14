 <!-- Sidenav -->
 <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-silver" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ asset('assets') }}/img/brand/ess.png" class="navbar-brand-img" alt="...">
        </a>

         <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
        
      </div>
      
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <span class="text-orange font-weight-bold mt=0 text-center">{{ __('lang.hijri') }} : {{ Session::get('year') }}</span>
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}">
              <a class="nav-link" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="{{ Request::routeIs('home*') ? 'true' : 'false' }}" aria-controls="navbar-dashboards">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text  text-primary">{{ __('lang.dashboard') }}</span>
              </a>
              <div class="collapse {{ request()->routeIs('home*') ? 'show' : '' }}" id="navbar-dashboards">
                <ul class="nav nav-sm flex-column">
                @if (env('TALIMAT')==true)
                  <li class="nav-item {{ Request::routeIs('admin') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link">{{ __('lang.talimat') }}</a>
                  </li>
                @endif
                </ul>
              </div>
            </li>
            @if (env('TALIMAT')==true)
            @hasrole('super-admin')
            <li class="nav-item">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="{{ Route::getCurrentRoute()->getPrefix() == '/talimat' ? 'true' : 'false' }}" aria-controls="navbar-examples">
                <i class="ni ni-ungroup text-orange"></i>
                <span class="nav-link-text  text-orange">{{__('lang.talimat') }}</span>
              </a>
              <div class="collapse {{ Route::getCurrentRoute()->getPrefix() == '/talimat' ? 'show' : '' }}" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="#navbar-class" class="nav-link text-success" data-toggle="collapse" role="button" aria-expanded="{{ Request::routeIs('monthlyfees*') || Request::routeIs('daynames*') || Request::routeIs('ghantas*') || Request::routeIs('classroutines*') || Request::routeIs('classes*') || Request::routeIs('branches*') || Request::routeIs('subjects*') ? 'true' : 'false' }}" aria-controls="navbar-class">{{__('lang.class') }}</a>
                    <div class="collapse {{ Request::routeIs('monthlyfees*') || Request::routeIs('daynames*') || Request::routeIs('ghantas*') || Request::routeIs('classroutines*') || Request::routeIs('classes*') || Request::routeIs('branches*') || Request::routeIs('subjects*') ? 'show' : '' }}" id="navbar-class" style="">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="{{ route('monthlyfees.index') }}" class="nav-link ">{{__('lang.monthlyfee') }}</a>
                        </li>           
                        <li class="nav-item">
                          <a href="{{ route('daynames.index') }}" class="nav-link ">{{__('lang.dayname') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('classroutines.index') }}" class="nav-link ">{{__('lang.classroutine') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('ghantas.index') }}" class="nav-link ">{{__('lang.ghanta') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('classes.index') }}" class="nav-link ">{{__('lang.class') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('branches.index') }}" class="nav-link ">{{__('lang.branch') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('subjects.index') }}" class="nav-link ">{{__('lang.subject') }}</a>
                          <a href="{{ route('statuses.index') }}" class="nav-link ">{{__('lang.status') }}</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                   <li class="nav-item">
                    <a href="#navbar-exam" class="nav-link text-success" data-toggle="collapse" role="button" aria-expanded="{{ Request::routeIs('results*') || Request::routeIs('examnames*') || Request::routeIs('examfees*') || Request::routeIs('siteplans*') || Request::routeIs('exambenches*') || Request::routeIs('examholls*') || Request::routeIs('examroutines*') ? 'true' : 'false' }}" aria-controls="navbar-exam">{{__('lang.exam') }}</a>
                    <div class="collapse {{ Request::routeIs('results*') || Request::routeIs('examnames*') || Request::routeIs('examfees*') || Request::routeIs('siteplans*') || Request::routeIs('exambenches*') || Request::routeIs('examholls*') || Request::routeIs('examroutines*') ? 'show' : '' }}" id="navbar-exam" style="">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="{{ route('results.index') }}" class="nav-link ">{{__('lang.exam_number') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('examnames.index') }}" class="nav-link ">{{__('lang.examname') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('examfees.index') }}" class="nav-link ">{{__('lang.examfee') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('siteplans.index') }}" class="nav-link ">{{__('lang.siteplan') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('exambenches.index') }}" class="nav-link ">{{__('lang.exambench') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('exambenchsides.index') }}" class="nav-link ">{{__('lang.benchside') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('examholls.index') }}" class="nav-link ">{{__('lang.examholl') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('daynames.index') }}" class="nav-link ">{{__('lang.dayname') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('dayparts.index') }}" class="nav-link ">{{__('lang.daypart') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('examroutines.index') }}" class="nav-link ">{{__('lang.examroutine') }}</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="#navbar-student" class="nav-link  text-success" data-toggle="collapse" role="button" aria-expanded="{{ Request::routeIs('admissions*') || Request::routeIs('admissionfees*') || Request::routeIs('unions*') || Request::routeIs('thanas*') || Request::routeIs('districts*') ? 'true' : 'false' }}" aria-controls="navbar-student">{{__('lang.student') }}</a>
                    <div class="collapse {{ Request::routeIs('admissions*') || Request::routeIs('admissionfees*') || Request::routeIs('unions*') || Request::routeIs('thanas*') || Request::routeIs('districts*') || Request::routeIs('examholls*') || Request::routeIs('examroutines*') ? 'show' : '' }}" id="navbar-student" style="">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="{{ route('admissions.index') }}" class="nav-link ">{{__('lang.admission') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('admissionfees.index') }}" class="nav-link ">{{__('lang.admissionfee') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('unions.index') }}" class="nav-link ">{{__('lang.union') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('thanas.index') }}" class="nav-link ">{{__('lang.thana') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('districts.index') }}" class="nav-link ">{{__('lang.district') }}</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="#navbar-teacher" class="nav-link  text-success" data-toggle="collapse" role="button" aria-expanded="{{ Request::routeIs('teachers*') || Request::routeIs('departments*') || Request::routeIs('negrans*') || Request::routeIs('mumtahins*') || Request::routeIs('rooms*') || Request::routeIs('buildings*') ? 'true' : 'false' }}" aria-controls="navbar-teacher">{{__('lang.teacher') }}</a>
                    <div class="collapse {{ Request::routeIs('teachers*') || Request::routeIs('departments*') || Request::routeIs('negrans*') || Request::routeIs('mumtahins*') || Request::routeIs('rooms*') || Request::routeIs('buildings*') ? 'show' : '' }}" id="navbar-teacher" style="">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="{{ route('teachers.index') }}" class="nav-link ">{{__('lang.teacher') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('mumtahins.index') }}" class="nav-link ">{{__('lang.mumtahin') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('negrans.index') }}" class="nav-link ">{{__('lang.negran') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('departments.index') }}" class="nav-link ">{{__('lang.depertment') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('buildings.index') }}" class="nav-link ">{{__('lang.building') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('rooms.index') }}" class="nav-link ">{{__('lang.room') }}</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="#navbar-library" class="nav-link  text-success" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-library">{{__('lang.library') }}</a>
                    <div class="collapse" id="navbar-library" style="">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="{{ route('bnumbers.index') }}" class="nav-link ">{{__('lang.bnumber') }}</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="#navbar-setting" class="nav-link text-success" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-setting">{{__('lang.setting') }}</a>
                    <div class="collapse" id="navbar-setting" style="">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="{{ route('settings.index') }}" class="nav-link ">{{__('lang.software') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="#!" class="nav-link ">{{__('lang.result') }}</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </li>
            @endhasrole
            @endif
            @if (env('ACCOUNT')==true)
            <li class="nav-item">
              <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="{{ Route::getCurrentRoute()->getPrefix() == '/account' ? 'true' : 'false' }}" aria-controls="navbar-components">
                <i class="ni ni-ui-04 text-info"></i>
                <span class="nav-link-text text-info ">{{__('lang.account') }}</span>
              </a>
              <div class="collapse {{ Route::getCurrentRoute()->getPrefix() == '/account' ? 'show' : '' }}" id="navbar-components">
                <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="#navbar-income" class="nav-link  text-success" data-toggle="collapse" role="button" aria-expanded="{{ Request::routeIs('groups*') || Request::routeIs('groups*') ? 'true' : 'false' }}" aria-controls="navbar-income">{{__('lang.income') }}</a>
                    <div class="collapse {{ Request::routeIs('groups*') || Request::routeIs('groups*') ? 'show' : '' }}" id="navbar-income">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item h2">
                          <a href="{{ route('transactions.index') }}" class="nav-link ">{{__('lang.monthlyfee') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('settings.index') }}" class="nav-link ">{{__('lang.examfee') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('settings.index') }}" class="nav-link ">{{__('lang.admissionfee') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('settings.index') }}" class="nav-link ">{{__('lang.variousincome') }}</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="#navbar-expense" class="nav-link text-success" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-expense">{{__('lang.expense') }}</a>
                    <div class="collapse" id="navbar-expense" style="">
                      <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                          <a href="{{ route('settings.index') }}" class="nav-link ">{{__('lang.cashexpense') }}</a>
                        </li>
                        <li class="nav-item">
                          <a href="#!" class="nav-link ">{{__('lang.bankexpense') }}</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('groups.index') }}" class="nav-link ">{{__('lang.group') }}</a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('aheads.index') }}" class="nav-link ">{{__('lang.ahead') }}</a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('months.index') }}" class="nav-link ">{{__('lang.monthname') }}</a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('years.index') }}" class="nav-link ">{{__('lang.year') }}</a>
                  </li>
                </ul>
              </div>
            </li>
            @endif
            @if (env('ATTENDANCE')==true)
            <li class="nav-item">
              <a class="nav-link" href="#navbar-attendance" data-toggle="collapse" role="button" aria-expanded="{{ Route::getCurrentRoute()->getPrefix() == '/attendance' ? 'true' : 'false' }}" aria-controls="navbar-attendance">
                <i class="fas fa-calendar-alt text-success"></i>
                <span class="nav-link-text text-success ">{{__('lang.attendance') }}</span>
              </a>
              <div class="collapse {{ Route::getCurrentRoute()->getPrefix() == '/attendance' ? 'show' : '' }}" id="navbar-attendance">
                <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                     <a href="{{ route('salaries.index') }}" class="nav-link ">{{__('lang.salary') }}</a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('amonthlys.index') }}" class="nav-link ">{{__('lang.amonthly') }}</a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('ateachers.index') }}" class="nav-link ">{{__('lang.teacher') }}</a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('astudents.index') }}" class="nav-link ">{{__('lang.student') }}</a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('amethods.index') }}" class="nav-link ">{{__('lang.amethod') }}</a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('atypes.index') }}" class="nav-link ">{{__('lang.atype') }}</a>
                  </li>
                </ul>
              </div>
            </li>
            @endif
            @if (env('USER_MANAGEMENT')==true)
            <li class="nav-item {{ Route::is('users.*') || Route::is('roles.*') || Route::is('permissions.*')? 'active' : '' }}">
              <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-forms">
                <i class="fas fa-users text-gray"></i>
                <span class="nav-link-text">{{__('lang.userManagment') }}</span>
              </a>
              <div class="collapse" id="navbar-forms">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item {{ Route::is('users.*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="nav-link">{{__('lang.user') }}</a>
                  </li>
                  <li class="nav-item {{ Route::is('roles.*') ? 'active' : '' }}">
                    <a href="{{ route('roles.index') }}" class="nav-link active">{{__('lang.role') }}</a>
                  </li>
                  <li class="nav-item {{ Route::is('permissions.*') ? 'active' : '' }}">
                    <a href="{{ route('permissions.index') }}" class="nav-link active">{{__('lang.permission') }}</a>
                  </li>
              </ul>
              </div>
            </li>
            @endif
         <li class="nav-item">
              <a class="nav-link" href=href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <i class="ni ni-user-run text-orange"></i>
                <span class="nav-link-text text-orange ">{{ __('lang.logout') }}</span>
              </a>
            </li>
          </ul>
          @if (env('DOCUMENTATION')==true)
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">Documentation</h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Getting started</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
                <i class="ni ni-palette"></i>
                <span class="nav-link-text">Foundation</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                <i class="ni ni-ui-04"></i>
                <span class="nav-link-text">Components</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Plugins</span>
              </a>
            </li>
          </ul>
          @endif
       </div>
      </div>
    </div>
  </nav>
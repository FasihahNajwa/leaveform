<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

@can('Access Reports')
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('report') }}"><i class="la la-table nav-icon"></i> {{__('Reports')}}</a></li>
@endcan
@canany([
    'Manage Users',
    'Manage Roles and Permissions',
    'Manage Settings',
    'View System Logs',
])
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> {{__('Administration')}}</a>
    <ul class="nav-dropdown-items">
        @can('Manage Users')
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>{{__('Users')}}</span></a></li>
        @endcan
        @can('Manage Roles and Permissions')
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>{{__('Roles')}}</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>{{__('Permissions')}}</span></a></li>
        @endcan
        @can('Manage Settings')
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon la la-cog'></i> <span>{{__('Settings')}}</span></a></li>
        @endcan
        @can('View System Logs')
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('log') }}'><i class='nav-icon la la-terminal'></i> {{__('Logs')}}</a></li>
        @endcan
    </ul>
</li>
@endcanany
@can('View API Docs')
<li class='nav-item'><a target="_blank" class='nav-link' href='{{ backpack_url('api-docs') }}'><i class='nav-icon la la-book'></i> {{__('API Documentation')}}</a></li>
@endcan
@canany(['Manage Leave Types'])
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('leave-type') }}'>
        <i class='nav-icon la la-table'></i>
        {{__('Leave Types')}}
    </a>
</li>
@endcanany
@canany(['Manage Departments'])
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('department') }}'>
        <i class='nav-icon la la-table'></i>
        {{__('Departments')}}
    </a>
</li>
@endcanany
@canany(['Manage Head Departments'])
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('head-department') }}'>
        <i class='nav-icon la la-table'></i>
        {{__('Head Departments')}}
    </a>
</li>
@endcanany
@canany(['Manage Application Leaves'])
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('application-leave') }}'>
        <i class='nav-icon la la-table'></i>
        {{__('Application Leaves')}}
    </a>
</li>
@endcanany
@canany(['Manage Emergency Contacts'])
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('emergency-contacts') }}'>
        <i class='nav-icon la la-table'></i>
        {{__('Emergency Contacts')}}
    </a>
</li>
@endcanany
@canany(['Manage Entitlements'])
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('entitlement') }}'>
        <i class='nav-icon la la-table'></i>
        {{__('Entitlements')}}
    </a>
</li>
@endcanany
@canany(['Manage Positions'])
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('position') }}'>
        <i class='nav-icon la la-table'></i>
        {{__('Positions')}}
    </a>
</li>
@endcanany
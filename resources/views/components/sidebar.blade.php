@php
$links = [
[
"href" => "dashboard",
"text" => "Dashboard",
"is_multi" => false,
],
[
"href" => [
[
"section_text" => "User",
"section_list" => [
["href" => "user", "text" => "Data User"],
["href" => "user.new", "text" => "Buat User"]
]
]
],
"text" => "User",
"is_multi" => true,
],
[
"href" => [
[
"section_text" => "Car",
"section_list" => [
["href" => "user", "text" => "Create"],
["href" => "car.index", "text" => "All"]
]
]
],
"text" => "Car",
"is_multi" => true,
],
];
$navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">{{__('CS Energy')}}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="{{asset('icons')}}/CSE.svg" alt="">
            </a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">{{__('Menu')}}</li>

            <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i><span>{{__('Dashboard')}}</span></a>
            </li>

            <li class="dropdown {{ Request::routeIs('car.index') || Request::routeIs('car.create') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-clipboard"></i> <span>{{__('Information Management')}}</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::routeIs('car.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('car.index') }}">{{__('Car Management')}}</a></li>
                    <li class="{{ Request::routeIs('division.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('division.index') }}">{{__('Division Management')}}</a></li>
                    <li class="{{ Request::routeIs('assignto.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('assignto.index') }}">{{__('Assign To Management')}}</a></li>
                    <li class="{{ Request::routeIs('driver.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('driver.index') }}">{{__('Driver Management')}}</a></li>
                    
                </ul>
            </li>

            <li class="dropdown {{ Request::routeIs('division.index') ? 'active' : '' }}">
                <a href="{{route('division.index')}}" class="nav-link has-dropdown"><i class="fas fa-cogs"></i> <span>{{__('Preventive Management')}}</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::routeIs('maintenance.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('maintenance.index') }}">{{__('Maintenance')}}</a></li>
                    <li class="{{ Request::routeIs('division.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('division.index') }}">{{__('Preventive')}}</a></li>
                    <li class="{{ Request::routeIs('division.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('division.index') }}">{{__('Accident')}}</a></li>
                    <li class="{{ Request::routeIs('division.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('division.index') }}">{{__('Re Fuel')}}</a></li>
                </ul>
            </li>

        </ul>

    </aside>
</div>
@php
$user = auth()->user();
@endphp

<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-turbolinks="false" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
        <h1 class="font-weight-bold text-2xl text-white">{{__('Car-Manangement') }}</h1>
    </form>
    <ul class="navbar-nav navbar-right">
    <li class="nav-link nav-link-lg"><label class="">{{__('Lao')}} </label> <label data-toggle="checkbox-toggle"><input type="checkbox" id="toggle-lang" {{session('locale') === 'en' ? 'checked':''}}/></label><label class=""> {{__('English')}}</label></li>

        <li class="dropdown"><a href="#" data-turbolinks="false" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if (!is_null($user))
                <div class="d-sm-none d-lg-inline-block">{{__('Hi')}}, {{ $user->name }}</div>
            </a>
            @else
            <div class="d-sm-none d-lg-inline-block">Hi, Welcome</div></a>
            @endif
            <div class="dropdown-menu dropdown-menu-right">
                <a href="/user/profile" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> {{__('Profile')}}
                </a>

                @if (request()->get('is_admin'))
                <a href="/setting" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Setting
                </a>
                @endif
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{__('Logout')}}
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>

@push('modals')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('js')}}/jquery-tailwind-toggle.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let action = "{{session('locale')}}" === 'en' ? '{{route("setlocale","la")}}' : '{{route("setlocale","en")}}';
    $('#toggle-lang').change(function(e) {
        e.preventDefault();
        let toggle = $('#toggle').is(':checked');

            $.ajax({
                type: 'GET',
                url: action,
                success: function(data) {
                    location.reload();
                }
            });
  
    });

</script>

@endpush
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@yield('head')
  <title>Book</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-white">
    <div class="container">
      <a class="navbar-brand" href="#">BOOK</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
    <ul class="navbar-nav mx-auto">
       <li class="nav-item">
        <a href="#" class="nav-link">Category <i class="bi bi-house-door"></i></a>
       </li>
       <li class="nav-item">
        <a href="#" class="nav-link">Publishers <i class="bi bi-house-door"></i></a>
       </li>
       <li class="nav-item">
        <a href="#" class="nav-link">Authors <i class="bi bi-house-door"></i></a>
       </li>
       <li class="nav-item">
        <a href="#" class="nav-link">My Purchases <i class="bi bi-house-door"></i></a>
       </li>
    </ul>
  
      <ul class="navbar-nav ml-auto">
        @guest
        <li class="nav-item">
          <a href="{{route('login')}}" class="nav-link">Login</a>
        </li>
        @if (Route::has('register'))
            <div class="nav-item">
              <a href="{{route('register')}}" class="nav-link">Register</a>
            </div>
        @endif
        @else
        <li class="nav-item dropdown justify-content-right">
          <a href="#" id="navbarDropdown" class="nav-link" data-bs-toggle="dropdown">
         <img class="h-8 w-8 rounded object-cover" src="{{Auth::user()->profile_photo_url}}" alt="{{Auth::user()->name}}">
          </a>
          <div class="dropdown-menu dropdown-menu-right px-2 text-right mt-2">
            <div class="pt-4 pb-1 border-t border-gray-200">
              <div class="flex items-center px-4">
               
                  <div>
                      <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                   
                  </div>
              </div>
  
              <div class="mt-3 space-y-1">
                  <!-- Account Management -->
                  <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                      {{ __('Profile') }}
                  </x-jet-responsive-nav-link>
  
                  @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                      <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                          {{ __('API Tokens') }}
                      </x-jet-responsive-nav-link>
                  @endif
  
                  <!-- Authentication -->
                  <form method="POST" action="{{ route('logout') }}" x-data>
                      @csrf
  
                      <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                     onclick="event.preventDefault();this.closest('form').submit()">
                          {{ __('Log Out') }}
                      </x-jet-responsive-nav-link>
                  </form>
  
                  <!-- Team Management -->
                  @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                      <div class="border-t border-gray-200"></div>
  
                      <div class="block px-4 py-2 text-xs text-gray-400">
                          {{ __('Manage Team') }}
                      </div>
  
                      <!-- Team Settings -->
                      <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                          {{ __('Team Settings') }}
                      </x-jet-responsive-nav-link>
  
                      @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                          <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                              {{ __('Create New Team') }}
                          </x-jet-responsive-nav-link>
                      @endcan
  
                      <div class="border-t border-gray-200"></div>
  
                      <!-- Team Switcher -->
                      <div class="block px-4 py-2 text-xs text-gray-400">
                          {{ __('Switch Teams') }}
                      </div>
  
                      @foreach (Auth::user()->allTeams() as $team)
                          <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                      @endforeach
                  @endif
              </div>
          </div>
          </div>
        </li>
        @endguest
      </ul>
      </div>
    </div>
  </nav>

  <main class="py-4">
    @yield('content')
  </main>

  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
@yield('script')
</body>
</html>
{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->email }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Acme</span>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
              {{-- <span class="sr-only">Open user menu</span> --}}
              <img class="w-8 h-8 rounded-full" src="data:image/jpeg;base64,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" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
              <div class="px-4 py-3">
                <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
              </div>
              <ul class="py-2" aria-labelledby="user-menu-button">
                <li>
                  <a href="{{route('profile.show')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Ver Perfil</a>
                </li>
                <li style="cursor: pointer">
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" style="cursor: pointer"> <input type="submit" value="Cerrar Sesion" style="cursor: pointer"> </a>
                      
                    </form>
                 
                </li>
              </ul>
            </div>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
          <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
              <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
            </li>
            <li>
              <a href="{{route('profile.show')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Ver Perfil</a>
            </li>      
          </ul>
        </div>
        </div>
      </nav>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>
</html>

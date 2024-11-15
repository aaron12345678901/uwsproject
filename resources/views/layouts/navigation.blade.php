<nav x-data="{ open: false }" class="nav">
    <div class="nav-container">
        <div class="nav-content">
            <div class="nav-left">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="logo" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="nav-links">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="user-settings">
                @if (Auth::check())
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="settings-btn">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="dropdown-link">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-link">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="hamburger">
                <button @click="open = ! open" class="hamburger-btn">
                    <svg class="icon" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="responsive-nav">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
    </div>

    <!-- Responsive Settings Options -->
    @if (Auth::check())
        <div class="responsive-settings">
            <div class="user-info">{{ Auth::user()->name }}</div>
            <div class="user-email">{{ Auth::user()->email }}</div>

            <x-responsive-nav-link :href="route('profile.edit')" class="responsive-nav-link">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="responsive-nav-link">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    @endif
</nav>
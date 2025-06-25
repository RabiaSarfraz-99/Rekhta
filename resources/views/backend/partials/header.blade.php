<header class="header">
    <div class="header-left">
        <div class="logo">
            <h2>AdminPro</h2>
        </div>
    </div>

    <div class="header-center">
        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <span class="search-icon">🔍</span>
        </div>
    </div>

    <div class="header-right">
        <div class="notifications">
            <span class="notification-icon">🔔</span>
            <span class="notification-badge">3</span>
        </div>

        @auth
            <div class="user-profile relative" style="position: relative;">
                <img src="{{ asset('assets/images/placeholder.svg?height=40&width=40') }}" alt="User" class="profile-img">
                <span class="username">{{ Auth::user()->name }}</span>

                @if(Auth::user()->role === 'admin')
                    <span class="badge bg-blue-500 text-white text-xs px-2 py-1 rounded">Admin</span>
                @endif

                <span class="dropdown-arrow cursor-pointer" onclick="document.getElementById('logoutDropdown').classList.toggle('hidden')">▼</span>

                <!-- Dropdown -->
                <div id="logoutDropdown" class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg hidden z-50">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        @endauth

        @guest
            <div class="ml-4">
                <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900">Login</a>
                <a href="{{ route('register') }}" class="ml-3 text-sm text-gray-600 hover:text-gray-900">Register</a>
            </div>
        @endguest
    </div>
</header>

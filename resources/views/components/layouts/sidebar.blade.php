<x-ui::sidebar>

    {{-- Sidebar header --}}
    <x-slot:title>      
        <svg class="w-48 h-auto class="dark:text-gray-100" " viewBox="0 0 128 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <!-- Icon Circle -->
            <g transform="translate(0, 0)">
                <circle cx="16" cy="16" r="14" fill="#3B82F6" />

                <!-- Generic App/Dashboard Icon -->
                <rect x="10.5" y="10.5" width="4" height="4" rx="1" fill="white" />
                <rect x="17.5" y="10.5" width="4" height="4" rx="1" fill="white" />
                <rect x="10.5" y="17.5" width="4" height="4" rx="1" fill="white" />
                <rect x="17.5" y="17.5" width="4" height="4" rx="1" fill="white" />
            </g>

            <!-- Text Placeholder -->
            <text x="34" y="21" font-size="10" fill="#4B5563" font-family="sans-serif" letter-spacing=".5">
               {{ config('app.name') }}
            </text>
        </svg>

    </x-slot:title>

    {{-- navigation content --}}
    <x-slot:navigation>
        <x-ui::sidebar.link href="/" icon="eye" label="Home" />

        <x-ui::sidebar.dropdown label="Company" icon="folder">
            <x-ui::sidebar.link href="/about" icon="info" label="About Us" />
             <x-ui::sidebar.link href="/contact" icon="info" label="Contact Us" />
        </x-ui::sidebar.dropdown>

    </x-slot:navigation>

    {{-- Optional topbar content --}}
    <x-slot:top>
        <x-ui::sidebar.link href="/" icon="home" />
        <x-ui::sidebar.link @click="dark = !dark" icon="moon" />
    </x-slot>

    {{-- content slot --}}
    {{ $slot }}

    {{-- Optional bottom bar content --}}
    <x-slot:bottom>
        @guest
            <x-ui::sidebar.link icon="user" href="{{ route('login') }}" label="Login" />
        @endguest
        @auth
            <x-ui::sidebar.dropdown label="{{ auth()->user()->name }}" icon="user">
                <x-ui::sidebar.link @click="dark = !dark" icon="moon" label="Toggle" />
                <x-ui::sidebar.link icon="edit" label="Profile" href="/edit" />
                <x-ui::sidebar.link href="/logout" icon="exit" method="post" label="Logout" />
            </x-ui::sidebar.dropdown>
        @endauth
    </x-slot:bottom>

</x-ui::sidebar>

<x-ui::navbar class="text-sm">
    {{-- navbar header --}}
    <x-slot:title>
        <svg class="w-48 h-auto class="dark:text-gray-100" " viewBox="0 0 128 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <!-- Icon Circle -->
            <g transform="translate(0, 0)">
                <circle cx="16" cy="16" r=" 14" fill="#3B82F6" />

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

    <x-slot:navigation>
        <x-ui::navbar.link href="/" icon="home" label="Home" />

         <x-ui::navbar.dropdown label="Company" icon="folder">
            <x-ui::navbar.link href="/about" icon="info" label="About Us" />
             <x-ui::navbar.link href="/contact" icon="info" label="Contact Us" />
        </x-ui::navbar.dropdown>

    </x-slot:navigation>

    <x-slot:right>
        @guest
            <x-ui::navbar.link icon="user" href="{{ route('login') }}" label="Login" />
        @endguest
        @auth
            <x-ui::navbar.dropdown label="{{ auth()->user()->name }}" icon="user">
                <x-ui::navbar.link @click="dark = !dark" icon="moon" label="Toggle" />
                <x-ui::navbar.link icon="edit" label="Profile" href="/edit" />
                <x-ui::navbar.link href="/logout" icon="exit" method="post" label="Logout" />
            </x-ui::navbar.dropdown>
        @endauth
    </x-slot:right>

    <x-ui::flash position="bottom-right" />

    {{-- content slot --}}
    {{ $slot }}

    <x-slot:bottom>
        <x-ui::navbar.link href="/edit" icon="user" />
        <x-ui::navbar.link @click="dark = !dark" icon="moon" />
    </x-slot:bottom>
</x-ui::navbar>

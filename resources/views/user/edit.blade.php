<x-layouts.app>

    <x-ui::breadcrumb :crumbs="[
        'Home' => '/',
        'Profile' => '#',
    ]" />

   
    <div class="flex items-center justify-center mt-5">

        <x-ui::card class="bg-white md:w-3xl dark:bg-gray-800 shadow-lg p-6">

            <div class="flex justify-center mt-4">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 15V17M6 21H18C19.1046 21 20 20.1046 20 19V13C20 11.8954 19.1046 11 18 11H6C4.89543 11 4 11.8954 4 13V19C4 20.1046 4.89543 21 6 21ZM16 11V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V11H16Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>

            <x-ui::heading level="2" class="text-center mt-4">
                Profile
            </x-ui::heading>

            <form method="POST" action="{{ route('user.update') }}" class="space-y-2">
                @csrf
                @method('PUT')

                <!-- name -->
                <x-ui::form.input label="Name" name="name" type="text" :value="old('name', auth()->user()->name)" />

                <!-- email -->
                <x-ui::form.input label="Email" name="email" type="email" :value="old('email', auth()->user()->email)" />

                <!-- optional password change -->
                <x-ui::heading level="5" class="mt-4">
                    Change Password (optional)
                </x-ui::heading>

                <!-- passwords -->
                <div class="flex gap-2">
                    <x-ui::form.input label="New Password" name="password" type="password" />
                    <x-ui::form.input label="Confirm New Password" name="password_confirmation" type="password" />
                </div>

                <!-- submit -->
                <div class="mt-6">
                    <x-ui::button variant="dark" type="submit">Update Profile</x-ui::button>
                    <x-ui::link variant="light" href="{{ route('home') }}">Cancel</x-ui::link>
                </div>

            </form>
        </x-ui::card>

    </div>

</x-layouts.app>

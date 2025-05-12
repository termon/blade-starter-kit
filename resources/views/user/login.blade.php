<x-layouts.guest>
 

        <x-ui::card class="bg-white w-md md:w-3xl dark:bg-gray-800 shadow-lg p-6">

            <div class="flex justify-center mt-4">
                <svg class="" width="28" height="28" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 15V17M6 21H18C19.1046 21 20 20.1046 20 19V13C20 11.8954 19.1046 11 18 11H6C4.89543 11 4 11.8954 4 13V19C4 20.1046 4.89543 21 6 21ZM16 11V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V11H16Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>

            <x-ui::heading level="2" class="text-center mt-4">
                Login
            </x-ui::heading>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mt-2">
                    <x-ui::form.input label="Email" name="email" type="email" />
                </div>

                <div class="mt-2">
                    <x-ui::form.input label="Password" name="password" type="password" />
                </div>

                <div class="mt-4 flex justify-between">
                    
                    <x-ui::button variant="dark" type="submit">Login</x-ui::button>                       
                    
                    <x-ui::link variant="link" class="!text-blue-500" href="{{ route('user.register') }}">Register Here</x-ui::link>
                </div>

            </form>
        </x-ui::card>

    </div>
</x-layouts.guest>

<div class="grid gap-6 xl:grid-cols-[1fr_1fr]">
    <x-ui::card>
        <x-ui::header>
            <x-ui::title size="lg">Headings and titles</x-ui::title>
            <x-ui::badge variant="blue">Core UI</x-ui::badge>
        </x-ui::header>

        <div class="space-y-6">
            <div>
                <x-ui::heading level="1">Heading Level 1</x-ui::heading>
                <x-ui::heading level="2">Heading Level 2</x-ui::heading>
                <x-ui::heading level="3">Heading Level 3</x-ui::heading>
                <x-ui::heading level="4">Heading Level 4</x-ui::heading>
                <x-ui::heading level="5">Heading Level 5</x-ui::heading>
            </div>
        </div>
    </x-ui::card>

    <x-ui::card>
        <x-ui::heading level="4" class="mb-4">Header and title components</x-ui::heading>

        <div class="space-y-6">
            <x-ui::header>
                <x-ui::title size="lg">Page Title</x-ui::title>
                <x-ui::link variant="oblue" href="{{ route('contact') }}">Action Link</x-ui::link>
            </x-ui::header>

            <x-ui::header>
                <x-ui::title size="md">Smaller section title</x-ui::title>
                <x-ui::badge variant="green">Active</x-ui::badge>
            </x-ui::header>
        </div>
    </x-ui::card>
</div>

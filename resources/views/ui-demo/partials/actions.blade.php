<div class="grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
    <x-ui::card>
        <x-ui::heading level="4" class="mb-4">Buttons and links</x-ui::heading>

        <div class="space-y-6">
            <div class="flex flex-wrap items-center gap-3">
                <x-ui::button variant="blue" icon="plus" label="Create" />
                <x-ui::button variant="green" icon="check" label="Approve" />
                <x-ui::button variant="yellow" icon="light-bulb" label="Review" />
                <x-ui::button variant="red" icon="trash" label="Delete" />
                <x-ui::button variant="dark" icon="magnifying-glass" label="Search" />
                <x-ui::button variant="light" icon="mail" label="Message" />
                <x-ui::button variant="oblue" icon="folder" label="Outline" />
                <x-ui::button variant="ored" icon="x-mark" label="Danger" />
                <x-ui::button variant="link" icon="arrow-right" label="Link Button" />
                <x-ui::button variant="none" icon="eye" label="Icon Action" />
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <x-ui::link href="{{ route('about') }}">Standard Link</x-ui::link>
                <x-ui::link variant="oblue" href="{{ route('contact') }}" icon="mail">Outlined Link</x-ui::link>
                <x-ui::link variant="dark" href="{{ route('help') }}" icon="info">Button-style Link</x-ui::link>
            </div>
        </div>
    </x-ui::card>

    <x-ui::card>
        <x-ui::heading level="4" class="mb-4">Badges</x-ui::heading>

        <div class="flex flex-wrap items-center gap-3">
            <x-ui::badge variant="blue">Info</x-ui::badge>
            <x-ui::badge variant="gray">Draft</x-ui::badge>
            <x-ui::badge variant="light">Neutral</x-ui::badge>
            <x-ui::badge variant="red">Error</x-ui::badge>
            <x-ui::badge variant="green">Success</x-ui::badge>
            <x-ui::badge variant="yellow">Warning</x-ui::badge>
            <x-ui::badge variant="indigo">Queued</x-ui::badge>
            <x-ui::badge variant="purple">Beta</x-ui::badge>
            <x-ui::badge variant="pink">Preview</x-ui::badge>
        </div>
    </x-ui::card>
</div>

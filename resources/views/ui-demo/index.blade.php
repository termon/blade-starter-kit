@php
    use Illuminate\Pagination\LengthAwarePaginator;

    $progress = [
        1 => ['Student Details', true],
        2 => ['Employment Details', true],
        3 => ['Placement Plan', true],
        4 => ['Safety Assessment', false],
    ];

    $roles = [
        'admin' => 'Admin',
        'user' => 'User',
        'guest' => 'Guest',
    ];

    $icons = [
        'academic-cap', 'add', 'add-user', 'adjustments-horizontal', 'archive-box', 'arrow-down',
        'arrow-down-tray', 'arrow-left', 'arrow-path', 'arrow-right', 'arrow-up', 'arrow-up-tray',
        'avatar', 'badge', 'bars', 'bars-down', 'bars-up', 'bell', 'calendar-days', 'camera',
        'chart', 'chat-bubble-left', 'check', 'check-circle', 'chevron-down', 'chevron-left',
        'chevron-right', 'chevron-up', 'chevron-up-down', 'cog', 'cog-6-tooth', 'document',
        'document-duplicate', 'edit', 'envelope', 'exit', 'eye', 'finger-print', 'folder',
        'funnel', 'globe', 'home', 'identification', 'inbox-arrow-down', 'info', 'light-bulb',
        'link', 'list', 'list-bullet', 'magnifying-glass', 'mail', 'minus', 'moon', 'photo',
        'pie', 'plus', 'search', 'tag', 'trash', 'user', 'users', 'wrench', 'x-mark',
    ];

    $tableRows = collect([
        ['id' => 1001, 'name' => 'Alice Green', 'email' => 'alice@example.com', 'role' => 'ADMIN', 'status' => 'Active'],
        ['id' => 1002, 'name' => 'Marcus Reed', 'email' => 'marcus@example.com', 'role' => 'USER', 'status' => 'Active'],
        ['id' => 1003, 'name' => 'Tina Watts', 'email' => 'tina@example.com', 'role' => 'GUEST', 'status' => 'Pending'],
        ['id' => 1004, 'name' => 'Jon Patel', 'email' => 'jon@example.com', 'role' => 'USER', 'status' => 'Suspended'],
        ['id' => 1005, 'name' => 'Sarah Kemp', 'email' => 'sarah@example.com', 'role' => 'ADMIN', 'status' => 'Active'],
    ]);

    $paginator = new LengthAwarePaginator(
        $tableRows,
        15,
        5,
        1,
        ['path' => route('ui-demo')]
    );

    $navbarExample = <<<'BLADE'
<x-ui::navbar>
    <x-slot:brand-icon>...</x-slot:brand-icon>
    <x-slot:brand-title>...</x-slot:brand-title>

    <x-slot:navigation>
        <x-ui::navbar.link href="/" icon="home" label="Home" />
        <x-ui::navbar.dropdown label="Company" icon="folder">
            <x-ui::navbar.link href="/about" icon="info" label="About" />
        </x-ui::navbar.dropdown>
    </x-slot:navigation>

    <x-slot:user>...</x-slot:user>
    <x-slot:toolbar>...</x-slot:toolbar>

    {{ $slot }}
</x-ui::navbar>
BLADE;

    $sidebarExample = <<<'BLADE'
<x-ui::sidebar>
    <x-slot:brand-icon>...</x-slot:brand-icon>
    <x-slot:brand-title>...</x-slot:brand-title>

    <x-slot:navigation>
        <x-ui::sidebar.link href="/" icon="home" label="Dashboard" />
        <x-ui::sidebar.dropdown label="Resources" icon="folder">
            <x-ui::sidebar.link href="/docs" icon="document" label="Docs" />
        </x-ui::sidebar.dropdown>
    </x-slot:navigation>

    <x-slot:user>...</x-slot:user>
    <x-slot:toolbar>...</x-slot:toolbar>

    {{ $slot }}
</x-ui::sidebar>
BLADE;
@endphp

@auth
    <x-layouts.app>
        <x-ui::breadcrumb :crumbs="['Home' => route('home'), 'UI Demo' => route('ui-demo')]" />

        <x-ui::divider>
            <x-ui::heading level="3">UI Library Demo</x-ui::heading>
        </x-ui::divider>

        <x-ui::hero
            heading="termon/ui Component Catalogue"
            subheading="A practical demo of the package components currently installed in this starter kit."
            class="mb-6"
        >
            <div class="mt-4 flex flex-wrap gap-2">
                <x-ui::badge variant="blue">Tailwind 4</x-ui::badge>
                <x-ui::badge variant="green">Blade Components</x-ui::badge>
                <x-ui::badge variant="purple">Charts</x-ui::badge>
                <x-ui::badge variant="yellow">Alpine Powered</x-ui::badge>
            </div>
        </x-ui::hero>

        <x-ui::tabs active="Introduction">
            <x-ui::tabs.tab name="Introduction">
                @include('ui-demo.partials.introduction')
            </x-ui::tabs.tab>

            <x-ui::tabs.tab name="Typography">
                @include('ui-demo.partials.typography')
            </x-ui::tabs.tab>

            <x-ui::tabs.tab name="Actions">
                @include('ui-demo.partials.actions')
            </x-ui::tabs.tab>

            <x-ui::tabs.tab name="Icons">
                @include('ui-demo.partials.icons')
            </x-ui::tabs.tab>

            <x-ui::tabs.tab name="Status & Display">
                @include('ui-demo.partials.status-display')
            </x-ui::tabs.tab>

            <x-ui::tabs.tab name="Navigation">
                @include('ui-demo.partials.navigation', [
                    'navbarExample' => $navbarExample,
                    'sidebarExample' => $sidebarExample,
                ])
            </x-ui::tabs.tab>

            <x-ui::tabs.tab name="Forms">
                @include('ui-demo.partials.forms', ['roles' => $roles])
            </x-ui::tabs.tab>

            <x-ui::tabs.tab name="Data">
                @include('ui-demo.partials.data', [
                    'tableRows' => $tableRows,
                    'paginator' => $paginator,
                ])
            </x-ui::tabs.tab>

            <x-ui::tabs.tab name="Feedback & Charts">
                @include('ui-demo.partials.feedback-charts')
            </x-ui::tabs.tab>
        </x-ui::tabs>
    </x-layouts.app>
@endauth

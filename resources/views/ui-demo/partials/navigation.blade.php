<div class="grid gap-6 xl:grid-cols-2">
    <x-ui::card>
        <x-ui::heading level="4" class="mb-4">Navbar layout component</x-ui::heading>

        <div class="space-y-4">
            <p class="text-sm text-slate-600 dark:text-slate-300">
                `x-ui::navbar` is a full-page layout shell with a fixed top bar and mobile menu behaviour. It should be used as the outer page container rather than embedded inside another application layout.
            </p>

            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-900/40">
                <div class="flex items-center justify-between border-b border-slate-200 pb-3 dark:border-slate-700">
                    <div class="flex items-center gap-2">
                        <x-ui::svg icon="chart" class="text-blue-600" />
                        <span class="font-semibold text-slate-900 dark:text-slate-100">Demo App</span>
                    </div>
                    <div class="hidden gap-3 text-sm text-slate-600 dark:text-slate-300 md:flex">
                        <span>Home</span>
                        <span>Company</span>
                        <span>User Menu</span>
                    </div>
                </div>
                <div class="pt-4 text-sm text-slate-600 dark:text-slate-300">
                    Use the navbar when the page needs a horizontal application shell with navigation, user actions, and a toolbar.
                </div>
            </div>

            <pre class="overflow-x-auto rounded-xl bg-slate-950 p-4 text-xs leading-6 text-slate-100"><code>{{ $navbarExample }}</code></pre>
        </div>
    </x-ui::card>

    <x-ui::card>
        <x-ui::heading level="4" class="mb-4">Sidebar layout component</x-ui::heading>

        <div class="space-y-4">
            <p class="text-sm text-slate-600 dark:text-slate-300">
                `x-ui::sidebar` is also a full-page layout shell. It owns the sidebar, top bar, toolbar, and main content region, so it should not be rendered inside another shell or alongside `x-ui::navbar` on the same page.
            </p>

            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-900/40">
                <div class="grid min-h-56 grid-cols-[14rem_1fr] overflow-hidden rounded-lg border border-slate-200 dark:border-slate-700">
                    <div class="border-r border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-900">
                        <div class="mb-4 flex items-center gap-2">
                            <x-ui::svg icon="badge" class="text-blue-600" />
                            <span class="font-semibold text-slate-900 dark:text-slate-100">Workspace</span>
                        </div>
                        <div class="space-y-2 text-sm text-slate-600 dark:text-slate-300">
                            <div>Dashboard</div>
                            <div>Resources</div>
                            <div>Settings</div>
                        </div>
                    </div>
                    <div class="bg-slate-50 p-4 dark:bg-slate-950">
                        <div class="mb-4 flex items-center justify-between border-b border-slate-200 pb-3 dark:border-slate-700">
                            <span class="text-sm text-slate-600 dark:text-slate-300">Top bar / toolbar</span>
                            <div class="flex gap-2">
                                <x-ui::svg icon="moon" class="text-slate-500" />
                                <x-ui::svg icon="info" class="text-slate-500" />
                            </div>
                        </div>
                        <p class="text-sm text-slate-600 dark:text-slate-300">
                            Use the sidebar when the app needs a persistent left navigation rail with toolbar actions and a scrollable content area.
                        </p>
                    </div>
                </div>
            </div>

            <pre class="overflow-x-auto rounded-xl bg-slate-950 p-4 text-xs leading-6 text-slate-100"><code>{{ $sidebarExample }}</code></pre>
        </div>
    </x-ui::card>
</div>

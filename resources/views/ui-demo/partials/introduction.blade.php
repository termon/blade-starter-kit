<x-ui::card>
    <x-ui::header>
        <x-ui::title size="lg">Using this demo</x-ui::title>
    </x-ui::header>

    <div class="space-y-4 text-sm text-slate-600 dark:text-slate-300">
        <p>
            This page is organised by component type rather than by individual page examples. Each tab focuses on a smaller set of related `termon/ui` components.
        </p>
        <p>
            Use the tabs to move between navigation shells, forms, data display, feedback components, and charting widgets.
        </p>
    </div>

    <div class="mt-6 grid gap-4 md:grid-cols-3">
        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-900/40">
            <div class="mb-2 flex items-center gap-2">
                <x-ui::svg icon="badge" class="text-blue-600" />
                <span class="font-semibold text-slate-900 dark:text-slate-100">Core UI</span>
            </div>
            <p class="text-sm text-slate-600 dark:text-slate-300">Headings, actions, cards, icons, and display helpers.</p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-900/40">
            <div class="mb-2 flex items-center gap-2">
                <x-ui::svg icon="document" class="text-emerald-600" />
                <span class="font-semibold text-slate-900 dark:text-slate-100">Forms</span>
            </div>
            <p class="text-sm text-slate-600 dark:text-slate-300">Single-purpose fields, grouped helpers, toggles, date pickers, range sliders, OTP, and confirm actions.</p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-900/40">
            <div class="mb-2 flex items-center gap-2">
                <x-ui::svg icon="chart" class="text-amber-600" />
                <span class="font-semibold text-slate-900 dark:text-slate-100">Data & Feedback</span>
            </div>
            <p class="text-sm text-slate-600 dark:text-slate-300">Tables, pagination, flash messages, modals, charts, and legacy highchart support.</p>
        </div>
    </div>
</x-ui::card>

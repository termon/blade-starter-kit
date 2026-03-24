<div class="grid gap-6 xl:grid-cols-[0.9fr_1.1fr]">
    <x-ui::card>
        <x-ui::heading level="4" class="mb-3">Statistics, rating, and steps</x-ui::heading>

        <div class="grid gap-4">
            <x-ui::statistic title="Users" value="1,234" description="Seeded and sample records" variant="yellow" icon="users" />
            <x-ui::statistic title="Revenue" value="6.0M" description="Illustrative KPI block" variant="green" icon="chart" />
            <div class="rounded-xl border border-slate-200 p-4 dark:border-slate-700">
                <x-ui::rating value="4.5" size="lg" max="5" />
            </div>
            <x-ui::steps class="rounded-xl border border-slate-200 p-4 dark:border-slate-700" numbered percentage :steps="$progress" variant="blue" />
        </div>
    </x-ui::card>

    <div class="space-y-6">
        <x-ui::card>
            <x-slot:header>
                <x-ui::title size="md">Card with slots</x-ui::title>
            </x-slot:header>

            <p class="text-sm text-slate-600 dark:text-slate-300">
                The card component can wrap regular content or be split into `header`, body, and `footer` slots.
            </p>

            <x-slot:footer>
                <div class="flex justify-end gap-2">
                    <x-ui::button variant="light">Cancel</x-ui::button>
                    <x-ui::button variant="dark">Continue</x-ui::button>
                </div>
            </x-slot:footer>
        </x-ui::card>

        <x-ui::card>
            <x-ui::heading level="4" class="mb-4">Display helpers</x-ui::heading>

            <div class="rounded-xl border border-slate-200 px-4 dark:border-slate-700">
                <x-ui::display label="Application" value="{{ config('app.name') }}" icon="home" />
                <x-ui::display label="Package" value="termon/ui" icon="badge" />
                <x-ui::display label="Theme" value="Tailwind CSS 4" icon="light-bulb" />
                <x-ui::display label="Status" icon="check-circle">
                    <div class="flex items-center gap-2">
                        <span>Ready for prototyping</span>
                        <x-ui::badge variant="green">Installed</x-ui::badge>
                    </div>
                </x-ui::display>
            </div>
        </x-ui::card>
    </div>
</div>

<div class="grid gap-6 xl:grid-cols-2">
    <div class="space-y-6">
        <x-ui::card>
            <x-ui::heading level="4" class="mb-4">Modal</x-ui::heading>

            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-900/40">
                <p class="max-w-xl text-sm text-slate-600 dark:text-slate-300">
                    The flash component is already rendered globally by the application layout. Submit one of the preview actions below to see the real flash behaviour in its normal bottom-right position.
                </p>
            </div>

            <p class="text-sm text-slate-600 dark:text-slate-300">
                Use `x-ui::modal.trigger` to open or close a named modal without wiring custom Alpine events by hand.
            </p>

            <div class="mt-5 flex flex-wrap gap-3">
                <x-ui::modal.trigger for="component-demo-modal" variant="dark" icon="eye">
                    Open Modal
                </x-ui::modal.trigger>

                <x-ui::modal.trigger for="component-demo-modal" component="ui::link" variant="link">
                    Open as Link
                </x-ui::modal.trigger>
            </div>

            <x-ui::modal name="component-demo-modal" focusable>
                <x-slot:title>Component Preview Modal</x-slot:title>

                <div class="space-y-4">
                    <x-ui::form.input-group label="Email" name="modal_email" value="demo@example.com" />
                    <x-ui::form.select-group label="Status" name="modal_status" :options="['draft' => 'Draft', 'live' => 'Live']" value="live" />
                    <x-ui::form.textarea-group label="Message" name="modal_message" value="This modal is triggered with x-ui::modal.trigger." />
                </div>

                <x-slot:footer>
                    <div class="flex justify-end gap-2">
                        <x-ui::modal.trigger for="component-demo-modal" action="close" variant="light" type="button">
                            Close
                        </x-ui::modal.trigger>
                        <x-ui::button variant="dark" type="button">Primary Action</x-ui::button>
                    </div>
                </x-slot:footer>
            </x-ui::modal>
        </x-ui::card>

        <x-ui::card>
            <x-ui::heading level="4" class="mb-4">Confirmed Actions & Flash</x-ui::heading>

            <div class="space-y-4">
                <p class="text-sm text-slate-600 dark:text-slate-300">
                    These preview-only forms demonstrate how `x-ui::form.confirm` can guard `POST`, `PATCH`, and `DELETE` submissions.
                </p>

                <div class="grid gap-4 md:grid-cols-3">
                    <form method="POST" action="{{ route('ui-demo.preview.post') }}" class="rounded-xl border border-slate-200 p-4 dark:border-slate-700">
                        @csrf
                        <p class="mb-3 text-sm font-medium text-slate-900 dark:text-slate-100">POST preview</p>
                        <x-ui::form.confirm variant="green" message="Submit demo POST action?">Create Record</x-ui::form.confirm>
                    </form>

                    <form method="POST" action="{{ route('ui-demo.preview.patch') }}" class="rounded-xl border border-slate-200 p-4 dark:border-slate-700">
                        @csrf
                        @method('PATCH')
                        <p class="mb-3 text-sm font-medium text-slate-900 dark:text-slate-100">PATCH preview</p>
                        <x-ui::form.confirm variant="yellow" message="Submit demo PATCH action?">Update Record</x-ui::form.confirm>
                    </form>

                    <form method="POST" action="{{ route('ui-demo.preview.delete') }}" class="rounded-xl border border-slate-200 p-4 dark:border-slate-700">
                        @csrf
                        @method('DELETE')
                        <p class="mb-3 text-sm font-medium text-slate-900 dark:text-slate-100">DELETE preview</p>
                        <x-ui::form.confirm variant="ored" message="Submit demo DELETE action?">Delete Record</x-ui::form.confirm>
                    </form>
                </div>
            </div>
        </x-ui::card>
    </div>

    <div class="space-y-6">
        <x-ui::card>
            <x-ui::heading level="4" class="mb-4">Chart.js wrapper</x-ui::heading>
            <x-ui::chart id="ui-demo-chart" :config="[
                'type' => 'line',
                'data' => [
                    'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    'datasets' => [
                        [
                            'label' => 'Visits',
                            'data' => [42, 58, 51, 74, 81, 77],
                            'borderColor' => '#2563eb',
                            'backgroundColor' => 'rgba(37, 99, 235, 0.16)',
                            'fill' => true,
                            'tension' => 0.35,
                        ],
                        [
                            'label' => 'Signups',
                            'data' => [12, 19, 15, 26, 31, 28],
                            'borderColor' => '#16a34a',
                            'backgroundColor' => 'rgba(22, 163, 74, 0.12)',
                            'fill' => true,
                            'tension' => 0.35,
                        ],
                    ],
                ],
                'options' => [
                    'plugins' => [
                        'title' => [
                            'display' => true,
                            'text' => 'Traffic Overview',
                        ],
                    ],
                    'scales' => [
                        'y' => [
                            'beginAtZero' => true,
                        ],
                    ],
                ],
            ]" class="h-80" />
        </x-ui::card>

        <x-ui::card>
            <x-ui::heading level="4" class="mb-2">Highchart</x-ui::heading>
            <p class="mb-4 text-sm text-slate-600 dark:text-slate-300">
                This component remains available for backward compatibility, but `x-ui::chart` is the preferred option for new work.
            </p>

            <x-ui::highchart id="ui-demo-highchart">
                {
                    chart: { type: 'column' },
                    title: { text: 'Legacy Highchart Demo' },
                    xAxis: { categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] },
                    series: [
                        { name: 'Tickets', data: [3, 5, 4, 7, 6] },
                        { name: 'Resolved', data: [2, 4, 3, 6, 5] }
                    ]
                }
            </x-ui::highchart>
        </x-ui::card>
    </div>
</div>

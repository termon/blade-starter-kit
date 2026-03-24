@php
    $progress = [
        1 => ['Student Details', true],
        2 => ['Employment Details', true],
        3 => ['Placement Plan', true],
        4 => ['Safety Assessment', false],
    ];
@endphp

@auth

    <x-layouts.app>
        <x-ui::breadcrumb :crumbs="['Home' => '/', 'UI Demo' => '/ui-demo']" />

        <x-ui::divider>
            <x-ui::heading level="3">UI Library Demo</x-ui::heading>
        </x-ui::divider>

        <x-ui::tabs active="Options">

            <x-ui::tabs.tab name="Options">
                <x-ui::tabs active="Table">
                    <x-ui::tabs.tab name="Table">
                        <x-ui::heading level="4">Table</x-ui::heading>
                    </x-ui::tabs.tab>
                    <x-ui::tabs.tab name="Students">
                        <x-ui::heading level="4">Students</x-ui::heading>
                    </x-ui::tabs.tab>
                    <x-ui::tabs.tab name="Discovery">
                        <x-ui::heading level="4">Discovery</x-ui::heading>
                    </x-ui::tabs.tab>
                </x-ui::tabs>

            </x-ui::tabs.tab>

            <x-ui::tabs.tab name="Buttons">
                <x-ui::hero heading="Buttons" subheading="Check buttons" class="my-4 ">
                    <x-ui::button variant="blue" icon="magnifying-glass" label="Blue" />
                    <x-ui::button variant="red" icon="magnifying-glass" label="Red" />
                    <x-ui::button variant="green" icon="magnifying-glass" label="Green" />
                    <x-ui::button variant="yellow" icon="magnifying-glass" label="Yellow" />
                    <x-ui::button variant="dark" icon="magnifying-glass" label="Dark" />
                    <x-ui::button variant="light" icon="magnifying-glass" label="Light" />
                    <x-ui::button variant="oblue" icon="magnifying-glass" label="OBlue" />
                    <x-ui::button variant="ored" icon="magnifying-glass" label="ORed" />

                    <x-ui::button variant="link" icon="magnifying-glass" label="Link" />
                    <x-ui::button variant="none" icon="magnifying-glass" label="None" />

                </x-ui::hero>

            </x-ui::tabs.tab>

            <x-ui::tabs.tab name="Steps">
                <x-ui::steps class="my-5 p-3 border" numbered percentage :steps="$progress" variant="blue" />
            </x-ui::tabs.tab>

            <x-ui::tabs.tab name="Picker">
                <x-ui::card class="">
                    <form action="/" method="get">
                        @csrf
                        <x-ui::form.date-group class="mb-4 w-full" name="birthday" value="2025-05-16" label="Birth Date" />
                        <x-ui::form.datetime-group class="mb-4 w-full" name="birthday" value="2025-05-16"
                            label="Birth Datetime" />

                        <x-ui::button variant="light" type="submit">Submit</x-ui::button>
                    </form>
                </x-ui::card>
            </x-ui::tabs.tab>

            <x-ui::tabs.tab name="Chart">

                <x-ui::card class="mt-6">
                    <x-ui::heading level="4" class="mb-4">Sample Chart</x-ui::heading>

                    <x-ui::chart id="about-chart" :config="[
                        'type' => 'line',
                        'data' => [
                            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                            'datasets' => [
                                [
                                    'label' => 'Signups',
                                    'data' => [12, 19, 14, 24, 31, 27],
                                    'borderColor' => '#2563eb',
                                    'backgroundColor' => 'rgba(37, 99, 235, 0.18)',
                                    'tension' => 0.35,
                                    'fill' => true,
                                ],
                                [
                                    'label' => 'Conversions',
                                    'data' => [4, 8, 6, 11, 15, 13],
                                    'borderColor' => '#16a34a',
                                    'backgroundColor' => 'rgba(22, 163, 74, 0.12)',
                                    'tension' => 0.35,
                                    'fill' => true,
                                ],
                            ],
                        ],
                        'options' => [
                            'plugins' => [
                                'title' => [
                                    'display' => true,
                                    'text' => 'Performance Overview',
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

                <x-ui::card class="mt-6">
                    <x-ui::heading level="4" class="mb-4">Slot Config Chart</x-ui::heading>

                    <x-ui::chart id="about-chart-slot" class="h-80">
                        {
                        type: 'bar',
                        data: {
                        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
                        datasets: [
                        {
                        label: 'Visits',
                        data: [32, 48, 41, 57, 63],
                        backgroundColor: [
                        'rgba(37, 99, 235, 0.75)',
                        'rgba(59, 130, 246, 0.75)',
                        'rgba(16, 185, 129, 0.75)',
                        'rgba(245, 158, 11, 0.75)',
                        'rgba(239, 68, 68, 0.75)',
                        ],
                        borderRadius: 8,
                        },
                        ],
                        },
                        options: {
                        plugins: {
                        title: {
                        display: true,
                        text: 'Weekly Visits',
                        },
                        legend: {
                        display: false,
                        },
                        },
                        scales: {
                        y: {
                        beginAtZero: true,
                        },
                        },
                        },
                        }
                    </x-ui::chart>
                </x-ui::card>
            </x-ui::tabs.tab>

            <x-ui::tabs.tab name="Modal">

                <x-ui::modal.trigger for="test" variant="dark">Open</x-ui::modal.trigger>

                <x-ui::modal name="test" focusable>
                    <x-slot:title>
                        Confirm
                    </x-slot:title>

                    <div class="flex flex-col gap-2 space-y-3 w-full">
                        <x-ui::form.input-group label="Email" name="email" value="" placeholder="Your email"
                            class="w-full" />
                        <x-ui::form.date-group label="Birthday" name="birthday" value="2024-05-16" class="w-full" />
                        <x-ui::form.textarea-group label="Message" name="message" value="" placeholder="Your message"
                            class="w-full" />
                        <x-ui::form.select-group label="Status" name="status" :options="['active' => 'Active', 'inactive' => 'Inactive']" class="w-1/4" />
                        <x-ui::form.toggle-group label="Active" name="active" icon="search" />
                    </div>

                    <x-slot:footer>
                        <x-ui::modal.trigger action="close" for="test">Close</x-ui::modal.trigger>
                    </x-slot:footer>
                </x-ui::modal>
            </x-ui::tabs.tab>

            <x-ui::tabs.tab name="Headings">
                <x-ui::card class="text-center my-5">

                    <x-ui::heading level="1">Level 1</x-ui::heading>
                    <x-ui::heading level="2">Level 2</x-ui::heading>
                    <x-ui::heading level="3">Level 3</x-ui::heading>
                    <x-ui::heading level="4">Level 4</x-ui::heading>
                    <x-ui::heading level="5">Level 5</x-ui::heading>

                </x-ui::card>
            </x-ui::tabs.tab>

            <x-ui::tabs.tab name="Statistics">
                <div class="flex flex-wrap gap-4 my-5 justify-center">
                    <x-ui::statistic title="Users" value="1,234" description="Total number of users" variant="yellow"
                        icon="light-bulb" class="inline-block bg-neutral-50" />
                    <x-ui::statistic title="Sales" value="6.0M" description="Total value of sales" variant="green"
                        class="inline-block bg-neutral-50 " />

                    <x-ui::rating value="3.5" size="md" max="5" />

                </div>
            </x-ui::tabs.tab>


        </x-ui::tabs>


    </x-layouts.app>
@endauth

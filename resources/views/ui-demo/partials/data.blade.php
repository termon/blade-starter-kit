<div class="grid gap-6">
    <x-ui::card>
        <x-ui::heading level="4" class="mb-4">Table, sort links, and paginator</x-ui::heading>

        <x-ui::section-header
            title="Example users"
            description="Responsive, striped, compact table with sortable headings."
            status="5 records"
            status-variant="sky"
            class="mb-4"
        >
            <x-slot:actions>
                <x-ui::button variant="light" icon="arrow-down-tray" label="Export" />
            </x-slot:actions>
        </x-ui::section-header>

        <x-ui::table striped compact>
            <x-slot:thead>
                <x-ui::table.tr>
                    <x-ui::table.th><x-ui::link-sort name="id">Id</x-ui::link-sort></x-ui::table.th>
                    <x-ui::table.th><x-ui::link-sort name="name">Name</x-ui::link-sort></x-ui::table.th>
                    <x-ui::table.th showOn="lg"><x-ui::link-sort name="email">Email</x-ui::link-sort></x-ui::table.th>
                    <x-ui::table.th><x-ui::link-sort name="role">Role</x-ui::link-sort></x-ui::table.th>
                    <x-ui::table.th>Status</x-ui::table.th>
                </x-ui::table.tr>
            </x-slot:thead>

            <x-slot:tbody>
                @foreach($tableRows as $row)
                    <x-ui::table.tr>
                        <x-ui::table.td>{{ $row['id'] }}</x-ui::table.td>
                        <x-ui::table.td>{{ $row['name'] }}</x-ui::table.td>
                        <x-ui::table.td showOn="lg">{{ $row['email'] }}</x-ui::table.td>
                        <x-ui::table.td>{{ $row['role'] }}</x-ui::table.td>
                        <x-ui::table.td>
                            <x-ui::badge :variant="$row['status'] === 'Active' ? 'green' : ($row['status'] === 'Pending' ? 'yellow' : 'red')">
                                {{ $row['status'] }}
                            </x-ui::badge>
                        </x-ui::table.td>
                    </x-ui::table.tr>
                @endforeach
            </x-slot:tbody>

            <x-slot:tfoot>
                <x-ui::table.tr>
                    <x-ui::table.td colspan="5" class="text-sm text-slate-500 dark:text-slate-400">
                        Showing {{ $tableRows->count() }} example records
                    </x-ui::table.td>
                </x-ui::table.tr>
            </x-slot:tfoot>
        </x-ui::table>

        <x-ui::paginator :items="$paginator" class="mt-4" />
    </x-ui::card>

    <x-ui::card>
        <x-ui::heading level="4" class="mb-4">Resource rows</x-ui::heading>

        <div class="divide-y divide-slate-200 overflow-hidden rounded-xl border border-slate-200 dark:divide-slate-700 dark:border-slate-700">
            <x-ui::resource-row title="Component guide" description="Usage patterns for the current package release." status="Updated" status-variant="emerald" icon="book-open">
                <x-slot:actions>
                    <x-ui::link :href="route('help')" variant="link">View guide</x-ui::link>
                </x-slot:actions>
            </x-ui::resource-row>
            <x-ui::resource-row title="UI package" description="Installed through Composer from termon/ui." :status="$uiVersion" status-variant="sky" icon="archive-box" />
        </div>
    </x-ui::card>
</div>

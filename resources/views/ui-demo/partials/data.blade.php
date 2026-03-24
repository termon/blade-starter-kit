<div class="grid gap-6">
    <x-ui::card>
        <x-ui::heading level="4" class="mb-4">Table, sort links, and paginator</x-ui::heading>

        <x-ui::table>
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
        </x-ui::table>

        <x-ui::paginator :items="$paginator" class="mt-4" />
    </x-ui::card>
</div>

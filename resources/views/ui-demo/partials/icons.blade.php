<div class="grid gap-6 xl:grid-cols-[0.28fr_0.72fr]">
    <x-ui::card>
        <x-ui::heading level="4" class="mb-4">Avatars and SVG icons</x-ui::heading>

        <div class="space-y-6">
            <div class="flex flex-wrap items-center gap-3">
                <x-ui::avatar size="xs" />
                <x-ui::avatar size="sm" />
                <x-ui::avatar size="md" />
                <x-ui::avatar size="lg" />
            </div>

            <div class="flex flex-wrap items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-900/40">
                <pre>size="lg" icon="chart"</pre>
                <x-ui::svg icon="chart" size="lg" class="text-blue-600" />
                <pre>size="md" icon="camera"</pre>
                <x-ui::svg icon="camera" size="md" class="text-amber-600" />
                <pre>size="sm" icon="user"</pre>
                <x-ui::svg icon="user" size="sm" class="text-rose-600" />
            </div>
        </div>
    </x-ui::card>

    <x-ui::card>
        <x-ui::heading level="4" class="mb-4">Available icons</x-ui::heading>

        <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-4">
            @foreach($icons as $icon)
                <div class="flex items-center gap-3 rounded-xl border border-slate-200 bg-slate-50 p-3 text-sm dark:border-slate-700 dark:bg-slate-900/40">
                    <x-ui::svg :icon="$icon" class="text-slate-700 dark:text-slate-200" />
                    <span class="text-slate-600 dark:text-slate-300">{{ $icon }}</span>
                </div>
            @endforeach
        </div>
    </x-ui::card>
</div>

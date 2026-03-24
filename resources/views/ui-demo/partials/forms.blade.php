<div class="grid gap-6 xl:grid-cols-2">
    <x-ui::card>
        <x-ui::heading level="4" class="mb-4">Single-purpose fields</x-ui::heading>

        <form class="space-y-4">
            <div>
                <x-ui::form.label for="demo-name" icon="user">Name</x-ui::form.label>
                <x-ui::form.input name="demo-name" value="Taylor James" />
            </div>

            <div>
                <x-ui::form.label for="demo-role" icon="badge">Role</x-ui::form.label>
                <x-ui::form.select name="demo-role" :options="$roles" value="user" />
            </div>

            <div>
                <x-ui::form.label for="demo-notes" icon="document">Notes</x-ui::form.label>
                <x-ui::form.textarea name="demo-notes">This is a standalone textarea component.</x-ui::form.textarea>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <x-ui::form.label for="demo-date" icon="calendar-days">Date</x-ui::form.label>
                    <x-ui::form.date name="demo-date" value="2026-03-24" />
                </div>
                <div>
                    <x-ui::form.label for="demo-datetime" icon="calendar-days">Datetime</x-ui::form.label>
                    <x-ui::form.datetime name="demo-datetime" value="2026-03-24 14:30:00" />
                </div>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <div class="w-1/3 md:w-full">
                    <x-ui::form.label for="demo-toggle" icon="check-circle">Toggle</x-ui::form.label>
                    <x-ui::form.toggle name="demo-toggle" :value="true" variant="green" />
                </div>
                <div>
                    <x-ui::form.label for="demo-code-1" icon="finger-print">OTP</x-ui::form.label>
                    <x-ui::form.otp name="demo-code" length="6" />
                </div>
            </div>
            <x-ui::card>
                <x-ui::form.label for="demo-range" icon="chart">Range</x-ui::form.label>
                <x-ui::form.range name="demo-range" min="0" max="10" value="0" variant="oblue" />
            </x-ui::card>
           
           
        </form>
    </x-ui::card>

    <x-ui::card>
        <x-ui::heading level="4" class="mb-4">Grouped form helpers</x-ui::heading>

        <form class="space-y-4" method="GET" action="{{ route('ui-demo') }}">
            <x-ui::form.input-group label="Email" name="email" type="email" value="hello@example.com" icon="mail" />
            <x-ui::form.input-group label="Photo" name="photo" type="file" variant="light" />
            <x-ui::form.select-group label="Role" name="role" :options="$roles" value="admin" icon="badge" />
            <x-ui::form.textarea-group label="Description" name="description" value="Grouped fields render label and error handling together." icon="document" />

            <div class="grid gap-4 md:grid-cols-2">
                <x-ui::form.date-group label="Start Date" name="start_date" value="2026-03-24" icon="calendar-days" />
                <x-ui::form.datetime-group label="Launch Window" name="launch_window" value="2026-03-24 09:15:00" icon="calendar-days" />
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <x-ui::form.toggle-group label="Published" name="published" :value="true" variant="green" icon="check-circle" />
                <x-ui::form.otp-group label="Verification Code" name="verification_code" length="6" icon="finger-print" />
            </div>
            
            <x-ui::card>
                <x-ui::form.range-group label="Confidence" name="confidence" min="1" max="10" step="1" value="7" variant="yellow" icon="chart" />
            </x-ui::card>
         
            {{-- <div class="rounded-xl border border-dashed border-slate-300 p-4 dark:border-slate-700">
                <p class="mb-3 text-sm text-slate-600 dark:text-slate-300">The confirm component swaps a single action into a yes/no confirmation and submits the surrounding form when confirmed.</p>
                <x-ui::form.confirm variant="ored" message="Run the demo action?">Confirm Action</x-ui::form.confirm>
            </div> --}}
        </form>
    </x-ui::card>
</div>

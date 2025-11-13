<x-filament-widgets::widget>
    <x-filament::section>
        {{-- Widget content --}}
        <form wire:submit.prevent="submit">
            <x-filament::input wire:model.defer='email' label="Email" style="border: 1px solid red;" placeholder="Email" />
            <x-filament::button type="submit" style="margin-top: 10px;">Submit</x-filament::button>
        </form>
    </x-filament::section>
</x-filament-widgets::widget>

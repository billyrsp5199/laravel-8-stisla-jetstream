<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Driver Management') }}</h1>

        <div class="section-header-breadcrumb">

        </div>
    </x-slot>
    <livewire:driver.edit-component :driver="$driver" :division="$division" />

</x-app-layout>

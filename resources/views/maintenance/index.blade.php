<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Maintenances Management')}}</h1>

        <div class="section-header-breadcrumb">
        </div>
    </x-slot>
    <livewire:maintenance.index-component :main="$main"/>

</x-app-layout>

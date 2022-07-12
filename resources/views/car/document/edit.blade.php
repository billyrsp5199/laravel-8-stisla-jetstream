<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Car Document Management') }}</h1>

        <div class="section-header-breadcrumb">

        </div>
    </x-slot>
    <livewire:document-car.edit-component :doc="$doc" :driver="$driver" />
</x-app-layout>
<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Assign To Management') }}</h1>

        <div class="section-header-breadcrumb">

        </div>
    </x-slot>
    <livewire:assign-to.edit-component :assignto="$assignto" :division="$division" />

</x-app-layout>

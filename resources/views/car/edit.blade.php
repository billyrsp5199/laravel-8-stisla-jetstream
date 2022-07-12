<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Car Management') }}</h1>

        <div class="section-header-breadcrumb">

        </div>
    </x-slot>
    <livewire:car.edit-component :car="$car" :assign="$assign" :division="$division" />

</x-app-layout>

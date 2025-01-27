@props(['bgcolor', 'color', 'type'=> 'flat'])
<div style="background-color: {{ $bgcolor ?? 'black' }}" class=" w-full overflow-hidden h-10">
    @include('components.guest.component.separator.'. $type)
</div>
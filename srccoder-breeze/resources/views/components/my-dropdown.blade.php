{{-- to extract $trigger, $slot is automatic --}}
@props(['trigger'])

<div x-data="{show: false}" @click.away="show = false" >
    {{-- Trigger --}}
   <div @click="show = ! show">
        {{ $trigger }}
    </div>

    {{-- Dropdown Links --}}
    <div x-show="show" class="absolute z-50 w-full py-2 mt-2 overflow-auto bg-gray-100 rounded-xl max-h-52" style="display: none">
      {{ $slot }}
    </div>
</div>


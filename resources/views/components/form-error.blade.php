@props(['name'])

@error($name)
<p class="text-xs italic text-red-500 font-semibold mt-1">{{ $message }}</p>
@enderror

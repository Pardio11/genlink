@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[#ffff]']) }}>
    {{ $value ?? $slot }}
</label>

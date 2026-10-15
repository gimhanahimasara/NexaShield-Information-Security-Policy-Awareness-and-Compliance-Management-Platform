@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-nexa-green-light']) }}>
    {{ $value ?? $slot }}
</label>
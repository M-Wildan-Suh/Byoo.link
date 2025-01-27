@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-byolink-1 focus:ring-byolink-1 rounded-md shadow-sm']) }}>

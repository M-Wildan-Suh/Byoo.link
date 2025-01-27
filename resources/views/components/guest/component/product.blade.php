@props(['background', 'color', 'product', 'take' => null, 'class', 'title', 'notlp' => '', 'color', 'modulstatus', 'slug', 'type' => 'rectangle'])
<div x-data="{ product: {{ $modulstatus ? 'true' : 'false' }} }"  :class="admin ? 'hover:border-green-500' : '' " 
    style="background-color: {{ $background ?? 'gray' }}"
    class=" flex flex-col gap-4 justify-center items-center py-12 px-4 relative border border-transparent">
    <button x-show="admin" x-show="admin" @click="product = true" 
        class=" absolute top-14 right-8 w-4 aspect-square {{$class}} hover:text-green-500 duration-300">
        <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="currentColor" fill-rule="evenodd" class="fill-000000"></path></svg>
    </button>

    {{-- Product Edit --}}
    @include('admin.product.edit')

    <p class="text-2xl {{$class}}">{{$title ?? 'Produk Kami'}}</p>
    <div style="background-color: {{ $color }}" class=" w-10 h-[4px]"></div>
    @include('components.guest.component.product.'. $type)
</div>


<div x-data="{topcontent: false}" :class="admin ? 'hover:border hover:border-green-500' : 'border-transparent' " style="background-color: {{ $data->templatecolor->main_color ?? 'black' }}"
    class="w-full p-3 flex justify-between items-center sm:rounded-t-lg relative">
    <button x-show="admin" x-show="admin" @click="topcontent = true" 
        class=" absolute top-8 right-1/2 translate-x-1/2 w-4 aspect-square text-neutral-500 hover:text-green-500 duration-300">
        <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="currentColor" fill-rule="evenodd" class="fill-000000"></path></svg>
    </button>

    {{-- Top Content Edit --}}
    @include('admin.top-content.edit')
    <div class=" h-14 max-w-32 flex justify-center">
        <div x-data="{ src: '{{ ($data->logo ?? '') != '' ? asset('storage/images/logo/' . $data->logo) : asset('assets/images/placeholder.webp') }}', isLoading: true, observer: null }"
            x-init="() => {
                observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                    const img = new Image();
                    img.src = '{{ ($data->logo ?? '') != '' ? asset('storage/images/logo/' . $data->logo) : asset('assets/images/placeholder.webp') }}';
                    img.onload = () => {
                        src = img.src;
                        isLoading = false;
                    };
                    observer.disconnect();
                    }
                });
                });
                observer.observe($el);
            }"
            class="relative w-full h-full flex items-center">
            
            <!-- Placeholder / Loader -->
            <div x-show="isLoading" class="absolute inset-0 flex items-center justify-center bg-gray-100">
                <svg class="animate-spin h-8 w-8 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
            
            <!-- Image -->
            <img :src="src" 
                x-show="!isLoading" 
                class="object-contain w-full h-14"
                alt="{{$logo->logo_alt ?? ''}}">
        </div>       
    </div>
    <div class="flex flex-col text-white text-right">
        <p class=" font-medium">{{ $data->navigation->title ?? 'Cutomer Service' }}</p>
        <p class=" text-gray-300 text-sm">+62
            {{ ($data->navigation->no_tlp ?? '') != '' ? substr($data->navigation->no_tlp, 0, 3) . '-' . substr($data->navigation->no_tlp, 3, 4) . '-' . substr($data->navigation->no_tlp, 7) : '856-2420-3799' }}
        </p>
    </div>
</div>
<div class=" bg-gradient-circle sticky top-0 w-full z-20">
    <div style="color: {{ $templatecolor->main_color ?? 'black'}}" class=" flex flex-row gap-2 py-3 px-2 justify-center font-semibold items-center">
        <a href="{{ route('website', ['slug'=>$data->url]) }}">
            <button
                class="{{ request()->routeIs('website') ? 'text-white' : '' }} duration-300 hover:text-white">Home</button>
        </a>
        <p class="text-white">|</p>
        <a id="scrollButton">
            <button class=" duration-300 hover:text-white">Tentang Kami</button>
        </a>
        <p class="text-white">|</p>
        @if ($data->webType->type === 'Online Shop')
            <a href="{{ route('product', ['slug'=> $data->url]) }}">
                <button
                    class="{{ request()->routeIs('product') ? 'text-white' : '' }} duration-300 hover:text-white">Produk</button>
            </a>
        @elseif ($data->webType->type === 'Article')
            <a href="{{ route('article', ['slug'=> $data->url]) }}">
                <button
                    class="{{ request()->routeIs('article') ? 'text-white' : '' }} duration-300 hover:text-white">Article</button>
            </a>
        @endif
        <p class="text-white">|</p>
        <a href="{{ route('link' , ['slug'=> $data->url]) }}">
            <button
                class="{{ request()->routeIs('link') ? 'text-white' : '' }} duration-300 hover:text-white">Link</button>
        </a>
    </div>
</div>
<style>
    .bg-gradient-circle {
        background-image: radial-gradient(
            at center center, 
            {{ ($templatecolor->second_color ?? '#EAB653') . 'D9' }} 0%, 
            {{ $templatecolor->second_color ?? '#EAB653' }} 100%
        );
    }
</style>

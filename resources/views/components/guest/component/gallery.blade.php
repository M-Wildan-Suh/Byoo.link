@props(['background', 'color', 'gallery', 'class', 'title', 'slug', 'modalstatus'])
<div x-data="{gallery: {{ $modalstatus ? 'true' : 'false' }}}" :class="admin ? 'hover:border-green-500' : '' " style="background-color: {{ $background ?? 'gray' }}" class=" w-full flex flex-col gap-4 justify-center items-center py-12 px-4 border border-transparent relative">
    <button x-show="admin" x-show="admin" @click="gallery = true"
            class=" absolute top-14 right-8 w-4 aspect-square hover:text-green-500 duration-300 {{$class}} ">
        <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4 1 0 1.4-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" 
                  fill="currentColor" 
                  fill-rule="evenodd" 
                  class="fill-000000"></path>
        </svg>
    </button>

    {{-- Gallery Edit --}}
    @include('admin.gallery.edit')

    <p class=" {{$class}} text-2xl">{{$title ?? 'Galeri Kami'}}</p>
    <div style="background-color: {{$color}}" class=" w-10 h-[4px]"></div>
    <div class=" w-full grid grid-cols-3 gap-2">
        @foreach ($gallery as $item)
            <div id="gallery" class="flex items-center justify-center w-full aspect-[4/3] rounded overflow-hidden relative">
                <a class=" w-full h-full" href="{{ asset('storage/images/gallery/' . $item->image)}}" data-caption="{{$item->image_alt}}" aria-label="{{$item->image_alt}}">
                    <div class="absolute w-full h-full top-0 left-0 duration-300 hover:bg-black/30 z-10"></div>
                    <div x-data="{ src: '{{ asset('storage/images/gallery/' . $item->image) }}', isLoading: true, observer: null }"
                        x-init="() => {
                        observer = new IntersectionObserver(entries => {
                            entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const img = new Image();
                                img.src = '{{ asset('storage/images/gallery/' . $item->image) }}';
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
                        class="relative w-full h-full flex items-center object-cover">
                    
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
                            class="w-full h-full object-cover"
                            alt="{{$item->image_alt}}">
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
<script>
    window.onload = function() {
        Fancybox.bind('#gallery a', {
            groupAll: true,
        });
    };
</script>
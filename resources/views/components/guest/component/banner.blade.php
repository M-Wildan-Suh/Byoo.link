@props(['banner', 'templatecolor', 'slug', 'modalstatus'])
<div x-data="{banner: {{ $modalstatus ? 'true' : 'false' }}}" :class="admin ? 'hover:border hover:border-green-500' : 'border-transparent' " class=" w-full h-72 relative">
    <button x-show="admin" x-show="admin" @click="banner = true" 
        class=" absolute top-14 right-8 w-4 aspect-square text-white hover:text-green-500 duration-300 z-10">
        <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" fill="currentColor" fill-rule="evenodd" class="fill-000000"></path></svg>
    </button>

    {{-- Banner Edit --}}
    @include('admin.banner.edit')

    <div class="swiper h-full">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($banner as $item)
                <div class="swiper-slide">
                    <div x-data="{ src: '{{ asset('storage/images/banner/' . $item->image) }}', isLoading: true, observer: null }"
                        x-init="() => {
                        observer = new IntersectionObserver(entries => {
                            entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const img = new Image();
                                img.src = '{{ asset('storage/images/banner/' . $item->image) }}';
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
                            class="object-cover min-w-full min-h-full"
                            alt="{{$item->image_alt}}">
                    </div>
                </div>
            @endforeach
        </div>
        <div class=" w-full h-full bg-black/40 absolute top-0 left-0 z-10"></div>
        <div class=" absolute bottom-0 flex justify-between pb-6 px-8 z-10 w-full items-center">
            <!-- If we need pagination -->
            <div class="">
                <div class="pagination"></div>
            </div>
        
            <!-- If we need navigation buttons -->
            <div class=" flex flex-row gap-2">
                <div style="border-color: {{$templatecolor->second_color ?? '#EAB653'}}" class="prev p-1 border-2 rounded-full bg-black/40">
                    <div style="color: {{$templatecolor->second_color ?? '#EAB653'}}" class=" w-5 h-5">
                        <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect fill="none" height="256" width="256"/><polyline fill="none" points="160 208 80 128 160 48" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/></svg>
                    </div>
                </div>
                <div style="border-color: {{$templatecolor->second_color ?? '#EAB653'}}" class="next p-1 border-2 rounded-full bg-black/40">
                    <div style="color: {{$templatecolor->second_color ?? '#EAB653'}}" class=" w-5 h-5">
                        <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect fill="none" height="256" width="256"/><polyline fill="none" points="96 48 176 128 96 208" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/></svg>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>
<style>
    .swiper-pagination-bullet-active{
        background: {{$templatecolor->second_color ?? '#EAB653'}};
    }
</style>
<script>
    window.addEventListener('load', function() {
        const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,

        // If we need pagination
        pagination: {
            el: '.pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.next',
            prevEl: '.prev',
        },
        });
    });
</script>
<!-- Modal Background -->
<div x-show="whatsappmodal || detailmodal" x-transition:enter="transition ease-out duration-300"
x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/30 z-20">
</div>

<!-- Modal 1 -->
<div x-show="whatsappmodal" x-transition:enter="transition ease-out duration-300"
x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
x-transition:leave="transition ease-in duration-300"
x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
class="fixed inset-0 flex items-center justify-center z-30 px-4">
<!-- Modal Content -->
<div @click.outside="whatsappmodal = false"
    style="border-color: {{$color}}"
    class="bg-white w-full max-w-[388px] p-4 rounded-md border-2 relative">
    <button @click="whatsappmodal = false"
        class=" absolute top-4 right-4 w-7 h-7 p-2 rounded-full bg-black/30 text-white hover:text-red-500 duration-300 z-20">
        <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
            enable-background="new 0 0 512 512">
            <path
                d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                fill="currentColor" class="fill-000000"></path>
        </svg>  
    </button>
    <h2 class=" text-lg font-bold mb-4 text-black">Ingin bertanya mengenai Product?</h2>
    <p class="text-gray-600 mb-4 text-sm">Permisi, saya ingin bertanya mengenai ketersediaan
        product {{ $item->name }}?</p>
    <div class="flex justify-end">
        <a href="https://wa.me/{{$notlp}}?text=Permisi, saya ingin bertanya mengenai ketersediaan product {{ $item->name }}?">
            <div class=" w-20">
                <button style="background-color: {{ $color}}" class=" w-full px-3 py-2 text-sm rounded-md text-white font-semibold hover:scale-95 duration-300">Kirim</button>
            </div>
        </a>
    </div>
</div>
</div>

<!-- Modal 2 -->
<div x-show="detailmodal" x-transition:enter="transition ease-out duration-300"
x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
x-transition:leave="transition ease-in duration-300"
x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
class="fixed inset-0 flex items-center justify-center z-30 px-4">
<!-- Modal Content -->
<div @click.outside="detailmodal = false"
    style="border-color: {{$color}}"
    class="bg-white w-full max-w-[388px] rounded-md shadow-lg overflow-hidden border-2">
    <div class=" w-full h-full relative">
        <button @click="detailmodal = false"
            class=" absolute top-4 right-4 w-7 h-7 p-2 rounded-full bg-black/30 text-white hover:text-red-500 duration-300 z-20">
            <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                enable-background="new 0 0 512 512">
                <path
                    d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                    fill="currentColor" class="fill-000000"></path>
            </svg>  
        </button>
        <div class="pt-4 px-4">
            <div class=" w-full aspect-square rounded-md overflow-hidden">
                <div x-data="{ src: '{{ $item->image }}', isLoading: true, observer: null }"
                    x-init="() => {
                    observer = new IntersectionObserver(entries => {
                        entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = new Image();
                            img.src = '{{ $item->image }}';
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
                        class="object-cover w-full h-full"
                        alt="{{$item->image_alt}}">
                </div>
            </div>
        </div>
        <div class=" col-span-2 flex flex-col gap-1 p-4">
            <h2 class=" text-lg font-bold mb-1 text-black">{{$item->name}}</h2>
            @if ($item->price)
                <p class="text-gray-600 text-sm">Rp. {{ str_replace(',', '.', number_format($item->price))}}
                </p>
            @endif
            <p class="text-gray-600 text-sm text-justify line-clamp-[7]">{{$item->description}}</p>
        </div>
    </div>
</div>
</div>
<div class=" w-full grid grid-cols-1 gap-4 pt-2">
    @foreach ($take ? $product->take($take) : $product as $item)
        <div style="border-color: {{ $color }};"
            class=" flex flex-row w-full border-2 bg-white/80 rounded-md overflow-hidden p-2 gap-2 justify-between relative">
            {{-- Image --}}
            <div class="relative min-w-24 w-24 h-24 rounded-md flex items-center overflow-hidden" 
                x-data="{ src: '{{ $item->image }}', isLoading: true, observer: null }"
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
                }">
            
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
            {{-- Data --}}
            <div class=" flex flex-col justify-end flex-grow text-left pt-1">
                <div class=" h-12 flex justify-center flex-col gap-1">
                    <p class=" font-bold line-clamp-1 {{$item->price ? 'text-sm' : 'text-lg'}}">{{ $item->name }}</p>
                    @if ($item->price)
                        <p class=" font-medium">Rp. {{ str_replace(',', '.', number_format($item->price))}}</p>
                    @endif
                </div>
                <p class=" text-sm line-clamp-2 w-[calc(100%-80px)] min-h-10">{{$item->description}}</p>
            </div>
            {{-- Modal --}}
            <div x-data="{ whatsappmodal: false, detailmodal: false }"
                class=" absolute right-2 bottom-2 flex flex-row justify-between gap-2">
                <!-- Button 1 -->
                <div style="background-color: {{ $color}}"
                    class=" w-8 h-8 rounded duration-300 hover:scale-95 col-start-2">
                    <button @click="whatsappmodal = true" aria-label="WhatsApp" class="w-full h-full p-2">
                        <div style="color: {{ $color}}">
                            <svg viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
                                <g fill="none" fill-rule="evenodd">
                                    <path
                                        d="M30 60c16.569 0 30-13.431 30-30C60 13.431 46.569 0 30 0 13.431 0 0 13.431 0 30c0 16.569 13.431 30 30 30Z"
                                        fill="#ffffff" class="fill-000000"></path>
                                    <path
                                        d="M30.071 46.221a16.34 16.34 0 0 1-7.885-2.014l-9.032 2.87 2.944-8.685a16.022 16.022 0 0 1-2.34-8.358c0-8.94 7.303-16.188 16.314-16.188 9.009 0 16.313 7.247 16.313 16.188 0 8.94-7.304 16.187-16.314 16.187Zm0-29.797c-7.563 0-13.715 6.105-13.715 13.61 0 2.977.97 5.735 2.612 7.979l-1.713 5.054 5.27-1.675a13.708 13.708 0 0 0 7.546 2.251c7.562 0 13.716-6.105 13.716-13.609s-6.154-13.61-13.716-13.61Zm8.238 17.338c-.1-.165-.367-.265-.766-.463-.4-.199-2.367-1.159-2.733-1.29-.367-.133-.634-.2-.9.198-.266.397-1.033 1.29-1.267 1.555-.233.265-.466.298-.866.1-.4-.199-1.688-.618-3.216-1.97-1.188-1.051-1.991-2.35-2.224-2.747-.233-.397-.025-.612.175-.81.18-.177.4-.463.6-.694.2-.232.267-.397.4-.662s.067-.496-.033-.695c-.1-.199-.9-2.151-1.234-2.946-.333-.794-.665-.661-.9-.661-.233 0-.5-.034-.766-.034s-.7.1-1.066.497c-.367.397-1.4 1.357-1.4 3.31 0 1.952 1.433 3.838 1.633 4.102.2.265 2.766 4.402 6.83 5.99 4.067 1.589 4.067 1.059 4.8.993.733-.066 2.365-.96 2.7-1.886.332-.927.332-1.722.233-1.887Z"
                                        fill="currentColor" class="fill-ffffff"></path>
                                </g>
                            </svg>
                        </div>
                    </button>
                </div>
                <!-- Button 2 -->
                <div style="background-color: {{ $color}}"
                    class=" w-8 h-8 rounded duration-300 hover:scale-95">
                    <button @click="detailmodal = true" aria-label="View" class="w-full h-full p-2">
                        <svg viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"
                                fill="#ffffff" class="fill-000000"></path>
                        </svg>
                    </button>
                </div>
                @include('components.guest.component.product.modal')
            </div>
        </div>
    @endforeach
</div>
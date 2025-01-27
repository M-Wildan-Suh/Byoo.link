@props(['background', 'templatecolor', 'article', 'class', 'title', 'slug', 'amount'])
<div style="background-color: {{ $background ?? 'gray' }}"
    class=" flex flex-col gap-4 justify-center items-center py-12 px-4">
    <p class="text-2xl {{$class}}">{{$title ?? 'Produk Kami'}}</p>
    <div style="background-color: {{ $templatecolor->second_color ?? 'darkgray' }}" class=" w-10 h-[4px]"></div>
    <div class=" w-full grid grid-cols-1 gap-4 pt-2">
        @php
            // Menentukan jumlah produk yang akan diambil berdasarkan variabel amount
            $articles = ($amount === 'all') ? $article : $article->take(is_numeric($amount) ? $amount : 4);
        @endphp
        @foreach ($articles as $item)
            <div class=" w-full shadow-md shadow-black/20 p-3 rounded-md flex flex-row gap-3">
                <div class=" h-24 aspect-square bg-blue-500 rounded-md">
                    <div x-data="{ src: '{{ asset('storage/images/article/' . $item->articled->image) }}', isLoading: true, observer: null }"
                        x-init="() => {
                        observer = new IntersectionObserver(entries => {
                            entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const img = new Image();
                                img.src = '{{ asset('storage/images/article/' . $item->articled->image) }}';
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
                            class="object-contain w-full h-auto"
                            alt="{{$item->image_alt}}">
                    </div>
                </div>
                <div class=" flex-grow flex flex-col justify-between">
                    <p class=" font-medium line-clamp-1">{{$item->title}}</p>
                    <p class="text-xs text-neutral-600 line-clamp-2">{!! nl2br($item->title == '' ? '' : $item->title) !!}</p>
                    <div class=" flex flex-row justify-between items-end">
                        <p class="text-[10px] text-neutral-500">{{$item->created_at->format('d M Y')}}</p>
                        <a href="{{route('article.show', ['slug'=>$slug, 'title'=>Str::slug($item->title)])}}">
                            <button style="border-color: {{$templatecolor->second_color}}" class=" viewall text-xs border py-1 px-3 rounded-full hover:border-transparent hover:text-white duration-300">View More</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        <style>
            .viewall:hover {
                background-color: {{$templatecolor->main_color}};
            }
        </style>
    </div>
</div>

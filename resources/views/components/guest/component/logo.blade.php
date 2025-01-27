@props(['image', 'slug'])
<div x-data="{ logo: false }" :class="admin ? 'hover:border-green-500' : ''"
    class=" w-full mx-auto h-20 flex items-center justify-center border border-transparent relative">
    <button x-show="admin" @click="logo = true"
        class="absolute top-1.5 right-8 w-4 aspect-square text-black hover:text-green-500 duration-300 z-10">
        <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4 1 0 1.4-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z"
                fill="currentColor" fill-rule="evenodd" class="fill-000000"></path>
        </svg>
    </button>

    {{-- Logo Edit --}}
    @include('admin.logo.edit')

    {{-- Image --}}
    <div x-data="{
        src: null,
        isLoading: true,
        observer: null
    }" x-init="() => {
        observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = new Image();
                    img.src = '{{ $image }}';
                    img.onload = () => {
                        src = img.src;
                        isLoading = false;
                    };
                    observer.disconnect();
                }
            });
        });
        observer.observe($el);
    }" class="relative w-full h-full flex items-center">

        <!-- Placeholder / Loader -->
        <div x-show="isLoading" class="absolute inset-0 flex items-center justify-center">
            <svg class="animate-spin h-8 w-8 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
        </div>

        <!-- Image -->
        <img :src="src" x-show="!isLoading" class="object-contain w-full h-full max-h-full max-w-full"
            alt="">
    </div>
</div>

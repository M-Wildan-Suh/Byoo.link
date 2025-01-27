<!-- Modal -->
<div x-show="banner" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-20 px-4"
x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

<!-- Modal Banner -->
<div @click.away="banner = false" class="w-full max-w-[720px] bg-white pb-6 rounded-md flex flex-col gap-4 relative overflow-hidden border-2 border-byolink-1">
    <div class=" pt-6 pb-3 bg-byolink-1 text-white z-30">
        <h2 class=" px-6 text-2xl font-bold">Edit Banner</h2>
        <button @click="banner = false"
            class=" absolute top-6 right-6 w-6 h-6 text-white hover:text-red-500 duration-300">
            <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                enable-background="new 0 0 512 512">
                <path
                    d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                    fill="currentColor" class="fill-000000"></path>
            </svg>
        </button>
    </div>
    <div class=" space-y-3 px-6">
        <div class=" w-full grid grid-cols-3 sm:grid-cols-5 gap-3">
            @foreach ($banner as $item)
                <div class=" w-full aspect-[3/2] rounded-md overflow-hidden relative">
                    <form action="{{route('banner.destroy', ['slug' => $slug, 'banner' => $item->id])}}" class=" w-full h-full" method="post">
                        @csrf
                        @method('DELETE')
                        <img src="{{ asset('storage/images/banner/' . $item->image) }}" class=" w-full h-full object-cover" alt="{{$item->image_alt}}" srcset="">
                        <button class=" w-full h-full text-red-500/90 bg-black/20 absolute top-0 left-0 flex justify-center items-center p-[20%] hover:bg-black/60 hover:text-white/50 duration-300">
                            <svg viewBox="0 0 24 24" class="w-full h-full" xmlns="http://www.w3.org/2000/svg"><path d="M19.5 8.99h-15a.5.5 0 0 0-.5.5v12.5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9.49a.5.5 0 0 0-.5-.5Zm-9.25 11.5a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0Zm5 0a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0ZM20.922 4.851a11.806 11.806 0 0 0-4.12-1.07 4.945 4.945 0 0 0-9.607 0A12.157 12.157 0 0 0 3.18 4.805 1.943 1.943 0 0 0 2 6.476 1 1 0 0 0 3 7.49h18a1 1 0 0 0 1-.985 1.874 1.874 0 0 0-1.078-1.654ZM11.976 2.01A2.886 2.886 0 0 1 14.6 3.579a44.676 44.676 0 0 0-5.2 0 2.834 2.834 0 0 1 2.576-1.569Z" fill="currentColor" class="fill-000000"></path></svg>
                        </button>
                    </form>
                </div>
            @endforeach
            <div class="w-full aspect-[3/2] border bg-neutral-100 border-neutral-600 rounded-md relative border-dashed overflow-hidden">
                <label for="image_banner" class="w-full text-neutral-600 h-full absolute top-0 left-0 flex justify-center items-center p-[20%] hover:bg-neutral-600 hover:text-white/50 duration-300 cursor-pointer">
                    <svg viewBox="0 0 24 24" class="w-full h-full" xmlns="http://www.w3.org/2000/svg"><path d="m9 13 3-4 3 4.5V12h4V5c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h8v-4H5l3-4 1 2z" fill="currentColor" class="fill-000000"></path><path d="M19 14h-2v3h-3v2h3v3h2v-3h3v-2h-3z" fill="currentColor" class="fill-000000"></path></svg>
                </label>
            </div>
            <div class=" hidden">
                <form 
                    x-data @submit.prevent="submitForm" x-ref="form" action="{{ route('banner.store', ['slug' => $slug]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="image_banner" name="image_banner" class="hidden" @change="$refs.form.submit()">
                </form>

            </div>
        </div>
    </div>

    <div class=" pt-4">
        <div class=" px-6 w-full flex justify-end items-center gap-4">
            <button class="py-2 px-4 bg-byolink-2 text-white rounded hover:bg-black duration-300">
                Simpan
            </button>
        </div>
    </div>
</div>
</div>
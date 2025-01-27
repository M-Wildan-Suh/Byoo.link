<!-- Modal -->
<div x-show="tag" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 px-4 max-h-screen py-4"
x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <!-- Modal Tag -->
    <div @click.away="tag = false" class="w-full max-w-[720px] max-h-[calc(100vh-16px)] bg-white pb-6 text-left rounded-md flex flex-col gap-4 relative border-2 border-byolink-1">
        <div class=" pt-6 pb-3 bg-byolink-1 text-white z-30">
            <h2 class=" px-6 text-2xl font-bold">Edit Tag</h2>
            <button @click="tag = false"
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
            <form action="{{route('tag.store', ['slug' => $slug])}}" method="POST">
                @csrf
                <x-admin.component.sectiontitleinput placeholder="Masukkan Tag" value="" name="tag" submit="Tambah"></x-admin.component.sectiontitleinput>
            </form>
            <div class="w-full flex flex-row flex-wrap gap-2">
                @foreach ($tag as $item)
                    <div class=" flex flex-row cursor-default px-2 py-1 rounded-sm bg-byolink-1 text-white text-sm gap-2">
                        <p>{{$item->tag}}</p>
                        <form action="{{route('tag.destroy', ['slug' => $slug, 'tag' => $item->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class=" w-3 text-red-500">
                                <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                    enable-background="new 0 0 512 512">
                                    <path
                                        d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                                        fill="currentColor" class="fill-000000"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
            <form x-ref="tagform" action="{{route('tag.position', ['slug'=> $slug])}}" method="POST">
                @csrf
                <x-admin.component.radioinput title="Tag Position" :value="[['label'=>'Top', 'value'=>'top'], ['label'=>'Bottom', 'value'=>'bottom']]" :defaultvalue="$tagposition ?? ''" name="tag_position" />
            </form>
        </div>

        <div class=" pt-4">
            <div @click="$refs.tagform.submit()" class=" px-6 w-full flex justify-end items-center gap-4">
                <button class="py-2 px-4 text-sm sm:text-base bg-byolink-2 text-white rounded hover:bg-black duration-300">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>
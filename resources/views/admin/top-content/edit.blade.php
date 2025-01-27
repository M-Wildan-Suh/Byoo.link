<!-- Modal -->
<div x-show="topcontent" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 px-4 max-h-screen py-4"
x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <!-- Modal Top Content -->
    <div @click.away="topcontent = false" class="w-full max-w-[720px] max-h-[calc(100vh-16px)] bg-white pb-6 text-left rounded-md flex flex-col gap-4 relative border-2 border-byolink-1">
        <div class=" pt-6 pb-3 bg-byolink-1 text-white z-30">
            <h2 class=" px-6 text-2xl font-bold">Edit Top Content</h2>
            <button @click="topcontent = false"
                class=" absolute top-6 right-6 w-6 h-6 text-white hover:text-red-500 duration-300">
                <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                    enable-background="new 0 0 512 512">
                    <path
                        d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                        fill="currentColor" class="fill-000000"></path>
                </svg>
            </button>
        </div>
        <form action="{{route('top.content.edit', ['slug' => $data->url])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class=" space-y-3 px-6">
                <div class=" w-full grid grid-cols-2 sm:grid-cols-3 gap-3 sm:gap-6">
                    <div class="w-full rounded-md relative overflow-hidden max-h-[160.8px]">
                        <x-admin.component.imageinput value="{{ ($data->logo ?? '') != '' ? asset('storage/images/logo/' . $data->logo) : asset('assets/images/placeholder.webp') }}" name="logo" status="required" />
                    </div>
                    <div class=" sm:col-span-2 space-y-3">
                        <x-admin.component.textinput title="Judul" placeholder="Masukkan Judul..." :value="$data->content->top_title ?? 'Customer Service'" name="top_title" />
                        <x-admin.component.linkinput title="No Telephone" placeholder="Masukkan no hp..." :value="$data->content->top_no_tlp ?? ''" name="top_no_tlp" link="+62" />
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
        </form>
    </div>
</div>
<div class=" w-full" x-data="{ create: false }">
    <!-- Button to trigger modal -->
    <button @click="create = true"
        class="w-full text-sm sm:text-base sm:w-auto px-4 py-2 bg-byolink-1 text-white rounded-md font-semibold border border-byolink-1 hover:border-byolink-3 hover:bg-byolink-3 duration-300">
        Generate Voucher
    </button>

    <!-- Modal -->
    <div x-show="create"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-40 px-4 max-h-screen py-4"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        <!-- Modal Generate Voucher -->
        <div @click.away="create = false" class="w-full max-w-[720px] max-h-[calc(100vh-16px)] bg-white pb-6 text-left rounded-md flex flex-col gap-4 relative border-2 border-byolink-1">
            <div class=" pt-6 pb-3 bg-byolink-1 text-white z-30">
                <h2 class=" px-6 text-2xl font-bold">Generate Voucher</h2>
                <button @click="create = false"
                    class=" absolute top-6 right-6 w-6 h-6 text-white hover:text-red-500 duration-300">
                    <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                        enable-background="new 0 0 512 512">
                        <path
                            d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                            fill="currentColor" class="fill-000000"></path>
                    </svg>
                </button>
            </div>
            <form action="{{route('voucher.store')}}" method="POST">
                @csrf
                <div class=" space-y-3 px-6">
                    <div class=" w-full">
                        <div class=" flex flex-col gap-2 text-sm sm:text-base font-medium">
                            <label for="web_type_id">Tipe Web</label>
                            <select id="web_type_id" name="web_type_id" class=" text-sm sm:text-base font-normal rounded-md border border-byolink-1 focus:ring-byolink-3 focus:border-byolink-3 bg-neutral-100">
                                <option value="" selected disabled>Pilih tipe web</option>
                                @foreach ($web_type as $item)
                                    <option value="{{$item->id}}">{{$item->type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class=" pt-4">
                    <div class=" px-6 w-full flex justify-end items-center gap-4">
                        <button class="py-2 px-4 bg-byolink-2 text-white rounded hover:bg-black duration-300">
                            Generate
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<x-layout.user>
    <div class=" w-full pt-[88px]">
        <div class=" w-full pt-10 space-y-12 md:space-y-16 px-4 md:px-8">
            <div class=" w-full max-w-[1080px] mx-auto space-y-14">
                <div class="">
                    <p class=" text-center text-3xl font-black">Web Milik Anda</p>
                </div>
                <div x-data="Table()" class=" w-full space-y-8">
                    <div class=" w-full flex flex-col md:flex-row gap-4 items-center justify-between">
                        <div x-data="{ open: false }" class="w-full md:w-auto">
                            <!-- Tombol untuk membuka modal -->
                            <button 
                                @click="open = true" 
                                :class="open ? 'bg-black' : 'bg-byolink-2'"
                                class=" w-full md:w-auto py-2 px-5 text-lg font-black text-white rounded-md hover:bg-black duration-300">
                                Buat Web
                            </button>
                        
                            <!-- Modal -->
                            <div x-show="open"
                                x-transition:enter="transition-opacity ease-out duration-300"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition-opacity ease-in duration-300"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 px-4">
                                <div @click.outside="open = false" class=" w-full max-w-[720px] bg-white pb-6 rounded-md flex flex-col gap-8 relative overflow-hidden border-2 border-byolink-1">
                                    <button @click="open = false"  class=" absolute top-6 right-6 w-6 h-6 text-white hover:text-red-500 duration-300">
                                        <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512"><path d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z" fill="currentColor" class="fill-000000"></path></svg>
                                    </button>
                                    <div class=" pt-6 pb-3 bg-byolink-1 text-white">
                                        <h2 class=" px-6 text-2xl font-bold">Buat Web</h2>
                                    </div>
                                    <form action="{{route('web.generate')}}" method="post">
                                        @csrf
                                        <div class=" w-full space-y-8">
                                            <div class=" px-6 space-y-1">
                                                <x-admin.component.textinput title="Nama Web" placeholder="Masukkan nama..." :value="''" name="name" />
                                                <x-admin.component.linkinput title="Url" placeholder="Masukkan Url..." value="" name="url" link="{{ url('/') }}" />
                                                <x-admin.component.textinput title="Voucher" placeholder="Masukkan Voucher..." :value="''" name="kode" />
                                            </div>
            
                                            <div class=" px-6 w-full flex justify-end items-center gap-4">
                                                <a
                                                    href="{{route('template')}}"
                                                    class=" text-neutral-400 hover:text-neutral-600 hover:underline duration-300">
                                                    Tidak Memiliki Voucher
                                                </a>
                                                <button 
                                                    class="py-2 px-4 bg-byolink-2 text-white rounded hover:bg-black duration-300">
                                                    Buat Web
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class=" w-full md:w-auto flex flex-row justify-between md:justify-end items-center gap-2">
                            <p class=" text-lg" >Search : </p>
                            <input type="text" x-model="search" placeholder="masukkan nama web..." class="py-2 border-none ring-1 ring-neutral-400 focus:border-none focus:ring-1 focus:ring-byolink-1 rounded-md duration-300">
                        </div>
                    </div>
                    <div class=" w-full grid grid-cols-1 md:grid-cols-2 gap-6">
                        <template x-for="(item, index) in filteredData" :key="index">
                            <div class=" w-full bg-white shadow-md shadow-black/20 rounded-md grid grid-cols-1 lg:grid-cols-7 p-4 gap-4">
                                <div class=" lg:col-span-3 w-full aspect-video lg:aspect-auto">
                                    <img class=" w-full h-full object-contain"
                                        src="https://i0.wp.com/byo.my.id/wp-content/uploads/2023/08/Desain-Thumbnail-Basreng-Mamah-Gilang.png?w=542&ssl=1"
                                        alt="">
                                </div>
                                <div class=" lg:col-span-4 flex flex-col justify-between gap-2 py-3">
                                    <p class=" text-lg font-semibold" x-text="item.title"></p>
                                    <div class=" space-y-1">
                                        <p class=" text-neutral-600">Status : Admin</p>
                                        <p class=" text-neutral-600">Type Web : <span x-text="item.template"></span></p>
                                        <p class=" text-neutral-600">Url : <a  :href="item.url" class=" text-blue-500 hover:text-blue-900 duration-300 hover:underline">byo.link/<span x-text="item.url"></span></a></p>
                                    </div>
                                    <div class=" space-y-2">
                                        <a :href="item.url">
                                            <button class=" w-full py-2 border rounded-md border-neutral-400 hover:text-byolink-1 hover:border-byolink-1 duration-300">Lihat/Edit Web</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                    <script>
                        function Table() {
                            return {
                                data: @json($data), // Fetch data from the backend
                                search: '',
                                showModal: false,
                                confirmDeleteModal: false,
                                modalData: {},
                    
                                get filteredData() {
                                    if (this.search === '') {
                                        return this.data;
                                    }
                                    return this.data.filter(item => item.title.toLowerCase().includes(this.search.toLowerCase()));
                                },
                    
                                applySearch() {
                                    // Optional: Reset any other state if necessary
                                },
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <x-slot:additional>
        <div class=" w-full h-10">
            <svg id="visual" viewBox="0 0 1080 50" class=" w-full h-full" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"><path d="M0 27L16.3 24.7C32.7 22.3 65.3 17.7 98 16.5C130.7 15.3 163.3 17.7 196.2 21.7C229 25.7 262 31.3 294.8 33.7C327.7 36 360.3 35 393 33.7C425.7 32.3 458.3 30.7 491 26.3C523.7 22 556.3 15 589 15.5C621.7 16 654.3 24 687 28.5C719.7 33 752.3 34 785.2 31.2C818 28.3 851 21.7 883.8 19.5C916.7 17.3 949.3 19.7 982 19.5C1014.7 19.3 1047.3 16.7 1063.7 15.3L1080 14L1080 0L1063.7 0C1047.3 0 1014.7 0 982 0C949.3 0 916.7 0 883.8 0C851 0 818 0 785.2 0C752.3 0 719.7 0 687 0C654.3 0 621.7 0 589 0C556.3 0 523.7 0 491 0C458.3 0 425.7 0 393 0C360.3 0 327.7 0 294.8 0C262 0 229 0 196.2 0C163.3 0 130.7 0 98 0C65.3 0 32.7 0 16.3 0L0 0Z" fill="#f5f5f5"></path><path d="M0 49L16.3 47.8C32.7 46.7 65.3 44.3 98 42C130.7 39.7 163.3 37.3 196.2 37C229 36.7 262 38.3 294.8 40.3C327.7 42.3 360.3 44.7 393 44.2C425.7 43.7 458.3 40.3 491 38.2C523.7 36 556.3 35 589 34.5C621.7 34 654.3 34 687 34.8C719.7 35.7 752.3 37.3 785.2 36.5C818 35.7 851 32.3 883.8 31.8C916.7 31.3 949.3 33.7 982 35.5C1014.7 37.3 1047.3 38.7 1063.7 39.3L1080 40L1080 12L1063.7 13.3C1047.3 14.7 1014.7 17.3 982 17.5C949.3 17.7 916.7 15.3 883.8 17.5C851 19.7 818 26.3 785.2 29.2C752.3 32 719.7 31 687 26.5C654.3 22 621.7 14 589 13.5C556.3 13 523.7 20 491 24.3C458.3 28.7 425.7 30.3 393 31.7C360.3 33 327.7 34 294.8 31.7C262 29.3 229 23.7 196.2 19.7C163.3 15.7 130.7 13.3 98 14.5C65.3 15.7 32.7 20.3 16.3 22.7L0 25Z" fill="#aab9f7"></path><path d="M0 51L16.3 51C32.7 51 65.3 51 98 51C130.7 51 163.3 51 196.2 51C229 51 262 51 294.8 51C327.7 51 360.3 51 393 51C425.7 51 458.3 51 491 51C523.7 51 556.3 51 589 51C621.7 51 654.3 51 687 51C719.7 51 752.3 51 785.2 51C818 51 851 51 883.8 51C916.7 51 949.3 51 982 51C1014.7 51 1047.3 51 1063.7 51L1080 51L1080 38L1063.7 37.3C1047.3 36.7 1014.7 35.3 982 33.5C949.3 31.7 916.7 29.3 883.8 29.8C851 30.3 818 33.7 785.2 34.5C752.3 35.3 719.7 33.7 687 32.8C654.3 32 621.7 32 589 32.5C556.3 33 523.7 34 491 36.2C458.3 38.3 425.7 41.7 393 42.2C360.3 42.7 327.7 40.3 294.8 38.3C262 36.3 229 34.7 196.2 35C163.3 35.3 130.7 37.7 98 40C65.3 42.3 32.7 44.7 16.3 45.8L0 47Z" fill="#3b82f6"></path></svg>
        </div>
    </x-slot:additional>
</x-layout.user>

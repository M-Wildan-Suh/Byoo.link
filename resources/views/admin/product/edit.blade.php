<!-- Modal -->
<div x-show="product" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-40 px-4"
x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <!-- Modal Product -->
    <div x-data="auctionTable()" class="w-full max-w-[720px] bg-white pb-6 rounded-md flex flex-col gap-4 relative overflow-hidden border-2 border-byolink-1">
        <div class=" pt-6 pb-3 bg-byolink-1 text-white z-30">
            <h2 class=" px-6 text-2xl font-bold">Edit Product</h2>
            <button @click="product = false"
                class=" absolute top-6 right-6 w-6 h-6 text-white hover:text-red-500 duration-300">
                <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                    enable-background="new 0 0 512 512">
                    <path
                        d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                        fill="currentColor" class="fill-000000"></path>
                </svg>
            </button>
        </div>
        <div>
            <div x-show="tab == 'table'" class="w-full px-6 flex flex-col gap-3 min-h-[312.8px] sm:min-h-[332.8px]">
                <div class=" w-full grid grid-cols-1 sm:grid-cols-2 gap-1 sm:gap-3">
                    <div class=" w-full">
                        <form action="{{route('product.title', ['slug'=>$slug])}}" method="post">
                            @csrf
                            <x-admin.component.sectiontitleinput placeholder="Judul Section" value="{{$title ?? ''}}" name="product_title" slug="{{$slug}}"></x-admin.component.sectiontitleinput>
                        </form>
                    </div>
                    <div class=" w-full">
                        <form action="{{route('product.tlp', ['slug'=>$slug])}}" method="post">
                            @csrf
                            <x-admin.component.sectiontitleinput placeholder="No. Telephone" value="{{$notlp ?? ''}}" name="product_tlp" slug="{{$slug}}"></x-admin.component.sectiontitleinput>
                        </form>
                    </div>
                </div>
                <!-- Table -->
                <div class="w-full max-h-[218.4px] sm:max-h-[277.6px] overflow-auto">
                    <table class="w-full text-sm sm:text-base rounded-md overflow-hidden">
                        <thead>
                            <tr class="h-10 bg-byolink-1 text-white divide-x-2 divide-white">
                                <th class=" px-1 sm:px-2 py-1 w-1/3">Nama/Tipe</th>
                                <th class=" px-1 sm:px-2 py-1 w-1/3">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="(item, index) in data" :key="index">
                                <tr :class="index % 2 === 0 ? 'bg-neutral-100' : 'bg-neutral-200'"
                                    class="h-10 text-neutral-600 divide-x-2 divide-white">
                                    <td class=" px-2 sm:px-4 py-2 text-center font-semibold line-clamp-1 text-nowrap" x-text="item.name"></td>
                                    <td class=" px-1 sm:px-2">
                                        <div class="flex gap-2 justify-center">
                                            <!-- Detail -->
                                            {{-- <button @click="showDetail(item)" class="w-5 h-5 hover:text-blue-500 duration-300">
                                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm-.5 3A1.5 1.5 0 1 1 10 6.5 1.5 1.5 0 0 1 11.5 5ZM14 18h-1a2 2 0 0 1-2-2v-4a1 1 0 0 1 0-2h1a1 1 0 0 1 1 1v5h1a1 1 0 0 1 0 2Z"
                                                        fill="currentColor" class="fill-464646"></path>
                                                </svg>
                                            </button> --}}
        
                                            <!-- Edit -->
                                            <button @click="editForm(item)"
                                                class="w-5 h-5 hover:text-green-500 duration-300">
                                                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3 17.75A3.25 3.25 0 0 0 6.25 21h4.915l.356-1.423c.162-.648.497-1.24.97-1.712l5.902-5.903a3.279 3.279 0 0 1 2.607-.95V6.25A3.25 3.25 0 0 0 17.75 3H11v4.75A3.25 3.25 0 0 1 7.75 11H3v6.75ZM9.5 3.44 3.44 9.5h4.31A1.75 1.75 0 0 0 9.5 7.75V3.44Zm9.6 9.23-5.903 5.902a2.686 2.686 0 0 0-.706 1.247l-.458 1.831a1.087 1.087 0 0 0 1.319 1.318l1.83-.457a2.685 2.685 0 0 0 1.248-.707l5.902-5.902A2.286 2.286 0 0 0 19.1 12.67Z"
                                                        fill="currentColor" class="fill-212121"></path>
                                                </svg>
                                            </button>
        
                                            <!-- Delete -->
                                            <button @click="confirmDelete(item)"
                                                class="w-5 h-5 hover:text-red-500 duration-300">
                                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.5 8.99h-15a.5.5 0 0 0-.5.5v12.5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9.49a.5.5 0 0 0-.5-.5Zm-9.25 11.5a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0Zm5 0a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0ZM20.922 4.851a11.806 11.806 0 0 0-4.12-1.07 4.945 4.945 0 0 0-9.607 0A12.157 12.157 0 0 0 3.18 4.805 1.943 1.943 0 0 0 2 6.476 1 1 0 0 0 3 7.49h18a1 1 0 0 0 1-.985 1.874 1.874 0 0 0-1.078-1.654ZM11.976 2.01A2.886 2.886 0 0 1 14.6 3.579a44.676 44.676 0 0 0-5.2 0 2.834 2.834 0 0 1 2.576-1.569Z"
                                                        fill="currentColor" class="fill-000000"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
                <!-- Delete Confirmation Modal -->
                <div x-show="confirmDeleteModal"
                    class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-40">
                    <div @click.away="confirmDeleteModal = false" class="w-full max-w-[320px] bg-white pb-6 rounded-md flex flex-col gap-4 relative overflow-hidden border-2 border-byolink-1">
                        <button @click="confirmDeleteModal = false"
                            class=" absolute top-6 right-6 w-6 h-6 text-white hover:text-red-500 duration-300">
                            <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                enable-background="new 0 0 512 512">
                                <path
                                    d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                                    fill="currentColor" class="fill-000000"></path>
                            </svg>
                        </button>
                        <div class=" pt-6 pb-3 bg-byolink-1 text-white">
                            <h2 class=" px-6 text-2xl font-bold">!!!</h2>
                        </div>
                        <p class="px-6 text-base">Anda akan menghapus data : <span class=" line-clamp-1 text-red-500 font-bold" x-text="deletedData.name"></span></p>
                        <div class="flex justify-end space-x-4 px-6">
                            {{-- <button @click="confirmDeleteModal = false"
                                class="px-4 py-2 bg-neutral-600 duration-300 hover:bg-byolink-1 text-white rounded">Cancel</button> --}}
                            <form :action="`{{ route('product.destroy', ['slug' => $slug, 'product' => '/']) }}/${deletedData.id}`" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-2 bg-red-500 duration-300 hover:bg-red-900 text-white rounded">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="tab == 'create'" class="w-full px-6 flex flex-col gap-3">
                <form x-ref="createForm" action="{{route('product.store', ['slug' => $slug])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=" space-y-3">
                        <div class=" w-full grid grid-cols-2 sm:grid-cols-3 gap-3 sm:gap-6">
                            <div class="w-full rounded-md relative overflow-hidden max-h-[160.8px]">
                                <x-admin.component.imageinput :value="''" name="product_image" status="required" />
                            </div>
                            <div class=" sm:col-span-2 space-y-3">
                                <x-admin.component.textinput title="Nama Product" placeholder="Masukkan Judul..." :value="''" name="name" />
                                <x-admin.component.priceinput title="Harga ( opsional )" placeholder="Masukkan harga..." :value="''" name="price" />

                            </div>
                        </div>
                        <x-admin.component.textareainput title="Deskripsi" placeholder="Masukkan Deskripsi" :value="$description ?? ''" name="description" />
                    </div>
                </form>
            </div>
            <div x-show="tab == 'edit'" class="w-full px-6 flex flex-col gap-3">
                <form x-ref="editForm" :action="`{{ route('product.update', ['slug' => $slug, 'product' => '/']) }}/${editData.id}`" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class=" space-y-3">
                        <div class=" w-full grid grid-cols-2 sm:grid-cols-3 gap-3 sm:gap-6">
                            <div class="w-full rounded-md relative overflow-hidden max-h-[160.8px]">
                                <x-admin.component.imageinput :value="''" name="product_image_edit" x-model="editData.image" />
                            </div>
                            <div class=" sm:col-span-2 space-y-3">
                                <x-admin.component.textinput title="Nama Produk" placeholder="Masukkan Judul..." :value="''" name="name" x-model="editData.name" />
                                <x-admin.component.priceinput title="Harga ( opsional )" placeholder="Masukkan harga..." :value="''" name="price"  x-model="editData.price" />
                            </div>
                        </div>
                        <x-admin.component.textareainput title="Deskripsi" placeholder="Masukkan Deskripsi" :value="''" x-model="editData.description" name="description" />
                    </div>
                </form>
            </div>
        </div>

        <div class=" sm:pt-4">
            <div class=" px-6 w-full flex flex-col-reverse sm:flex-row justify-between items-center gap-4">
                <div class=" grid grid-cols-2 gap-3 w-full sm:w-auto">
                    <button @click="tab = 'table'" :class="tab == 'table'? 'bg-black' : 'bg-byolink-2 hover:bg-black'" class=" text-sm sm:text-base py-2 px-2 ms:px-4 text-white rounded duration-300">
                        Tabel
                    </button>
                    <button @click="tab = 'create'" :class="tab == 'create' ? 'bg-black' : 'bg-byolink-2 hover:bg-black'" class=" text-sm sm:text-base py-2 px-2 ms:px-4 text-white rounded duration-300">
                        Tambah Data
                    </button>
                </div>
                <button 
                    @click="tab === 'table' ? (product = false) : (tab === 'create' ? $refs.createForm.submit() : $refs.editForm.submit())" 
                    class="text-sm sm:text-base w-full sm:w-auto py-2 px-4 bg-byolink-2 text-white rounded hover:bg-black duration-300">
                    
                    <span x-text="tab === 'table' ? 'Tutup' : 'Simpan'"></span>
                </button>
            </div>
        </div>
        <script>
            function auctionTable() {
                return {
                    data: @json($product), // Fetch data from the backend
                    tab: 'table',
                    search: '',
                    confirmDeleteModal: false,
                    deletedData: {},
                    editData: {},

                    confirmDelete(item) {
                        this.deletedData = item;
                        this.confirmDeleteModal = true;
                    },
                    editForm(item) {
                        this.editData = JSON.parse(JSON.stringify(item));
                        this.tab = 'edit';
                    }
                }
            }
        </script>
    </div>
</div>
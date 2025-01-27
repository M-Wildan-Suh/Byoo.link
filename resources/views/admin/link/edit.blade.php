<!-- Modal -->
<div x-show="link" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 px-4 max-h-screen py-4"
x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <!-- Modal Link -->
    <div x-data="{modaldata : null, form : 'create'}" @click.away="link = false" class="w-full max-w-[720px] max-h-[calc(100vh-16px)] bg-white pb-6 text-left rounded-md flex flex-col gap-4 relative border-2 border-byolink-1">
        <div class=" pt-6 pb-3 bg-byolink-1 text-white z-30">
            <h2 class=" px-6 text-2xl font-bold">Edit Link</h2>
            <button @click="link = false"
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
            <div class=" space-y-2">
                <p class="">Data</p>
                <div class=" w-full grid grid-cols-2 sm:grid-cols-4 gap-3">
                    @foreach ($link as $item)
                        <div class=" w-full bg-byolink-1 rounded-md py-2 text-center text-white font-black relative">
                            <p>{{$item->type}}</p>
                            <button @click="form = 'edit'; modaldata = {{ json_encode($item) }}"
                                class="w-5 h-5 hover:text-green-500 duration-300 absolute left-2 top-2.5">
                                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3 17.75A3.25 3.25 0 0 0 6.25 21h4.915l.356-1.423c.162-.648.497-1.24.97-1.712l5.902-5.903a3.279 3.279 0 0 1 2.607-.95V6.25A3.25 3.25 0 0 0 17.75 3H11v4.75A3.25 3.25 0 0 1 7.75 11H3v6.75ZM9.5 3.44 3.44 9.5h4.31A1.75 1.75 0 0 0 9.5 7.75V3.44Zm9.6 9.23-5.903 5.902a2.686 2.686 0 0 0-.706 1.247l-.458 1.831a1.087 1.087 0 0 0 1.319 1.318l1.83-.457a2.685 2.685 0 0 0 1.248-.707l5.902-5.902A2.286 2.286 0 0 0 19.1 12.67Z"
                                        fill="currentColor" class="fill-212121"></path>
                                </svg>
                            </button>
                            <form action="{{route('link.destroy', ['slug'=>$slug, 'link'=>$item->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="w-5 h-5 hover:text-red-500 duration-300 absolute right-2 top-2.5">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.5 8.99h-15a.5.5 0 0 0-.5.5v12.5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9.49a.5.5 0 0 0-.5-.5Zm-9.25 11.5a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0Zm5 0a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0ZM20.922 4.851a11.806 11.806 0 0 0-4.12-1.07 4.945 4.945 0 0 0-9.607 0A12.157 12.157 0 0 0 3.18 4.805 1.943 1.943 0 0 0 2 6.476 1 1 0 0 0 3 7.49h18a1 1 0 0 0 1-.985 1.874 1.874 0 0 0-1.078-1.654ZM11.976 2.01A2.886 2.886 0 0 1 14.6 3.579a44.676 44.676 0 0 0-5.2 0 2.834 2.834 0 0 1 2.576-1.569Z"
                                            fill="currentColor" class="fill-000000"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            <form x-show="form == 'create'" x-ref="linkcreateform" action="{{route('link.store', ['slug'=>$slug])}}" method="POST">
                @csrf
                <div class=" w-full grid grid-cols-2 gap-2">
                    <div class=" w-full">
                        <div class="flex flex-col gap-2 text-sm sm:text-base font-medium">
                            <label for="type">Sosmed</label>
                            <select name="type" class="text-sm sm:text-base font-normal rounded-md border border-byolink-1 focus:ring-byolink-3 focus:border-byolink-3 bg-neutral-100" id="type" >
                                <option value="" selected disabled>Pilih Sosmed</option>
                                <option value="tiktok">Tiktok</option>
                                <option value="youtube">Youtube</option>
                                <option value="instagram">Instagram</option>
                                <option value="twiter">Twiter</option>
                                <option value="facebook">Facebook</option>
                            </select>
                        </div>
                    </div>
                    <x-admin.component.linkinput title="Sosmed Url" placeholder="Masukkan link..." value="" name="url" link="Url" />
                </div>
            </form>
            <form x-show="form == 'edit'" x-ref="linkeditform" :action="`{{ route('link.update', ['slug' => $slug, 'link' => '/']) }}/${modaldata.id}`" method="POST">
                @csrf
                @method('PUT')
                <div class=" w-full grid grid-cols-2 gap-2">
                    <div class=" w-full">
                        <div class="flex flex-col gap-2 text-sm sm:text-base font-medium">
                            <label for="type">Sosmed</label>
                            <select x-model="modaldata.type" name="type" class="text-sm sm:text-base font-normal rounded-md border border-byolink-1 focus:ring-byolink-3 focus:border-byolink-3 bg-neutral-100" id="type">
                                <option value="tiktok">Tiktok</option>
                                <option value="youtube">Youtube</option>
                                <option value="instagram">Instagram</option>
                                <option value="twiter">Twiter</option>
                                <option value="facebook">Facebook</option>
                            </select>                            
                        </div>
                    </div>
                    <x-admin.component.linkinput title="Sosmed Url" placeholder="Masukkan link..." value="asep" name="url" link="Url" x-model="modaldata.url"/>
                </div>
            </form>
        </div>

        <div class=" pt-4">
            <div class=" px-6 w-full flex flex-col-reverse sm:flex-row justify-between items-center gap-4">
                <div class=" grid grid-cols-2 gap-3 w-full sm:w-auto">
                    <button @click="form = 'create'" :class="form == 'create'? 'bg-black' : 'bg-byolink-2 hover:bg-black'" class=" text-sm sm:text-base py-2 px-2 ms:px-4 text-white rounded duration-300">
                        Tambah Link
                    </button>
                </div>
                <button 
                @click="form === 'edit' ? $refs.linkeditform.submit() : $refs.linkcreateform.submit()"
                    class="text-sm sm:text-base w-full sm:w-auto py-2 px-4 bg-byolink-2 text-white rounded hover:bg-black duration-300">
                    
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>
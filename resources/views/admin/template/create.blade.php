<x-app-layout title="Tambah Template">
    <div class="w-full p-6 bg-white rounded-md shadow-md shadow-black/20">
        <form action="{{ route('template.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">
                <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="w-full h-52 sm:h-60 flex items-center justify-center">
                        <div class=" aspect-square max-h-full max-w-full rounded-md overflow-hidden shadow-md shadow-black/20 ">
                            <x-admin.component.imageinput title="Nama/Tipe" placeholder="Masukkan nama/tipe web..." :value="''" name="image" status="required" />
                        </div>
                    </div>
                    <div class="md:col-span-2 w-full space-y-2">
                        <x-admin.component.textinput title="Nama/Tipe" placeholder="Masukkan nama/tipe web..." :value="''" name="type" />
                        <x-admin.component.priceinput title="Harga" placeholder="Masukkan harga..." :value="''" name="price" />
                        <x-admin.component.linkinput title="Demo Url" placeholder="Masukkan link..." value="" name="demo_url" link="{{ url('/') }}" />
                    </div>
                </div>
                <x-admin.component.textareainput title="Deskripsi" placeholder="Masukkan Deskripsi" value="" name="description" />
                <x-admin.component.submitbutton title="Tambah" />
            </div>
        </form>
    </div>
</x-app-layout>

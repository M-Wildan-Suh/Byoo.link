<x-app-layout title="Edit Template">
    <div class="w-full p-6 bg-white rounded-md shadow-md shadow-black/20">
        <form action="{{ route('template.update', ['template' => $data->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="w-full h-52 sm:h-60 flex items-center justify-center">
                        <div class=" aspect-square max-h-full max-w-full rounded-md overflow-hidden shadow-md shadow-black/20 ">
                            <x-admin.component.imageinput title="Nama/Tipe" placeholder="Masukkan nama/tipe web..." value="{{asset('storage/images/templates/'. $data->image)}}" name="image" />
                        </div>
                    </div>
                    <div class="md:col-span-2 w-full space-y-2">
                        <x-admin.component.textinput title="Nama/Tipe" placeholder="Masukkan nama/tipe web..." value="{{$data->type}}" name="type" />
                        <x-admin.component.priceinput title="Harga" placeholder="Masukkan harga..." value="{{$data->price}}" name="price" />
                        <x-admin.component.linkinput title="Demo Url" placeholder="Masukkan link..." value="{{$data->demo_url}}" name="demo_url" link="{{ url('/') }}" />
                    </div>
                </div>
                <x-admin.component.textareainput title="Deskripsi" placeholder="Masukkan Deskripsi" value="{{$data->description}}" name="description" />
                <x-admin.component.submitbutton title="Edit" />
            </div>
        </form>
    </div>
</x-app-layout>

@if(isset($data->youtube->embed))
    <div class=" w-full px-4">
        <div class=" w-full aspect-video overflow-hidden rounded">
            <iframe class="w-full h-full"
                src="{{$data->youtube->embed}}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
@endif
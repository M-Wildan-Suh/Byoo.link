<x-guest.layout.online-shop :admin="$admin" :data="$data">
    <div class=" space-y-6">
        {{-- Banner --}}
        <x-guest..component.banner slug="{{$data->url}}" :templatecolor="$data->templatecolor" :banner="$data->banner ?? []" :modalstatus="session('banner', false)"/> 
        {{-- Heading --}}
        <div id="tentang-kami" class=" space-y-8 scroll-mt-20">
            {{-- Youtube --}}
            @include('components.guest.component.youtube')
            {{-- Text Heading --}}
            <x-guest.component.heading slug="{{$data->url}}" title="{{$data->content->head_title ?? ''}}" description="{{$data->content->head_desc ?? ''}}" color="{{$data->templatecolor->second_color ?? '#EAB653'}}" class="font-bold" type="heading"/>
        </div>
        {{-- Script --}}
        <script>
            document.getElementById('scrollButton').addEventListener('click', function() {
                document.getElementById('tentang-kami').scrollIntoView({ behavior: 'smooth' });
            });
            window.addEventListener('scroll', function() {
                var tentangKamiElement = document.getElementById('tentang-kami');
                var productButton = document.getElementById('scrollButton');
                var bounding = tentangKamiElement.getBoundingClientRect();
                
                // Tambahkan kelas jika berada di dalam viewport
                if (bounding.top <= window.innerHeight && bounding.bottom >= 0) {
                    productButton.classList.add('text-white');
                } else {
                    productButton.classList.remove('text-white');
                }
            });
        </script>
        {{-- Content --}}
        <div class=" w-full">
            {{-- Separator --}}
            <x-guest.component.separator bgcolor="{{$data->templatecolor->bg_color ?? 'white'}}" color="{{$data->templatecolor->main_color ?? 'black'}}" :type="$data->template->section"/>
            {{-- Product --}}
            <x-guest.component.product slug="{{$data->url}}" :background="$data->templatecolor->main_color ?? 'black'" :title="$data->content->product_title ?? null" :color="$data->templatecolor->second_color ?? '#EAB653'" :product="$data->product ?? []" :take="4" class=" font-bold text-white" :modulstatus="session('product', false)" :type="$data->template->product" />
            {{-- Separator --}}
            <x-guest.component.separator bgcolor="{{$data->templatecolor->main_color ?? 'black'}}" color="{{$data->templatecolor->bg_color ?? 'white'}}" :type="$data->template->section"/>
        </div>
        {{-- Gallery --}}
        <x-guest.component.gallery slug="{{$data->url}}" :background="$data->templatecolor->bg_color ?? 'white'" :title="$data->content->gallery_title ?? null" :color="$data->templatecolor->second_color ?? '#EAB653'" :gallery="$data->gallery ?? []" class=" font-bold" :modalstatus="session('gallery', false)"/>
    </div>
</x-guest.layout.online-shop>
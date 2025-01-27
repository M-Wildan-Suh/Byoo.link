<x-guest.layout.online-shop :admin="$admin" :data="$data">
    <div class="min-h-screen">
        {{-- Product --}}
        <x-guest.component.product slug="{{$data->url}}" :background="$data->templatecolor->bg_color ?? 'white'" :title="$data->content->product_title ?? null" :color="$data->templatecolor->second_color ?? '#EAB653'" :product="$data->product ?? []" class="font-bold" :modulstatus="session('product', false)" :type="$data->template->product"/>
    </div>
</x-guest.layout.online-shop>
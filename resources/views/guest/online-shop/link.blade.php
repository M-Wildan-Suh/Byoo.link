<x-guest.layout.online-shop :admin="$admin" :data="$data">
    <div class=" min-h-screen">
        {{-- Link --}}
        <x-guest.component.link slug="{{$data->url}}" :link="$data->link ?? ''" :title="$data->sectionTitle->link_title ?? null" :templatecolor="$data->templateColor" :modalstatus="session('link', false)"></x-guest.component.link>
    </div>
</x-guest.layout.online-shop>
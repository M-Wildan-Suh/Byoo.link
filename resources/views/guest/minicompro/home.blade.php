<x-guest.layout.minicompro>
    <div x-data="{ admin: {{ $admin ? 'true' : 'false'}} }" style="background-color: {{$data->templatecolor->bg_color ?? 'white'}}" class=" w-full max-w-[420px] min-h-screen mx-auto pt-8 sm:pt-4 sm:my-8 rounded-lg shadow-lg shadow-black/35">
        @if ($admin)
            @include('components.guest.component.adminmode')
        @endif
        <div class=" space-y-6">
            {{-- Logo --}}
            <x-guest.component.logo slug="{{$data->url}}" image="{{ ($data->logo ?? '') != '' ? asset('storage/images/logo/' . $data->logo) : asset('assets/images/placeholder.webp') }}"/>
            {{-- Heading --}}
            <x-guest.component.heading slug="{{$data->url}}" title="{{$data->content->head_title ?? ''}}" description="{{$data->content->head_desc ?? ''}}" color="{{$data->templatecolor->second_color ?? '#074173'}}" class="font-neue" type="heading"/>
            {{-- Tags Top --}}
            @if(($tag_position ?? '') === 'top')
                <x-guest.component.tags slug="{{$data->url}}" color="{{$data->templatecolor->main_color ?? '#1679AB'}}" :tag="$tags" :tagposition="$tag_position" :modalstatus="session('tag', false)"/>
            @endif
            {{-- Main --}}
            <div class=" w-full">
                {{-- Separator --}}
                <x-guest.component.separator bgcolor="{{$data->templatecolor->bg_color ?? 'white'}}" color="{{$data->templatecolor->main_color ?? '#1679AB'}}" :type="$data->template->section ?? null" />
                {{-- Product --}}
                <x-guest.component.product slug="{{$data->url}}" :background="$data->templatecolor->main_color ?? '#1679AB'" :title="$data->content->product_title ?? null" :notlp="$data->content->product_no_tlp ?? null" :color="$data->templatecolor->second_color ?? '#074173'" :product="$data->product ?? []" class="font-neue text-white" :modulstatus="session('product', false)" :type="$data->template->product ?? null"/>
                {{-- Gallery --}}
                <x-guest.component.gallery slug="{{$data->url}}" :background="$data->templatecolor->main_color ?? '#1679AB'" :title="$data->content->gallery_title ?? null" :color="$data->templatecolor->second_color ?? '#074173'" :gallery="$data->gallery ?? []" class="font-neue text-white" :modalstatus="session('gallery', false)"/>
                {{-- Separator --}}
                <x-guest.component.separator bgcolor="{{$data->templatecolor->main_color ?? '#1679AB'}}" color="{{$data->templatecolor->bg_color ?? 'white'}}" :type="$data->template->section ?? null"/>
            </div>
            {{-- Footer --}}
            <x-guest.component.heading slug="{{$data->url}}" title="{{$data->content->foot_title ?? ''}}" description="{{$data->content->foot_desc ?? ''}}" color="{{$data->templatecolor->second_color ?? '#074173'}}" class="font-neue" type="footer"/>
            {{-- Link Icon --}}
            <x-guest.component.linkicon slug="{{$data->url}}" :link="$data->link ?? null" :templatecolor="$data->templatecolor" :modalstatus="session('link', false)"/>
            {{-- Tags Bottom --}}
            @if(($tag_position ?? '') === 'bottom')
                <x-guest.component.tags slug="{{$data->url}}" color="{{$data->templatecolor->main_color ?? '#1679AB'}}" :tag="$tags" :tagposition="$tag_position" :modalstatus="session('tag', false)"/>
            @endif
            {{-- WhatsApp Telephone --}}
            <x-guest.component.footer slug="{{$data->url}}" :phonecolor="$data->templatecolor->third_color ?? '#1d588d'" :wacolor="$data->templatecolor->fourth_color ?? '#25D366'" notlp="{{$data->contact->no_tlp ?? ''}}" nowa="{{$data->contact->no_wa ?? ''}}" class="bg-white/30 backdrop-blur"/>
        </div>
    </div>
</x-guest.layout.minicompro>
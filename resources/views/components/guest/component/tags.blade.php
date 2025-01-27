@props(['color', 'tag', 'slug', 'modalstatus', 'tagposition'])
<div x-data="{tag: {{ $modalstatus ? 'true' : 'false' }}}" :class="admin ? 'hover:border-green-500' : '' " class=" w-full flex flex-row flex-wrap px-4 gap-2 items-center justify-center relative border border-transparent">
    <button x-show="admin" @click="tag = true"
            class=" group absolute right-8 -top-5 w-4 aspect-square text-black hover:text-green-500 duration-300 ">
        <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4 1 0 1.4-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" 
                  fill="currentColor" 
                  fill-rule="evenodd" 
                  class="fill-000000"></path>
        </svg>
    </button>

    {{-- Tag Edit --}}
    @include('admin.tag.edit')

    @if ($tag->isEmpty())
    <div style="background-color: {{ $color }}" class="cursor-default px-2 py-1 rounded-sm text-white text-sm">
        Tag
    </div>
    @else
        @foreach ($tag as $item)
            <div style="background-color: {{ $color }}" class="cursor-default px-2 py-1 rounded-sm text-white text-sm">
                {{ $item->tag }}
            </div>
        @endforeach
    @endif
</div>
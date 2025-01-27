@props(['title', 'description', 'color', 'class', 'type', 'slug'])
<div x-data="{content: false}" :class="admin ? 'hover:border-green-500' : '' " class=" flex flex-col gap-4 px-3 text-center items-center relative border border-transparent">
    <button x-show="admin" @click="content = true"
        class="absolute top-10 right-8 w-4 aspect-square text-black hover:text-green-500 duration-300 z-10">
        <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4 1 0 1.4-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z"
                fill="currentColor" fill-rule="evenodd" class="fill-000000"></path>
        </svg>
    </button>

    {{-- content Edit --}}
    @include('admin.'.$type.'.edit')

    <p class=" text-2xl {{$class}}">{{ $title == '' ? 'Title' : $title }}</p>
    <div style="background-color: {{ $color == '' ? 'darkgray' : $color }}" class=" w-10 h-[4px]"></div>
    <p class="text-sm ">{!! nl2br(e($description == '' ? 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt cupiditate quo est deleniti vero culpa ea dicta tempore a obcaecati, ex alias suscipit, quasi ut nam nostrum nulla, velit praesentium?' : $description)) !!}</p>
</div>

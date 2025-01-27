{{-- Edit Mode + Template Color --}}
<div x-data="{template_color: false, template: false}" class=" fixed left-2 sm:left-[calc(50%-198px)] top-14 z-20 space-y-2">
    <button @click="admin = !admin" 
        :class="{ 'bg-green-500 border-green-700': admin, 'bg-neutral-200 border-neutral-400 opacity-50 hover:opacity-100': !admin }" 
        class="relative inline-flex h-6 w-11 rounded-full transition-colors duration-300 border ">
        <span :class="{ 'translate-x-6': admin, 'translate-x-1': !admin }"
            class="inline-block mt-1 h-4 w-4 transform bg-white rounded-full transition-transform duration-300 text-neutral-600">
            <svg viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M16 7C9.934 7 4.798 10.776 3 16c1.798 5.224 6.934 9 13 9s11.202-3.776 13-9c-1.798-5.224-6.934-9-13-9z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" class="stroke-000000"></path><circle cx="16" cy="16" fill="none" r="5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" class="stroke-000000"></circle></svg>
        </span>
    </button>
    <div x-show="admin" class=" w-11 h-20 rounded-md overflow-hidden border border-neutral-400 relative hover:border-green-500">
        <button x-show="admin" @click="template_color = true" class=" absolute w-full h-full hover:bg-black/20 duration-300 flex items-center justify-center text-transparent hover:text-green-500">
            <div class=" w-4 h-4">
                <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4 1 0 1.4-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" 
                          fill="currentColor" 
                          fill-rule="evenodd" 
                          class="fill-000000"></path>
                </svg>
            </div>
        </button>

        {{-- Template Color Edit --}}
        @include('admin.template-color.edit')

        <div style="background-color: {{$data->templatecolor->bg_color ?? '#ffffff'}}" class=" w-full h-4"></div>
        <div style="background-color: {{$data->templatecolor->main_color ?? '#1679AB'}}" class=" w-full h-4"></div>
        <div style="background-color: {{$data->templatecolor->second_color ?? '#074173'}}" class=" w-full h-4"></div>
        <div style="background-color: {{$data->templatecolor->third_color ?? '#1d588d'}}" class=" w-full h-4"></div>
        <div style="background-color: {{$data->templatecolor->fourth_color ?? '#25D366'}}" class=" w-full h-4"></div>
    </div>
    <div class="">
        <button x-show="admin"
            @click="template = true" 
            class=" w-11 flex items-center justify-center py-2 rounded-md bg-neutral-100 border border-neutral-600 hover:bg-green-500 duration-300 hover:border-white hover:text-white">
            <div class=" w-5 h-5">
                <svg viewBox="-265 388.9 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                    enable-background="new -265 388.9 64 64">
                    <path
                        d="M-210.6 410.9h-44.8c-.9 0-1.6-.7-1.6-1.6v-9.2c0-.9.7-1.6 1.6-1.6h44.8c.9 0 1.6.7 1.6 1.6v9.2c0 .9-.7 1.6-1.6 1.6zM-210.6 443.3h-11.8c-.9 0-1.6-.7-1.6-1.6v-25.6c0-.9.7-1.6 1.6-1.6h11.8c.9 0 1.6.7 1.6 1.6v25.6c0 .9-.7 1.6-1.6 1.6zM-229.6 443.3h-25.8c-.9 0-1.6-.7-1.6-1.6v-25.6c0-.9.7-1.6 1.6-1.6h25.8c.9 0 1.6.7 1.6 1.6v25.6c0 .9-.7 1.6-1.6 1.6z"
                        fill="currentColor" class="fill-000000"></path>
                </svg>
            </div>
        </button>
        {{-- Template Color Edit --}}
        @include('admin.style.edit')
    </div>
</div>
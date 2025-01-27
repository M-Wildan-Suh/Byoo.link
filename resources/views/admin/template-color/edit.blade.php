<!-- Modal -->
<div x-show="template_color" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 px-4 max-h-screen py-4"
x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <!-- Modal Template Color -->
    <div class="w-full max-w-[720px] max-h-[calc(100vh-16px)] bg-white pb-6 text-left rounded-md flex flex-col gap-4 relative border-2 border-byolink-1">
        <div class=" pt-6 pb-3 bg-byolink-1 text-white z-30">
            <h2 class=" px-6 text-2xl font-bold">Edit Color</h2>
            <button @click="template_color = false"
                class=" absolute top-6 right-6 w-6 h-6 text-white hover:text-red-500 duration-300">
                <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                    enable-background="new 0 0 512 512">
                    <path
                        d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                        fill="currentColor" class="fill-000000"></path>
                </svg>
            </button>
        </div>
        <form action="{{route('template.color.edit', ['slug' => $data->url])}}" method="POST">
            @csrf
            <div class=" space-y-3 px-6">
                <div class="h-40 sm:h-[260px] max-w-[400px] mx-auto grid grid-cols-1 w-full rounded-md overflow-hidden shadow-md shadow-black/20">
                    <div class="color-picker" id="picker-1"></div>
                    <div class="color-picker" id="picker-2"></div>
                    <div class="color-picker" id="picker-3"></div>
                    <div class="color-picker" id="picker-4"></div>
                    <div class="color-picker" id="picker-5"></div>
                </div>
                
                <div class="hidden">
                    <input type="text" id="color-input-1" name="bg_color" placeholder="Choose color 1" class="border rounded p-1">
                    <input type="text" id="color-input-2" name="main_color" placeholder="Choose color 2" class="border rounded p-1">
                    <input type="text" id="color-input-3" name="second_color" placeholder="Choose color 3" class="border rounded p-1">
                    <input type="text" id="color-input-4" name="third_color" placeholder="Choose color 4" class="border rounded p-1">
                    <input type="text" id="color-input-5" name="fourth_color" placeholder="Choose color 5" class="border rounded p-1">
                </div>
            </div>

            <div class=" pt-4">
                <div class=" px-6 w-full flex justify-end items-center gap-4">
                    <button class="py-2 px-4 bg-byolink-2 text-white rounded hover:bg-black duration-300">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<style>
    .pickr button{
        width: 100% !important;
        height: 100% !important;
        border-radius: 0px !important;
        box-shadow: none !important;
    }
    .pickr button::after{
        border-radius: 0px !important;
    }
</style>
<script>
    window.addEventListener('load', function() {
        const pickers = [
            { el: '#picker-1', input: '#color-input-1', default: '{{ $data->templatecolor->bg_color ?? '#ffffff' }}' },
            { el: '#picker-2', input: '#color-input-2', default: '{{ $data->templatecolor->main_color ?? '#1679AB' }}' },
            { el: '#picker-3', input: '#color-input-3', default: '{{ $data->templatecolor->second_color ?? '#074173' }}' },
            { el: '#picker-4', input: '#color-input-4', default: '{{ $data->templatecolor->third_color ?? '#1d588d' }}' },
            { el: '#picker-5', input: '#color-input-5', default: '{{ $data->templatecolor->fourth_color ?? '#25D366' }}' },
        ];

        pickers.forEach(picker => {
            const pickr = Pickr.create({
                el: picker.el,
                theme: 'nano',
                default: picker.default,

                components: {
                    preview: true,
                    opacity: true,
                    hue: true,

                    interaction: {
                        hex: true,
                        input: true,
                        save: true
                    }
                }
            });

            document.querySelector(picker.input).value = picker.default;

            pickr.on('change', (color) => {
                const hexColor = color.toHEXA().toString();
                document.querySelector(picker.input).value = hexColor;
            });
        });
    });
</script>
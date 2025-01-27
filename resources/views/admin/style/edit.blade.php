<!-- Modal -->
<div x-show="template" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-40 px-4"
x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <!-- Modal Template -->
    <div x-data="{tab : 'section'}" @click.away="template = false" class="w-full max-w-[720px] bg-white pb-6 rounded-md flex flex-col gap-4 relative overflow-hidden border-2 border-byolink-1">
        <div class=" pt-6 pb-3 bg-byolink-1 text-white z-30">
            <h2 class=" px-6 text-2xl font-bold">Edit Template</h2>
            <button @click="template = false"
                class=" absolute top-6 right-6 w-6 h-6 text-white hover:text-red-500 duration-300">
                <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                    enable-background="new 0 0 512 512">
                    <path
                        d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                        fill="currentColor" class="fill-000000"></path>
                </svg>
            </button>
        </div>
        <div>
            <div x-show="tab == 'section'" class="w-full px-6 h-[322px] overflow-auto">
                <form x-ref="sectionform" action="{{route('section.style.edit', ['slug' => $data->url])}}" method="post">
                    @csrf
                    <div x-data="{ selected: '{{$data->template->section ?? ''}}' }" class="w-full grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        <div class="w-full aspect-video rounded-md bg-neutral-500 overflow-hidden relative">
                            <input type="radio" name="section" id="flat" value="flat" class="hidden" 
                                   @checked(isset($data->template->section) && $data->template->section === 'flat') 
                                   @change="selected = 'flat'">
                            <label for="flat" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'flat' ? 'bg-black/20' : 'hover:bg-black/20'"></label>
                            <div style="background-color: {{$data->templatecolor->bg_color ?? '#ffffff'}}" class="w-full h-[calc(50%-20px)]"></div>
                            <x-guest.component.separator bgcolor="{{$data->templatecolor->bg_color ?? '#ffffff'}}" color="{{$data->templatecolor->main_color ?? '#1679AB'}}" type="flat"/>
                            <div style="background-color: {{$data->templatecolor->main_color ?? '#1679AB'}}" class="w-full h-[calc(50%-20px)]"></div>
                        </div>
                        
                        <div class="w-full aspect-video rounded-md bg-neutral-500 overflow-hidden relative">
                            <input type="radio" name="section" id="round" value="round" class="hidden" 
                                   @checked(isset($data->template->section) && $data->template->section === 'round') 
                                   @change="selected = 'round'">
                            <label for="round" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'round' ? 'bg-black/20' : 'hover:bg-black/20'"></label>
                            <div style="background-color: {{$data->templatecolor->bg_color ?? '#ffffff'}}" class="w-full h-[calc(50%-20px)]"></div>
                            <x-guest.component.separator bgcolor="{{$data->templatecolor->bg_color ?? '#ffffff'}}" color="{{$data->templatecolor->main_color ?? '#1679AB'}}" type="round"/>
                            <div style="background-color: {{$data->templatecolor->main_color ?? '#1679AB'}}" class="w-full h-[calc(50%-20px)]"></div>
                        </div>
                        
                        <div class="w-full aspect-video rounded-md bg-neutral-500 overflow-hidden relative">
                            <input type="radio" name="section" id="multiwave" value="multiwave" class="hidden" 
                                   @checked(isset($data->template->section) && $data->template->section === 'multiwave') 
                                   @change="selected = 'multiwave'">
                            <label for="multiwave" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'multiwave' ? 'bg-black/20' : 'hover:bg-black/20'"></label>
                            <div style="background-color: {{$data->templatecolor->bg_color ?? '#ffffff'}}" class="w-full h-[calc(50%-20px)]"></div>
                            <x-guest.component.separator bgcolor="{{$data->templatecolor->bg_color ?? '#ffffff'}}" color="{{$data->templatecolor->main_color ?? '#1679AB'}}" type="multiwave"/>
                            <div style="background-color: {{$data->templatecolor->main_color ?? '#1679AB'}}" class="w-full h-[calc(50%-20px)]"></div>
                        </div>
                        
                        <div class="w-full aspect-video rounded-md bg-neutral-500 overflow-hidden relative">
                            <input type="radio" name="section" id="block" value="block" class="hidden" 
                                   @checked(isset($data->template->section) && $data->template->section === 'block') 
                                   @change="selected = 'block'">
                            <label for="block" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'block' ? 'bg-black/20' : 'hover:bg-black/20'"></label>
                            <div style="background-color: {{$data->templatecolor->bg_color ?? '#ffffff'}}" class="w-full h-[calc(50%-20px)]"></div>
                            <x-guest.component.separator bgcolor="{{$data->templatecolor->bg_color ?? '#ffffff'}}" color="{{$data->templatecolor->main_color ?? '#1679AB'}}" type="block"/>
                            <div style="background-color: {{$data->templatecolor->main_color ?? '#1679AB'}}" class="w-full h-[calc(50%-20px)]"></div>
                        </div>                        
                    </div>                    
                </form>
            </div>
            <div x-show="tab == 'product'" class="w-full px-6 h-[322px] overflow-auto">
                <form x-ref="productform" action="{{route('product.style.edit', ['slug' => $data->url])}}" method="post">
                    @csrf
                    <div x-data="{ selected: '{{$data->template->product ?? ''}}' }" class="w-full grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        <div class="w-full aspect-video rounded-md overflow-hidden relative">
                            <input type="radio" name="product" id="square" value="square" class="hidden" 
                                   @checked(isset($data->template->product) && $data->template->product === 'square') 
                                   @change="selected = 'square'">
                            <label for="square" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'square' ? 'bg-black/20' : 'hover:bg-black/20'"></label>
                            <div class=" bg-black flex items-center w-full h-full">
                                <img src="{{asset('/assets/images/product/square.jpg')}}" class=" w-full h-full object-contain" alt="">
                            </div>
                        </div>
                        <div class="w-full aspect-video rounded-md overflow-hidden relative">
                            <input type="radio" name="product" id="rectangle" value="rectangle" class="hidden" 
                                   @checked(isset($data->template->product) && $data->template->product === 'rectangle') 
                                   @change="selected = 'rectangle'">
                            <label for="rectangle" class="absolute z-10 w-full h-full top-0 left-0 duration-300" :class="selected === 'rectangle' ? 'bg-black/20' : 'hover:bg-black/20'"></label>
                            <div class=" bg-[#1679AB] flex items-center w-full h-full">
                                <img src="{{asset('/assets/images/product/rectangle.jpg')}}" class=" w-full h-full object-contain" alt="">
                            </div>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>

        <div class=" sm:pt-4">
            <div class=" px-6 w-full flex flex-col-reverse sm:flex-row justify-between items-center gap-4">
                <div class=" grid grid-cols-2 gap-3 w-full sm:w-auto">
                    <button @click="tab = 'section'" :class="tab == 'section'? 'bg-black' : 'bg-byolink-2 hover:bg-black'" class=" text-sm sm:text-base py-2 px-2 ms:px-4 text-white rounded duration-300">
                        Section
                    </button>
                    <button @click="tab = 'product'" :class="tab == 'product' ? 'bg-black' : 'bg-byolink-2 hover:bg-black'" class=" text-sm sm:text-base py-2 px-2 ms:px-4 text-white rounded duration-300">
                        Product
                    </button>
                </div>
                <button 
                    @click="tab === 'section' ? $refs.sectionform.submit() : $refs.productform.submit()"
                    class="text-sm sm:text-base w-full sm:w-auto py-2 px-4 bg-byolink-2 text-white rounded hover:bg-black duration-300">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>
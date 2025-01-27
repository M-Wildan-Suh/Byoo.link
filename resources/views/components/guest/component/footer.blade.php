@props(['notlp', 'nowa', 'background', 'phonecolor', 'wacolor', 'class', 'slug'])
<div x-data="{contact: false}" :class="admin ? 'hover:border hover:border-green-500' : 'border-transparent' " class=" group w-full sticky bottom-0 z-30 sm:rounded-b-md">
    <button x-show="admin" @click="contact = true"
            class=" group-hover:text-green-500 absolute right-8 bottom-[calc(100%-8px)] w-4 aspect-square text-neutral-500 hover:text-green-500 duration-300 z-30">
        <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4 1 0 1.4-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z" 
                  fill="currentColor" 
                  fill-rule="evenodd" 
                  class="fill-000000"></path>
        </svg>
    </button>

    {{-- Contact Edit --}}
    @include('admin.contact.edit')

    <div style="background-color: {{$background ?? ''}}" class=" {{$class ?? ''}} w-full grid grid-cols-2 py-3 px-4 gap-4 sm:rounded-b-lg">
        <a class="w-full" href="tel:{{ $notlp ?? '' }}">
            <button style="background-color: {{ $phonecolor }}" class=" text-white w-full py-2 rounded-lg flex items-center justify-center gap-2 hover:scale-90 duration-300">
                <div class="w-4 h-4">
                    <svg viewBox="0 0 512 512" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"/>
                    </svg>
                </div>
                <p>Telepon</p>
            </button>
        </a>
        <a class="w-full" href="https://wa.me/{{ $nowa ?? '' }}">
            <button style="background-color: {{ $wacolor }}" class=" text-white w-full py-2 rounded-lg flex items-center justify-center gap-2 hover:scale-90 duration-300">
                <p>Whatsapp</p>
                <div class="w-4 h-4">
                    <svg height="100%" id="Layer_1" style="enable-background:new 0 0 56.693 56.693;" version="1.1" viewBox="0 0 56.693 56.693" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g>
                            <path fill="currentColor" d="M46.3802,10.7138c-4.6512-4.6565-10.8365-7.222-17.4266-7.2247c-13.5785,0-24.63,11.0506-24.6353,24.6333   c-0.0019,4.342,1.1325,8.58,3.2884,12.3159l-3.495,12.7657l13.0595-3.4257c3.5982,1.9626,7.6495,2.9971,11.7726,2.9985h0.01   c0.0008,0-0.0006,0,0.0002,0c13.5771,0,24.6293-11.0517,24.635-24.6347C53.5914,21.5595,51.0313,15.3701,46.3802,10.7138z    M28.9537,48.6163h-0.0083c-3.674-0.0014-7.2777-0.9886-10.4215-2.8541l-0.7476-0.4437l-7.7497,2.0328l2.0686-7.5558   l-0.4869-0.7748c-2.0496-3.26-3.1321-7.028-3.1305-10.8969c0.0044-11.2894,9.19-20.474,20.4842-20.474   c5.469,0.0017,10.6101,2.1344,14.476,6.0047c3.8658,3.8703,5.9936,9.0148,5.9914,14.4859   C49.4248,39.4307,40.2395,48.6163,28.9537,48.6163z"/>
                            <path fill="currentColor" d="M40.1851,33.281c-0.6155-0.3081-3.6419-1.797-4.2061-2.0026c-0.5642-0.2054-0.9746-0.3081-1.3849,0.3081   c-0.4103,0.6161-1.59,2.0027-1.9491,2.4136c-0.359,0.4106-0.7182,0.4623-1.3336,0.1539c-0.6155-0.3081-2.5989-0.958-4.95-3.0551   c-1.83-1.6323-3.0653-3.6479-3.4245-4.2643c-0.359-0.6161-0.0382-0.9492,0.27-1.2562c0.2769-0.2759,0.6156-0.7189,0.9234-1.0784   c0.3077-0.3593,0.4103-0.6163,0.6155-1.0268c0.2052-0.4109,0.1027-0.7704-0.0513-1.0784   c-0.1539-0.3081-1.3849-3.3379-1.8978-4.5706c-0.4998-1.2001-1.0072-1.0375-1.3851-1.0566   c-0.3585-0.0179-0.7694-0.0216-1.1797-0.0216s-1.0773,0.1541-1.6414,0.7702c-0.5642,0.6163-2.1545,2.1056-2.1545,5.1351   c0,3.0299,2.2057,5.9569,2.5135,6.3676c0.3077,0.411,4.3405,6.6282,10.5153,9.2945c1.4686,0.6343,2.6152,1.013,3.5091,1.2966   c1.4746,0.4686,2.8165,0.4024,3.8771,0.2439c1.1827-0.1767,3.6419-1.489,4.1548-2.9267c0.513-1.438,0.513-2.6706,0.359-2.9272   C41.211,33.7433,40.8006,33.5892,40.1851,33.281z"/>
                        </g>
                    </svg>
                </div>
            </button>
        </a>
    </div>
</div>
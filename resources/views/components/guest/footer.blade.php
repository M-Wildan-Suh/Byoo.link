{{-- Footer --}}
<div class=" w-full">
    {{ $additional ?? '' }}
    <div class=" w-full bg-byolink-1 pt-10 pb-6 divide-y-2 divide-white space-y-6">
        <div class=" w-full px-4 md:px-8 py-4">
            <div class=" w-full max-w-[1080px] mx-auto grid grid-cols-2 md:grid-cols-3 gap-6 text-white">
                <div class=" col-span-2 md:col-span-1 space-y-2">
                    <div class=" w-44 h-14 flex items-center overflow-hidden">
                        <img src="{{asset('assets/images/logowhite.png')}}" alt="">
                    </div>
                    <p class=" text-sm">Silahkan Pilih Design Sesuai selera dan bisnis anda, Jadikan Bisnis anda Lebih menarik dan Lebih mudah diingat oleh customer</p>
                </div>
                <div class="">
                    <div class=" flex flex-row gap-2">
                        <div class=" w-1 rounded-full bg-white"></div>
                        <p class=" font-semibold">Kontak Kami</p>
                    </div>
                </div>
                <div class="">
                    <div class=" flex flex-row gap-2">
                        <div class=" w-1 rounded-full bg-white"></div>
                        <p class=" font-semibold">Social media</p>
                    </div>
                </div>
            </div>
        </div>
        <div class=" text-center text-white pt-6">
            <p class="text-sm">
                © 2024 multibyoo.sites.id | Developed by
                <span class="hover:underline">
                    <a href="https://jasawebsite.biz">
                        Jasa WebsiteBiz
                    </a>
                </span>
            </p>
        </div>
    </div>
</div>
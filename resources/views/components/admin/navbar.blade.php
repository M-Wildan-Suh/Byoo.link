<div class="w-full min-h-screen flex flex-row" x-data="{ open: true }">
    <div :class="open ? 'min-w-20 w-20 lg:min-w-72 lg:w-72' : 'min-w-20 w-20'"
        class=" hidden sm:block bg-white space-y-6 transition-all duration-300 overflow-x-hidden sticky top-0 h-screen">
        <div class="w-full h-20 p-4 flex items-center gap-3">
            <div class="aspect-square h-full">
                <img src="{{ asset('assets/images/logo/logo mini.png') }}" alt="">
            </div>
            <p class="font-bold text-lg duration-300" :class="open ? 'opacity-0 lg:opacity-100' : 'opacity-0'">Byo.Link
            </p>
        </div>
        <div class="pl-4 space-y-4">
            <x-admin.navbutton route="dashboard" :active="'dashboard'">
                <div class="min-w-6 h-6">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z"
                            fill="currentColor" class="fill-000000"></path>
                    </svg>
                </div>
                <p class=" line-clamp-1 duration-300" :class="open ? 'opacity-0 lg:opacity-100' : 'opacity-0'">Dashboard
                </p>
            </x-admin.navbutton>
            <x-admin.navbutton route="user.index" :active="'user.index'">
                <div class="min-w-6 h-6">
                    <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" d="M0 0h256v256H0z"></path>
                        <path
                            d="M231.9 212a120.7 120.7 0 0 0-67.1-54.2 72 72 0 1 0-73.6 0A120.7 120.7 0 0 0 24.1 212a7.7 7.7 0 0 0 0 8 7.8 7.8 0 0 0 6.9 4h194a7.8 7.8 0 0 0 6.9-4 7.7 7.7 0 0 0 0-8Z"
                            fill="currentColor" class="fill-000000"></path>
                    </svg>
                </div>
                <p class=" line-clamp-1 duration-300" :class="open ? 'opacity-0 lg:opacity-100' : 'opacity-0'">User</p>
            </x-admin.navbutton>
            <x-admin.navbutton route="web.index" :active="['web.index', 'web.create', 'web.edit']">
                <div class="min-w-6 h-6">
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M186.8 26.24C119.1 46.6 64.08 96.01 36.1 160h99.97c9.63-55.9 27.53-102.56 50.73-133.76zM160 256c0 22.55 1.277 43.86 3.623 64h184.8c2.346-20.14 3.623-41.45 3.623-64s-1.277-43.86-3.623-64H163.6c-2.3 20.1-3.6 41.5-3.6 64zm183.6-96c-16.25-88.04-53.37-144-87.57-144S184.7 71.96 168.4 160h175.2zm132.3 0c-27.98-63.99-83-113.4-150.7-133.8 23.2 31.24 41.1 77.9 50.7 133.8h100zM325.2 485.8c67.7-20.4 122.7-70.7 150.7-133.8h-99.97c-9.63 55.9-27.53 102.6-50.73 133.8zM487.1 192H380.5c2.248 20.5 3.485 41.84 3.485 64s-1.237 43.5-3.485 64h106.6c5.641-20.4 8.894-41.8 8.894-64s-3.294-43.6-8.894-64zM168.4 352c16.25 88.04 53.37 144 87.57 144s71.32-55.96 87.57-144H168.4zM128 256c0-22.16 1.237-43.5 3.485-64H24.89c-5.641 20.4-8.895 41.8-8.895 64s3.254 43.6 8.895 64H131.5c-2.3-20.5-3.5-41.8-3.5-64zm-91.9 96c27.98 63.99 82.1 113.4 150.7 133.8-23.2-31.2-41.1-77.9-50.7-133.8h-100z" fill="currentColor" class="fill-000000"></path></svg>
                </div>
                <p class=" line-clamp-1 duration-300" :class="open ? 'opacity-0 lg:opacity-100' : 'opacity-0'">Website</p>
            </x-admin.navbutton>
            <x-admin.navbutton route="access.index" :active="'access.index'">
                <div class="min-w-6 h-6">
                    <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h256v256H0z"></path><path d="M160 16a80.1 80.1 0 0 0-76.1 104.8l-57.6 57.5A8.1 8.1 0 0 0 24 184v40a8 8 0 0 0 8 8h40a8 8 0 0 0 8-8v-16h16a8 8 0 0 0 8-8v-16h16a8.1 8.1 0 0 0 5.7-2.3l9.5-9.6A80 80 0 1 0 160 16Zm20 76a16 16 0 1 1 16-16 16 16 0 0 1-16 16Z" fill="currentColor" class="fill-000000"></path></svg>
                </div>
                <p class=" line-clamp-1 duration-300" :class="open ? 'opacity-0 lg:opacity-100' : 'opacity-0'">Access</p>
            </x-admin.navbutton>
            <x-admin.navbutton route="voucher.index" :active="['voucher.index', 'voucher.create', 'voucher.edit']">
                <div class="min-w-6 h-6">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M14 3v18H3a1 1 0 0 1-1-1v-5.5a2.5 2.5 0 1 0 0-5V4a1 1 0 0 1 1-1h11zm2 0h5a1 1 0 0 1 1 1v5.5a2.5 2.5 0 1 0 0 5V20a1 1 0 0 1-1 1h-5V3z" fill="currentColor" class="fill-000000"></path></svg>
                </div>
                <p class=" line-clamp-1 duration-300" :class="open ? 'opacity-0 lg:opacity-100' : 'opacity-0'">Voucher
                </p>
            </x-admin.navbutton>
            <x-admin.navbutton route="template.index" :active="['template.index', 'template.create', 'template.edit']">
                <div class="min-w-6 h-6">
                    <svg viewBox="-265 388.9 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                        enable-background="new -265 388.9 64 64">
                        <path
                            d="M-210.6 410.9h-44.8c-.9 0-1.6-.7-1.6-1.6v-9.2c0-.9.7-1.6 1.6-1.6h44.8c.9 0 1.6.7 1.6 1.6v9.2c0 .9-.7 1.6-1.6 1.6zM-210.6 443.3h-11.8c-.9 0-1.6-.7-1.6-1.6v-25.6c0-.9.7-1.6 1.6-1.6h11.8c.9 0 1.6.7 1.6 1.6v25.6c0 .9-.7 1.6-1.6 1.6zM-229.6 443.3h-25.8c-.9 0-1.6-.7-1.6-1.6v-25.6c0-.9.7-1.6 1.6-1.6h25.8c.9 0 1.6.7 1.6 1.6v25.6c0 .9-.7 1.6-1.6 1.6z"
                            fill="currentColor" class="fill-000000"></path>
                    </svg>
                </div>
                <p class=" line-clamp-1 duration-300" :class="open ? 'opacity-0 lg:opacity-100' : 'opacity-0'">Template
                </p>
            </x-admin.navbutton>
        </div>
    </div>
    <div class="flex flex-col w-full sm:w-auto flex-grow">
        <div class=" hidden sm:flex w-full bg-white py-6 pl-12 pr-12 lg:pr-32 duration-300 sticky top-0 z-30">
            <div class="w-full mx-auto flex justify-between">
                <div class="flex gap-4 items-center">
                    <button id="openclose" class=" w-0 lg:w-6 aspect-square duration-300" @click="open = !open">
                        <svg class="duration-300" :class="open ? 'rotate-90' : ''" viewBox="0 0 32 32"
                            xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 32 32">
                            <path
                                d="M4 10h24a2 2 0 0 0 0-4H4a2 2 0 0 0 0 4zm24 4H4a2 2 0 0 0 0 4h24a2 2 0 0 0 0-4zm0 8H4a2 2 0 0 0 0 4h24a2 2 0 0 0 0-4z"
                                fill="currentColor" class="fill-000000"></path>
                        </svg>
                    </button>
                    <div class="text-2xl font-bold">{{ $title ?? '' }}</div>
                </div>
                <div x-data="{ open: false }" class="flex justify-end items-center text-neutral-600 relative">
                    <button @click="open = !open" class="flex gap-2 items-center">
                        <div>{{ Auth::user()->email }}</div>
                        <div class="w-4 h-4">
                            <svg :class="{ 'rotate-90': open, 'rotate-0': !open }"
                                class="transition-transform feather feather-chevron-right" fill="none"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <polyline points="9 18 15 12 9 6" />
                            </svg>
                        </div>
                    </button>

                    <!-- Floating Dropdown Menu with Slide-down Animation -->
                    <div x-show="open" @click.outside="open = false"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute top-full right-0 mt-2 py-2 w-48 bg-white border rounded shadow-lg text-sm z-50">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a>
                        <form method="POST" class=" w-full" action="{{ route('logout') }}">
                            @csrf
                            <button
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-200 w-full text-left">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="sm:pl-12 sm:pr-12 lg:pr-32 duration-300 pt-8 pb-20 sm:pb-8 px-4">
            {{ $slot }}
            @include('components.admin.mobile-navbar')
        </div>
    </div>
</div>

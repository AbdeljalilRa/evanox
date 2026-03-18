@extends ('layouts.store.app')

@section('title', 'EVANOX - Collections')

@section('content')
<div class="min-h-screen bg-black text-white">

    <!-- Breadcrumb -->
    <div class="px-[49px] pt-16 pb-4">
        <p class="font-montserrat font-normal text-white text-[20px] leading-normal">
            <span class="underline">HOME&#9654; COLLECTION &#9654; EYE CONTACT HIP HOP ICONS .</span>
            <span class="underline italic">&ldquo;Legends Framed in a Single Glance.&rdquo;</span>
        </p>
    </div>

    <!-- Collection Title Section -->
    <div class="text-center pt-16 pb-12 px-8">
        <h2 class="font-montserrat font-black text-white text-[32px] uppercase tracking-wider mb-4">
            EYE CONTACT: HIP-HOP ICONS
        </h2>
        <p class="font-montserrat font-medium italic text-white text-[24px] uppercase">
            &ldquo;Legends Framed in a Single Glance.&rdquo;
        </p>
    </div>

    <!-- Products Grid -->
    <div class="px-1 sm:px-4 pb-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-12">

            <!-- Product 1 -->
            <div class="group cursor-pointer overflow-hidden rounded-lg pl-2 sm:pl-[52px]">
                <div class="w-full h-[160px] sm:w-[482px] sm:h-[422px] sm:-ml-[95px]">
                    <img src="{{ asset('images/21 savage.png') }}" alt="Exclusive Design" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="pt-4">
                    <h3 class="w-full sm:w-[318px] font-montserrat font-medium text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase mb-2">
                        EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION
                    </h3>
                    <div class="flex items-center mb-3">
                        <div class="flex text-yellow-400 text-[10px] sm:text-[16px] gap-[3px] sm:gap-[5px]">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-gray-400 font-montserrat text-[9px] sm:text-[14px] ml-1 sm:ml-2">(45)</span>
                    </div>
                    <p class="font-montserrat font-extrabold text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase">
                        29,99 USD
                    </p>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="group cursor-pointer overflow-hidden rounded-lg pl-2 sm:pl-[52px]">
                <div class="w-full h-[160px] sm:w-[482px] sm:h-[422px] sm:-ml-[95px]">
                    <img src="{{ asset('images/ce ntrel cee. box2.png') }}" alt="Exclusive Design" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="pt-4">
                    <h3 class="w-full sm:w-[318px] font-montserrat font-medium text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase mb-2">
                        EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION
                    </h3>
                    <div class="flex items-center mb-3">
                        <div class="flex text-yellow-400 text-[10px] sm:text-[16px] gap-[3px] sm:gap-[5px]">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-gray-400 font-montserrat text-[9px] sm:text-[14px] ml-1 sm:ml-2">(45)</span>
                    </div>
                    <p class="font-montserrat font-extrabold text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase">
                        29,99 USD
                    </p>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="group cursor-pointer overflow-hidden rounded-lg pl-2 sm:pl-[52px]">
                <div class="w-full h-[160px] sm:w-[482px] sm:h-[422px] sm:-ml-[95px]">
                    <img src="{{ asset('images/BOX FACE.png') }}" alt="Exclusive Design" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="pt-4">
                    <h3 class="w-full sm:w-[318px] font-montserrat font-medium text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase mb-2">
                        EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION
                    </h3>
                    <div class="flex items-center mb-3">
                        <div class="flex text-yellow-400 text-[10px] sm:text-[16px] gap-[3px] sm:gap-[5px]">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-gray-400 font-montserrat text-[9px] sm:text-[14px] ml-1 sm:ml-2">(45)</span>
                    </div>
                    <p class="font-montserrat font-extrabold text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase">
                        29,99 USD
                    </p>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="group cursor-pointer overflow-hidden rounded-lg pl-2 sm:pl-[52px]">
                <div class="w-full h-[160px] sm:w-[482px] sm:h-[422px] sm:-ml-[95px]">
                    <img src="{{ asset('images/big face fifty cent BOX.png') }}" alt="Exclusive Design" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="pt-4">
                    <h3 class="w-full sm:w-[318px] font-montserrat font-medium text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase mb-2">
                        EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION
                    </h3>
                    <div class="flex items-center mb-3">
                        <div class="flex text-yellow-400 text-[10px] sm:text-[16px] gap-[3px] sm:gap-[5px]">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-gray-400 font-montserrat text-[9px] sm:text-[14px] ml-1 sm:ml-2">(45)</span>
                    </div>
                    <p class="font-montserrat font-extrabold text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase">
                        29,99 USD
                    </p>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="group cursor-pointer overflow-hidden rounded-lg pl-2 sm:pl-[52px]">
                <div class="w-full h-[160px] sm:w-[482px] sm:h-[422px] sm:-ml-[95px]">
                    <img src="{{ asset('images/BIG FACE FUTURE.png') }}" alt="Exclusive Design" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="pt-4">
                    <h3 class="w-full sm:w-[318px] font-montserrat font-medium text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase mb-2">
                        EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION
                    </h3>
                    <div class="flex items-center mb-3">
                        <div class="flex text-yellow-400 text-[10px] sm:text-[16px] gap-[3px] sm:gap-[5px]">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-gray-400 font-montserrat text-[9px] sm:text-[14px] ml-1 sm:ml-2">(45)</span>
                    </div>
                    <p class="font-montserrat font-extrabold text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase">
                        29,99 USD
                    </p>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="group cursor-pointer overflow-hidden rounded-lg pl-2 sm:pl-[52px]">
                <div class="w-full h-[160px] sm:w-[482px] sm:h-[422px] sm:-ml-[95px]">
                    <img src="{{ asset('images/young BOX.png') }}" alt="Exclusive Design" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="pt-4">
                    <h3 class="w-full sm:w-[318px] font-montserrat font-medium text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase mb-2">
                        EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION
                    </h3>
                    <div class="flex items-center mb-3">
                        <div class="flex text-yellow-400 text-[10px] sm:text-[16px] gap-[3px] sm:gap-[5px]">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-gray-400 font-montserrat text-[9px] sm:text-[14px] ml-1 sm:ml-2">(45)</span>
                    </div>
                    <p class="font-montserrat font-extrabold text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase">
                        29,99 USD
                    </p>
                </div>
            </div>

            <!-- Product 7 -->
            <div class="group cursor-pointer overflow-hidden rounded-lg pl-2 sm:pl-[52px]">
                <div class="w-full h-[160px] sm:w-[482px] sm:h-[422px] sm:-ml-[95px]">
                    <img src="{{ asset('images/box scarface2.png') }}" alt="Exclusive Design" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="pt-4">
                    <h3 class="w-full sm:w-[318px] font-montserrat font-medium text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase mb-2">
                        EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION
                    </h3>
                    <div class="flex items-center mb-3">
                        <div class="flex text-yellow-400 text-[10px] sm:text-[16px] gap-[3px] sm:gap-[5px]">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-gray-400 font-montserrat text-[9px] sm:text-[14px] ml-1 sm:ml-2">(45)</span>
                    </div>
                    <p class="font-montserrat font-extrabold text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase">
                        29,99 USD
                    </p>
                </div>
            </div>

            <!-- Product 8 -->
            <div class="group cursor-pointer overflow-hidden rounded-lg pl-2 sm:pl-[52px]">
                <div class="w-full h-[160px] sm:w-[482px] sm:h-[422px] sm:-ml-[95px]">
                    <img src="{{ asset('images/west bopx.png') }}" alt="Exclusive Design" class="w-full h-full object-cover rounded-lg">
                </div>
                <div class="pt-4">
                    <h3 class="w-full sm:w-[318px] font-montserrat font-medium text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase mb-2">
                        EXCLUSIVE DESIGNNIGHT DEVIL: APOCALYPSE EDITION
                    </h3>
                    <div class="flex items-center mb-3">
                        <div class="flex text-yellow-400 text-[10px] sm:text-[16px] gap-[3px] sm:gap-[5px]">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-gray-400 font-montserrat text-[9px] sm:text-[14px] ml-1 sm:ml-2">(45)</span>
                    </div>
                    <p class="font-montserrat font-extrabold text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase">
                        29,99 USD
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-center gap-4 pb-20 pt-8">
        <!-- Left Arrow -->
        <button class="text-white hover:text-gray-300 transition-colors">
            <svg width="40" height="8" viewBox="0 0 40 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="40" y1="4" x2="0" y2="4" stroke="white" stroke-width="2"/>
                <line x1="8" y1="0.5" x2="0" y2="4" stroke="white" stroke-width="2"/>
                <line x1="0" y1="4" x2="8" y2="7.5" stroke="white" stroke-width="2"/>
            </svg>
        </button>

        <!-- Page Numbers -->
        <div class="flex items-center gap-4">
            <button class="w-[48px] h-[48px] rounded-full bg-white flex items-center justify-center">
                <span class="font-montserrat font-extrabold text-black text-[19px]">1</span>
            </button>
            <button class="w-[48px] h-[48px] rounded-full bg-white flex items-center justify-center">
                <span class="font-montserrat font-extrabold text-black text-[19px]">2</span>
            </button>
            <button class="w-[48px] h-[48px] rounded-full bg-white flex items-center justify-center">
                <span class="font-montserrat font-extrabold text-black text-[19px]">3</span>
            </button>
        </div>

        <!-- Right Arrow -->
        <button class="text-white hover:text-gray-300 transition-colors">
            <svg width="40" height="8" viewBox="0 0 40 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="0" y1="4" x2="40" y2="4" stroke="white" stroke-width="2"/>
                <line x1="32" y1="0.5" x2="40" y2="4" stroke="white" stroke-width="2"/>
                <line x1="40" y1="4" x2="32" y2="7.5" stroke="white" stroke-width="2"/>
            </svg>
        </button>
    </div>

</div>
@endsection

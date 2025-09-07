@extends('layouts.store.app')

@section('title', 'EVANOX - ' . $product->title)

@section('content')
    {{-- Breadcrumb Navigation --}}
    <div class="container mx-auto px-4 py-4 mt-10">
        <div class="flex items-center text-white/70 font-montserrat text-[14px] font-normal px-4">
            <a href="{{ url('/') }}" class="hover:text-white">HOME</a>
            <span class="mx-2">›</span>
            <span class="text-white">{{ $product->title }}</span>
        </div>
    </div>

    {{-- Product Details Section --}}
    <section class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row">
            {{-- Product Images Gallery (Left Side) --}}
            <div class="w-full md:w-1/2 md:pr-8">
                {{-- Main Product Image --}}
                <div class="mb-4">
                    <div class="bg-black overflow-hidden product-image-container">
                        <img id="mainProductImage"
                            src="{{ $product->gallery_urls->first() ?? asset('images/default.png') }}"
                            alt="{{ $product->title }}" class="w-full h-auto object-contain">
                    </div>
                </div>

                {{-- Thumbnail Gallery --}}
                <div class="grid grid-cols-4 gap-2">
                    @foreach ($product->gallery_urls as $url)
                        <div class="rounded cursor-pointer hover:opacity-80 transition-all thumbnail-image"
                            data-img="{{ $url }}">
                            <img src="{{ $url }}" alt="{{ $product->title }}" class="w-full h-auto">
                        </div>
                    @endforeach
                </div>

                {{-- Feature Icons Section --}}
                <div class="mt-10 bg-black px-4">
                    <div class="grid grid-cols-2 gap-x-6 gap-y-12">
                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon11.png') }}" alt="Design Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Designs You Won't
                                Find Anywhere Else</h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                Evanox delivers limited-edition digital art crafted to disrupt the ordinary.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon22.png') }}" alt="Delivery Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Instant Digital
                                Delivery</h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                Buy it. Download it. Use it. All your files are delivered instantly.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon33.png') }}" alt="Setup Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Zero Setup Needed
                            </h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                Ready-to-use files with no plugins, no confusion. Just download and create.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon44.png') }}" alt="Creators Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Made by Real Creators
                            </h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                Crafted by professionals from streetwear, music, and visual culture.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon55.png') }}" alt="Access Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Lifetime Access</h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                Forever access. Re-download anytime, from anywhere — your files are always yours.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon66.png') }}" alt="Compatibility Icon" class="w-8 h-8">
                            </div>
                            <h4 class="text-white font-montserrat font-black italic text-[9.6px] mb-1">Program Compatibility
                            </h4>
                            <p class="text-white font-montserrat font-semibold text-[8.64px]">
                                All EVANOX designs are built for Adobe Photoshop in layered PSD format.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Product Details (Right Side) --}}
            <div class="w-full md:w-1/2 mt-8 md:mt-0">
                <div class="bg-black py-5 px-0">
                    <div class="max-w-lg">
                        <h1 class="text-[23px] font-montserrat font-semibold text-white mb-2">
                            {{ $product->title }}
                        </h1>
                        <div class="flex items-center mb-5">
                            <div class="flex text-yellow-500 mr-2">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-white text-[15px] font-montserrat font-black">(8)</span>
                        </div>
                        <div class="mb-6">
                            <span class="text-white text-[19px] font-montserrat font-extrabold">
                                {{ number_format($product->price, 2) }} USD
                            </span>
                        </div>
                        <div>
                            <button id="addToBagBtn"
                                class="w-full bg-white text-black font-montserrat font-extrabold text-[16px] py-3 px-8 rounded-full hover:bg-white/90 transition-colors">
                                Add to Bag
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Description Section --}}
                <div class="pt-6 mb-6">
                    <h3 class="text-white font-montserrat font-semibold italic text-[18px] mb-3">• Description</h3>
                    <div class="text-white font-montserrat font-bold italic text-[12px] mb-4 product-description">
                        {!! $product->description !!}
                    </div>
                    @if ($product->whats_inside || $product->perfect_for || $product->format || $product->license)
                        @if ($product->whats_inside)
                            <div class="text-white mb-4">
                                <span class="text-white font-montserrat font-extrabold text-[12px] underline">What's
                                    Inside:</span><br>
                                <ul>
                                    @foreach (explode("\n", $product->whats_inside) as $line)
                                        @if (trim($line) != '')
                                            <li class="font-montserrat font-semibold text-[12px]">{{ $line }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($product->perfect_for)
                            <div class="text-white mb-4">
                                <span class="text-white font-montserrat font-extrabold text-[12px] underline">Perfect
                                    For:</span><br>
                                <span class="font-montserrat font-semibold text-[12px]">{{ $product->perfect_for }}</span>
                            </div>
                        @endif
                        @if ($product->format)
                            <div class="text-white mb-4">
                                <span
                                    class="text-white font-montserrat font-extrabold text-[12px] underline">Format:</span><br>
                                <span class="font-montserrat font-semibold text-[12px]">{{ $product->format }}</span>
                            </div>
                        @endif
                        @if ($product->license)
                            <div class="text-white mb-4">
                                <span
                                    class="text-white font-montserrat font-extrabold text-[12px] underline">License:</span><br>
                                <span class="font-montserrat font-semibold text-[12px]">{{ $product->license }}</span>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Customer Reviews Section --}}
    <section class="container mx-auto px-4 py-12">
        <h2 class="text-white font-montserrat font-bold italic text-[14.37px] mb-8 text-center">Customer Reviews</h2>
        <div class="flex items-center justify-center mb-8">
            <div class="flex text-white text-2xl">
                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="rounded-lg p-6 review-card">
                <span class="text-white font-montserrat font-black italic text-[9.6px]">Mason B.</span>
                <p class="text-white font-montserrat font-semibold text-[8.64px] mt-2">
                    This design hits hard. Clean, crisp, and consistent — just how I like it.
                </p>
            </div>
            <div class="rounded-lg p-6 review-card">
                <span class="text-white font-montserrat font-black italic text-[9.6px]">Mason P.</span>
                <p class="text-white font-montserrat font-semibold text-[8.64px] mt-2">
                    Perfect for our merch line. Bold and unique.
                </p>
            </div>
            <div class="rounded-lg p-6 review-card">
                <span class="text-white font-montserrat font-black italic text-[9.6px]">Mason R.</span>
                <p class="text-white font-montserrat font-semibold text-[8.64px] mt-2">
                    The contrast between message and design makes it powerful.
                </p>
            </div>
        </div>
    </section>

    {{-- Related Products Section --}}
    <section class="container mx-auto px-4 py-12">
        <h2 class="text-white font-montserrat font-black text-[10px] mb-8">• ALSO ROCKED BY DESIGNERS LIKE YOU</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($relatedProducts as $related)
                <div class="group">
                    <div
                        class="overflow-hidden transition-all duration-300 hover:shadow-xl hover:brightness-110 hover:-translate-y-1 rounded-lg mb-3">
                        <img src="{{ $related->gallery_urls->first() ?? asset('images/default.png') }}"
                            alt="{{ $related->title }}" class="w-full h-auto">
                    </div>
                    <h3 class="text-white font-montserrat font-medium text-[14px] mb-2">{{ $related->title }}</h3>
                    <div class="flex items-center mb-2">
                        <div class="flex text-yellow-500 mr-1">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-white font-montserrat font-black text-[10px]">(48)</span>
                    </div>
                    <p class="text-white font-montserrat font-extrabold text-[14.42px]">
                        {{ number_format($related->price, 2) }} USD
                    </p>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/product-details.css') }}">
    <style>
        .product-description h2,
        .product-description h3 {
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            margin-top: 1.5em;
        }

        .product-description p {
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            font-size: 15px;
            margin-bottom: 1em;
        }

        .product-description ul,
        .product-description ol {
            color: #fff;
            margin-left: 2em;
            margin-bottom: 1em;
        }

        .product-description li {
            margin-bottom: 0.3em;
        }

        .product-description strong {
            color: #ffffff;
        }

        .product-description h1,
        .product-description h2,
        .product-description h3,
        .product-description h4,
        .product-description h5 {
            text-decoration: underline;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/product-gallery.js') }}"></script>
@endpush

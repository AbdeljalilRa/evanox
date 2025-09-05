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
                <div class="pt-6 mb-6">
                    <h3 class="text-white font-montserrat font-semibold italic text-[18px] mb-3">•Description</h3>
                    <p class="text-white font-montserrat font-bold italic text-[12px] mb-4">
                        {{ $product->description }}
                    </p>
                </div>
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
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/product-gallery.js') }}"></script>
@endpush

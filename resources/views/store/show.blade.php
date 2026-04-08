@extends('layouts.store.app')

@section('title', 'EVANOX - ' . $product->title)

@section('content')
    {{-- Breadcrumb Navigation --}}
    <div class="px-5 md:px-12 py-4 mt-10">
        <p class="text-white font-normal underline text-[11.5px] md:text-[23px]" style="font-family: 'Montserrat', sans-serif;">
            <a href="{{ url('/') }}" class="hover:text-white/80">HOME</a>▶ {{ $product->title }}
        </p>
    </div>

    {{-- Product Details Section --}}
    <section class="px-5 md:px-12 py-8">
        <div class="flex flex-col md:flex-row">
            {{-- Product Images Gallery (Left Side) --}}
            <div class="w-full md:w-1/2 md:pr-8">
                {{-- Main Product Image --}}
                <div class="mb-4">
                    <div class="bg-black overflow-hidden product-image-container">
                        <img id="mainProductImage"
                            src="{{ $product->images->count() > 0 ? Storage::disk('s3')->temporaryUrl($product->images->first()->image_path, now()->addMinutes(5)) : asset('images/default.png') }}"
                            alt="{{ $product->title }}" class="w-full h-auto object-contain">
                    </div>
                </div>

                {{-- Thumbnail Gallery --}}
                <div class="grid grid-cols-4 gap-2">
                    @foreach ($product->images as $image)
                        <div class="rounded cursor-pointer hover:opacity-80 transition-all thumbnail-image"
                            data-img="{{ Storage::disk('s3')->temporaryUrl($image->image_path, now()->addMinutes(5)) }}">
                            <img src="{{ Storage::disk('s3')->temporaryUrl($image->image_path, now()->addMinutes(5)) }}"
                                alt="{{ $product->title }}" class="w-full h-auto object-cover rounded">
                        </div>
                    @endforeach
                </div>

                {{-- Feature Icons Section (Desktop Only) --}}
                <div class="hidden md:block mt-10 bg-black px-0 md:px-4">
                    <div class="grid grid-cols-2 gap-x-6 gap-y-12">
                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon11.png') }}" alt="Design Icon" class="w-[22px] h-[23px] md:w-[29px] md:h-[31px]">
                            </div>
                            <h4 class="text-white font-black italic text-[14px] md:text-[14px] mb-1" style="font-family: 'Montserrat', sans-serif;">Designs You Won't Find Anywhere Else</h4>
                            <p class="text-white font-semibold text-[13px] md:text-[13.5px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                Evanox delivers limited-edition digital art crafted to disrupt the ordinary. Each piece is bold, exclusive, and made to elevate your identity — whether it's for fashion, music, or content creation.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon22.png') }}" alt="Delivery Icon" class="w-[22px] h-[23px] md:w-[29px] md:h-[31px]">
                            </div>
                            <h4 class="text-white font-black italic text-[14px] md:text-[14px] mb-1" style="font-family: 'Montserrat', sans-serif;">Instant Digital Delivery</h4>
                            <p class="text-white font-semibold text-[13px] md:text-[13.5px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                Buy it. Download it. Use it. All your files are delivered instantly, so you can plug them into your project with zero delay.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon33.png') }}" alt="Setup Icon" class="w-[22px] h-[23px] md:w-[29px] md:h-[31px]">
                            </div>
                            <h4 class="text-white font-black italic text-[14px] md:text-[14px] mb-1" style="font-family: 'Montserrat', sans-serif;">Zero Setup Needed</h4>
                            <p class="text-white font-semibold text-[13px] md:text-[13.5px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                What you see is what you get — ready-to-use files with no plugins, no extra steps, no confusion. Just download, drag, and create.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon44.png') }}" alt="Creators Icon" class="w-[22px] h-[23px] md:w-[29px] md:h-[31px]">
                            </div>
                            <h4 class="text-white font-black italic text-[14px] md:text-[14px] mb-1" style="font-family: 'Montserrat', sans-serif;">Designs You Won't Find Anywhere Else</h4>
                            <p class="text-white font-semibold text-[13px] md:text-[13.5px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                We don't sell templates. We create statement pieces. Every design is built by professionals who live in the world of streetwear, music, and visual culture — tested, refined, and ready to hit.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon55.png') }}" alt="Access Icon" class="w-[22px] h-[23px] md:w-[29px] md:h-[31px]">
                            </div>
                            <h4 class="text-white font-black italic text-[14px] md:text-[14px] mb-1" style="font-family: 'Montserrat', sans-serif;">Lifetime Access, No Limits</h4>
                            <p class="text-white font-semibold text-[13px] md:text-[13.5px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                Your account gives you forever access. Re-download anytime, from anywhere — your files are always yours.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-2">
                                <img src="{{ asset('images/icon66.png') }}" alt="Compatibility Icon" class="w-[22px] h-[23px] md:w-[29px] md:h-[31px]">
                            </div>
                            <h4 class="text-white font-black italic text-[14px] md:text-[14px] mb-1" style="font-family: 'Montserrat', sans-serif;">Designs You Won't Find Anywhere Else</h4>
                            <p class="text-white font-semibold text-[13px] md:text-[13.5px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                All EVANOX designs are exclusively built for Adobe Photoshop. We craft every file in layered PSD format to give you full creative control. No Illustrator. No third-party apps. Just pure Photoshop power.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Product Details (Right Side) --}}
            <div class="w-full md:w-1/2 mt-4 md:mt-0">
                <div class="bg-black py-3 md:py-5 px-0">
                    <div class="max-w-lg md:max-w-[637px]">
                        <h1 class="text-[14px] md:text-[40px] font-semibold text-white mb-2 md:mb-4" style="font-family: 'Montserrat', sans-serif;">
                            {{ $product->title }}
                        </h1>
                        <div class="flex items-center mb-2 md:mb-7">
                            <img src="{{ asset('images/stars-rating.png') }}" alt="Rating" class="w-[145px] h-[14px] md:w-[252px] md:h-[24px] mr-2 md:mr-[17px]">
                            <span class="text-white text-[13px] md:text-[24px] font-black" style="font-family: 'Montserrat', sans-serif;">(8)</span>
                        </div>
                        <div class="mb-4 md:mb-7">
                            <span class="text-white text-[18px] md:text-[32px] font-extrabold" style="font-family: 'Montserrat', sans-serif;">
                                {{ number_format($product->price, 2) }} USD
                            </span>
                        </div>
                        <div>
                            <button id="addToBagBtn" data-product-id="{{ $product->id }}"
                                class="w-[375px] max-w-full md:w-[631px] h-[50px] md:h-[75px] bg-white text-black font-extrabold text-[17px] md:text-[27px] rounded-[36px] hover:bg-white/90 transition-colors"
                                style="font-family: 'Montserrat', sans-serif;">
                                Own The Drop
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Description Section --}}
                <div class="pt-4 md:pt-6 mb-6">
                    <h3 class="text-white font-semibold italic text-[17px] md:text-[29px] mb-3" style="font-family: 'Montserrat', sans-serif;">∙Description</h3>
                    <div class="text-white font-bold italic text-[14px] md:text-[21px] mb-4 product-description" style="font-family: 'Montserrat', sans-serif;">
                        {!! $product->description !!}
                    </div>
                    @if ($product->whats_inside || $product->perfect_for || $product->format || $product->license)
                        @if ($product->whats_inside)
                            <div class="text-white mb-4">
                                <span class="font-extrabold text-[13px] md:text-[19px] underline" style="font-family: 'Montserrat', sans-serif;">What's Inside :</span><br>
                                <ul>
                                    @foreach (explode("\n", $product->whats_inside) as $line)
                                        @if (trim($line) != '')
                                            <li class="font-semibold text-[13px] md:text-[19px]" style="font-family: 'Montserrat', sans-serif;">{{ $line }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($product->perfect_for)
                            <div class="text-white mb-4">
                                <span class="font-extrabold text-[13px] md:text-[19px] underline" style="font-family: 'Montserrat', sans-serif;">Perfect For :</span><br>
                                <span class="font-semibold text-[13px] md:text-[19px]" style="font-family: 'Montserrat', sans-serif;">{{ $product->perfect_for }}</span>
                            </div>
                        @endif
                        @if ($product->format)
                            <div class="text-white mb-4">
                                <span class="font-extrabold text-[13px] md:text-[19px] underline" style="font-family: 'Montserrat', sans-serif;">Format :</span><br>
                                <span class="font-semibold text-[13px] md:text-[19px]" style="font-family: 'Montserrat', sans-serif;">{{ $product->format }}</span>
                            </div>
                        @endif
                        @if ($product->license)
                            <div class="text-white mb-4">
                                <span class="font-extrabold text-[13px] md:text-[19px] underline" style="font-family: 'Montserrat', sans-serif;">License :</span><br>
                                <span class="font-semibold text-[13px] md:text-[19px]" style="font-family: 'Montserrat', sans-serif;">{{ $product->license }}</span>
                            </div>
                        @endif
                    @endif
                </div>

                {{-- Feature Icons Section (Mobile Only - Single Column) --}}
                <div class="block md:hidden mt-10 bg-black">
                    <div class="flex flex-col gap-y-10">
                        <div class="flex flex-col items-start">
                            <div class="mb-3">
                                <img src="{{ asset('images/icon11.png') }}" alt="Design Icon" class="w-[22px] h-[23px]">
                            </div>
                            <h4 class="text-white font-black italic text-[14px] mb-2" style="font-family: 'Montserrat', sans-serif;">Designs You Won't Find Anywhere Else</h4>
                            <p class="text-white font-semibold text-[13px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                Evanox delivers limited-edition digital art crafted to disrupt the ordinary. Each piece is bold, exclusive, and made to elevate your identity — whether it's for fashion, music, or content creation.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-3">
                                <img src="{{ asset('images/icon22.png') }}" alt="Delivery Icon" class="w-[24px] h-[26px]">
                            </div>
                            <h4 class="text-white font-black italic text-[14px] mb-2" style="font-family: 'Montserrat', sans-serif;">Instant Digital Delivery</h4>
                            <p class="text-white font-semibold text-[13px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                Buy it. Download it. Use it. All your files are delivered instantly, so you can plug them into your project with zero delay.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-3">
                                <img src="{{ asset('images/icon33.png') }}" alt="Setup Icon" class="w-[24px] h-[26px]">
                            </div>
                            <h4 class="text-white font-black italic text-[14px] mb-2" style="font-family: 'Montserrat', sans-serif;">Zero Setup Needed</h4>
                            <p class="text-white font-semibold text-[13px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                What you see is what you get — ready-to-use files with no plugins, no extra steps, no confusion. Just download, drag, and create.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-3">
                                <img src="{{ asset('images/icon44.png') }}" alt="Creators Icon" class="w-[24px] h-[26px]">
                            </div>
                            <h4 class="text-white font-black italic text-[14px] mb-2" style="font-family: 'Montserrat', sans-serif;">Designs You Won't Find Anywhere Else</h4>
                            <p class="text-white font-semibold text-[13px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                We don't sell templates. We create statement pieces. Every design is built by professionals who live in the world of streetwear, music, and visual culture — tested, refined, and ready to hit.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-3">
                                <img src="{{ asset('images/icon55.png') }}" alt="Access Icon" class="w-[24px] h-[26px]">
                            </div>
                            <h4 class="text-white font-black italic text-[14px] mb-2" style="font-family: 'Montserrat', sans-serif;">Lifetime Access, No Limits</h4>
                            <p class="text-white font-semibold text-[13px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                Your account gives you forever access. Re-download anytime, from anywhere — your files are always yours.
                            </p>
                        </div>

                        <div class="flex flex-col items-start">
                            <div class="mb-3">
                                <img src="{{ asset('images/icon66.png') }}" alt="Compatibility Icon" class="w-[24px] h-[26px]">
                            </div>
                            <h4 class="text-white font-black italic text-[14px] mb-2" style="font-family: 'Montserrat', sans-serif;">Designs You Won't Find Anywhere Else</h4>
                            <p class="text-white font-semibold text-[13px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                                All EVANOX designs are exclusively built for Adobe Photoshop. We craft every file in layered PSD format to give you full creative control. No Illustrator. No third-party apps. Just pure Photoshop power.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Customer Reviews Section --}}
    <section class="px-5 md:px-12 py-12">
        <h2 class="text-white font-black italic text-[18px] md:text-[23px] mb-4 text-center" style="font-family: 'Montserrat', sans-serif;">Customer Reviews</h2>
        <div class="flex items-center justify-center mb-8">
            <img src="{{ asset('images/stars-review.svg') }}" alt="Rating" class="w-[145px] h-[14px] md:w-[208px] md:h-[20px]">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="rounded-lg p-6 review-card">
                <span class="text-white font-black italic text-[14px] md:text-[16px]" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">| Mason R.</span>
                <p class="text-white font-semibold text-[13px] md:text-[14.5px] mt-2" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                    This design hits hard. The contrast between the message and the shimmer makes it perfect for our digital merch line. Clean, crisp, and confident — just how I like it.
                </p>
            </div>
            <div class="rounded-lg p-6 review-card hidden md:block">
                <span class="text-white font-black italic text-[16px]" style="font-family: 'Montserrat', sans-serif;">| Mason R.</span>
                <p class="text-white font-semibold text-[14.5px] mt-2" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                    This design hits hard. The contrast between the message and the shimmer makes it perfect for our digital merch line. Clean, crisp, and confident — just how I like it.
                </p>
            </div>
            <div class="rounded-lg p-6 review-card hidden md:block">
                <span class="text-white font-black italic text-[16px]" style="font-family: 'Montserrat', sans-serif;">| Mason R.</span>
                <p class="text-white font-semibold text-[14.5px] mt-2" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">
                    This design hits hard. The contrast between the message and the shimmer makes it perfect for our digital merch line. Clean, crisp, and confident — just how I like it.
                </p>
            </div>
        </div>
    </section>

    {{-- Related Products Section --}}
    <section class="px-3 md:px-12 py-12">
        <h2 class="text-white font-black text-[14px] md:text-[20px] mb-8" style="font-family: 'Montserrat', sans-serif; line-height: 15px;">• Also Rocked by Designers Like You :</h2>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-x-3 md:gap-x-6 gap-y-6 md:gap-y-12">
            @foreach ($relatedProducts as $related)
                <a href="{{ route('store.show', $related->slug) }}" class="block">
                    <div class="group cursor-pointer overflow-hidden rounded-lg pl-[30px] md:pl-[52px] transition-all duration-300 hover:brightness-110 hover:-translate-y-1">
                        <div class="w-[271px] h-[237px] -ml-[57px] md:w-[482px] md:h-[422px] md:-ml-[95px]">
                            @if ($related->images && $related->images->count() > 0)
                                <img src="{{ Storage::disk('s3')->temporaryUrl($related->images->first()->image_path, now()->addMinutes(5)) }}"
                                    alt="{{ $related->title }}" class="w-full h-full object-cover rounded-lg">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" alt="No image"
                                    class="w-full h-full object-cover rounded-lg">
                            @endif
                            @php
                                $finalPrice = $related->price - ($related->price * $related->discount_percentage) / 100;
                            @endphp
                        </div>
                        <div class="pt-1 md:pt-4">
                            <h3 class="w-[176px] md:w-[318px] font-montserrat font-medium text-[11px] md:text-[20px] leading-[14px] md:leading-[24px] text-white uppercase mb-1 md:mb-2">
                                {{ $related->title }}
                            </h3>
                            <div class="flex items-center mb-1 md:mb-3">
                                <img src="{{ asset('images/stars-rating-gold.svg') }}" alt="Rating" class="w-[110px] h-[10px] md:w-[168px] md:h-[16px]">
                                <span class="text-gray-400 font-montserrat font-black text-[10px] md:text-[14px] ml-1 md:ml-2">({{ $related->reviews_count ?? 45 }})</span>
                            </div>
                            <p class="font-montserrat font-extrabold text-[13px] md:text-[20px] leading-[16px] md:leading-[24px] text-white uppercase">
                                {{ number_format($finalPrice, 2) }} USD
                            </p>
                            @if ($related->discount_percentage > 0)
                                <span class="text-[9px] md:text-xs text-red-400 font-montserrat">-{{ $related->discount_percentage }}%</span>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/product-details.css') }}">
    <style>
        .product-description h1,
        .product-description h2,
        .product-description h3,
        .product-description h4,
        .product-description h5 {
            text-decoration: underline;
            color: #fff;
            font-weight: 800;
            margin-top: 1.5em;
            margin-bottom: 0.7em;
            line-height: 1.4;
        }

        .product-description p {
            color: #fff;
            font-size: 19px;
            font-weight: 600;
            font-style: normal;
            margin-bottom: 1em;
            line-height: 1.7;
        }

        .product-description ul,
        .product-description ol {
            color: #fff;
            margin-left: 2em;
            margin-bottom: 1em;
            font-size: 19px;
        }

        .product-description li {
            margin-bottom: 0.3em;
        }

        .product-description strong {
            color: #ffffff;
        }

        .product-description hr {
            border: none;
            border-top: 1.5px solid #ffffff;
            margin: 28px 0 18px 0;
        }

        .product-description a {
            color: #ffffff;
            text-decoration: underline;
            transition: color 0.2s;
        }

        .product-description a:hover {
            color: #ffffff;
        }

        .product-description blockquote {
            border-left: 3px solid #ffffff;
            padding-left: 1em;
            color: #f9e79f;
            font-style: italic;
            margin: 1em 0;
            background: rgba(255, 255, 255, 0.03);
        }

        @media (max-width: 768px) {
            .product-description p {
                font-size: 13px;
            }
            .product-description ul,
            .product-description ol {
                font-size: 13px;
            }
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/product-gallery.js') }}"></script>
@endpush

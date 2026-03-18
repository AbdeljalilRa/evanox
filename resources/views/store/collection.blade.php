@extends('layouts.store.app')

@section('title', 'EVANOX - ' . $category->title)

@section('content')
<div class="min-h-screen bg-black text-white">

    <!-- Breadcrumb -->
    <div class="px-[13px] md:px-[49px] pt-10 md:pt-16 pb-4">
        <p class="font-montserrat font-normal text-white text-[10px] md:text-[20px] leading-normal">
            <span class="underline">HOME&#9654; COLLECTION &#9654; {{ strtoupper($category->title) }} .</span>
            @if($category->sub_title)
                <span class="underline italic">&ldquo;{{ $category->sub_title }}&rdquo;</span>
            @endif
        </p>
    </div>

    <!-- Collection Title Section -->
    <div class="text-center pt-8 md:pt-16 pb-6 md:pb-12 px-4 md:px-8">
        <h2 class="font-montserrat font-black text-white text-[14px] md:text-[32px] uppercase tracking-wider mb-2 md:mb-4">
            {{ strtoupper($category->title) }}
        </h2>
        @if($category->sub_title)
            <p class="font-montserrat font-medium italic text-white text-[10.5px] md:text-[24px] uppercase">
                &ldquo;{{ $category->sub_title }}&rdquo;
            </p>
        @endif
    </div>

    <!-- Products Grid -->
    <div class="px-1 md:px-4 pb-8 md:pb-16">
        @if($products->count() > 0)
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-x-3 md:gap-x-6 gap-y-6 md:gap-y-12">
                @foreach($products as $product)
                    <a href="{{ route('store.show', $product->slug) }}" class="block">
                        <div class="group cursor-pointer overflow-hidden rounded-lg pl-[22px] md:pl-[52px] transition-all duration-300 hover:brightness-110 hover:-translate-y-1">
                            <!-- Product Image -->
                            <div class="w-[271px] h-[237px] -ml-[35px] md:w-[482px] md:h-[422px] md:-ml-[95px]">
                                @if ($product->images && $product->images->count() > 0)
                                    <img src="{{ Storage::disk('s3')->temporaryUrl($product->images->first()->image_path, now()->addMinutes(5)) }}"
                                        alt="{{ $product->title }}" class="w-full h-full object-cover rounded-lg">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}" alt="No image"
                                        class="w-full h-full object-cover rounded-lg">
                                @endif
                                @php
                                    $finalPrice = $product->price - ($product->price * $product->discount_percentage) / 100;
                                @endphp
                            </div>

                            <!-- Product Info -->
                            <div class="pt-2 md:pt-4">
                                <h3 class="w-[176px] md:w-[318px] font-montserrat font-medium text-[11px] md:text-[20px] leading-[14px] md:leading-[24px] text-white uppercase mb-1 md:mb-2">
                                    {{ $product->title }}
                                </h3>
                                <div class="flex items-center mb-1 md:mb-3">
                                    <div class="flex text-yellow-400 text-[10px] md:text-[16px] gap-[3px] md:gap-[5px]">
                                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                    </div>
                                    <span class="text-gray-400 font-montserrat font-black text-[10px] md:text-[14px] ml-1 md:ml-2">({{ $product->reviews_count ?? 45 }})</span>
                                </div>
                                <p class="font-montserrat font-extrabold text-[13px] md:text-[20px] leading-[16px] md:leading-[24px] text-white uppercase">
                                    {{ number_format($finalPrice, 2) }} USD
                                </p>
                                @if ($product->discount_percentage > 0)
                                    <span class="text-[9px] md:text-xs text-red-400 font-montserrat">-{{ $product->discount_percentage }}%</span>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
                <div class="flex items-center justify-center gap-3 md:gap-4 pb-12 md:pb-20 pt-8 md:pt-12">
                    <!-- Left Arrow -->
                    @if($products->onFirstPage())
                        <span class="opacity-30">
                            <svg class="w-[23px] h-[8px] md:w-[40px] md:h-[8px]" viewBox="0 0 40 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="40" y1="4" x2="0" y2="4" stroke="white" stroke-width="2"/>
                                <line x1="8" y1="0.5" x2="0" y2="4" stroke="white" stroke-width="2"/>
                                <line x1="0" y1="4" x2="8" y2="7.5" stroke="white" stroke-width="2"/>
                            </svg>
                        </span>
                    @else
                        <a href="{{ $products->previousPageUrl() }}" class="hover:opacity-70 transition-opacity">
                            <svg class="w-[23px] h-[8px] md:w-[40px] md:h-[8px]" viewBox="0 0 40 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="40" y1="4" x2="0" y2="4" stroke="white" stroke-width="2"/>
                                <line x1="8" y1="0.5" x2="0" y2="4" stroke="white" stroke-width="2"/>
                                <line x1="0" y1="4" x2="8" y2="7.5" stroke="white" stroke-width="2"/>
                            </svg>
                        </a>
                    @endif

                    <!-- Page Numbers -->
                    <div class="flex items-center gap-3 md:gap-4">
                        @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            <a href="{{ $url }}" class="w-[30px] h-[30px] md:w-[48px] md:h-[48px] rounded-full flex items-center justify-center {{ $page == $products->currentPage() ? 'bg-white' : 'bg-white/20 hover:bg-white/40' }} transition-colors">
                                <span class="font-montserrat font-extrabold text-[15px] md:text-[19px] {{ $page == $products->currentPage() ? 'text-black' : 'text-white' }}">{{ $page }}</span>
                            </a>
                        @endforeach
                    </div>

                    <!-- Right Arrow -->
                    @if($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" class="hover:opacity-70 transition-opacity">
                            <svg class="w-[23px] h-[8px] md:w-[40px] md:h-[8px]" viewBox="0 0 40 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="0" y1="4" x2="40" y2="4" stroke="white" stroke-width="2"/>
                                <line x1="32" y1="0.5" x2="40" y2="4" stroke="white" stroke-width="2"/>
                                <line x1="40" y1="4" x2="32" y2="7.5" stroke="white" stroke-width="2"/>
                            </svg>
                        </a>
                    @else
                        <span class="opacity-30">
                            <svg class="w-[23px] h-[8px] md:w-[40px] md:h-[8px]" viewBox="0 0 40 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="0" y1="4" x2="40" y2="4" stroke="white" stroke-width="2"/>
                                <line x1="32" y1="0.5" x2="40" y2="4" stroke="white" stroke-width="2"/>
                                <line x1="40" y1="4" x2="32" y2="7.5" stroke="white" stroke-width="2"/>
                            </svg>
                        </span>
                    @endif
                </div>
            @endif
        @else
            <div class="text-center py-20">
                <p class="text-gray-400 font-montserrat text-lg">No products available in this collection yet.</p>
                <a href="{{ route('collections') }}" class="mt-6 inline-block bg-white text-black px-8 py-3 rounded-full font-montserrat font-semibold hover:bg-gray-200 transition-colors">
                    View All Collections
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@extends('layouts.store.app')

@section('title', 'EVANOX - ' . $category->title)

@section('content')
<div class="min-h-screen bg-black text-white">

    <!-- Breadcrumb -->
    <div class="px-[49px] pt-16 pb-4">
        <p class="font-montserrat font-normal text-white text-[20px] leading-normal">
            <span class="underline">HOME&#9654; COLLECTION &#9654; {{ strtoupper($category->title) }} .</span>
            @if($category->sub_title)
                <span class="underline italic">&ldquo;{{ $category->sub_title }}&rdquo;</span>
            @endif
        </p>
    </div>

    <!-- Collection Title Section -->
    <div class="text-center pt-16 pb-12 px-8">
        <h2 class="font-montserrat font-black text-white text-[32px] uppercase tracking-wider mb-4">
            {{ strtoupper($category->title) }}
        </h2>
        @if($category->sub_title)
            <p class="font-montserrat font-medium italic text-white text-[24px] uppercase">
                &ldquo;{{ $category->sub_title }}&rdquo;
            </p>
        @endif
    </div>

    <!-- Products Grid -->
    <div class="px-1 sm:px-4 pb-16">
        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-12">
                @foreach($products as $product)
                    <a href="{{ route('store.show', $product->slug) }}" class="block">
                        <div class="group cursor-pointer overflow-hidden rounded-lg pl-2 sm:pl-[52px] transition-all duration-300 hover:brightness-110 hover:-translate-y-1">
                            <!-- Product Image -->
                            <div class="w-full h-[160px] sm:w-[482px] sm:h-[422px] sm:-ml-[95px]">
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
                            <div class="pt-4">
                                <h3 class="w-full sm:w-[318px] font-montserrat font-medium text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase mb-2">
                                    {{ $product->title }}
                                </h3>
                                <div class="flex items-center mb-3">
                                    <div class="flex text-yellow-400 text-[10px] sm:text-[16px] gap-[3px] sm:gap-[5px]">
                                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                    </div>
                                    <span class="text-gray-400 font-montserrat text-[9px] sm:text-[14px] ml-1 sm:ml-2">({{ $product->reviews_count ?? 45 }})</span>
                                </div>
                                <p class="font-montserrat font-extrabold text-[11px] sm:text-[20px] leading-[14px] sm:leading-[24px] text-white uppercase">
                                    {{ number_format($finalPrice, 2) }} USD
                                </p>
                                @if ($product->discount_percentage > 0)
                                    <span class="text-[9px] sm:text-xs text-red-400 font-montserrat">-{{ $product->discount_percentage }}%</span>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
                <div class="flex items-center justify-center gap-4 pb-20 pt-12">
                    <!-- Left Arrow -->
                    @if($products->onFirstPage())
                        <span class="opacity-30">
                            <svg width="40" height="8" viewBox="0 0 40 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="40" y1="4" x2="0" y2="4" stroke="white" stroke-width="2"/>
                                <line x1="8" y1="0.5" x2="0" y2="4" stroke="white" stroke-width="2"/>
                                <line x1="0" y1="4" x2="8" y2="7.5" stroke="white" stroke-width="2"/>
                            </svg>
                        </span>
                    @else
                        <a href="{{ $products->previousPageUrl() }}" class="hover:opacity-70 transition-opacity">
                            <svg width="40" height="8" viewBox="0 0 40 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="40" y1="4" x2="0" y2="4" stroke="white" stroke-width="2"/>
                                <line x1="8" y1="0.5" x2="0" y2="4" stroke="white" stroke-width="2"/>
                                <line x1="0" y1="4" x2="8" y2="7.5" stroke="white" stroke-width="2"/>
                            </svg>
                        </a>
                    @endif

                    <!-- Page Numbers -->
                    <div class="flex items-center gap-4">
                        @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            <a href="{{ $url }}" class="w-[48px] h-[48px] rounded-full flex items-center justify-center {{ $page == $products->currentPage() ? 'bg-white' : 'bg-white/20 hover:bg-white/40' }} transition-colors">
                                <span class="font-montserrat font-extrabold text-[19px] {{ $page == $products->currentPage() ? 'text-black' : 'text-white' }}">{{ $page }}</span>
                            </a>
                        @endforeach
                    </div>

                    <!-- Right Arrow -->
                    @if($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" class="hover:opacity-70 transition-opacity">
                            <svg width="40" height="8" viewBox="0 0 40 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="0" y1="4" x2="40" y2="4" stroke="white" stroke-width="2"/>
                                <line x1="32" y1="0.5" x2="40" y2="4" stroke="white" stroke-width="2"/>
                                <line x1="40" y1="4" x2="32" y2="7.5" stroke="white" stroke-width="2"/>
                            </svg>
                        </a>
                    @else
                        <span class="opacity-30">
                            <svg width="40" height="8" viewBox="0 0 40 8" fill="none" xmlns="http://www.w3.org/2000/svg">
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

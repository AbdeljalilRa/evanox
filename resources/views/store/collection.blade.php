@extends('layouts.store.app')

@section('title', 'EVANOX - ' . $category->title)

@section('content')
<div class="min-h-screen bg-black text-white">
    <!-- Collection Header -->
    <div class="text-center py-20 px-8 bg-black">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-white mb-6 tracking-wider font-montserrat font-bold text-[22px]">
                {{ strtoupper($category->title) }}
            </h2>
            @if($category->sub_title)
                <p class="text-gray-300 leading-relaxed font-montserrat italic font-medium text-[13.6px]">
                    "{{ $category->sub_title }}"
                </p>
            @endif
            @if($category->description)
                <p class="text-gray-400 mt-4 font-nunito text-sm max-w-2xl mx-auto">
                    {{ $category->description }}
                </p>
            @endif
        </div>
    </div>

    <!-- Products Grid -->
    <div class="py-16 px-8">
        <div class="max-w-7xl mx-auto">
            @if($products->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($products as $product)
                        <a href="{{ route('store.show', $product->slug) }}" class="block">
                            <div class="rounded-lg overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:brightness-110 hover:-translate-y-1">
                                <div class="relative">
                                    @if ($product->images && $product->images->count() > 0)
                                        <img src="{{ Storage::disk('s3')->temporaryUrl($product->images->first()->image_path, now()->addMinutes(5)) }}"
                                            alt="{{ $product->title }}" class="w-full h-auto rounded-lg">
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" alt="No image"
                                            class="w-full h-auto rounded-lg">
                                    @endif
                                </div>
                                <div class="p-6">
                                    <h3 class="text-white font-bold mb-2 uppercase font-montserrat text-[14px]">
                                        {{ $product->title }}
                                    </h3>
                                    <div class="flex items-center mb-3">
                                        <div class="flex text-yellow-500 mr-2">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                        <span class="text-gray-400 text-xs font-montserrat">({{ $product->reviews_count ?? 0 }})</span>
                                    </div>
                                    @php
                                        $finalPrice = $product->price - ($product->price * $product->discount_percentage) / 100;
                                    @endphp
                                    <p class="text-white font-bold font-montserrat text-[16px]">
                                        {{ number_format($finalPrice, 2) }} $
                                    </p>
                                    @if ($product->discount_percentage > 0)
                                        <span class="text-xs text-red-400">-{{ $product->discount_percentage }}%</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    {{ $products->links() }}
                </div>
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
</div>
@endsection

<x-frontend-layout>
    <!-- Header Halaman -->
    <section class="bg-white py-12 shadow-sm">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl font-display font-bold text-stone-800">Koleksi Produk Kami</h1>
            <p class="mt-2 text-stone-600">Setiap karya adalah perpaduan antara seni dan fungsionalitas.</p>
        </div>
    </section>

    <!-- Grid Produk -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse ($products as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                        <a href="{{ route('products.show', $product->slug) }}" class="block">
                            <div class="h-64 overflow-hidden">
                                {{-- PERBAIKAN DI SINI --}}
                                <img src="{{ asset(Storage::url($product->image)) }}" alt="{{ $product->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            </div>
                            <div class="p-6">
                                <span class="text-sm text-stone-500">{{ $product->category->name }}</span>
                                <h3 class="text-xl font-bold mt-2 mb-2 h-16 truncate">{{ $product->name }}</h3>
                                <p class="text-lg font-semibold text-stone-800">{{ $product->price }}</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="col-span-4 text-center text-stone-500">Belum ada produk di dalam koleksi ini.</p>
                @endforelse
            </div>

            <div class="mt-12">{{ $products->links() }}</div>
        </div>
    </section>
</x-frontend-layout>

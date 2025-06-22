<x-frontend-layout> {{-- Menggunakan layout baru kita (kita akan mendaftarkannya) --}}

    <!-- Hero Section -->
    <section class="relative h-[60vh] bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=2070&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-white text-center px-6">
            <h1 class="text-5xl md:text-7xl font-bold font-display">Maha Karya Kayu untuk Ruang Anda</h1>
            <p class="mt-4 max-w-2xl text-lg">Temukan furnitur berkualitas tinggi yang dibuat dengan passion oleh para
                pengrajin terbaik.</p>
            <a href="#"
                class="mt-8 inline-block bg-stone-800 text-white uppercase tracking-widest px-8 py-3 rounded-md font-semibold text-sm hover:bg-stone-700 transition duration-300">
                Lihat Koleksi Kami
            </a>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-display text-center mb-2">Produk Unggulan</h2>
            <p class="text-center text-stone-600 mb-12">Jelajahi pilihan produk terbaik dari kami.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse ($featuredProducts as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                        <div class="h-64 overflow-hidden">
                            <img src="{{ asset(Storage::url($product->image)) }}" alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="p-6">
                            <span class="text-sm text-stone-500">{{ $product->category->name }}</span>
                            <h3 class="text-xl font-bold mt-2 mb-2 h-16">{{ $product->name }}</h3>
                            <p class="text-lg font-semibold text-stone-800">{{ $product->price }}</p>
                            <a href="#"
                                class="text-stone-800 font-semibold mt-4 inline-block after:content-[''] after:block after:w-0 after:h-0.5 after:bg-stone-800 after:transition-all after:duration-300 hover:after:w-full">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="col-span-4 text-center text-stone-500">Produk unggulan akan segera ditampilkan.</p>
                @endforelse
            </div>
        </div>
    </section>

</x-frontend-layout>

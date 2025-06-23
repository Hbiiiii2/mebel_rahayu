<x-frontend-layout>
    <div class="container mx-auto px-6 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Kolom Gambar Produk -->
            <div>
                <img src="{{ asset(Storage::url($product->image)) }}" alt="{{ $product->name }}"
                    class="w-full h-auto object-cover rounded-lg shadow-lg">
                {{-- Di sini nanti bisa ditambahkan galeri thumbnail jika ada multi-image --}}
            </div>

            <!-- Kolom Detail Produk -->
            <div>
                <span class="text-stone-600 uppercase tracking-widest">{{ $product->category->name }}</span>
                <h1 class="text-4xl md:text-5xl font-display font-bold text-stone-900 mt-2 mb-4">{{ $product->name }}
                </h1>
                <p class="text-3xl font-display text-stone-800 mb-6">{{ $product->price }}</p>

                <div class="prose max-w-none text-stone-700">
                    <h3 class="font-bold text-stone-800">Deskripsi</h3>
                    <p>{{ $product->description }}</p>

                    <h3 class="font-bold text-stone-800 mt-6">Spesifikasi</h3>
                    <p>{{ $product->specifications }}</p>
                </div>

                <a href="https://api.whatsapp.com/send?phone=6281234567890&text=Halo,%20saya%20tertarik%20dengan%20produk%20'{{ urlencode($product->name) }}'"
                    target="_blank"
                    class="mt-8 inline-block bg-green-600 text-white uppercase tracking-widest px-8 py-3 rounded-md font-semibold text-sm hover:bg-green-700 transition duration-300">
                    Pesan via WhatsApp
                </a>
                <p class="text-xs text-stone-500 mt-2">Klik untuk langsung terhubung dengan tim kami.</p>
            </div>
        </div>
    </div>
</x-frontend-layout>

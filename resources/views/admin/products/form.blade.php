@csrf
<!-- Name -->
<div class="mt-4">
    <x-input-label for="name" :value="__('Nama Produk')" />
    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $product->name ?? '')" required />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<!-- Category -->
<div class="mt-4">
    <x-input-label for="category_id" :value="__('Kategori')" />
    <select name="category_id" id="category_id"
        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
</div>

<!-- Price -->
<div class="mt-4">
    <x-input-label for="price" :value="__('Harga')" />
    <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price', $product->price ?? 'Hubungi Kami')" required />
    <x-input-error :messages="$errors->get('price')" class="mt-2" />
</div>

<!-- Description -->
<div class="mt-4">
    <x-input-label for="description" :value="__('Deskripsi')" />
    <textarea name="description" id="description" rows="5"
        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description', $product->description ?? '') }}</textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

<!-- Specifications -->
<div class="mt-4">
    <x-input-label for="specifications" :value="__('Spesifikasi (Ukuran, Material, dll.)')" />
    <textarea name="specifications" id="specifications" rows="5"
        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('specifications', $product->specifications ?? '') }}</textarea>
    <x-input-error :messages="$errors->get('specifications')" class="mt-2" />
</div>

<!-- Image -->
<div class="mt-4">
    <x-input-label for="image" :value="__('Gambar Utama Produk')" />
    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
    <x-input-error :messages="$errors->get('image')" class="mt-2" />
    @isset($product->image)
        <div class="mt-2">
            {{-- PERBAIKAN DI SINI --}}
            <img src="{{ asset(Storage::url($product->image)) }}" alt="Current Image"
                class="w-40 h-40 object-cover rounded">
            <p class="text-sm text-gray-500 mt-1">Gambar saat ini. Upload baru untuk mengganti.</p>
        </div>
    @endisset
</div>

<div class="flex items-center justify-end mt-4">
    <x-primary-button>
        {{ $buttonText ?? 'Simpan' }}
    </x-primary-button>
</div>

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category; // <-- Import model Category
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; // <-- Import Fassad Storage

class ProductController extends Controller
{
    public function index()
    {
        // Ambil produk dengan relasi kategori untuk efisiensi query
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        // Ambil semua kategori untuk ditampilkan di form dropdown
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi input form
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:products',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|string|max:255',
            'description' => 'required|string',
            'specifications' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Validasi gambar
        ]);

        // Handle file upload
        $imagePath = $request->file('image')->store('public/products');

        // Buat produk baru
        Product::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category_id' => $validated['category_id'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'specifications' => $validated['specifications'],
            'image' => $imagePath, // Simpan path gambar ke database
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk baru berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|string|max:255',
            'description' => 'required|string',
            'specifications' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Gambar tidak wajib saat update
        ]);

        $imagePath = $product->image; // Gunakan gambar lama secara default

        // Jika ada file gambar baru diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage
            if ($product->image) {
                Storage::delete($product->image);
            }
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('public/products');
        }

        $product->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category_id' => $validated['category_id'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'specifications' => $validated['specifications'],
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        // Hapus file gambar dari storage sebelum menghapus data dari database
        if ($product->image) {
            Storage::delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}

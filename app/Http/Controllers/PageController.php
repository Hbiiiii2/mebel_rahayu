<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        // Ambil 4 produk terbaru untuk ditampilkan sebagai produk unggulan
        $featuredProducts = Product::latest()->take(4)->get();
        return view('pages.home', [
            'featuredProducts' => $featuredProducts
        ]);
    }

    public function products()
    {
        // Ambil semua produk dengan relasi kategori, diurutkan dari yang terbaru
        // Gunakan paginate() untuk membagi produk ke beberapa halaman
        $products = Product::with('category')->latest()->paginate(8);  // Tampilkan 8 produk per halaman

        return view('pages.products.index', compact('products'));
    }

    /**
     * Menampilkan halaman detail satu produk berdasarkan slug-nya.
     */
    public function productDetail(Product $product)  // Laravel akan otomatis mencari produk berdasarkan slug
    {
        return view('pages.products.show', compact('product'));
    }
}

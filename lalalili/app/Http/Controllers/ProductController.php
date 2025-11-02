<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie; 
use App\Models\Produk;
use App\Models\Admin; 

class ProductController extends Controller
{
    // Fungsi bantuan untuk memeriksa session atau cookie
    private function checkAuthAndRemember()
    {
        if (!Session::has('admin_id')) {
            $remember_token = Cookie::get('remember_admin');
            
            if ($remember_token) {
                $admin = Admin::where('remember_token', $remember_token)->first();

                if ($admin) {
                    // Token cocok, buat ulang session
                    Session::put('admin_id', $admin->id);
                    return true;
                } else {
                    // Token tidak valid, hapus cookie
                    Cookie::queue(Cookie::forget('remember_admin'));
                    return false;
                }
            }
            return false;
        }
        return true;
    }

    public function index()
    {
        if (!$this->checkAuthAndRemember()) {
            return redirect('/admin/login');
        }

        $produk = Produk::all();
        return view('index', compact('produk'));
    }

    public function create()
    {
        if (!$this->checkAuthAndRemember()) {
            return redirect('/admin/login');
        }

        return view('create');
    }

    public function store(Request $request)
    {
        if (!$this->checkAuthAndRemember()) {
            return redirect('/admin/login');
        }

        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect('/')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        if (!$this->checkAuthAndRemember()) {
            return redirect('/admin/login');
        }

        $produk = Produk::findOrFail($id);
        return view('edit', compact('produk'));
    }
    
    public function update(Request $request, $id)
    {
        if (!$this->checkAuthAndRemember()) {
            return redirect('/admin/login');
        }

        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect('/')->with('success', 'Produk berhasil diperbarui');
    }

    public function delete($id)
    {
        if (!$this->checkAuthAndRemember()) {
            return redirect('/admin/login');
        }
        
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect('/')->with('success', 'Produk berhasil dihapus');
    }
}
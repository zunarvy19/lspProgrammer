<?php

namespace App\Http\Controllers;

use App\Models\menus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoremenusRequest;
use App\Http\Requests\UpdatemenusRequest;
use App\Models\products;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    public function makutama(){
        $mutama = menus::with('products')->where('id_products', 1)->get();
        $category = products::where('id', 1)->get();
        // dd($mutama);
        return view('admin.makutama',[
            'title' => 'Makanan Utama'
        ], compact(['mutama', 'category']));
    }

    public function appetizer(){
        $appetizer = menus::with('products')->where('id_products', 2)->get();
        $category = products::where('id', 2)->get();
        // dd($mutama);
        return view('admin.appetizer',[
            'title' => 'Appetizer'
        ], compact(['appetizer', 'category']));
    }
    public function minuman(){
        $minuman = menus::with('products')->where('id_products', 3)->get();
        $category = products::where('id', 3)->get();
        // dd($mutama);
        return view('admin.minuman',[
            'title' => 'Minuman'
        ], compact(['minuman', 'category']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $data = menus::with('products')->get();
        $category = products::findOrFail($id);
        // dd($data);

        return view('admin.crud.create',[
            'title' => "Tambah data",
            'data' => $data,
            'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id_products' => 'required',
                'nama_menu' => 'required|string|max:20',
                'harga_menu' => 'required|numeric|min:0',
                'stok_menu' => 'required|integer|min:0',
                'gambar_menu' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($request->hasFile('gambar_menu')) {
                $path = $request->file('gambar_menu')->store('menu-images', 'public');
                $validatedData['gambar_menu'] = $path;
            }

            // dd($validatedData);

            Menus::create($validatedData);

            return redirect()->route('admin.dataMenu')->with('success', 'Data menu berhasil ditambah');

        } catch (\Exception $e) {
            
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data. Pesan error: ' . $e->getMessage())->withInput();
        }
    }   

    /**
     * Display the specified resource.
     */
    public function show(menus $menus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(menus $menus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStok(Request $request, $id)
    {

        // dd($request->all());
        // Validasi input stok
        $request->validate([
            'stok_menu' => 'required|integer|min:0',
        ]);

        // Temukan item makanan berdasarkan ID
        $mutama = menus::find($id);

        if (!$mutama) {
            return redirect()->back()->with('error', 'Makanan tidak ditemukan');
        }

        // Update stok
        $mutama->stok_menu = $request->stok_menu;
        $mutama->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Stok berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            
            $menu = Menus::findOrFail($id);

            if ($menu->gambar_menu) {
                Storage::disk('public')->delete($menu->gambar_menu);
            }

            $menu->delete();

            return redirect()->route('admin.dataMenu')->with('success', 'Data menu berhasil dihapus.');

        } catch (\Exception $e) {
            Log::error('Gagal menghapus data menu: ' . $e->getMessage());

            return back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}

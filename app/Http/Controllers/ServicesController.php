<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->storeAs('public/assets/images/service', $request->file('logo')->getClientOriginalName());
        }

        Services::create([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $logoPath,
            'category_id' => $request->category_id
        ]);

        return redirect('/admin')->with('success', 'Pelayanan Berhasil Ditambahkan');
    }

    // public function edit($id)
    // {
    //     $layanan = Layanan::findOrFail($id);

    //     $urlImg = $layanan->logo ? Storage::url($layanan->logo) : null;

    //     return view('admin.layanan.edit', compact('layanan','urlImg'));
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,ico|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);

        $service = Services::findOrFail($id);

        if ($request->hasFile('logo')) {
            Storage::delete($service->logo);
            $logoPath = $request->file('logo')->storeAs('public/assets/images/service', $request->file('logo')->getClientOriginalName());
            $service->logo = $logoPath;
        }

        $service->name = $request->name;
        $service->description = $request->description;
        $service->category_id = $request->category_id;

        $service->update();

        return redirect('/admin')->with('success', 'Pelayan Berhasil Diedit');
    }

    public function destroy($id)
    {
        $service = Services::findOrFail($id);

        if ($service->logo) {
            Storage::delete($service->logo);
        }

        $service->delete();

        return redirect('/admin')->with('success', 'Pelayanan Berhasil Dihapus.');
    }
}

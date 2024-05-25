<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'service_id' => 'required|exists:services,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->storeAs('public/assets/images/portfolio', $request->file('img')->getClientOriginalName());
        }

        Portfolio::create([
            'description' => $request->description,
            'img' => $imgPath,
            'service_id' => $request->service_id
        ]);

        return redirect('/admin')->with('success', 'Portofolio Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'service_id' => 'required|exists:services,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $portfolio = Portfolio::findOrFail($id);

        if ($request->hasFile('img')) {
            Storage::delete($portfolio->img);
            $imgPath = $request->file('img')->storeAs('public/assets/images/portfolio', $request->file('img')->getClientOriginalName());
            $portfolio->img = $imgPath;
        }

        $portfolio->description = $request->description;
        $portfolio->service_id = $request->service_id;

        $portfolio->save();

        return redirect('/admin')->with('success', 'Portofolio Berhasil Diedit');
    }


    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        if ($portfolio->img) {
            Storage::delete($portfolio->img);
        }

        $portfolio->delete();

        return redirect('/admin')->with('success', 'Portfolio Berhasil Dihapus.');
    }
}

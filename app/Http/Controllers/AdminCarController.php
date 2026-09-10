<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCarController extends Controller
{
    /**
     * Menampilkan daftar semua mobil di dashboard admin.
     */
    public function index()
    {
        $cars = Car::latest()->get();
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Menampilkan form tambah mobil.
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Menyimpan data mobil baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'brand'       => 'required|string|max:255',
            'year'        => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'rating'      => 'nullable|numeric|min:0|max:10',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('cars', 'public');
        }

        Car::create($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Data mobil berhasil ditambahkan!');
    }

    /**
     * Menghapus data mobil dari database beserta filenya.
     */
    public function destroy(Car $car)
    {
        if ($car->image && Storage::disk('public')->exists($car->image)) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Data mobil berhasil dihapus!');
    }
}
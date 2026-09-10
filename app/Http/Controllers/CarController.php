<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

        // Filter Brand (Case-Insensitive)
        if ($request->filled('brand')) {
            $query->whereRaw('LOWER(brand) = ?', [strtolower($request->brand)]);
        }

        // Filter Model / Nama (Case-Insensitive)
        if ($request->filled('model')) {
            $query->whereRaw('LOWER(name) = ?', [strtolower($request->model)]);
        }

        // Filter Tahun (Hanya jika diisi dengan angka valid)
        if ($request->filled('year') && is_numeric($request->year)) {
            $query->where('year', $request->year);
        }

        $cars = $query->latest()->get();

        $allCars = Car::all();
        
        $brands = $allCars->pluck('brand')->filter()->unique()->values()->toArray();
        $models = $allCars->pluck('name')->filter()->unique()->values()->toArray();
        
        $dbYears = $allCars->pluck('year')->filter()->unique()->sortDesc()->values()->toArray();
        $years   = !empty($dbYears) ? $dbYears : range(date('Y'), 1990);

        return view('welcome', compact('cars', 'brands', 'models', 'years'));
    }

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }
}
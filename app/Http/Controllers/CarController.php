<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function create()
    {
        return view('cars.create');
    }

    public function checkLicensePlate(Request $request)
    {
        $request->validate(['license_plate' => 'required|string']);
        // Simuleer kenteken-check (API-call kan later)
        $carData = [
            'merk' => 'Volkswagen',
            'model' => 'Golf',
            'bouwjaar' => '2018',
        ];
        return response()->json($carData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'license_plate' => 'required|string',
            'merk' => 'required|string',
            'model' => 'required|string',
            'bouwjaar' => 'required|string',
            'price' => 'required|numeric',
        ]);
        Car::create([
            'user_id' => auth()->id(),
            'license_plate' => $request->license_plate,
            'merk' => $request->merk,
            'model' => $request->model,
            'bouwjaar' => $request->bouwjaar,
            'price' => $request->price,
        ]);
        return redirect()->route('cars.index')->with('success', 'Auto succesvol aangeboden!');
    }

    public function index()
    {
        $cars = Car::where('user_id', auth()->id())->get();
        return view('cars.index', compact('cars'));
    }

    public function destroy(Car $car)
    {
        if ($car->user_id !== auth()->id()) {
            abort(403);
        }
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Auto verwijderd!');
    }
}

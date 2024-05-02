<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $successMessage = $request->session()->get('success');
        $hotels = Hotel::all();
        foreach ($hotels as $hotel) {
            $hotel->image_url = asset('storage/images/' . $hotel->image);
        }
        $inertiaData = [
            'hotels' => $hotels,
            'pageDescription' => 'Hotels description',
            'title' => 'Hotels',
        ];
        if ($successMessage) {
            $inertiaData['success'] = $successMessage;
        }
        return Inertia::render('Admin/Hotels', $inertiaData);
    }

    public function new()
    {
        return Inertia::render('Admin/HotelNew', [
            'pageDescription' => 'Hotels description',
            'title' => 'Add new Hotel',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'rating_stars' => 'required|integer|min:1|max:7',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048',
        ]);

        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->description = $request->description;
        $hotel->country = $request->country;
        $hotel->city = $request->city;
        $hotel->rating_stars = $request->rating_stars;

        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('public/images/', $imageName);
            $hotel->image = $imageName;
        } else {
            $hotel->image = 'no_image.png';
        }

        $hotel->save();

        return redirect()->route('admin.hotels')->with('success', 'Hotel created successfully');
    }

    public function show(Hotel $hotel)
    {
        return view('admin.hotels.show', ['hotel' => $hotel]);
    }

    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', ['hotel' => $hotel]);
    }

    public function update(Request $request, Hotel $hotel)
    {
        $hotel->update($request->all());
        return redirect()->route('admin.hotels.index');
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('admin.hotels.index');
    }
}

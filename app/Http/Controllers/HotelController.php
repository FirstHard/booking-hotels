<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
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
        return Inertia::render('Admin/HotelEdit', [
            'hotel' => $hotel,
            'title' => 'Edit Hotel: ' . $hotel->name,
        ]);
    }

    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'country' => 'sometimes|string',
            'city' => 'sometimes|string',
            'rating_stars' => 'sometimes|integer|min:1|max:7',
        ]);
        $hotel->name = $request->input('name');
        $hotel->description = $request->input('description');
        $hotel->country = $request->input('country');
        $hotel->city = $request->input('city');
        $hotel->rating_stars = $request->input('rating_stars');

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048']);
            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('public/images/', $imageName);
            $request->image->storeAs('public/images/', $imageName);

            if ($hotel->image && Storage::exists('public/images/' . $hotel->image)) {
                Storage::delete('public/images/' . $hotel->image);
            }

            $hotel->image = $imageName;
        }

        if ($hotel->save()) {
            return redirect()->route('admin.hotels')->with('success', 'Hotel "' . $hotel->name . '" updated successfully');
        } else {
            return back()->withErrors(['error' => 'Failed to update Hotel']);
        }
    }

    public function delete(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('admin.hotels')->with('success', 'Hotel "' . $hotel->name . '" deleted successfully');
    }
}

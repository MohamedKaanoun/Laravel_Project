<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Image::create([
            'image_path' => $imagePath,
        ]);

        return redirect()->route('afficher_images');
    }

    public function index()
    {
        $images = Image::all();
        return view('projects.afficher_images', compact('images'));
    }
}

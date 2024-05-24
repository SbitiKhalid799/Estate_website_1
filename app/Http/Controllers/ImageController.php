<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Image;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('multiple_image'), $imageName);

                // Save the file path and id_offer to the database
                Image::create([
                    'path' => 'multiple_image/' . $imageName,
                    'id_offer' => 10 ,
                ]);
            }
        }

        return back();
    }
}

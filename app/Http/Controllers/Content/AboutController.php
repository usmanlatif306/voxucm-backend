<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function about()
    {
        $about = About::get()->first();
        return view('prison.about', compact('about'));
    }
    public function index()
    {
        $about = About::get()->first();
        return view('content.about', compact('about'));
    }

    public function update(About $about, Request $request)
    {

        $request->validate([
            'image' => 'mimes:jpeg,png,jpg|max:5120',
        ]);
        if ($request->image) {
            $image = $request->image->getClientOriginalName();
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $imageName = $filename . "-" . time() . "." . $extension;
            $request->image->storeAs("images", $imageName, "public");
        }
        if ($about->image) {
            Storage::delete('/public/images/' . $about->image);
        }
        $about->update($request->all());
        if ($request->image) {
            $about->update([
                'image' => $imageName
            ]);
        }
        return redirect()->back()->with('success', 'Data has been updated');
    }
}

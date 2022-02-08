<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use App\Models\Content\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaqController extends Controller
{

    public function faqs()
    {
        $faq = Faq::get()->first();
        return view('prison.support', compact('faq'));
    }
    public function index()
    {
        $faq = Faq::get()->first();
        return view('content.faq', compact('faq'));
    }

    public function update(Faq $faq, Request $request)
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
        if ($faq->image) {
            Storage::delete('/public/images/' . $faq->image);
        }
        $faq->update($request->all());
        if ($request->image) {
            $faq->update([
                'image' => $imageName
            ]);
        }
        return redirect()->back()->with('success', 'Data has been updated');
    }
}

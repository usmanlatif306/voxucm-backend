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
        $faq = Faq::first();
        $faqs = json_decode($faq->faqs, true);
        return view('prison.support', compact('faq', 'faqs'));
    }
    public function index()
    {
        $faq = Faq::first();
        $faqs = json_decode($faq->faqs, true);

        return view('content.faq', compact('faq', 'faqs'));
    }

    public function update(Faq $faq, Request $request)
    {

        $request->validate([
            'faq_heading' => 'required|string|max:255',
            'faq_title' => 'required|string',
            'faq_about' => 'required|string',
            'image' => 'mimes:jpeg,png,jpg|max:5120',
        ]);
        $questions = $request->question;
        $answers = $request->answer;
        $faqs = array_combine($questions, $answers);

        $faq->update([
            'faq_heading' => $request->faq_heading,
            'faq_title' => $request->faq_title,
            'faq_about' => $request->faq_about,
            'faqs' => json_encode($faqs)
        ]);
        // if request has image
        if ($request->image) {
            $image = $request->image->getClientOriginalName();
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $imageName = $filename . "-" . time() . "." . $extension;
            $request->image->storeAs("images", $imageName, "public");
            $faq->update([
                'image' => $imageName
            ]);
            Storage::delete('/public/images/' . $faq->image);
        }
        return redirect()->back()->with('success', 'Data has been updated');
    }
}

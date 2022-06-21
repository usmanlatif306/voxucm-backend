<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\Contact;
use App\Models\Content\Faq;
use App\Models\Content\Feature;
use App\Models\Content\Home;
use App\Models\Content\NewsLetter;
use App\Models\Content\Service;
use App\Models\Content\Test;
use App\Models\Content\Product;
use App\Models\Content\TestCall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    // showing home screen
    public function home()
    {
        // dd(session('user.cart'));
        $home = Home::first();
        $products = Product::limit(4)->get();
        $service = Service::first();
        $feature = Feature::first();
        $faq = Faq::first();
        $test = Test::first();
        $contact = Contact::first();
        $news = NewsLetter::first();
        $call = TestCall::first();

        return view('prison.index', [
            'home' => $home,
            'products' => $products,
            'service' => $service,
            'faq' => $faq,
            'faqs' => json_decode($faq->faqs, true),
            'feature' => $feature,
            'test' => $test,
            'contact' => $contact,
            'news' => $news,
            'call' => $call,
        ]);
    }
    // Showig admin home content edit
    public function index()
    {
        $home = Home::get()->first();
        $test = Test::get()->first();
        $contact = Contact::get()->first();
        $news = NewsLetter::get()->first();
        $call = TestCall::get()->first();
        return view('content.home', [
            'home' => $home,
            'test' => $test,
            'contact' => $contact,
            'news' => $news,
            'call' => $call,
        ]);
    }
    // Update Navbar Logo
    public function navlogo(Home $home, Request $request)
    {
        $request->validate([
            'navlogo' => 'required|mimes:jpeg,png,jpg|max:5120',
        ]);

        if ($request->navlogo) {
            $image = $request->navlogo->getClientOriginalName();
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $imageName = $filename . "-" . time() . "." . $extension;
            $request->navlogo->storeAs("images", $imageName, "public");
        }
        if ($home->navlogo) {
            Storage::delete('/public/images/' . $home->navlogo);
        }
        $home->update([
            'navlogo' => $imageName,
        ]);
        return redirect()->back()->with('success', 'Nav Logo has been updated');
    }
    // Update top header section
    public function update(Home $home, Request $request)
    {

        $request->validate([
            'image' => 'mimes:jpeg,png,jpg|max:5120',
        ]);
        if ($request->has('image')) {
            $image = $request->image->getClientOriginalName();
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $imageName = $filename . "-" . time() . "." . $extension;
            $request->image->storeAs("images", $imageName, "public");

            Storage::delete('/public/images/' . $home->image);
            $home->update(['image' => $imageName]);
        }
        $home->update([
            'title' => $request->title,
            'detail' => $request->detail,
            'button1' => $request->button1,
            'button2' => $request->button2,
        ]);
        return redirect()->back()->with('success', 'Data has been updated');
    }
    // Update contact section
    public function contactUpdate(Contact $contact, Request $request)
    {
        $contact->update($request->all());
        return redirect()->back()->with('success', 'Data has been updated');
    }

    // Update bnewsletter section
    public function newsletter(NewsLetter $news, Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $news->update($request->all());
        return redirect()->back()->with('success', 'Data has been updated');
    }
    // Update Test Call Section
    public function testcall(TestCall $call, Request $request)
    {

        $request->validate([
            'title' => 'required',
            'detail' => 'required',
        ]);
        $call->update($request->all());
        return redirect()->back()->with('success', 'Data has been updated');
    }
}

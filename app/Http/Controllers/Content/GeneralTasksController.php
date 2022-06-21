<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Content\Contact;
use App\Models\Content\Product;
use App\Notifications\ContactMessageNotification;
use Illuminate\Http\Request;

class GeneralTasksController extends Controller
{
    // website pricing page
    public function pricing()
    {
        $products = Product::where('status', true)->get();
        return view('prison.pricing', compact('products'));
    }

    // website contact page
    public function contact()
    {
        $contact = Contact::first();
        return view('prison.contact', compact('contact'));
    }

    // send contact message to admins
    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required',
            'g-recaptcha-response' => 'recaptcha',
        ]);

        $admins = Admin::where('role_id', 1)->select(['id', 'email', 'name'])->get();
        foreach ($admins as $admin) {
            $admin->notify(new ContactMessageNotification($admin->name, $request));
        }
        return response()->json(['stutas' => true]);
    }
}

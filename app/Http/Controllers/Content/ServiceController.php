<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use App\Models\Content\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function services()
    {
        $service = Service::get()->first();
        return view('prison.services', compact('service'));
    }

    public function index()
    {
        $service = Service::get()->first();
        return view('content.service', compact('service'));
    }

    public function update(Service $service, Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg|max:5120',
            'image1' => 'mimes:jpeg,png,jpg|max:5120',
        ]);
        // dd($request->all());
        if ($request->image) {
            $image = $request->image->getClientOriginalName();
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $imageName = $filename . "-" . time() . "." . $extension;
            $request->image->storeAs("images", $imageName, "public");
        }
        if ($service->image) {
            Storage::delete('/public/images/' . $service->image);
        }
        if ($request->image1) {
            $image1 = $request->image1->getClientOriginalName();
            $filename = pathinfo($image1, PATHINFO_FILENAME);
            $extension = pathinfo($image1, PATHINFO_EXTENSION);
            $imageName1 = $filename . "-" . time() . "." . $extension;
            $request->image1->storeAs("images", $imageName1, "public");
        }
        if ($service->image1) {
            Storage::delete('/public/images/' . $service->image1);
        }


        $service->update([
            'service_head_1' => $request->service_head_1,
            'service_detail_1' => $request->service_detail_1,
            'service_head_2' => $request->service_head_2,
            'service_detail_2' => $request->service_head_1,
            'ser_head_1' => $request->ser_head_1,
            'ser_detail_1' => $request->ser_detail_1,
            'ser_head_2' => $request->service_head_1,
            'ser_detail_2' => $request->ser_detail_2,
            'ser_head_3' => $request->ser_head_3,
            'ser_detail_3' => $request->ser_detail_3,
            'ser_head_4' => $request->ser_head_4,
            'ser_detail_4' => $request->ser_detail_4,
            'ser_head_5' => $request->ser_head_5,
            'ser_detail_5' => $request->ser_detail_5,
            'ser_head_6' => $request->ser_head_6,
            'ser_detail_6' => $request->ser_detail_6,
            'ser_head_7' => $request->ser_head_7,
            'ser_detail_7' => $request->ser_detail_7,
            'service_head_2_head1' => $request->service_head_2_head1,
            'service_detail_2_detail1' => $request->service_detail_2_detail1,
            'service_head_2_head2' => $request->service_head_2_head2,
            'service_detail_2_detail2' => $request->service_detail_2_detail2,
            'image' => $request->image ? $imageName : $service->image,
            'image1' => $request->image1 ? $imageName1 : $service->image1,
        ]);
        return redirect()->back()->with('success', 'Data has been updated');
    }
}

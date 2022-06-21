<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::latest()->paginate(10);
        return view('admin.editors.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.editors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:admins,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'role_id' => ['required', 'numeric'],
        ]);

        Admin::create($request->all());
        $type = $request->role_id == 1 ? 'admin' : 'editor';
        return redirect()->route('admins.index')->with('success', 'New ' . $type . ' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.editors.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'role_id' => ['required', 'numeric'],
        ]);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ]);
        if ($request->pasword) {
            $request->validate([
                'password' => ['required', 'confirmed', 'min:8'],
            ]);
            $admin->update([
                'password' => Hash::make($request->password)
            ]);
        }
        $type = $admin->role_id == 1 ? 'Admin' : 'Editor';
        return redirect()->route('admins.index')->with('success', $type . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $type = $admin->role_id == 1 ? 'Admin' : 'Editor';
        $admin->delete();
        return redirect()->route('admins.index')->with('success', $type . ' deleted successfully');
    }
}

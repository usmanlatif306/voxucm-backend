<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    // Show All did orders
    public function didOrders()
    {
        $orders = Order::with('user', 'prisonerdetail', 'billdetail', 'did', 'did.city')->whereNotNull('did_id')->where('order_status', 'Paid')->paginate(10);
        $type = 'did';
        return view('admin.orders.index', compact('orders', 'type'));
    }
    // Show All did orders
    public function planOrders()
    {
        $orders = Order::with('user', 'prisonerdetail', 'billdetail', 'product')->whereNotNull('product_id')->where('order_status', 'Paid')->paginate(10);
        $type = 'plan';
        return view('admin.orders.index', compact('orders', 'type'));
    }

    // Edit Order Status
    public function editOrder(Order $order, Request $request)
    {
        $order->update($request->all());
        return redirect()->back()->with('success', 'Order Updated Successfully');
    }

    // Show users
    public function users()
    {
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }

    // changing user status
    public function editStatus(User $user)
    {
        $status = $user->status === 1 ? 0 : 1;
        $user->status = $status;
        $user->save();
        return redirect()->back()->with('success', 'User Status Updated Successfully');
    }

    // users Details
    public function userDetails(User $user)
    {
        $numbers = $user->numbers;
        // dd($numbers[0]);
        return view('admin.users.show', [
            'user' => $user,
            'numbers' => $numbers,
        ]);
    }
}

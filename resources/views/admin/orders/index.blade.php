@extends('layouts.admin') @section('content')

<div class="bg-white mt-2 pt-3">
    <h1 class="text-center">Orders List</h1>
    @if(count($orders) < 1) <div class="section-title text-center pb-4">
        <h3 class="mt-3">No Order</h3>
</div>
@else @if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session("success") }}
</div>
@endif
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">User Name</th>
                    @if($type==='did')
                    <th scope="col">City</th>
                    <th scope="col">DID</th>
                    @else
                    <th scope="col">Name</th>
                    <th scope="col">Lines</th>
                    <th scope="col">Minutes</th>
                    <th scope="col">Month</th>
                    @endif
                    <th scope="col">Price</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Action</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$order->user->name}}</td>
                    @if($type==='did')
                    <td>{{$order->did->city->name}}</td>
                    <td>{{$order->did->dialing_code}}</td>
                    @else
                    <td>{{$order->product->name}}</td>
                    <td>{{$order->product->lines}}</td>
                    <td>{{$order->product->minutes}}</td>
                    <td>{{$order->product->month}}</td>
                    @endif
                    <td>£ {{$order->price}}</td>
                    <td>
                        <form id="{{'orderedit-'.$order->id}}" action="{{ route('admin.orders.editorder',$order->id)}}"
                            method="post">
                            @csrf @method('put')
                            <select name="order_status" class="form-control shadow-none">
                                <option value="Unpaid" {{ $order->
                                    order_status==='Unpaid' ? 'selected' :
                                    ''}}>Unpaid
                                </option>
                                <option value="Paid" {{ $order->
                                    order_status==='Paid' ? 'selected' :
                                    ''}}>Paid
                                </option>
                                <option value="Delivered" {{ $order->
                                    order_status==="Delivered" ? 'selected' :
                                    ''}}>Delivered
                                </option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary shadow-none"
                            onclick="document.getElementById('orderedit-{{$order->id}}').submit();">
                            Save
                        </button>
                    </td>
                    <td>
                        <span class="pointer mr-3" title="View Details" data-toggle="modal" data-target="#orderDetail"
                            data-billdetail="{{ $order->billdetail }}"
                            data-prisonerdetail="{{ $order->prisonerdetail }}"><i class="far fa-eye"></i></span>
                        <span class="fas fa-times text-danger pointer" title="Delete Order"
                            onclick="event.preventDefault(); document.getElementById('order-{{$order->id}}').submit();"></span>
                        <form style="display: none" id="{{'order-'.$order->id}}"
                            action="{{ route('order.delete',$order->id)}}" method="post">
                            @csrf @method('delete')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$orders->links()}}
    </div>
</div>

@endif
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="orderDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog order-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="pb-3">
                    <h3 class="py-1">1. Billing Details</h3>
                    <div class="d-flex mb-2">
                        <span class="font-14 w-50">First Name: <span id="fname" class="ml-2"></span></span>
                        <span class="font-14 w-50">Sur Name: <span id="sname" class="ml-2"></span></span>
                    </div>
                    <div class="d-flex mb-2">
                        <span class="font-14 w-50">Contact Number:
                            <span id="number" class="ml-2"></span></span>
                        <span class="font-14 w-50">Address: <span id="address" class="ml-2"></span></span>
                    </div>
                    <div class="d-flex mb-2">
                        <span class="font-14 w-50">City: <span id="city" class="ml-2"></span></span>
                        <span class="font-14 w-50">Country: <span id="country" class="ml-2"></span></span>
                    </div>
                    <div class="d-flex mb-2">
                        <span class="font-14 w-50">Post Code: <span id="postcode" class="ml-2"></span></span>
                        <span class="font-14 w-50">Area Prefix:
                            <span id="area_prefix" class="ml-2 text-capitalize"></span></span>
                    </div>
                    <div class="d-flex mb-2">
                        <span class="font-14 w-50">Email: <span id="email" class="ml-2"></span></span>
                        <span class="font-14 w-50">Payment:
                            <span id="pay_method" class="ml-2 text-capitalize"></span></span>
                    </div>
                </div>
                <div class="border-top pt-3">
                    <h3 class="py-1">2. Prisoner Details</h3>
                    <div class="d-flex mb-2">
                        <span class="font-14 w-50">Prisoner First Name:
                            <span id="prison_fname" class="ml-2"></span></span>
                        <span class="font-14 w-50">Prisoner Last Name:
                            <span id="prison_lname" class="ml-2"></span></span>
                    </div>
                    <div class="d-flex mb-2">
                        <span class="font-14 w-50">Prisoner Number:
                            <span id="prison_number" class="ml-2"></span></span>
                        <span class="font-14 w-50">Prisoner Status:
                            <span id="prison_status" class="ml-2"></span></span>
                    </div>
                    <div class="d-flex mb-2">
                        <span class="font-14 w-50">Prison: <span id="prison" class="ml-2"></span></span>
                        <span class="font-14 w-50">Relation With Prison:
                            <span id="prison_relation" class="ml-2"></span></span>
                    </div>
                    <div class="d-flex mb-2">
                        <span class="font-14 w-50">Prison Contact:
                            <span id="prison_contact" class="ml-2"></span></span>
                        <span class="font-14 w-50">Contact Name:
                            <span id="prison_contact_name" class="ml-2 text-capitalize"></span></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function () {
            // $("#orderDetail").modal("show");
            $("#orderDetail").on("show.bs.modal", function (event) {
                var button = $(event.relatedTarget);
                var billDetail = button.data("billdetail");
                // let billArr = Object.entries(billDetail);
                var prisonerDetail = button.data("prisonerdetail");
                console.log(prisonerDetail);
                var modal = $(this);
                // Showing Billing Details
                modal.find("#fname").text(billDetail.fname);
                modal.find("#sname").text(billDetail.sname);
                modal.find("#number").text(billDetail.number);
                modal.find("#address").text(billDetail.address);
                modal.find("#city").text(billDetail.city);
                modal.find("#country").text(billDetail.country);
                modal.find("#postcode").text(billDetail.postcode);
                modal.find("#area_prefix").text(billDetail.area_prefix);
                modal.find("#email").text(billDetail.email);
                modal.find("#pay_method").text(billDetail.pay_method);
                // Showing Payment Details
                modal.find("#prison_fname").text(prisonerDetail.prison_fname);
                modal.find("#prison_lname").text(prisonerDetail.prison_lname);
                modal.find("#prison_number").text(prisonerDetail.prison_number);
                modal.find("#prison_status").text(prisonerDetail.prison_status);
                modal.find("#prison").text(prisonerDetail.prison);
                modal.find("#prison_relation").text(prisonerDetail.prison_relation);
                modal.find("#prison_contact").text(prisonerDetail.prison_contact);
                modal
                    .find("#prison_contact_name")
                    .text(prisonerDetail.prison_contact_name);
            });
        });
    </script>
    @endpush @endsection
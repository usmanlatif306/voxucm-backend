@extends('layouts.account')@section('title', 'DID') @section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {!! session('error') !!}
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            @if(!$plan) <h3>User has currently no active plan. Please buy any plan first.</h3>
            @else
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="m-0 p-0">All Dids</h3>
                    <a href="{{route('prison.did.cities')}}" class="btn btn-sm btn-primary shadow-none">Purchase New
                        DID</a>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Active Plan: {{$plan->product->name}}</h4>
                        <h4>Plan Allowed Dids: {{$plan->product->lines}}</h4>
                        <h4>Remaining Dids: {{$plan->allowed_dids}}</h4>
                    </div>
                    <!-- did list here -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tenant-dash mt-3">
                            <thead>
                                <tr class="tableheading" style="text-align: center;">
                                    <th>No</th>
                                    <th>City</th>
                                    <th>DID</th>
                                    <th>Payment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($numbers) ===0)
                                <tr class="text-center">
                                    <td colspan="9">No Data</td>
                                </tr>
                                @else
                                @foreach($numbers as $number)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$number->did->city->name}}</td>

                                    <td>{{$number->did->dialing_code}}</td>
                                    <td>
                                        @if($number->order_status==='Unpaid')
                                        <span class="text-danger">
                                            {{$number->order_status}}
                                        </span>
                                        @else
                                        <span class="text-success">
                                            {{$number->order_status}}
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('prison.did.delete',$number->id)}}" method="post"
                                            id='did-{{$number->id}}'>
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <span class="cursor-pointer" style="cursor: pointer;"
                                            onclick="document.getElementById('did-{{$number->id}}').submit();"><i
                                                class="fas fa-trash text-danger"></i></span>
                                        <!-- <span class="cursor-pointer deleteDid" style="cursor: pointer;"
                                            data-id="{{$number->id}}"><i class="fas fa-trash text-danger"></i></span> -->
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
<!-- @push('scripts')
<script>
    $('.deleteDid').on('click', function () {
        let id = $(this).data('id');
        confirm(
            $('#did-' + id).submit()
        );

    })
</script>
@endpush -->
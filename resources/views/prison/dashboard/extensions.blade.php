@extends('layouts.account')@section('title', 'Extensions') @section('content')

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
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="m-0 p-0">Extensions</h3>
                    <button class="btn btn-sm btn-primary shadow-none" data-toggle="modal"
                        data-target="#exampleModal">Add New Extension</button>
                </div>
                <div class="card-body">
                    <!-- search -->
                    <!-- <div class="row my-3">
                        <div class="col-md-6">
                            <form action="">
                                <input type="text" placeholder="Extesion search"
                                    class="form-control shadow-none border">
                            </form>

                        </div>

                    </div> -->
                    <!-- extension list here -->
                    <div class="table-responsive">

                        <table id="example" class="table table-bordered table-striped table-hover tenant-dash mt-3">
                            <thead>
                                <tr class="tableheading" style="text-align: center;">
                                    <th>No</th>
                                    <th>Extension</th>
                                    <th>User Name</th>
                                    <th>Call Forfording</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($extensions as $extension)
                                <tr class="text-center">
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$extension['EXTENSION']}}</td>
                                    <td id="username{{$loop->iteration}}">{{$extension['USERNAME']}}</td>
                                    <td style="display: none;" id="subscriberId{{$loop->iteration}}">
                                        {{$extension['SUBSCRIBERID']}}</td>
                                    <td id="forwarding{{$loop->iteration}}">{{$extension['FORWARDING'] ?
                                        $extension['FORWARDING']->destination_number:''}}</td>
                                    <td>
                                        <label class="switch" data-id="{{$loop->iteration}}">
                                            <input type="checkbox" @if($extension['FORWARDING'] &&
                                                $extension['FORWARDING']->status) checked @endif
                                            id="callForwarding{{$loop->iteration}}">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                <form action="{{route('disable_call_forwarding')}}"
                                    id="disableForwarding{{$loop->iteration}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="number" value="{{$extension['FORWARDING'] ?
                                    $extension['FORWARDING']->destination_number:''}}">
                                    <input type="hidden" name="destination" value="{{$extension['USERNAME']}}">
                                    <input type="hidden" name="subscriber_id" value="{{$extension['SUBSCRIBERID']}}">
                                </form>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Data</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Grid row-->

    <!-- Add extension model shows here -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h3>Add New Extension</h3>
                    <form action="{{route('prison.extensions.add')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="extension">Extension</label>
                            <input type="number" name="extension" class="form-control" id="extension"
                                placeholder="Enter Extension" required>
                        </div>
                        <div class="form-group">
                            <label for="extensionPassword">Password</label>
                            <input type="password" name="password" class="form-control" id="extensionPassword"
                                placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Add extension model end -->

    <!-- Call Forwarding model shows here -->
    <div class="modal fade" id="callForwarding" tabindex="-1" role="dialog" aria-labelledby="callForwardingLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3>Add Call Forwarding</h3>
                    <form action="{{route('set_call_forwarding')}}" method="POST" class="mt-3">
                        @csrf
                        <input type="hidden" id="destination" name="destination">
                        <input type="hidden" id="subscriberId" name="subscriber_id">
                        <div class="form-group">
                            <label for="desti">Destinantion Number</label>
                            <input type="number" name="number" class="form-control" id="desti"
                                placeholder="Destinantion Number" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enable</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add extension model end -->

</div>


@push('scripts')
<script>
    $('.switch').on('click', function () {
        let id = $(this).attr("data-id");
        let username = $('#username' + id).text();
        let subscriberId = $('#subscriberId' + id).text();
        let forwarding = $('#forwarding' + id).text();
        $('#callForwarding' + id).on('change', function (e) {
            if ($('#callForwarding' + id).is(":checked")) {
                $('#destination').val(username);
                $('#subscriberId').val(subscriberId);
                $('#desti').val(forwarding);
                // console.log('checked ' + id);
                $('#callForwarding').modal('show');
            } else {
                $('#disableForwarding' + id).submit();
            }
        })
    })

</script>
@endpush
@endsection
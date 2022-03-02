@extends('layouts.account')@section('title', 'Call Forwarding') @section('content')
<div class="containerpb-40">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <form action="{{route('set_call_forwarding')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <!-- <label>Destinantion Number</label> -->
                                    <input type="number" name="number" class="form-control"
                                        placeholder="Destinantion Number">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 ">
                                <button type="submit" class="btn btn-primary">Set</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
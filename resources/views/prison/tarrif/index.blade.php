@extends('layouts.account')@section('title', 'Tarrif') @section('content')
<div class="containerpb-40">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <form action="{{route('set_tarrif')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <!-- <label>Destinantion Number</label> -->
                                    <select name="tarrif" id="" class="form-control">
                                        <option value="tarrif1">Tarrif 1</option>
                                        <option value="tarrif2">Tarrif 2</option>
                                        <option value="tarrif3">Tarrif 3</option>
                                        <option value="tarrif4">Tarrif 4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 ">
                                <button type="submit" class="btn btn-primary">Add Tarrif</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
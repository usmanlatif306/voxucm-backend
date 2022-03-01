@extends('layouts.admin') @section('content')
<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <form action="{{route('admin.promos.store')}}" method="post" class="border-bottom mb-3">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Promo Code</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Promo Discount (%)</label>
                                <input type="number" name="value" class="form-control" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Plan Status</label>
                                <select name="status" class="form-control border">
                                    <option value="1">Active</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">
                                Create
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
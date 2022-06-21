@extends('layouts.admin') @section('content')
<div class="bg-white mt-2 pt-3">
    <h3 class="text-center">User Extensions List for {{$user->name}}</h3>
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session("success") }}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="tableheading">
                            <th class="text-center">No</th>
                            <th class="text-center">Extension</th>
                            <th class="text-center">User Name</th>
                            <th class="text-center">Call Forfording</th>
                            <th class="text-center">DID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($extensions as $extension)
                        <tr class="text-center">
                            <td>{{$loop->index+1}}</td>
                            <td>{{$extension['EXTENSION']}}</td>
                            <td>{{$extension['USERNAME']}}</td>
                            <td>{{$extension['FORWARDING']}}</td>
                            <td>
                                <form action="{{route('admin.extensions.did')}}" method="POSt">
                                    @csrf
                                    <div class="form-group d-flex">
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <input type="hidden" name="subscriber_id"
                                            value="{{$extension['SUBSCRIBERID']}}">
                                        <input type="hidden" name="extension" value="{{$extension['EXTENSION']}}">
                                        <input type="hidden" name="extension_username"
                                            value="{{$extension['USERNAME']}}">
                                        <input type="number" placeholder="Enter Did Number" name="did"
                                            value="{{$extension['DID']}}" class="form-control mr-2">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>

                                </form>
                            </td>
                        </tr>
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

@endsection
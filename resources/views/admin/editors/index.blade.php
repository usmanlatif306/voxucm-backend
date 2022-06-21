@extends('layouts.admin') @section('content')
<div class="bg-white mt-2 pt-3">
    <div class="d-flex justify-content-center align-items-center pb-3">
        <h4 class="text-center mb-0">Admins List</h4>
        <a href="{{route('admins.create')}}" class="ml-2" title="Create new admin" style="font-size: 20px;"><i
                class="fas fa-plus-circle text-danger pointer"></i></a>
    </div>

    <div class="card">
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session("success") }}
            </div>
            @endif
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope=" col" class="text-center">Name</th>
                        <th scope=" col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Role</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $user)
                    <tr>
                        <th class="text-center">{{$loop->index+1}}</th>
                        <td class="text-center">{{$user->name}}</td>
                        <td class="text-center">{{$user->email}}</td>
                        <td class="text-center">{{$user->role_id == 1 ? 'Admin': 'Editor'}}</td>
                        <td class="text-center">
                            <a style="font-size: 18px;" href="{{route('admins.edit',$user->id)}}">
                                <i class="fas fa-edit text-warning pointer mr-2"></i>
                            </a>
                            <span style="font-size: 18px;" class="delete" data-id="{{$user->id}}">
                                <i class="fas fa-trash text-danger pointer"></i>
                            </span>
                            <form id="user-{{$user->id}}" action="{{route('admins.destroy',$user->id)}}" method="POST">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="">No Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{$admins->links()}}
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('.delete').on('click', function () {
        let id = $(this).data("id");
        if (confirm('Are you sure?') == true) {
            $('#user-' + id).submit()
        } else {
            alert("You canceled!")
        }
    });
</script>
@endpush
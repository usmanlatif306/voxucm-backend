@extends('layouts.account')@section('title', 'Voice Mail') @section('content')

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
                    <h3 class="m-0 p-0">Voice Mail</h3>
                    <button class="btn btn-sm btn-primary shadow-none" data-toggle="modal" data-target="#exampleModal">
                        Add Voice Mail</button>
                </div>
                <div class="card-body">
                    <!-- extension list here -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover tenant-dash mt-3">
                            <thead>
                                <tr class="tableheading" style="text-align: center;">
                                    <th>No</th>
                                    <th>VoiceMail Username</th>
                                    <th>VoiceMail Secret</th>
                                    <th>Email Address</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($voicemails) ===0)
                                <tr class="text-center">
                                    <td colspan="6">No Data</td>
                                </tr>
                                @else
                                @foreach($voicemails as $item)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->extension}}</td>
                                    <td>{{$item->voicemail_secret}}</td>
                                    <td>{{$item->voice_mail}}</td>
                                    <td>
                                        <span class="px-2 py-1 bg-primary text-white rounded">
                                            {{$item->status}}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{route('prison.voicemail.edit',$item->voicemail_id)}}" title="Edit Voice Mail">
                                            <i class="far fa-edit text-info"></i>
                                        </a>
                                        <span class="ml-2 cursor-pointer" onclick="window.confirm(
                                            document.getElementById('voicemail-{{$item->voicemail_id}}').submit()
                                        );" title="Delete Voice Mail">
                                            <i class="fas fa-trash text-danger"></i>
                                        </span>
                                        <form action="{{route('prison.voicemail.delete',$item->voicemail_id)}}" method="post" id='voicemail-{{$item->voicemail_id}}'>
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Voice Mail model shows here -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="m-0 p-0">Add Voice Mail</h3>
                </div>
                <div class="modal-body">

                    <form action="{{route('prison.voicemail.add')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group">
                            <label for="secret">Voice Secret</label>
                            <input type="number" name="secret" class="form-control" id="secret" placeholder="Voice Secret" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Voice Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Voice Email" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
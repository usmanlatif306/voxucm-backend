@extends('layouts.account')
@section('title', 'User Profile')
@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
    @endif
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="m-0 p-0">User Profile</h3>
                </div>
                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {!! session('error') !!}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('user_update_profile')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="city">{{ __("City Name") }}</label>
                            <input id="city" type="text" class="
                            form-control @error('city') is-invalid @enderror" name="city" placeholder="City Name"
                                value="{{ old('city') }}" required />
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="country">{{ __("Country") }}</label>
                            <input id="country" type="text" class="
                                        form-control
                                        @error('country')
                                        is-invalid
                                        @enderror
                                    " name="country" placeholder="Country" value="{{ old('country') }}" required />

                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">{{ __("Address") }}</label>
                            <input id="address" type="text" class="
                                        form-control
                                        @error('address')
                                        is-invalid
                                        @enderror
                                    " name="address" placeholder="Address" value="{{ old('address') }}" required />

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="postCode">{{ __("Post Code") }}</label>
                            <input id="postCode" type="number" class="
                                        form-control
                                        @error('postcode')
                                        is-invalid
                                        @enderror
                                    " name="postcode" placeholder="Post Code" value="{{ old('postcode') }}" required
                                autocomplete="postcode" />
                            @error('postcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- prison details -->
                        <div class="form-group">
                            <label>{{ __("Prisoner First Name") }}</label>
                            <input type="text" name="prison_fname" class="form-control @error('prison_fname')
                                is-invalid
                                @enderror" value="{{ old('prison_fname') }}" placeholder="Prisoner First Name"
                                required />
                            @error('prison_fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __("Prisoner Last Name") }}</label>
                            <input type="text" name="prison_lname" class="form-control @error('prison_lname')
                                is-invalid
                                @enderror" value="{{ old('prison_lname') }}" placeholder="Prisoner Last Name"
                                required />
                            @error('prison_lname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __("Prisoner Number") }}</label>
                            <input type="number" name="prison_number" class="form-control @error('prison_number')
                                is-invalid
                                @enderror" value="{{ old('prison_number') }}" placeholder="Prisoner Number" required />
                            @error('prison_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __("Prison Status") }}</label>
                            <select name="prison_status" class="form-control" id="prison-status">
                                <option value="">
                                    Select Prison Status
                                </option>
                                <option value="sentenced">Sentenced</option>
                                <option value="remanded">Remanded</option>
                            </select>
                        </div>
                        <div class="form-group d-none" id="releaseDate">
                            <label>{{ __("Release Date") }}</label>
                            <input type="date" name="release_date" class="form-control" placeholder="Release Date" />
                        </div>
                        <div class="form-group">
                            <label>{{ __("Relation With Prisoner") }}</label>
                            <input type="text" name="prison_relation" class="form-control @error('prison_relation')
                                    is-invalid
                                    @enderror" value="{{ old('prison_relation') }}"
                                placeholder="Relation With Prisoner" required />
                            @error('prison_relation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $("select[name='prison_status']").change(function (e) {
            var status = e.target.value;
            if (status === "sentenced") {
                $("#releaseDate").removeClass("d-none");
            } else {
                $("#releaseDate").addClass("d-none");
            }
        });
    })

</script>
@endpush
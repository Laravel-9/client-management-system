@extends('layouts.app')

@section('title', 'Users')

@section('content')

<div class="row row-cards">
    <div class="col-12">
        <form action="{{ route('users.store') }}" method="post" class="card">
            <div class="card-header">
                <h4 class="card-title">Create User</h4>
            </div>
            <div class="card-body">
                {{-- <div class="row">
                    <div class="col-xl-4"> --}}
                        <div class="row">
                            <div class="col-md-6 col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label required">First Name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ old('first_name') }}">
                                </div>
                                
                            </div>
                        </div>
                    {{-- </div>
                </div> --}}
            </div>
            <div class="card-footer text-end">
                <div class="d-flex">
                    <a href="#" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-primary ms-auto">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
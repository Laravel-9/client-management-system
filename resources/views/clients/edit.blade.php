@extends('layouts.app')

@section('title', 'Edit Client')

@section('content')
<form action="{{ route('clients.update', $client->id) }}" method="post" class="card">
    @csrf
    @method('PUT')
    <div class="row cards">
        <div class="col-12">
            <div class="card-header">
                <h4 class="card-title">Contact Information</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="mb-3">
                            <label class="form-label required">Name</label>
                            <input type="text" class="form-control @error('contact_name') is-invalid @enderror" name="contact_name" id="contact_name" placeholder="Name" value="{{ old('contact_name', $client->contact_name) }}" required>
                            @error('contact_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Email</label>
                            <input type="text" class="form-control @error('contact_email') is-invalid @enderror" name="contact_email" id="contact_email" placeholder="Email" value="{{ old('contact_email', $client->contact_email) }}" required>
                            @error('contact_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Phone Number</label>
                            <input type="text" class="form-control @error('contact_phone_number') is-invalid @enderror" name="contact_phone_number" id="contact_phone_number" placeholder="Phone Number" value="{{ old('contact_phone_number', $client->contact_phone_number) }}" required>
                            @error('contact_phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="border : 20px solid #f1f5f9;"></div>
    <div class="row cards">
        <div class="col-12">
            <div class="card-header">
                <h4 class="card-title">Company Information</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="mb-3">
                            <label class="form-label required">Company Name</label>
                            <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" id="company_name" placeholder="Name" value="{{ old('company_name', $client->company_name) }}" required>
                            @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Company vat</label>
                            <input type="text" class="form-control @error('company_vat') is-invalid @enderror" name="company_vat" id="company_vat" placeholder="Company vat" value="{{ old('company_vat', $client->company_vat) }}" required>
                            @error('company_vat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Company address</label>
                            <textarea class="form-control @error('company_address') is-invalid @enderror" name="company_address" id="company_address" placeholder="Company address" required>{{ old('company_address', $client->company_address) }}</textarea>
                            @error('company_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Company city</label>
                            <input type="text" class="form-control @error('company_city') is-invalid @enderror" name="company_city" id="company_city" placeholder="Company city" value="{{ old('company_city', $client->company_city) }}" required>
                            @error('company_city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Company zip</label>
                            <input type="text" class="form-control @error('company_zip') is-invalid @enderror" name="company_zip" id="company_zip" placeholder="Company zip" value="{{ old('company_zip', $client->company_zip) }}" required>
                            @error('company_zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <div class="d-flex">
                    <a href="{{ route('clients.index') }}" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-primary ms-auto">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
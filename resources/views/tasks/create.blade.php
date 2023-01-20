@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
<form action="{{ route('tasks.store') }}" method="post" class="card">
    @csrf
    <div class="row cards">
        <div class="col-12">
            <div class="card-header">
                <h4 class="card-title">Create Task</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="mb-3">
                            <label class="form-label required">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Title" value="{{ old('title') }}" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Description" rows="6" required>{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Deadline</label>
                            <div class="input-icon mb-2">
                                <input class="form-control @error('deadline') is-invalid @enderror" placeholder="Select a date" id="deadline" name="deadline" value="{{ old('deadline') }}" required>
                                <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="4" y="5" width="16" height="16" rx="2"></rect><line x1="16" y1="3" x2="16" y2="7"></line><line x1="8" y1="3" x2="8" y2="7"></line><line x1="4" y1="11" x2="20" y2="11"></line><line x1="11" y1="15" x2="12" y2="15"></line><line x1="12" y1="15" x2="12" y2="18"></line></svg>
                                </span>
                            </div>
                            @error('deadline')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-label required">Assigned User</div>
                            <select class="form-select" name="user_id" id="user_id" required>
                                <option value="">Select Assigned User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id')==$user->id ? 'selected' : '' }}>{{ $user->first_name.' '.$user->last_name }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-label required">Assigned Client</div>
                            <select class="form-select" id="client_id" name="client_id" required>
                                <option value="">Select Assigned Client</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ old('client_id')==$client->id ? 'selected' : '' }}>{{ $client->company_name }}</option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>   
                        <div class="mb-3">
                            <div class="form-label required">Assigned Project</div>
                            <select class="form-select" id="project_id" name="project_id" required>
                                <option value="">Select Assigned Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}" {{ old('project_id')==$project->id ? 'selected' : '' }}>{{ $project->title }}</option>
                                @endforeach
                            </select>
                            @error('project_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>   
                        <div class="mb-3">
                            <div class="form-label required">Status</div>
                            <select class="form-select" id="status" name="status" required>
                                <option value="">Select Status</option>
                                @foreach (App\Models\Task::STATUS as $status)
                                    <option value="{{ $status }}" {{ old('status')==$status ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @error('status')
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
                    <a href="{{ route('tasks.index') }}" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-primary ms-auto">Create</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

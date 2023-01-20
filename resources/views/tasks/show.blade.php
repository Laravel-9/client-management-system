@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
    <div class="row row-cards">
        <div class="col-lg-8">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Client</h3>
                  </div>
                  <div class="card-body d-flex justify-content-between">
                    <div>
                        <div class="form-control-plaintext" style="color: #82aaf4">{{ $task->client->contact_name }}</div>
                        <div class="form-control-plaintext">{{ $task->client->contact_email }}</div>
                        <div class="form-control-plaintext">{{ $task->client->contact_phone_number }}</div>
                    </div>
                    <div>
                        <div class="form-control-plaintext">{{ $task->client->company_name }}</div>
                        <div class="form-control-plaintext">{{ $task->client->company_address }}</div>
                        <div class="form-control-plaintext">{{ $task->client->company_city.', '.$task->client->company_zip }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

          <div class="col-lg-4">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Assigned User</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-control-plaintext" style="color: #82aaf4">{{ $task->user->first_name.' '.$task->user->last_name }}</div>
                    <div class="form-control-plaintext">{{ $task->user->email }}</div>
                    <div class="form-control-plaintext">{{ $task->user->phone_number }}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">{{ $task->title }}</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-control-plaintext">{{ $task->description }}</div>                    
                  </div>
                  <div class="card-footer">
                    <div class="form-control-plaintext">Created at {{ date('d/m/y H:i a', strtotime($task->created_at)) }}</div>
                    <div class="form-control-plaintext">Updated at {{ date('d/m/y H:i a', strtotime($task->updated_at)) }}</div>
                </div>
                </div>
              </div>
            </div>
          </div>
          
    </div>
@endsection
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
                        <div class="form-control-plaintext" style="color: #82aaf4; line-height: 0.5 !important" >{{ $task->client->contact_name }}</div>  
                        <div class="form-control-plaintext" style="line-height: 0.5 !important">{{ $task->client->contact_email }}</div>
                        <div class="form-control-plaintext" style="line-height: 0.5 !important">{{ $task->client->contact_phone_number }}</div>
                    </div>
                    <div>
                        <div class="form-control-plaintext" style="line-height: 0.5 !important">{{ $task->client->company_name }}</div>
                        <div class="form-control-plaintext" style="line-height: 0.5 !important">{{ $task->client->company_address }}</div>
                        <div class="form-control-plaintext" style="line-height: 0.5 !important">{{ $task->client->company_city.', '.$task->client->company_zip }}</div>
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
                    <div class="form-control-plaintext" style="line-height: 0.5 !important">{{ $task->user->email }}</div>
                    <div class="form-control-plaintext" style="line-height: 0.5 !important">{{ $task->user->phone_number }}</div>
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
                    <div class="form-control-plaintext" style="line-height: 0.5 !important">{{ $task->title }}</div>
                  </div>
                  <div class="card-body">
                    <div class="form-control-plaintext">{{ $task->description }}</div>                    
                  </div>
                  <div class="card-footer" style="background-color: #ffffff;">
                    <div class="form-control-plaintext" style="line-height: 0.5 !important">Created at {{ date('d/m/y H:i a', strtotime($task->created_at)) }}</div>
                    <div class="form-control-plaintext" style="line-height: 0.5 !important">Updated at {{ date('d/m/y H:i a', strtotime($task->updated_at)) }}</div>
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
                    <h3 class="card-title">Information</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-control-plaintext" style="line-height: 0.5 !important">Deadline: {{ $task->deadline }}</div>
                    <div class="form-control-plaintext" style="line-height: 0.5 !important">Created at: {{ $task->created_at }}</div>
                    <div class="form-control-plaintext" style="line-height: 0.5 !important">Status: {{ $task->status }}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection
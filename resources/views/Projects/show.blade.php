@extends('layouts.app')

@section('title', 'Project')

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
                        <div class="form-control-plaintext" style="color: #82aaf4; line-height: 0.5 !important" >{{ $project->client->contact_name }}</div>  
                        <div class="form-control-plaintext" style="line-height: 0.5 !important">{{ $project->client->contact_email }}</div>
                        <div class="form-control-plaintext" style="line-height: 0.5 !important">{{ $project->client->contact_phone_number }}</div>
                    </div>
                    <div>
                        <div class="form-control-plaintext" style="line-height: 0.5 !important">{{ $project->client->company_name }}</div>
                        <div class="form-control-plaintext" style="line-height: 0.5 !important">{{ $project->client->company_address }}</div>
                        <div class="form-control-plaintext" style="line-height: 0.5 !important">{{ $project->client->company_city.', '.$project->client->company_zip }}</div>
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
                <div class="form-control-plaintext" style="color: #82aaf4">{{ $project->user->first_name.' '.$project->user->last_name }}</div>
                <div class="form-control-plaintext" style="line-height: 0.5 !important">{{ $project->user->email }}</div>
                <div class="form-control-plaintext" style="line-height: 0.5 !important">{{ $project->user->phone_number }}</div>
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
                    <div class="form-control-plaintext" style="line-height: 0.5 !important">{{ $project->title }}</div>
                </div>
                <div class="card-body">
                    <div class="form-control-plaintext">{{ $project->description }}</div>                    
                </div>
                <div class="card-footer" style="background-color: #ffffff;">
                    <div class="form-control-plaintext" style="line-height: 0.5 !important">Created at {{ date('d/m/y H:i a', strtotime($project->created_at)) }}</div>
                    <div class="form-control-plaintext" style="line-height: 0.5 !important">Updated at {{ date('d/m/y H:i a', strtotime($project->updated_at)) }}</div>
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
                        <div class="form-control-plaintext" style="line-height: 0.5 !important">Deadline: {{ $project->deadline }}</div>
                        <div class="form-control-plaintext" style="line-height: 0.5 !important">Created at: {{ $project->created_at }}</div>
                        <div class="form-control-plaintext" style="line-height: 0.5 !important">Status: {{ $project->status }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tasks List</h3>
                    </div>
                    <div class="card-body">
                        <div id="table-default" class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th><button class="table-sort" data-sort="sort-title">Title</button></th>
                                    <th><button class="table-sort" data-sort="sort-user">Assign To</button></th>
                                    <th><button class="table-sort" data-sort="sort-client">Client</button></th>
                                    <th><button class="table-sort" data-sort="sort-deadline">Deadline</button></th>
                                    <th><button class="table-sort" data-sort="sort-status">status</button></th>
                                    <th><button class="table-sort" data-sort="sort-created_at">Created At</button></th>
                                    <th><button class="table-sort" data-sort="sort-action">Action</button></th>
                                    </tr>
                                </thead>
                                <tbody class="table-tbody">
                                @foreach($project->tasks as $task)
                                    <tr>
                                        <td class="sort-title"><a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a></td>
                                        <td class="sort-user">{{ $task->user->first_name.' '.$task->user->last_name }}</td>
                                        <td class="sort-client">{{ $task->client->company_name }}</td>
                                        <td class="sort-deadline">{{ date('d/m/Y', strtotime($task->deadline)) }}</td>
                                        <td class="sort-status">{{ $task->status }}</td>
                                        <td class="sort-created_at">{{ date('d/m/Y H:i a', strtotime($task->created_at)) }}</td>
                                        <td class="sort-action">
                                            <a class="btn btn-sm btn-info" href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are your sure?');" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{-- {!! $tasks->links() !!} --}}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
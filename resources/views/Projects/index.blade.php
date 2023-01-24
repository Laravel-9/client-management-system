@extends('layouts.app')

@section('title', 'Projects')

@section('content')

<div class="card">
    <div class="card-body">
        @include('partials.messages')
        <div class="card-header">
  
            <h4 class="card-title">Projects List</h4>
            <div class="col text-end">
                <a href="{{ route('projects.create') }}" class="btn btn-lime">
                    Create Project
                </a>
            </div>
        </div>
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
                @foreach($projects as $project)
                    <tr>
                        <td class="sort-title"><a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a></td>
                        <td class="sort-user">{{ $project->user->first_name.' '.$project->user->last_name }}</td>
                        <td class="sort-client">{{ $project->client->company_name }}</td>
                        <td class="sort-deadline">{{ date('d/m/Y', strtotime($project->deadline)) }}</td>
                        <td class="sort-status">{{ $project->status }}</td>
                        <td class="sort-created_at">{{ date('d/m/Y H:i a', strtotime($project->created_at)) }}</td>
                        <td class="sort-action">
                            <a class="btn btn-sm btn-info" href="{{ route('projects.edit', $project->id) }}">Edit</a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are your sure?');" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{-- {!! $projects->links() !!} --}}
    </div>
</div>

@endsection
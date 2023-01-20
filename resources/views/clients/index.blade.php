@extends('layouts.app')

@section('title', 'clients')

@section('content')

<div class="card">
    <div class="card-body">
        @include('partials.messages')
        <div class="card-header">
  
            <h4 class="card-title">clients List</h4>
            <div class="col text-end">
                <a href="{{ route('clients.create') }}" class="btn btn-lime">
                    Create client
                </a>
            </div>
        </div>
        <div id="table-default" class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th><button class="table-sort" data-sort="sort-company_name">Comapany</button></th>
                    <th><button class="table-sort" data-sort="sort-company_vat">Vat</button></th>
                    <th><button class="table-sort" data-sort="sort-company_address">Address</button></th>
                    <th><button class="table-sort" data-sort="sort-created_at">Created At</button></th>
                    <th><button class="table-sort" data-sort="sort-action">Action</button></th>
                    </tr>
                </thead>
                <tbody class="table-tbody">
                @foreach($clients as $client)
                    <tr>
                        <td class="sort-company_name">{{ $client->company_name }}</td>
                        <td class="sort-company_vat">{{ $client->company_vat }}</td>
                        <td class="sort-company_address">{{ $client->company_address }}</td>
                        <td class="sort-created_at">{{ date('d/m/Y H:i a', strtotime($client->created_at)) }}</td>
                        <td class="sort-action">
                            <a class="btn btn-sm btn-info" href="{{ route('clients.edit', $client->id) }}">Edit</a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Are your sure?');" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{-- {!! $clients->links() !!} --}}
    </div>
</div>

@endsection
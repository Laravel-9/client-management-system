@extends('layouts.app')

@section('title', 'Users')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="card-header">
            <h4 class="card-title">Users List</h4>
            <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                <a href="{{ route('users.create') }}" class="btn btn-lime w-100">
                    Create User
                </a>
            </div>
        </div>
        <div id="table-default" class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th><button class="table-sort" data-sort="sort-first_name">Name</button></th>
                    <th><button class="table-sort" data-sort="sort-email">Email</button></th>
                    <th><button class="table-sort" data-sort="sort-phone_number">Phone</button></th>
                    <th><button class="table-sort" data-sort="sort-role">Role</button></th>
                    <th><button class="table-sort" data-sort="sort-created_at">Created At</button></th>
                    <th><button class="table-sort" data-sort="sort-action">Action</button></th>
                    </tr>
                </thead>
                <tbody class="table-tbody">
                @foreach($users as $user)
                    <tr>
                        <td class="sort-first_name">{{ $user->first_name." ".$user->last_name }}</td>
                        <td class="sort-email">{{ $user->email }}</td>
                        <td class="sort-phone_number">{{ $user->phone_number }}</td>
                        <td class="sort-role">
                            @foreach($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </td>
                        <td class="sort-created_at">{{ $user->created_at }}</td>
                        <td class="sort-action"><a class="btn btn-sm btn-info" href="{{ route('users.edit', $user) }}">
                            Edit
                        </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{!! $users->links() !!}}
        </
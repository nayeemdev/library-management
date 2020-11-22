@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">Users List</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $key => $user)
                                        <tr>
                                            <td class="py-1">
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{ $user->phone }}
                                            </td>
                                            <td>
                                                {!! $user->is_banned == 0 ? 'Active' : '<span class="text-danger">Banned</span>' !!}
                                            </td>
                                            <td align="center">
                                                <div class="dropdown">
                                                    <a class="btn btn-xs" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ti-settings menu-icon"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('users.changeStatus',['status' => $user->is_banned, 'id' => $user->id]) }}" onclick="if (! confirm('Are You Sure to Change Status?')) { return false; }">{{ $user->is_banned == 0 ? 'Ban ' : 'Unban ' }} User</a>
                                                        <a class="dropdown-item" href="#" >Edit</a>
                                                        <a class="dropdown-item" href="#" >Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer float-right bg-white">
                            {{ $users->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@include('partials.message')
    @parent

@endsection

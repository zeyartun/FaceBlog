@extends('Back/layouts/master')

@section('title', 'HOME')

@section('content')
    @if (session('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container-fluid">

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date</th>
                    <th scope="col">Role</th>
                    @foreach (auth()->user()->roles as $role)
                        @if ($role->role_name == "Admin")
                        <th scope="col">Edit</th>
                        @endif  
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td><img src='{{ asset($user->image) }}' width="25px;" style="border-radius: 50%;" alt=""></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                <span class="badge badge-info">
                                    {{$role->role_name}}
                                </span>
                            @endforeach
                        </td>
                        @foreach (auth()->user()->roles as $role)
                        @if ($role->role_name == "Admin")
                        <td><a href={{ 'member/' . $user->id . '/edit' }}>Edit</a></td>
                        @endif  
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection

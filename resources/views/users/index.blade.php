@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.DatatablesResponsive', true)

@section('content_header')
    <h3 class="m-0 text-dark">View All Users</h3>
@stop

@section('content')

    <div class="card-body">
        <table id="datatable" class="table table-striped table-bordered"
               style="width:100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name ?? 'User' }}</td>
                    <td><form action="{{ route('users.destroy',$user->id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form></td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Options</th>
            </tr>
            </tfoot>
        </table>
    </div>

@stop

@section('js')

@stop

@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Student Application</h2>
        </div>
        <div class="card-body">
            <a href="{{ url('/students/create') }}" class="btn btn-success btn-sm" title="Add New">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
            <br /><br />
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->mobile }}</td>
                                <td>
                                    <a href="{{ url('/student/' . $item->id) }}" title="View Student"
                                        class="btn btn-info btn-sm me-1">View</a>

                                    <a href="{{ url('/student/' . $item->id . '/edit') }}" title="Edit Student"
                                        class="btn btn-primary btn-sm me-1">Edit</a>

                                    <form method="POST" action="{{ url('/student', $item->id) }}" style="display:inline;">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            title="Delete Student">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
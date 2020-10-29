@extends('cruds.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all cruds</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('cruds.create') }}"> Create new cruds</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($cruds as $crud)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $crud->title }}</td>
                <td>{{ $crud->description }}</td>
                <td>
                    <form action="{{ route('cruds.destroy',$crud->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('cruds.show',$crud->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('cruds.edit',$crud->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $cruds->links() !!}

@endsection

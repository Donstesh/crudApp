<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>CRUD App</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('developer.create') }}"> Create Developer</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Developer Name</th>
                    <th>Developer Email</th>
                    <th>Developer stack</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($developer as $dev)
                    <tr>
                        <td>{{ $dev->id }}</td>
                        <td>{{ $dev->name }}</td>
                        <td>{{ $dev->email }}</td>
                        <td>{{ $dev->stack }}</td>
                        <td>
                            <form action="{{ route('developer.destroy',$dev->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('developer.edit',$dev->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {{ $developer->links() }}
    </div>
</body>
</html>

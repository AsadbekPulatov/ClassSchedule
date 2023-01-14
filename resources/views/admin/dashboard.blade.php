@extends('admin.master')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="">
                        <div class="d-flex">
                            <input type="date" class="form-control" name="date" value="{{ $today }}" style="width: 20%">
                            <input type="submit" class="btn btn-success" value="SAVE">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table id="myTable" class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Xona</th>
                            <th>Guruh</th>
                            <th>Dars</th>
                            <th>Vaqti</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lessons as $key => $user)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{ $user->room->name }}</td>
                                <td>{{ $user->group->name }}</td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->start_time }} - {{ $user->end_time }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@extends('admin.master')
@section('title', 'Leaderboard')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table id="myTable" class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Ism Familiya</th>
                            <th>Guruh</th>
                            <th>Stipendiya<button class="ml-3 btn btn-success" onclick="sortTable(3)"><i class="fa fa-sort" aria-hidden="true"></i></button></th>
                            <th>Proyekt<button class="ml-3 btn btn-success" onclick="sortTable(4)"><i class="fa fa-sort" aria-hidden="true"></i></button></th>
                            <th>Maqola<button class="ml-3 btn btn-success" onclick="sortTable(5)"><i class="fa fa-sort" aria-hidden="true"></i></button></th>
                            <th>Sertifikat<button class="ml-3 btn btn-success" onclick="sortTable(6)"><i class="fa fa-sort" aria-hidden="true"></i></button></th>
                            <th>Jami<button class="ml-3 btn btn-success" onclick="sortTable(7)"><i class="fa fa-sort" aria-hidden="true"></i></button></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user_array as $key => $user)
                            <tr @if($user['id']==\Illuminate\Support\Facades\Auth::id()) class="bg-primary" @endif>
                                <td>{{$loop->index+1}}</td>
                                <td>{{ $user['first_name']." ".$user['last_name']}}</td>
                                <td>{{ $user['group'] }}</td>
                                <td>{{ $user['stipendiya'] }}</td>
                                <td>{{ $user['project'] }}</td>
                                <td>{{ $user['maqola'] }}</td>
                                <td>{{ $user['certificate'] }}</td>
                                <td>{{ $user['count'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <script>
        function sortTable(col) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[col];
                    y = rows[i + 1].getElementsByTagName("TD")[col];
                    if (parseInt(x.innerHTML) < parseInt(y.innerHTML)) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
    </script>
@endsection

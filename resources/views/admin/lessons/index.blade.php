@extends('admin.master')
@section('title', 'Dars jadvali ('.$date.') ('.\App\Models\Group::find($group_id)->name.')')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                @include("admin.lessons.create")
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Fan</th>
                            <th>Xona</th>
                            <th>Boshlash vaqti</th>
                            <th>Tugash vaqti</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lessons as $firm)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$firm->name}}</td>
                                <td>{{$firm->room->name}}</td>
                                <td>{{$firm->start_time}}</td>
                                <td>{{$firm->end_time}}</td>
                                <td class="d-flex">

                                    <button type="button" onclick="edit({{$firm->id}})" class="btn btn-warning"
                                            data-toggle="modal" data-target="#modal-edit">
                                        <i class="fa fa-pen"></i>
                                    </button>

                                    <form action="{{route('lessons.destroy', $firm->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger show_confirm"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @include("admin.lessons.edit")
            </div>

        </div>
        <!-- /.col-md-6 -->
    </div>
@endsection
@section('custom-scripts')
    <script>

        @if ($message = Session::get('success'))
        toastr.success("{{$message}}");
        @endif
        @if ($message = Session::get('error'))
        toastr.error("{{$message}}");
        @endif

        let firmes =@json($lessons);

        function edit(id) {
            var form = document.getElementById('edit_form').action;
            document.getElementById('edit_form').action = form + '/' + id;
            for (let i = 0; i < firmes.length; i++) {
                if (id == firmes[i]["id"]) {
                    var firms = firmes[i];
                    console.log(firms);
                    document.getElementById('edit_name').value = firms['name'];
                    document.getElementById('edit_room_id').value = firms['room_id'];
                    document.getElementById('edit_start_time').value = firms['start_time'];
                    document.getElementById('edit_end_time').value = firms['end_time'];
                    document.getElementById('edit_id').value = firms['id'];
                    break;
                }
            }
        }
    </script>
@endsection

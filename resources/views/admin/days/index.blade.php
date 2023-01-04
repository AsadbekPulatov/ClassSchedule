@extends('admin.master')
@section('title', 'Kunlar')
@section('content')
    <div class="row">

        <!-- /.col-md-6 -->
        <div class="col">
            <div class="card">
                @include("admin.days.create")
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            @if(isset($date))
                                <th>Guruh</th>
                            @endif
                            <th>Sana</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($days as $firm)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                @if(isset($date))
                                    <td>
                                        <a href="{{ route('lessons.index', ['day_id' => $firm->id]) }}">
                                            {{ $firm->group->name}}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $firm->date }}
                                    </td>
                                @else
                                <td>
                                    <a href="{{ route('days.index', ['date' => $firm->date]) }}">
                                        {{$firm->date}}
                                    </a>
                                </td>
                                @endif
                                <td class="d-flex">

                                    <button type="button" onclick="edit({{$firm->id}})" class="btn btn-warning"
                                            data-toggle="modal" data-target="#modal-edit">
                                        <i class="fa fa-pen"></i>
                                    </button>

                                    <form action="{{route('days.destroy', $firm->id)}}" method="post">
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
                @include("admin.days.edit")
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

        let firmes =@json($days);

        function edit(id) {
            var form = document.getElementById('edit_form').action;
            document.getElementById('edit_form').action = form + '/' + id;
            for (let i = 0; i < firmes.length; i++) {
                if (id == firmes[i]["id"]) {
                    var firms = firmes[i];
                    console.log(firms);
                    @if(isset($date))
                    document.getElementById('edit_group_id').value = firms['group_id'];
                    @endif
                    document.getElementById('edit_date').value = firms['date'];
                    document.getElementById('edit_id').value = firms['id'];
                    break;
                }
            }
        }
    </script>
@endsection

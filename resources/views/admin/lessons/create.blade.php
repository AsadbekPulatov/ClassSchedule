<div class="card-header d-flex justify-content-between">
    <div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
            <i class="fa fa-plus"></i> Qo'shish
        </button>
    </div>
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Dars qo'shish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('lessons.store')}}" id="form">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" value="{{ $day_id }}" name="day_id">
                            <input type="hidden" value="{{ $group_id }}" name="group_id">
                            <div class="form-group">
                                <label for="name">Fan:</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="room_id">Xona:</label>
                                <select name="room_id" class="form-control" id="room_id" required>
                                    @foreach($rooms as $room)
                                        <option value="{{$room->id}}">{{$room->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start_time">Boshlash vaqti:</label>
                                <input type="time" name="start_time" class="form-control" id="start_time" required>
                            </div>
                            <div class="form-group">
                                <label for="end_time">Tugash vaqti:</label>
                                <input type="time" name="end_time" class="form-control" id="end_time" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Bekor qilish</button>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>

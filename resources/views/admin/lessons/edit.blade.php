
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Darsni tahrirlash</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('lessons.store')}}" method="post" id="edit_form">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="edit_id">
                    <div class="card-body">
                        <input type="hidden" value="{{ $day_id }}" name="day_id">
                        <input type="hidden" value="{{ $group_id }}" name="group_id">
                        <div class="form-group">
                            <label for="edit_name">Fan:</label>
                            <input type="text" name="name" class="form-control" id="edit_name" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_room_id">Xona:</label>
                            <select name="room_id" class="form-control" id="edit_room_id" required>
                                @foreach($rooms as $room)
                                    <option value="{{$room->id}}">{{$room->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_start_time">Boshlash vaqti:</label>
                            <input type="time" name="start_time" class="form-control" id="edit_start_time" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_end_time">Tugash vaqti:</label>
                            <input type="time" name="end_time" class="form-control" id="edit_end_time" required>
                        </div>
                    </div>
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

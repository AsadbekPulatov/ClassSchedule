<div class="card-header d-flex justify-content-between">
    <div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
            <i class="fa fa-plus"></i> Qo'shish
        </button>
        @if(!isset($date))
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-copy">
                <i class="fa fa-copy"></i> Nusxa olish
            </button>
        @endif
    </div>
    <div class="modal fade" id="modal-copy">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nusxa olish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('copy')}}" id="form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="copy_date">Sanadan:</label>
                                <input type="date" name="copy_date" class="form-control" id="copy_date" required>
                            </div>
                            <div class="form-group">
                                <label for="paste_date">Sanaga:</label>
                                <input type="date" name="paste_date" class="form-control" id="paste_date" required>
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
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kun qo'shish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('days.store')}}" id="form">
                        @csrf
                        <div class="card-body">
                            @if(isset($date))
                                <div class="form-group">
                                    <label for="group_id">Guruh:</label>
                                    <select name="group_id" id="group_id" class="form-control form-select">
                                        @foreach($groups as $group)
                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="date">Sana:</label>
                                <input type="date" name="date" class="form-control" id="date" required
                                       @if(isset($date)) value="{{$date}}" readonly @endif>
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

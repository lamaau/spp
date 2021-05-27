<a href="{{ route('master.student.edit', ['id' => $model->id]) }}" class="btn btn-warning">
    <i class="fa fa-pencil-alt"></i>
</a>
<button type="button" data-id="{{ $model->id }}" class="btn btn-danger btn-delete">
    <i class="fa fa-trash"></i>
</button>

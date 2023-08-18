<form action="{{ routeHelper(getModule().'.destroy', $id) }}" method="post" class="submit-form">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger delete-row">
        @lang('buttons.delete')
        <i class="fas fa-trash"></i>
    </button>
</form>

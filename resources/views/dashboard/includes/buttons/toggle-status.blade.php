<form method="post" action="{{ routeHelper(getModule().'.toggle.status', $id) }}" class="submit-form">
    @csrf

    <label class="form-check form-check-single form-switch cursor-pointer">
        <input class="form-check-input cursor-pointer change-status" type="checkbox" @checked($check)>
    </label>
</form>

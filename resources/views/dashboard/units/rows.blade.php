@foreach ($rows as $row)
    <tr>
        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
        <td> {{ $loop->iteration }} </td>
        <td> {{ $row->name }} </td>
        <td>
            @include('dashboard.includes.buttons.edit', ['id' => $row->id])
        </td>
        <td>
            @include('dashboard.includes.buttons.delete', ['id' => $row->id])
        </td>
    </tr>
@endforeach

<tr>
    <td colspan="10"> {{ $rows->links() }} </td>
</tr>

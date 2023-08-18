@foreach ($rows as $row)
    <tr>
        <td> <input class="form-check-input cursor-pointer m-0 align-middle row-checkbox" value="{{ $row->id }}"
                type="checkbox">
        </td>
        <td> {{ $loop->iteration }} </td>
        <td> {{ $row->name }} </td>
        <td>{{ $row->parent->name ?? 'قسم رئيسي' }}</td>
        <td>
            @include('dashboard.includes.buttons.show', ['id' => $row->id])
        </td>
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

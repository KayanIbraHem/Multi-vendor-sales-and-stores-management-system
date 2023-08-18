<ul>
    @foreach ($rows as $row)
        <li class="tree-diagram__root">
            <span>{{ $row->name }}</span>
            {{-- @if ($row->child->count()) --}}
                @include('dashboard.categories.tree-diagram', ['rows' => $row->child])
            {{-- @endif --}}
        </li>
    @endforeach
</ul>

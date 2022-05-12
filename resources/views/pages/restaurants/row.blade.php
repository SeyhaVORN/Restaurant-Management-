@foreach ($restaurant as $item)
    <tr>
        <th>{{ $item->id }}</th>
        <td>
            <a href="{{ route('show-res', $item->id) }}" style="color: #f00808;">
                {{ $item->name }}
            </a>
        </td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->phone }}</td>
        <td><img class="image" src="{{ asset('storage/images/restaurants/' . $item->image) }}">
        </td>
        <td>
            <a href="{{ route('delete-r', $item->id) }}"><i class="bi bi-trash"></i></a>
            <a href="{{ route('edit-r', $item->id) }}"><i class="bi bi-pencil-square ml-3"></i></a>
        </td>
    </tr>
@endforeach

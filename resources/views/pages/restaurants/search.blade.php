<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>

    <div class="container mt-3">
        <h1>Restaurant list page here</h1>
        <button class="btn btn-danger mb-2"><a href="{{ Route('restaurants.store') }}" class="link">Add
                Rastaurant</a></button>
        <button class="btn btn-danger mb-2"><a href="{{ Route('restaurants.index') }}" class="link">Show
                Resturant</a></button>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rastaurant Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Create at</th>
                    <th>Update at</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurants as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td><img class="image"
                                src="{{ asset('storage/images/restaurants/' . $item->image) }}">
                        </td>
                        <td>
                            <a href="{{ route('delete-r', $item->id) }}"><i class="bi bi-trash"></i></a>
                            <a href="{{ route('edit-r', $item->id) }}"><i class="bi bi-pencil-square ml-3"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>

 <x-app-layout>
    <div class="container mt-3">
        <div class="card-header">
            <h3>Show
                Resturant <a href="{{ route('restaurants.index') }}" class="link btn btn-primary float-end">Show
                    Resturant</a></h3>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rastaurant ID</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody id="search-list">
                @foreach ($restaurantFiles as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->restaurant_id }}</td>
                        <td>
                            <img class="image"
                                src="{{ asset('storage/images/restaurants/' . $item->image) }}">
                        </td>
                        <td><a href="{{ route('files.destroy', $item->id) }}" class="remove-list-image"
                                data-bs-target="#deleteListImage" data-bs-toggle="modal"><i
                                    class="bi bi-trash"></i></a>

                            {{-- <i class="fa-solid fa-xmark icon-xmark remove-image"
                                data-url="{{ route('delete-image', $item->id) }}" data-bs-target="#deleteImage"
                                data-bs-toggle="modal"></i> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @include('pages.modals.deleteListImage')
        <div class="row">
            <span class="next-paginate gallery mt-3">{{ $restaurantFiles->links() }}</span>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
                $('a.remove-list-image').on('click', function() {
                    let url = $(this).attr('href');
                    $('form#remove-list-image-modal').attr('action', url);
                })
            });
        </script>
    @endpush
</x-app-layout>

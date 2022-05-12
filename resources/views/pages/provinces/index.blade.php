<x-app-layout>
    <div class="container mt-3">
        <div class="card-header">
            <h3>Add Province <a href="{{ route('provinces.create') }}" class="link btn btn-info float-end">Add
                    Provinces</a></h3>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Province</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody id="search-list">
                @foreach ($provinces as $province)
                    <tr>
                        <td>{{ $province->id }}</td>
                        <td>{{ $province->province }}</td>
                        <td>
                            <img class="image"
                                src="{{ asset('storage/images/' , $province->image) }}" alt="This is for {{$province->province}}">
                        </td>
                        <td>
                            <form action="{{ route('provinces.destroy', $province->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="bi bi-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <span class="next-paginate gallery mt-3">{{ $provinces->links() }}</span>
        </div>
    </div>
</x-app-layout>

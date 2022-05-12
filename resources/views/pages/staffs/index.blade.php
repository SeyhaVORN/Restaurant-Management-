<x-app-layout>

    <div class="container mt-3">
        <div class="card-header">
            <h3>
                List Staff
                <button type="button" class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#addStaff">
                    Add Staff
                </button>
            </h3>
            {{-- @include('modals.addStaff') --}}
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Staff Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Position</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody id="search-list">
                @foreach ($staffs as $staff)
                    <tr>
                        <td>{{ $staff->id }}</td>
                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>{{ $staff->phone }}</td>
                        <td>{{ $staff->gender }}</td>
                        <td>{{ $staff->position }}</td>
                        <td>
                            <img class="image"
                                src="{{ asset('storage/images/restaurants/' . $staff->image) }}">
                        </td>
                        <td><a href="{{ route('staffs.destroy', $staff->id) }}"><i class="bi bi-trash"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <span class="next-paginate gallery mt-3">{{ $staffs->links() }}</span>
        </div>
    </div>

</x-app-layout>

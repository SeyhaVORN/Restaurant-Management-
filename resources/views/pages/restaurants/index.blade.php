<x-app-layout>

    <div class="container mt-3">
        <div class="card-header">
            <h3>Restaurant list page here
                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                    data-bs-target="#addResturant">
                    New Resturant
                </button>
                @include('pages.modals.create')
            </h3>
        </div>

        <form class="mt-4" method="GET" action="{{ route('restaurants.index') }}">
            <div class="row mt-3">
                <div class="col-md-2">
                    <select data-column="0" onchange="this.form.submit()" name="province_id"
                        class="form-control filter-select" id="address">
                        <option value="">All provinces</option>
                        @foreach ($provinces as $province)
                            @php
                                $isSelected = request('province_id') == $province->id;
                                $selected = $isSelected ? 'selected' : null;
                            @endphp
                            <option value="{{ $province->id }}" {{ $selected }}>{{ $province->province }}
                            </option>
                        @endforeach
                    </select>

                </div>
                <div class="col-md-7"></div>
                <div class="col-md-3">

                    <div class="d-flex">
                        <input class="form-control me-2 search-box" id="search" name="search" type="text"
                            placeholder="Search Rastaurant" aria-label="Search" value="{{ request('search') }}">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>

                </div>
            </div>
        </form>


        <table class="table table-striped table-hover mt-4" id="restaurant-table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="chkCheckAll"></th>
                    <th>
                        ID
                        {{-- <span wire:click="sortBy('id')" class="float-end text-sm" style="cursor: pointer;">
                            <i class="fa fa-arrow-up" style="font-size: 10px"></i>
                            <i class="fa fa-arrow-down text-muted" style="font-size: 10px"></i>
                        </span> --}}
                    </th>
                    <th>Rastaurant Name</th>
                    <th>Email</th>
                    <th>Province</th>
                    <th>Phone Number</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="search-list">
                @foreach ($data as $item)
                    <tr id="sid{{ $item->id }}">
                        <th class="align-middle"><input type="checkbox" class="checkboxClass" id="chekboxid"
                                name="ids" value="{{ $item->id }}"></th>

                        <th class="align-middle">{{ $item->id }}</th>
                        <th class="align-middle">{{ $item->name }}</th>

                        {{-- <td class="align-middle"">
                            <a href=" {{ route('restaurants.show', $item->id) }}" style="color: #f00808;">
                            {{ $item->name }}
                            </a>
                        </td> --}}

                        <td class="align-middle">{{ $item->email }}</td>
                        <td class="align-middle">{{ $item->province->province }}</td>
                        <td class="align-middle">{{ $item->phone }}</td>
                        <td class="image-post align-middle">
                            <img class="image img-topp"
                                src="{{ asset('storage/images/restaurants/' . $item->image) }}">
                        </td>
                        <td class="align-middle">
                            {{-- <i class="bi bi-trash remove-resturant link-color"
                                data-bs-target="#deleteResturant{{ $item->id }}" data-bs-toggle="modal"
                                data-url="{{ route('restaurants.destroy', $item->id) }}"></i> --}}

                            <a href="{{ route('restaurants.edit', $item->id) }}"
                                class="link-color btn btn-primary m-3">Edit</a>

                            <a href="{{ route('restaurants.show', $item->id) }}"
                                class="link-color btn btn-info">Detail</a>

                            {{-- <a href="{{ route('restaurants.edit', $item->id) }}" class="link-color "><i
                                    class="bi bi-pencil-square ml-3 mr-4"></i></a>

                            <a href="{{ route('restaurants.show', $item->id) }}" class="link-color"><i
                                    class="bi bi-list-task"></i></a> --}}

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- @include('pages.modals.deleteListRestaurant') --}}
        <div class="row">
            <div class="col-md-10">
                <span class="next-paginate gallery mt-3">{{ $data->links() }}</span>
            </div>

            <div class="col-md-2">
                <a href="" class="btn btn-danger m-0" id="DeleteAllSelectedRecord" style="display: none"
                    data-bs-target="#deleteAllSelect" data-bs-toggle="modal"
                    data-url="{{ route('delete-restaurant-multi') }}">Delete Selected</a>
            </div>
            @include('pages.modals.deleteAllSelect')

        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
                $('i.remove-resturant').on('click', function() {
                    let url = $(this).attr('data-url');
                    $('form#remove-resturant-modal').attr('action', url);
                })

                $('a.delete-all-select').on('click', function() {
                    let url = $(this).attr('data-url');
                    $('form#remove-All-select').attr('action', url);
                });

                $('#chkCheckAll').click(function() {
                    $('.checkboxClass').prop('checked', $(this).prop('checked'));
                })

                $('button#delete-all-select').click(function(e) {
                    e.preventDefault();
                    var allids = [];

                    $("input:checkbox[name=ids]:checked").each(function() {
                        allids.push($(this).val());
                    })

                    $.ajax({
                        url: "{{ route('delete-restaurant-multi') }}",
                        type: 'DELETE',
                        data: {
                            _token: $('input[name= _token]').val(),
                            ids: allids
                        },
                        success: function(response) {
                            $.each(allids, function(key, val) {
                                $('#sid' + val).remove();
                            })
                        }
                    });

                    $("input#chekboxid").click(function() {
                        // if(allids.lenth>0){
                            console.log(allids);

                            $("#DeleteAllSelectedRecord").toggle();
                        // }
                    });

                    $("input#chkCheckAll").click(function() {
                        $("#DeleteAllSelectedRecord").toggle();
                    });
                });

            });
        </script>
    @endpush
</x-app-layout>

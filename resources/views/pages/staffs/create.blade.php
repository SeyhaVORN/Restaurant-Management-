<x-app-layout>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card-header">
                    <h2>Add Staff
                        <a href="{{ route('staffs.index') }}" class="link btn btn-primary float-end">List
                            Staff</a>
                    </h2>
                </div>
                <div class="card-header">
                    <form action="{{ route('staffs.store') }}" method="POST" enctype="multipart/form-data"> <br />
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name"
                                id="exampleInputName" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Email address" id="exampleInputEmail1" aria-describedby="emailHelp"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number"
                                id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="gender">
                                <option value="">Selec Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputAddress" class="form-label">Position</label>
                            <input type="text" class="form-control" name="position" placeholder="Position"
                                id="exampleInputAddress" required>
                        </div>

                        {{-- Preview Image: --}}
                        <div class="row justify-content">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="file-input" class="form-label label-style"><i
                                            class="fa-solid fa-upload"></i>
                                        &nbsp;Choose a photo</label>
                                    <input type="file" class="form-control input-file" id="file-input" name="image"
                                        accept="image/pgn, image/jpeg" id="exampleInputAddress file-input" required
                                        multiple>
                                </div>
                            </div>

                            <div class="col-md-6 around">
                                <div class="rounded mx-auto d-block img-holder"></div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Add Staff</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- @endsection --}}
{{-- preview photos --}}
@push('scripts')
    <script type="text/javascript">
        $(function() {

            $('input[type="file"][name="image"]').on('change', function() {

                var img_path = $(this)[0].value;
                var img_holder = $('.img-holder');
                var extension = img_path.substring(img_path.lastIndexOf('.') + 1).toLowerCase();

                if (extension == 'jpeg' || extension == 'jpg' || extension == 'png') {
                    if (typeof(FileReader) != 'undefined') {
                        img_holder.empty();
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('<img/>', {
                                'src': e.target.result,
                                'class': 'img-fluid',
                                'style': 'max-width:290px;margin-bottom:10px;border-radius: 10px;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;'
                            }).appendTo(img_holder);
                        }
                        img_holder.show();
                        reader.readAsDataURL($(this)[0].files[0]);
                    } else {
                        $(img_holder).html('This browser does not support FileReader');
                    }
                } else {
                    $(img_holder).empty();
                }
            });
        });
    </script>
@endpush

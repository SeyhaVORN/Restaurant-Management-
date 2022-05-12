<x-app-layout>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('restaurants.update', $data->id) }}" method="POST"
                    enctype="multipart/form-data">
                    <br />
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Input Name</label>
                        <input type="text" class="form-control" value="{{ $data->name }}" name="name"
                            id="exampleInputName" aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" value="{{ $data->email }}" name="email"
                            id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" value="{{ $data->phone }}" name="phone"
                            id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputAddress" class="form-label">Provine</label>
                        <select name="province_id" aria-valuemax="{{ $data->province_id }}" class="form-select"
                            id="address">
                            <option value="">Select Province</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->province }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputAddress" class="form-label">Description</label>
                        <textarea type="text" class="form-control" name="description" id="exampleInputAddress"
                            required> {{ $data->description }}</textarea>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <input type="file" name="image" class="custom-file-input input-file" id="images"
                                multiple="multiple">
                            <label class="custom-file-label label-style" for="images"><i class="fa-solid fa-upload"></i>
                                &nbsp;Choose images</label>
                        </div>

                        <div class="col-md-6 ">
                            <div class="rounded mx-auto d-block img-holder imgPreview" id="images">
                                <img class="image img-topp" id="imageShow"
                                    src="{{ asset('storage/images/restaurants/' . $data->image) }}">
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mt-1">Update Resturant</button>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
                // Multiple images preview with JavaScript
                var multiImgPreview = function(input, imgPreviewPlaceholder) {

                    if (input.files) {
                        var filesAmount = input.files.length;

                        for (i = 0; i < filesAmount; i++) {
                            var reader = new FileReader();

                            reader.onload = function(event) {
                                $('img#imageShow').remove();
                                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                    imgPreviewPlaceholder);
                            }

                            reader.readAsDataURL(input.files[i]);
                        }
                    }
                };

                $('#images').on('change', function() {
                    multiImgPreview(this, 'div.imgPreview');
                });
            });
        </script>
    @endpush
</x-app-layout>

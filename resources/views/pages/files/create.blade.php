<x-app-layout>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card-header">
                    <h2>Add Image
                        <a href="{{ Route('files.index') }}" class="link btn btn-primary float-end">Show
                            Resturant</a>
                    </h2>
                </div>
                <div class="card-header">
                    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data"> <br />
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Restaurant ID</label>
                            <input type="text" class="form-control" name="restaurant_id" id="exampleInputName"
                                aria-describedby="emailHelp" required>
                            @if ($errors->any('restaurant_id'))
                                <span class="text-danger">{{ $errors->first('restaurant_id') }}</span>
                            @endif
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <input type="file" name="images[]" class="custom-file-input input-file" id="images"
                                    multiple="multiple">
                                <label class="custom-file-label label-style" for="images"><i
                                        class="fa-solid fa-upload"></i>
                                    &nbsp;Choose a photo</label>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 grid-view">
                                <div class="rounded mx-auto d-block imgPreview" id="images"></div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Add Image</button>
                    </form>
                </div>
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

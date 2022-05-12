<x-app-layout>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card-header">
                    <h2>Add Resturant
                        <a href="{{ route('restaurants.index') }}" class="link btn btn-primary float-end">List
                            Resturant</a>
                    </h2>
                </div>

                <div class="card-header">
                    <form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
                        <br />
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Resturant Name</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                placeholder="Resturant Name" id="exampleInputName" aria-describedby="emailHelp">
                            @if ($errors->any('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" value="{{ old('email') }}" name="email"
                                id="email" placeholder="Email address" id="exampleInputEmail1"
                                aria-describedby="emailHelp" required>
                            @if ($errors->any('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" value="{{ old('phone') }}"
                                placeholder="098-454-4545" name="phone" id="exampleInputEmail1"
                                aria-describedby="emailHelp" required>
                            @if ($errors->any('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputAddress" class="form-label">Province</label>
                            <select name="province_id" class="form-select" value="{{ old('province_id') }}"
                                id="province_id">
                                <option value="">Select Province...</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->province }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputAddress" class="form-label">Description</label>
                            <textarea class="form-control" name="description" value="{{ old('description') }}" placeholder="Description"
                                id="exampleInputAddress" required></textarea>
                            @if ($errors->any('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
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
                            @if ($errors->any('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Add Resturant</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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

        {{-- <script>
        let fileInput = document.getElementById('file-input');
        let imageContainer = document.getElementById("images");
        let numberOfFiles = document.getElementById("num-of-files");

        function preview() {
            imageContainer.innerHtml = "";
            numberOfFiles.textContent = `${fileInput.files.length} File Selected`;
            for (i of fileInput.files) {
                let reader = new FileReader();
                let figure = document.createElement('figure');
                let figCap = document.createElement('figcaption');
                figCap.innerText = i.name;
                figure.appendChild(figCap);

                reader.onload = () => {
                    let img = document.createElement('img');
                    img.setAttribute("scr", reader.result);
                    figure.insertBefore(img, figCap);
                }

                imageContainer.appendChild(figure);
                reader.readAsDataURL(i);
            }
        }
    </script> --}}
        {{-- add multi photos --}}
        {{-- <script>
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
    </script> --}}
    @endpush
</x-app-layout>

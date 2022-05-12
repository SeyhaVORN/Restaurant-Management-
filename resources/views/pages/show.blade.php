<x-app-layout>

    <div class="container mt-3">
        <div class="card-header">
            <h3>Restaurant Detail information
                <a href="{{ route('restaurants.index') }}" class="link btn btn-primary float-end"><i
                        class="fa-solid fa-angle-left"></i>&nbsp; Back</a>
            </h3>
        </div>
        <div class="card-header mt-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5">
                            <h6>Restaurant Name : </h6>
                        </div>
                        <div class="col-md-7"><b style="color: #0819b4">{{ $restaurant->name }}</b></div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <h6>Created By : </h6>
                        </div>
                        <div class="col-md-7"><b style="color:#191b19">{{ $restaurant->createdBy->name }}</b>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <h6>Restaurant Email : </h6>
                        </div>
                        <div class="col-md-7"><b>{{ $restaurant->email }}</b></div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <h6>Phone Number : </h6>
                        </div>
                        <div class="col-md-7"><b>{{ $restaurant->phone }}</b></div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <h6>Province : </h6>
                        </div>
                        <div class="col-md-7"><b>{{ $restaurant->province->province }}</b></div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <h6>Description : </h6>
                        </div>
                        <div class="col-md-7"><i>{{ $restaurant->description }}</i></div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <h6>Created At : </h6>
                        </div>
                        <div class="col-md-7"><b style="color: #d63333">{{ $restaurant->created_at }}</b></div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <h6>Updated At : </h6>
                        </div>
                        <div class="col-md-7"><b style="color: #d63333">{{ $restaurant->updated_at }}</b></div>
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <img class="imag-res"
                        src="{{ asset('storage/images/restaurants/' . $restaurant->province->image) }}" alt="">
                </div> --}}
            </div>

        </div>

        <div class="card-header mt-3">
            <h3>Gallery
                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add Image
                </button>

            </h3>
            @include('pages.modals.add')
        </div>

        <div class="card-header mt-2">
            <div class="row">
                @forelse ($files as $item)
                    <div class="col-md-3 main-gallery">
                        <img class="imag-res" src="{{ asset('storage/images/restaurants/' . $item->image) }}"
                            alt="">

                        <i class="fa-solid fa-xmark icon-xmark remove-image"
                            data-url="{{ route('files.destroy', $item->id) }}" data-bs-target="#deleteImage"
                            data-bs-toggle="modal"></i>
                    </div>
                @empty
                    No image galleries.
                @endforelse
            </div>
        </div>

        <div class="mt-3 gallery">{{ $files->links() }}</div>

        @include('pages.modals.deleteImageRestaurant')

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

                $('i.remove-image').on('click', function() {
                    let url = $(this).attr('data-url');
                    $('form#remove-image-modal').attr('action', url);
                })
            });
        </script>
    @endpush
</x-app-layout>

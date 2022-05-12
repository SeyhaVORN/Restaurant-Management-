<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add Image restaurant</h3>
            </div>
            <div class="modal-body">
                <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data"> <br />
                    @csrf
                    <div class="mb-3">
                        {{-- <label for="exampleInputName" class="form-label">Restaurant ID</label> --}}
                        <input type="hidden" class="form-control" value="{{ $restaurant->id }}" name="restaurant_id"
                            id="exampleInputName" aria-describedby="emailHelp" required>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <input type="file" name="images[]" class="custom-file-input input-file" id="images"
                                multiple="multiple">
                            <label class="custom-file-label label-style" for="images"><i class="fa-solid fa-upload"></i>
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

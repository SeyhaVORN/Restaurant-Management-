<style>
    .form-label {
        color: rgb(27, 3, 3);
        font-size: 18px
    }

    .label-style {
        color: #fff;
    }

</style>
<div class="modal fade" id="addResturant" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Create new restaurant') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action=" {{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data"> <br />
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Resturant Name</label>
                        <input type="text"
                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                            name="name" placeholder="Resturant Name" id="exampleInputName" aria-describedby="emailHelp">
                        @if ($errors->any('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email address"
                            id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        @if ($errors->any('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" placeholder="Phone Number" name="phone"
                            id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        @if ($errors->any('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputAddress" class="form-label">Province</label>
                        <select name="address" class="form-select" id="address">
                            <option value="">Select Province</option>
                            <option value="Banteay Meanchey">Banteay Meanchey</option>
                            <option value="Battambang">Battambang</option>
                            <option value="Kampong Cham">Kampong Cham</option>
                            <option value="Kampong Chhnang">Kampong Chhnang</option>
                            <option value="Kampong Speu">Kampong Speu</option>
                            <option value="Kampong Thom">Kampong Thom</option>
                            <option value="Kampot">Kampot</option>
                            <option value="Kandal">Kandal</option>
                            <option value="Kratié">Kratié</option>
                            <option value="Koh Kong">Koh Kong</option>
                            <option value="Mondulkiri">Mondulkiri</option>
                            <option value="Phnom Penh">Phnom Penh</option>
                            <option value="Preah Vihear">Preah Vihear</option>
                            <option value="Prey Veng">Prey Veng</option>
                            <option value="Pursat">Pursat</option>
                            <option value="Ratanakiri">Ratanakiri</option>
                            <option value="Siem Reap">Siem Reap</option>
                            <option value="Preah Sihanouk">Preah Sihanouk</option>
                            <option value="Stung Treng">Stung Treng</option>
                            <option value="Svay Rieng">Svay Rieng</option>
                            <option value="Takéo">Takéo</option>
                            <option value="Oddar Meanchey">Oddar Meanchey</option>
                            <option value="Kep">Kep</option>
                            <option value="Pailin">Pailin</option>
                            <option value="Tboung Khmum">Tboung Khmum</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputAddress" class="form-label">Description</label>
                        <textarea type="text" class="form-control" name="description" placeholder="Description" id="exampleInputAddress"
                            required></textarea>
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
                                <input type="file" class="form-control input-file " id="file-input" name="image"
                                    accept="image/pgn, image/jpeg" id="exampleInputAddress file-input" required
                                    multiple>
                            </div>
                        </div>

                        <div class="col-md-6 around">
                            <div class="rounded mx-auto d-block img-holder"></div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Add Resturant</button>
                </form>
            </div>
        </div>
    </div>
</div>
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

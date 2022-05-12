<form action="{{ route('restaurants.destroy', $item->id) }}" method="POST" enctype="multiple/form-data"
    id="remove-resturant-modal">
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <div class="modal fade" id="deleteResturant{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Delete Restaurant') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    You sure you want to restaurant? <b>{{ $item->id }}</b> <b></b>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-outline-danger">{{ __('Delete Restaurant') }}</a> </button>
                </div>
            </div>
        </div>
    </div>
</form>

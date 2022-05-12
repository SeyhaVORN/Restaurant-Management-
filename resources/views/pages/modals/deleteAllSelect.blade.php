<div class="modal fade" id="deleteAllSelect" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Delete all selected') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                You sure you want to delete all selected? <b></b>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-outline-danger" data-bs-dismiss="modal"
                    id="delete-all-select">{{ __('Delete Selected') }}</a>
                </button>
            </div>
        </div>
    </div>
</div>

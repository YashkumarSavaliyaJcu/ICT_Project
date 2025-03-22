<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{url('Admin/delete')}}" method="post">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> Are you want to Delete?</div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="delete_redirect" id="delete_redirect">
                    <input type="hidden" class="form-control" name="delete_message" id="delete_message">
                    <input type="hidden" class="form-control" name="delete_table" id="delete_table">
                    <input type="hidden" class="form-control" name="delete_field" id="delete_field">
                    <input type="hidden" class="form-control" name="delete_value" id="delete_value">

                    <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn mb-2 btn-info">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ajaxdeletemodal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{url('Admin/delete')}}" method="post">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> Are you want to Delete?</div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="delete_redirect" id="delete_redirect">
                    <input type="hidden" class="form-control" name="delete_message" id="delete_message">
                    <input type="hidden" class="form-control" name="delete_table" id="delete_table">
                    <input type="hidden" class="form-control" name="delete_field" id="delete_field">
                    <input type="hidden" class="form-control" name="delete_value" id="delete_value">

                    <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn mb-2 btn-info">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ajaxapprovalmodal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{url('Admin/reviewapproval')}}" method="post">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">Approval Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> Are you want to Approved?</div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="approved_value" id="approved_value">

                    <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn mb-2 btn-info">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
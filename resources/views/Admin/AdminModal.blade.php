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


{{-- Add to track modal --}}
<div class="modal fade" id="addtotrack" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{url('/Admin/shipmentprocess')}}" method="post">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">Shipment Process</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="couponcode">Shipment Type</label>
                                <input type="hidden" name="oid" id="shipoid"/>
                                <br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input shipdata" type="radio" name="shiptype" id="Shiprocket" value="1" checked>
                                    <label class="form-check-label" for="Shiprocket">Shiprocket</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input shipdata" type="radio" name="shiptype" id="Manual" value="2">
                                    <label class="form-check-label" for="Manual">Manual</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input shipdata" type="radio" name="shiptype" id="Track" value="3">
                                    <label class="form-check-label" for="Track">Tracking Detail</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 shipdetail">
                            <div class="form-group mb-3">
                                <label for="Length">Length (cm)</label>
                                <input type="number" id="Length" class="form-control" name="length" placeholder="Length">
                            </div>
                        </div>
                        <div class="col-md-6 shipdetail">
                            <div class="form-group mb-3">
                                <label for="Breadth">Width/Breadth (cm)</label>
                                <input type="number" id="Breadth" class="form-control" name="breadth" placeholder="Width/Breadth">
                            </div>
                        </div>
                        <div class="col-md-6 shipdetail">
                            <div class="form-group mb-3">
                                <label for="Height">Height (cm)</label>
                                <input type="number" id="Height" class="form-control" name="height" placeholder="Height">
                            </div>
                        </div>
                        <div class="col-md-6 shipdetail">
                            <div class="form-group mb-3">
                                <label for="Weight">Weight (gms)</label>
                                <input type="number" id="Weight" step="0.001" class="form-control" name="weight" placeholder="Weight">
                            </div>
                        </div>
                        <div class="col-md-12 shipmanual" style="display: none;">
                            <div class="form-group mb-3">
                                <label for="cpartner">Courier Partner</label>
                                <input type="text" id="cpartner" class="form-control" name="cpartner" placeholder="Courier Partner">
                            </div>
                        </div>
                        <div class="col-md-12 shipmanual" style="display: none;">
                            <div class="form-group mb-3">
                                <label for="tdetail">Tracking Details(Link)</label>
                                <input type="text" id="tdetail" class="form-control" name="tdetail" placeholder="Tracking Details(Link)">
                            </div>
                        </div>
                        <div class="col-md-12 shipmanual" style="display: none;">
                            <div class="form-group mb-3">
                                <label for="awb">AWB</label>
                                <input type="text" id="awb" class="form-control" name="awb" placeholder="AWB Code">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn mb-2 btn-info">Process</button>
                </div>
            </form>
        </div>
    </div>
</div>
@extends('Admin.Master')
@section('body')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
            <h2 class="page-title">Coupons
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add"><span class="fe fe-plus fe-16"></span> Add Coupon</button>
            </h2>
            {!! session()->get('message') !!}
            @if(isset($fetchcoupon))
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{url('Admin/coupons')}}/{{$fetchcoupon->coupon_id}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" class="form-control" name="title" placeholder="Title" value="{{$fetchcoupon->title}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="code">Code</label>
                                        <input type="text" id="code" name="code" class="form-control" placeholder="Code" value="{{$fetchcoupon->code}}" required>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="form-group mb-3">
                                        <label for="customFile">Image</label>
                                        <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="c_image">
                                        <label class="custom-file-label cimagename" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group mb-3">
                                        <div class="custom-file">
                                            <img src="{{asset('public/Assets/images/coupons')}}/{{$fetchcoupon->c_image}}" width="80px" height="80px"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="min_amount">Minimum Amount ($)</label>
                                        <input type="number" min="0" id="min_amount" name="min_amount" class="form-control" value="{{$fetchcoupon->min_amount}}" placeholder="Minimum Amount" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="c_amount">Discount Amount ($)</label>
                                        <input type="number" min="0"  id="c_amount" name="c_amount" class="form-control" value="{{$fetchcoupon->c_amount}}" placeholder="Discount Amount" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="description">Description</label>
                                        <textarea class="form-control ckeditor" name="description" id="description" placeholder="Description" rows="4">{{$fetchcoupon->b_description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <a href="{{url('/Admin/coupons')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
                                    <button type="submit" class="btn btn-primary">Edit Coupon</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- / .card -->
            @endif

            <div class="card shadow mb-4">
                <div class="card-body">
                    <table class="table datatables display responsive nowrap" id="dataTable-1">
                        <thead>
                            <tr>
                                <th class="all">#</th>
                                <th class="all">Image</th>
                                <th class="all">Title</th>
                                <th class="all">Code</th>
                                <th class="all">Minimum Amount</th>
                                <th class="all">Discount Amount</th>
                                <th class="none">Description</th>
                                <th class="all">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coupons as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{asset('public/Assets/images/coupons')}}/{{$value->c_image}}" title="{{$value->title}}" width="80px" height="80px"/></td>
                                    <td>{{$value->title}}</td>
                                    <td>{{$value->code}}</td>
                                    <td>${{$value->min_amount}}</td>
                                    <td>${{$value->c_amount}}</td>
                                    <td>{!!$value->description!!}</td>
                                    <td>
                                        <a href="{{url('/Admin/coupons')}}/{{$value->coupon_id}}"><button type="button" class="btn btn-success"><span class="fe fe-edit fe-16"></span></button></a>
                                        <button type="button" class="btn btn-danger delete_recoard" redirect="coupons" message="Coupon" table="coupons" field="coupon_id" value="{{$value->coupon_id}}" data-toggle="modal" data-target="#deletemodal"><span class="fe fe-trash fe-16"></span></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                </div>
            </div>
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
        {{-- Modal --}}
        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Add New Coupon</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> 
                        <form action="{{url('Admin/coupons')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" class="form-control" name="title" placeholder="Title" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="code">Code</label>
                                        <input type="text" id="code" name="code" class="form-control" placeholder="Code" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="customFile">Image</label>
                                        <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="c_image" required>
                                        <label class="custom-file-label cimagename" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="min_amount">Minimum Amount ($)</label>
                                        <input type="number" min="0" id="min_amount" name="min_amount" class="form-control" placeholder="Minimum Amount" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="c_amount">Discount Amount ($)</label>
                                        <input type="number" min="0" id="c_amount" name="c_amount" class="form-control" placeholder="Discount Amount" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="description">Description</label>
                                        <textarea class="form-control ckeditor" name="description" id="description" placeholder="Description" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add Coupon</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .container-fluid -->
</main>
@endsection

@section('script')

<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').summernote();
    });
    $('input[name="c_image"]').change(function(){
        var files = $(this)[0].files;
        $('.cimagename').html(files[0].name);
    });
</script>
@endsection
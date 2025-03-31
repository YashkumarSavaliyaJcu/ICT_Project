@extends('Admin.Master')
@section('body')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">{{isset($edit)?'Edit':'Add New'}} Service
                    <a href="{{url('Admin/services')}}"><button type="button" class="btn btn-primary float-right">View
                            Service List</button></a>
                </h2>
                {!! session()->get('message') !!}
                @if(isset($edit))
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{url('Admin/services')}}/{{$edit->s_id}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="s_title">Service Name*</label>
                                            <input id="s_title" name="s_title" type="text" placeholder="Service Title"
                                                class="form-control" value="{{$edit->s_title}}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="s_url">Service Url*</label>
                                            <input id="s_url" name="s_url" type="text" placeholder="Service URL"
                                                class="form-control" value="{{$edit->s_url}}" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        
                                        <div class="col-md-5">
                                            <div class="form-group mb-3">
                                                <label for="customFile">Service Image</label>
                                                <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="s_image">
                                                <label class="custom-file-label simagename" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group mb-3">
                                                <div class="custom-file">
                                                    <img src="{{asset('public/Assets/images/services')}}/{{$edit->s_image}}" width="80px" height="80px"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group mb-3">
                                                <label for="customFileLogo">Service Logo</label>
                                                <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFileLogo" name="s_logo">
                                                <label class="custom-file-label slogoname" for="customFileLogo">Choose Logo</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group mb-3">
                                                <div class="custom-file">
                                                    <img src="{{asset('public/Assets/images/services')}}/{{$edit->s_logo}}" width="80px" height="80px"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="s_price">Service Price*</label>
                                            <input id="s_price" name="s_price" type="number" min="1" placeholder="Price"
                                                class="form-control" value="{{$edit->s_price}}" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="cleaning_hour">Cleaning Hours*</label>
                                            <input id="cleaning_hour" name="cleaning_hour" type="number" min="1" value="1" placeholder="Cleaning Hours"
                                                class="form-control" value="{{$edit->cleaning_hour}}" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="no_of_cleaner">Number of Cleaner*</label>
                                            <input id="no_of_cleaner" name="no_of_cleaner" type="number" min="1" value="1" placeholder="Number of Cleaner"
                                                class="form-control" value="{{$edit->no_of_cleaner}}" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="visiting_hours">Visiting Hours*</label>
                                            <input id="visiting_hours" name="visiting_hours" type="text" placeholder="Visiting Hours"
                                                class="form-control" value="{{$edit->visiting_hours}}" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="s_contact">Service Provider Contact Number*</label>
                                            <input id="s_contact" name="s_contact" type="tel" placeholder="Service Provider Contact Number"
                                                class="form-control" value="{{$edit->s_contact}}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="s_email">Service Provider Email*</label>
                                            <input id="s_email" name="s_email" type="email" placeholder="Service Provider Email"
                                                class="form-control" value="{{$edit->s_email}}" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="s_description">Service Description</label>
                                            <textarea class="form-control ckeditor" id="s_description"
                                                name="s_description">{{$edit->s_description}}</textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="s_detail_description">Service Detail Description</label>
                                            <textarea class="form-control ckeditor" id="s_detail_description"
                                                name="s_detail_description">{{$edit->s_detail_description}}</textarea>
                                        </div>
                                    </div>
                                    <a href="{{url('Admin/services')}}"><button type="button"
                                            class="btn btn-danger">Cancel</button></a>
                                    <button type="submit" class="btn btn-primary">Edit Service</button>
                                </div> <!-- /. card-body -->
                            </div>
                        </form>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{url('Admin/services')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="s_title">Service Title*</label>
                                            <input id="s_title" name="s_title" type="text" placeholder="Service Title"
                                                class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="s_url">Service Url*</label>
                                            <input id="s_url" name="s_url" type="text" placeholder="Servce URL"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="customFile">Service Image*</label>
                                                <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="s_image" required>
                                                <label class="custom-file-label simagename" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="customFileLogo">Service Logo*</label>
                                                <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFileLogo" name="s_logo" required>
                                                <label class="custom-file-label slogoname" for="customFileLogo">Choose Logo</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="s_price">Service Price*</label>
                                            <input id="s_price" name="s_price" type="number" min="1" placeholder="Price"
                                                class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="cleaning_hour">Cleaning Hours*</label>
                                            <input id="cleaning_hour" name="cleaning_hour" type="number" min="1" value="1" placeholder="Cleaning Hours"
                                                class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="no_of_cleaner">Number of Cleaner*</label>
                                            <input id="no_of_cleaner" name="no_of_cleaner" type="number" min="1" value="1" placeholder="Number of Cleaner"
                                                class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="visiting_hours">Visiting Hours*</label>
                                            <input id="visiting_hours" name="visiting_hours" type="text" placeholder="Visiting Hours"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="s_contact">Service Provider Contact Number*</label>
                                            <input id="s_contact" name="s_contact" type="tel" placeholder="Service Provider Contact Number"
                                                class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="s_email">Service Provider Email*</label>
                                            <input id="s_email" name="s_email" type="email" placeholder="Service Provider Email"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="s_description">Service Description</label>
                                            <textarea class="form-control ckeditor" id="s_description"
                                                name="s_description"></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="s_detail_description">Service Detail Description</label>
                                            <textarea class="form-control ckeditor" id="s_detail_description"
                                                name="s_detail_description"></textarea>
                                        </div>
                                    </div>
                                    <a href="{{url('Admin/services')}}"><button type="button"
                                            class="btn btn-danger">Cancel</button></a>
                                    <button type="submit" class="btn btn-primary">Add Service</button>
                                </div> <!-- /. card-body -->
                            </div>
                        </form>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<script type="text/javascript">
$('#s_title').change(function() {
    url = $('#s_title').val().replace(/[^A-Za-z0-9]/g, "-").toLowerCase();
    $('#s_url').val(url);
});

$('input[name="s_image"]').change(function(){
    var files = $(this)[0].files;
    $('.simagename').html(files[0].name);
});
$('input[name="s_logo"]').change(function(){
    var files = $(this)[0].files;
    $('.slogoname').html(files[0].name);
});
</script>
<script>
$(document).ready(function() {
    $('.ckeditor').summernote();
});
</script>
@endsection
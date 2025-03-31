@extends('Admin.Master')
@section('body')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
            <h2 class="page-title">Teams
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add"><span class="fe fe-plus fe-16"></span> Add Team</button>
            </h2>
            {!! session()->get('message') !!}
            @if(isset($fetchTeam))
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{url('Admin/teams')}}/{{$fetchTeam->t_id}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{$fetchTeam->name}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="b_url">Position</label>
                                        <input type="text" id="position" name="position" class="form-control" placeholder="Position" value="{{$fetchTeam->position}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="customFile">Team Image</label>
                                        <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="t_image">
                                        <label class="custom-file-label bimagename" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-3">
                                        <div class="custom-file">
                                            <img src="{{asset('public/Assets/images/teams')}}/{{$fetchTeam->t_image}}" width="80px" height="80px"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" id="twitter" name="twitter" class="form-control" value="{{$fetchTeam->twitter}}" placeholder="Twitter">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" id="instagram" name="instagram" class="form-control" value="{{$fetchTeam->instagram}}" placeholder="Instagram">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="youtube">Youtube</label>
                                        <input type="text" id="youtube" name="youtube" class="form-control" value="{{$fetchTeam->youtube}}" placeholder="Youtube">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" id="facebook" name="facebook" class="form-control" value="{{$fetchTeam->facebook}}" placeholder="Facebook">
                                    </div>
                                </div>
                                
                                <div class="col-md-12 text-right">
                                    <a href="{{url('/Admin/teams')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
                                    <button type="submit" class="btn btn-primary">Edit Team</button>
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
                                <th class="all">Name</th>
                                <th class="all">Position</th>
                                <th class="none">Twitter</th>
                                <th class="none">Instagram</th>
                                <th class="none">Facebook</th>
                                <th class="none">Youtube</th>
                                <th class="all">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{asset('public/Assets/images/teams')}}/{{$value->t_image}}" title="{{$value->name}}" width="80px" height="80px"/></td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->position}}</td>
                                    <td>{{$value->twitter}}</td>
                                    <td>{{$value->instagram}}</td>
                                    <td>{{$value->facebook}}</td>
                                    <td>{{$value->youtube}}</td>
                                    <td>
                                        <a href="{{url('/Admin/teams')}}/{{$value->t_id}}"><button type="button" class="btn btn-success"><span class="fe fe-edit fe-16"></span></button></a>
                                        <button type="button" class="btn btn-danger delete_recoard" redirect="teams" message="Teams" table="teams" field="t_id" value="{{$value->t_id}}" data-toggle="modal" data-target="#deletemodal"><span class="fe fe-trash fe-16"></span></button>
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
                        <h5 class="modal-title" id="defaultModalLabel">Add New Blog</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> 
                        <form action="{{url('Admin/teams')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Name"  required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="position">Position</label>
                                        <input type="text" id="position" name="position" class="form-control" placeholder="Position"  required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="customFile">Team Image</label>
                                        <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="t_image" required>
                                        <label class="custom-file-label bimagename" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" id="twitter" name="twitter" class="form-control" placeholder="Twitter">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" id="instagram" name="instagram" class="form-control" placeholder="Instagram">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="youtube">Youtube</label>
                                        <input type="text" id="youtube" name="youtube" class="form-control"  placeholder="Youtube">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" id="facebook" name="facebook" class="form-control" placeholder="Facebook">
                                    </div>
                                </div>
                                
                                <div class="col-md-12 text-right">
                                    <a href="{{url('/Admin/teams')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
                                    <button type="submit" class="btn btn-primary">Add Team</button>
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
    $('input[name="t_image"]').change(function(){
        var files = $(this)[0].files;
        $('.bimagename').html(files[0].name);
    });
</script>
@endsection
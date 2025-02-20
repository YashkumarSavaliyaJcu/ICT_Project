@extends('Admin.Master')
@section('body')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
            <h2 class="page-title">Blogs
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add"><span class="fe fe-plus fe-16"></span> Add Blog</button>
            </h2>
            {!! session()->get('message') !!}
            @if(isset($fetchblog))
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{url('Admin/blogs')}}/{{$fetchblog->b_id}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="b_title">Blog Title</label>
                                        <input type="text" id="b_title" class="form-control" name="b_title" placeholder="Blog Title" value="{{$fetchblog->b_title}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="b_url">Blog Url</label>
                                        <input type="text" id="b_url" name="b_url" class="form-control" placeholder="Blog Url" value="{{$fetchblog->b_url}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="customFile">Blog Image</label>
                                        <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="b_image">
                                        <label class="custom-file-label bimagename" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-3">
                                        <div class="custom-file">
                                            <img src="{{asset('public/Assets/images/blogs')}}/{{$fetchblog->b_image}}" width="80px" height="80px"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="b_date">Blog Date</label>
                                        <input type="date" id="b_date" name="b_date" class="form-control" value="{{date('Y-m-d', strtotime($fetchblog->b_date))}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="b_description">Blog Description</label>
                                        <textarea class="form-control ckeditor" name="b_description" id="b_description" placeholder="Description" rows="4">{{$fetchblog->b_description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <a href="{{url('/Admin/blogs')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
                                    <button type="submit" class="btn btn-primary">Edit Blog</button>
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
                                <th class="all">Date</th>
                                <th class="none">Blog URL</th>
                                <th class="none">Description</th>
                                <th class="all">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{asset('public/Assets/images/blogs')}}/{{$value->b_image}}" title="{{$value->b_title}}" width="80px" height="80px"/></td>
                                    <td>{{$value->b_title}}</td>
                                    <td>{{date('d M, Y',strtotime($value->b_date))}}</td>
                                    <td><a href="{{$value->b_url}}" target="_blank">{{$value->b_url}}</a></td>
                                    <td>{!!$value->b_description!!}</td>
                                    <td>
                                        <a href="{{url('/Admin/blogs')}}/{{$value->b_id}}"><button type="button" class="btn btn-success"><span class="fe fe-edit fe-16"></span></button></a>
                                        <button type="button" class="btn btn-danger delete_recoard" redirect="blogs" message="Blog" table="blogs" field="b_id" value="{{$value->b_id}}" data-toggle="modal" data-target="#deletemodal"><span class="fe fe-trash fe-16"></span></button>
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
                        <form action="{{url('Admin/blogs')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="b_title">Blog Title</label>
                                        <input type="text" id="b_title" class="form-control" name="b_title" placeholder="Blog Title" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="b_url">Blog Url</label>
                                        <input type="text" id="b_url" name="b_url" class="form-control" placeholder="Blog Url" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="customFile">Blog Image</label>
                                        <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="b_image" required>
                                        <label class="custom-file-label bimagename" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="b_date">Blog Date</label>
                                        <input type="date" id="b_date" name="b_date" class="form-control" value="{{date('Y-m-d')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="b_description">Blog Description</label>
                                        <textarea class="form-control ckeditor" name="b_description" id="b_description" placeholder="Description" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add Blog</button>
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
    $('input[name="b_image"]').change(function(){
        var files = $(this)[0].files;
        $('.bimagename').html(files[0].name);
    });
</script>
@endsection
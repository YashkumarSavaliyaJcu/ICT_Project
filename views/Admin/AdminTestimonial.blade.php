@extends('Admin.Master')
@section('body')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
            <h2 class="page-title">Testimonial
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add"><span class="fe fe-plus fe-16"></span> Add Testimonial</button>
            </h2>
            {!! session()->get('message') !!}
            @if(isset($fetchTestimonial))
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{url('Admin/testimonial')}}/{{$fetchTestimonial->t_m_id}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{$fetchTestimonial->name}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="company_name">Company Name</label>
                                        <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Company Name" value="{{$fetchTestimonial->company_name}}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="message">Description</label>
                                        <textarea class="form-control ckeditor" name="message" id="message" placeholder="Description" rows="4">{{$fetchTestimonial->message}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="customFile">Image</label>
                                        <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <label class="custom-file-label bimagename" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-3">
                                        <div class="custom-file">
                                            <img src="{{asset('public/Assets/images/testimonial')}}/{{$fetchTestimonial->image}}" width="80px" height="80px"/>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 text-right">
                                    <a href="{{url('/Admin/testimonial')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
                                    <button type="submit" class="btn btn-primary">Edit Testimonial</button>
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
                                <th class="all">Company Name</th>
                                <th class="none">Message</th>
                                <th class="all">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($testimonial as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{asset('public/Assets/images/testimonial')}}/{{$value->image}}" title="{{$value->name}}" width="80px" height="80px"/></td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->company_name}}</td>
                                    <td>{!!$value->message!!}</td>
                                    <td>
                                        <a href="{{url('/Admin/testimonial')}}/{{$value->t_m_id}}"><button type="button" class="btn btn-success"><span class="fe fe-edit fe-16"></span></button></a>
                                        <button type="button" class="btn btn-danger delete_recoard" redirect="testimonial" message="Testimonial" table="testimonial" field="t_m_id" value="{{$value->t_m_id}}" data-toggle="modal" data-target="#deletemodal"><span class="fe fe-trash fe-16"></span></button>
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
                        <h5 class="modal-title" id="defaultModalLabel">Add New Testimonial</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"> 
                        <form action="{{url('Admin/testimonial')}}" method="post" enctype="multipart/form-data">
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
                                        <label for="company_name">Company Name</label>
                                        <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Company Name"  required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="customFile">Image</label>
                                        <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="image" required>
                                        <label class="custom-file-label bimagename" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="message">Description</label>
                                        <textarea class="form-control ckeditor" name="message" id="message" placeholder="Description" rows="4" required></textarea>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-12 text-right">
                                    <a href="{{url('/Admin/testimonial')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
                                    <button type="submit" class="btn btn-primary">Add Testimonial</button>
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
@extends('Admin.Master')
@section('body')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Services
                    <a href="{{url('Admin/services/new')}}"><button type="button" class="btn btn-primary float-right"><span class="fe fe-plus fe-16"></span> Add Service</button></a>
                </h2>
                {!! session()->get('message') !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <table class="table datatables display responsive nowrap" id="dataTable-1" style="width:100%">
                                <thead>
                                    <tr align="center">
                                        <th class="all">#</th>
                                        <th class="all">Title</th>
                                        <th class="all">Logo</th>
                                        <th class="all">Image</th>
                                        <th class="none">URL</th>
                                        <th class="all">Price</th>
                                        <th class="none">Description</th>
                                        <th class="none">Detail Description</th>
                                        <th class="none">Cleaning Hours</th>
                                        <th class="none">No. of Cleaner</th>
                                        <th class="all">Visiting Hours</th>
                                        <th class="all">Contact Number</th>
                                        <th class="all">Email</th>
                                        <th class="all">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $key => $value)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->s_title}}</td>
                                            <td><img src="{{asset('public/Assets/images/services')}}/{{$value->s_logo?$value->s_logo:'dummy.png'}}" title="{{$value->s_logo}}" width="80px" height="80px"/></td>
                                            <td><img src="{{asset('public/Assets/images/services')}}/{{$value->s_image?$value->s_image:'dummy.png'}}" title="{{$value->s_image}}" width="80px" height="80px"/></td>
                                            <td>{{$value->s_url}}</td>
                                            <td>{{$value->s_price}}</td>
                                            <td>{!!$value->s_description!!}</td>
                                            <td>{!!$value->s_detail_description!!}</td>
                                            <td>{{$value->cleaning_hour}}</td>
                                            <td>{{$value->no_of_cleaner}}</td>
                                            <td>{{$value->visiting_hours}}</td>
                                            <td>{{$value->s_contact}}</td>
                                            <td>{{$value->s_email}}</td>
                                            <td>
                                                <a href="{{url('Admin/services')}}/{{$value->s_id}}"><button type="button" class="btn btn-success"><span class="fe fe-edit fe-16"></span></button></a>
                                                <button type="button" class="btn btn-danger delete_recoard" redirect="services" message="Service" table="services" field="s_id" value="{{$value->s_id}}" data-toggle="modal" data-target="#deletemodal"><span class="fe fe-trash fe-16"></span></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</main>
@endsection
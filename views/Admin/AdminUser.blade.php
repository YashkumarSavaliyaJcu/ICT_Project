@extends('Admin.Master')
@section('body')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Users
                </h2>
                {!! session()->get('message') !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <table class="table datatables display responsive nowrap" id="dataTable-1" style="width:100%">
                                <thead>
                                    <tr align="center">
                                        <th class="all">#</th>
                                        <th class="all">Name</th>
                                        <th class="all">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $value)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->email}}</td>
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
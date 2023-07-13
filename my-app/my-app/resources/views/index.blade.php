@extends('layout')
@section('content')
<div class="container"><br/><br/>
    <div class="row">
        <div class="col-lg-10">
            <h2>Laravel 10 </h2>
        </div>
        <div class="col-lg-2">
            <a href="{{ url('/member/create') }}" class="btn btn-success" title="Add New Article">
                Add New Article
            </a>
        </div>
    </div>
    <table class="table table-bordered table-striped" id="membersTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Articlename</th>
                <th>Description</th>
                <th>Photo</th> 
                <th>Created_at</th>      
            </tr>    
        </thead>
        <tbody>
            @foreach($members as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <img src="{{ asset($item->photo) }}" width= '60' height='60' class="img img-responsive" />
                    </td>
                    <td>{{$item->created_at->format('Y-m-d')}}</td> 
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
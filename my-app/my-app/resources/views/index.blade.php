<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 Custom Login and Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>


<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
            </ul>
            <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Logout</button>
            </form>
          </div>
        </div>
    </nav>
 
    <div class="container">
       <h1> Welcome, {{ Auth::user()->name }}</h1>
    </div>

@extends('layout')
@section('content')
<div class="container"><br/><br/>
    <div class="row">
        <div class="col-lg-10">
            <h2>Laravel 10 </h2>
        </div>
        <form action="">
            <div class="form-group">
                <input type="search" name="search" id="" class="form-control" placeholder="Search by catagory name" value="">
            </div>  
            <br></br>
            <button class="btn btn-primary">Search</button>
            <a href="{{url('/member')}}">   
        </form>
        <br></br>
        <form action="">
        <button class="btn btn-primary" type="button">Reset the category</button>
        </form>
        <form method="GET" action="/filter">
        
            <div class="col-md-3">
                <label> Start Date: </label>
                <input type = "date" name="start_date" class="form-control">
            </div>

            <div class="col-md-3">
                <label> End Date: </label>
                <input type = "date" name="end_date" class="form-control">
            </div>

            <div class="col-md-1 pt-4">
                <button type = "submit" class="btn btn-primary">Filter</button>
            </div>
        </form>
        <br></br>
        <div class="col-lg-2">
            <a href="{{ url('/member/create') }}" class="btn btn-success" title="Add New Article">
                Add New Article
            </a>
        </div>
    </div>
    <br></br>
    <table class="table table-bordered table-striped" id="membersTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Articlename</th>
                <th>Links</th>
                <th>Category</th>
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
                    <td>{{ $item->Links }}</td>
                    <td>{{ $item->category }}</td>
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
</body>
</html>
@endsection
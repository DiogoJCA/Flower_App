@extends('layouts.mytemplate')

@section('title', 'flowers list')

<body class="flowers">
    
@section('content')
<link rel="stylesheet" href="flowers_style.css">

<h3>Flowers list<h3>
    @if(count($flo)>0)
        <p>We have some flowers</p>
        @foreach ($flo as $f)
            <p>Name : {{$f->name}}</p>   
            <p>Price : {{$f->price}}€</p>   
            <p>Type : {{$f->type}}</p>   
            <p>Date : {{$f->updatedAt}}</p>   
            <a href="{{ url('flower-details/' . $f->id)}}">Flower Details</a><br>
            <a href="{{ url('update-flower/' . $f->id)}}">Edit Flower</a><br>
            <a href="{{ url('flowers/delete/' . $f->id)}}" style="color: red">Delete Flower</a>
        @endforeach
    @else
        <p>No flowers found.</p>
    @endif 
        
@endsection
</body>
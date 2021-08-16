@extends('layouts.mytemplate')

@section('title', 'flowers list')

@section('content')


<h3>Flowers list<h3>
    @if(count($flo)>0)
        <p>We have some flowers</p>
        @foreach ($flo as $f)
            <p>Name : {{$f->name}}</p>   
            <p>Price : {{$f->price}}</p>   
            <a href="{{ url('update-flower/' . $f->id)}}">Edit Flower</a>
            <a href="{{ url('flowers/delete/' . $f->id)}}" style="color: red">Delete Flower</a>
        @endforeach
        
    @else
        <p>No flowers found.</p>
    @endif 
        
@endsection

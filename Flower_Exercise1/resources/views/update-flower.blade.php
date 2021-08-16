@extends('layouts.mytemplate')

@section('title', 'Update Flower')

@section('content')

<form action="" method="post">
    @csrf
    @foreach ($flo as $f)
    <label for="name">Name</label>
    <input type="text" name="name" value="{{$f->name}}"><br>
    <label for="price">Price</label>
    <input type="text" name="price" value="{{$f->price}}">
    <input type="submit" value="Edit Flower" name="submitBtn">
    @endforeach
</form>


@endsection
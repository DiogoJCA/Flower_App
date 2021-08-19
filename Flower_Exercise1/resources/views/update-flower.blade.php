@extends('layouts.mytemplate')

@section('title', 'Update Flower')

@section('content')

<form action="" method="post">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" value="{{$flo->name}}"><br>
    <label for="price">Price</label>
    <input type="text" name="price" value="{{$flo->price}}">
    <input type="submit" value="Edit Flower" name="submitBtn">
</form>


@endsection
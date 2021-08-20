@extends('layouts.mytemplate')

@section('title', 'Update Flower')

@section('content')

<form action="" method="post">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" value="{{$flo->name}}"><br>
    <label for="price">Price</label>
    <input type="text" name="price" value="{{$flo->price}}"><br>
    <p>Current type {{$flo->type}}</p>
    <label for="type">Type</label><br>
    <select name="type" id="type">
        <option value="Asteraceae">Asteraceae</option>
        <option value="Magnoliophyta">Magnoliophyta</option>
    </select>
    <input type="submit" value="Edit Flower" name="submitBtn">
</form>


@endsection
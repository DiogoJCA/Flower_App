@extends('layouts.mytemplate')

@section('title', 'Create Flower')

@section('content')

<form action="" method="post">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name"><br>
    <label for="price">Price</label>
    <input type="text" name="price">
    <input type="submit" value="Add Flower" name="submitBtn">
</form>


@endsection
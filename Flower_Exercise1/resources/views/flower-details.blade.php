@extends('layouts.mytemplate')

@section('title', 'Show 1 Flower')

@section('content')

<h3>My flower<h3>
<p>Name : {{$flower->name}}</p>   
<p>Price : {{$flower->price}}</p>   
<a href="{{ url('update-flower/' . $flower->id)}}">Edit Flower</a>
<a href="{{ url('flowers/delete/' . $flower->id)}}" style="color: red">Delete Flower</a>
<form action="" method="post">
    {{-- You must add this to every form, security token --}}
    @csrf
    <label for="subject">Subject : </label>
    <input type="text" name="subject"><br>
    <label for="message">Message : </label>
    <textarea name="message" id="message" cols="30" rows="10"></textarea>
    <input type="submit" value="Add Comment" name="submitBtn">
</form>
<h4>Comments : </h4>
@foreach($flower->comments as $comment)
    <p>Subject : {{ $comment->subject }}</p>
    <p>Message : {{ $comment->message }}</p><hr>
@endforeach
@endsection

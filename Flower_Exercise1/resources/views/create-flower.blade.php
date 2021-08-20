@extends('layouts.mytemplate')

@section('title', 'Create Flower')

@section('content')

<form action="" method="post">
    {{-- You must add this to every form, security token --}}
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name"><br>
    <label for="price">Price</label>
    <input type="text" name="price"><br>
    <label for="type">Type</label>
    <select name="type" id="type">
        <option value="Asteraceae">Asteraceae</option>
        <option value="Magnoliophyta">Magnoliophyta</option>
    </select>
    <input type="submit" value="Add Flower" name="submitBtn">
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@endsection
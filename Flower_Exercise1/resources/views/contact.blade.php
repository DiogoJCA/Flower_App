@extends('layouts.mytemplate')

@section('title', 'Contact')

<body class="contact">
    
@section('content')
<link rel="stylesheet" href="contact_style.css">
<form action="" method="post">
    {{-- You must add this to every form, security token --}}
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name"><br>
    <label for="price">Price</label>
    <input type="text" name="price">
    <input type="submit" value="Add Flower" name="submitBtn">
</form>

@endsection

</body>
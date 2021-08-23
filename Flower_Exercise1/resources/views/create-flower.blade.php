@extends('layouts.mytemplate')

@section('title', 'Create Flower')

@section('content')

<form action="" id="myForm" method="post" enctype="multipart/form-data">
    {{-- You must add this to every form, security token --}}
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name"><p id="error_name"></p><br>
    <label for="price">Price</label>
    <input type="text" name="price"><p id="error_price"></p><br>
    <label for="type">Type</label>
    <select name="type" id="type">
        <option value="Asteraceae">Asteraceae</option>
        <option value="Magnoliophyta">Magnoliophyta</option>
    </select>
    <label for="myFile">Upload a file : </label>
    <input type="file" name="file" id="myFile">
    <input type="submit" value="Add Flower" name="submitBtn">
    <h2 id="success"></h2>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>
<script>
    /* Wait for the page to be loaded/ready */
    $(function() {
        $('#myForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            // Ajax call
            $.ajax({
                    url: "{{ route('create-flower-submit') }}",
                    //url: 'ajax-answer',
                    method: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType:'json'
                })
                .done(function(result) {
                    // If AJAX call worked
                    // console.log(result);
                    $('#error_name').html('');
                    $('#error_price').html('');
                    if(result.success) {
                        $('#success').html(result.success);
                    } else {
                        $('#error_name').html(result.errors[0]);
                        $('#error_price').html(result.errors[1]);
                    }
                })
                .fail(function(result) {
                    console.log('AJAX FAILED');
                })
        });
    });
</script>
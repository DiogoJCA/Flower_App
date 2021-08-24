@extends('layouts.mytemplate')

@section('title', 'Login')

@section('content')

<form action="" method="post" id="myForm">
    @csrf
    <label for="username">Username : </label>
    <input type="text" name="username"><span id="error_username"></span><br>
    <label for="password">Password : </label>
    <input type="password" name="password" id="password"><span id="error_password"></span><br>
    <input type="submit" value="Login" name="submitBtn">
    <h2 id="success"></h2>
</form>

@endsection
@section('scripts')
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
            url: "{{ route('login-submit') }}",
            //url: 'ajax-answer',
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json'
        })
        .done(function(result) {
            // If AJAX call worked
            // console.log(result);

            $('#error_username').html('');
            $('#error_password').html('');
            if(result.errors) {
                $('#error_username').html(result.errors[0]);
                $('#error_password').html(result.errors[1]);
            }else if(result.error) {
                console.log(result.error);
            }else {
                window.location.href='flowers';
            }
        })
        .fail(function(result) {
            console.log(result);
            console.log('Ajax Failed');
        })
});
});
</script>

@endsection
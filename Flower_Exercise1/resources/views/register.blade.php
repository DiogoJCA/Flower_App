@extends('layouts.mytemplate')

@section('title', 'Register')

@section('content')

<form action="" method="post" id="myForm">
    @csrf
    <label for="username">Username : </label>
    <input type="text" name="username"><p id="error_username"></p><br>
    <label for="mail">Mail : </label>
    <input type="email" name="mail" id="mail"><p id="error_mail"></p><br>
    <label for="password">Password : </label>
    <input type="password" name="password" id="password"><p id="error_password"></p><br>
    <input type="submit" value="Register" name="submitBtn">
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
            url: "{{ route('register-submit') }}",
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
            $('#error_username').html('');
            $('#error_mail').html('');
            $('#error_password').html('');
            if(result.success) {
                $('#success').html(result.success);
            } else {
                $('#error_username').html(result.errors[0]);
                $('#error_mail').html(result.errors[1]);
                $('#error_password').html(result.errors[2]);
            }
        })
        .fail(function(result) {
            console.log(result);
        })
});
});
</script>

@endsection
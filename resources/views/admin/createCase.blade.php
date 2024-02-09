@extends('master')


@section('body')
<br><br><br><br><br>
<form action="/create/case" method="post">
@csrf
    <label for="id"> ID </label>
    <input  type="text" name="id"><br>
    <label for="title">Case Title</label>
    <input type="text" name="title"><br>
    <label for="type">Case type</label>
    <input type="text" name="type"><br>
    <label for="details">Case Details</label>
    <input type="text" name="details"><br>
    <button type="submit" >Submit</button>
</form>
@endsection
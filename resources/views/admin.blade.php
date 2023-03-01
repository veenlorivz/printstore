@extends('layouts.app')

@section('content')

  <h1>Ini Halaman Admin</h1>

  <img src={{ asset("storage/$admin->profile_pic")}} alt="">

  <form action="/upload/{{$admin->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="profile_pic">
    <button type="submit">Submit</button>
  </form>
@endsection


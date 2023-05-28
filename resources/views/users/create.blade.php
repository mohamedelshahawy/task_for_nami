@extends('users.layouts')
@section('content')
    <div class="container">
        <h1>create new member</h1>

        <form action="/users" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" >
                </div>
            </div>

            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Phone_Number</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="phone_number">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection

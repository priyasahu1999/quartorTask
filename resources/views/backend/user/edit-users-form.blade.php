@extends('backend.layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Add New Form</h5>
                <!-- Vertical Form -->
                <form class="row g-3" action="{{ url('panel/user/update',$getUersData->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputNanme4" name="name" value="{{ $getUersData->name }}">
                    <div style="color:red">{{ $errors->first('name') }}</div>
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" value="{{ $getUersData->email }}">
                    <div style="color:red">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="password">
                    <p>Do you want change password so please fill password field. </p>
                    <div style="color:red">{{ $errors->first('password') }}</div>
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="1" {{ ($getUersData->status == 1 ) ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ ($getUersData->status == 0 ) ? 'selected' : '' }}>Inactive</option>
                    </select>
                  </div>
                  <div class="float-start">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('panel/user/list') }}" class="btn btn-secondary">Back</a>
                  </div>
                </form><!-- Vertical Form -->
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
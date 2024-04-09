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
                <form class="row g-3" action="{{ url('panel/user/store-users-data') }}" method="post">
                    {{ csrf_field() }}
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputNanme4" name="name" value="{{ old('name') }}">
                    <div style="color:red">{{ $errors->first('name') }}</div>
                  </div>
                  <div class="col-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" value="{{ old('email') }}">
                    <div style="color:red">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="password" required>
                  </div>
                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
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
@extends('backend.layouts.app')
@section('style')
@endsection()
@section('content')
    <div class="pagetitle">
      <h1>Blog List</h1>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Blog List(Total : {{ $getRecord->total() }})</h5>
                <!-- Vertical Form -->
                <form class="row g-3" accept="get">
                  {{-- <div class="col-md-1">
                    <label class="form-label">ID</label>
                    <input type="text" class="form-control" name="id" value="{{ Request::get('id')}}">
                  </div> --}}

                  <div class="col-md-2">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="{{ Request::get('username')}}">
                  </div>

                  <div class="col-md-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ Request::get('title')}}">
                  </div>

                  <div class="col-md-2">
                    <label class="form-label">Category</label>
                    <input type="text" class="form-control" name="category" value="{{ Request::get('category')}}">
                  </div>
                  
                  <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="">Select</option>
                        <option value="100" {{ (Request::get('status') == 100)? 'selected' : '' }}>Inactive</option>
                        <option value="1" {{ (Request::get('status') == 1)? 'selected' : '' }}>Active</option>
                    </select>
                  </div>
                  
                  <div class="col-md-2">
                    <label class="form-label">Category</label>
                    <input type="text" class="form-control" name="category" value="{{ Request::get('category')}}">
                  </div>

                  <div class="col-md-2">
                    <label class="form-label">Start Date</label>
                    <input type="date" class="form-control" name="start_date" value="{{ Request::get('start_date')}}">
                  </div>

                  <div class="col-md-2">
                    <label class="form-label">End Date</label>
                    <input type="date" class="form-control" name="end_date" value="{{ Request::get('end_date')}}">
                  </div>

                  
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary mt-4">Search</button>
                    <a href="{{ url('panel/blog/list') }}" class="btn btn-secondary mt-4">Reset</a>
                  </div>
                </form><!-- Vertical Form -->
  
              </div>
            </div>
            <div class="card-body">
              @include('message')
              <a href="{{ url('panel/blog/add-form') }}" class="btn btn-primary float-end mt-4 mb-4">Add New</a>
              <!-- Table with stripped rows -->
              <table class="table table-striped text-center">
                <thead class="mt-4">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slugs</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($getRecord as $key => $value)
                  <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>
                        @if(!empty($value->getImage()))
                          <img src="{{ $value->getImage() }}" style="height:100px; width:100px;">
                        @endif
                    </td>
                    <td>{{ $value->users_name }}</td>
                    <td>{{ $value->categories_name }}</td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->slug }}</td>
                    <td>{{ !empty( $value->status) ? 'Active' : 'Inactive'}}</td>
                    <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                    <td>
                        <a href="{{ url('panel/blog/edit/'.$value->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Do you want to delete?');" href="{{ url('panel/blog/delete/'.$value->id) }}" class="btn btn-danger btn-sm ms-2"><i class="fa fa-trash" aria-hidden="true"></i>
                        </a> 
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="100%">Record Not Found.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table> 
              <div class="row">
                <div class="col-12 text-center">
                  {{$getRecord->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection()
    @section('script')
    @endsection()
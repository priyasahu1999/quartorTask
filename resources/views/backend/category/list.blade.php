@extends('backend.layouts.app')
@section('style')
@endsection()
@section('content')
    <div class="pagetitle">
      <h1>Category List</h1>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            
            <div class="card-body">
              @include('message')
              <a href="{{ url('panel/category/add-form') }}" class="btn btn-primary float-end mt-4 mb-4">Add New</a>
              <!-- Table with stripped rows -->
              <table class="table table-striped text-center">
                <thead class="mt-4">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slugs</th>
                    <th scope="col">Title</th>
                    <th scope="col">Meta Title</th>
                    <th scope="col">Meta Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($getRecord as $key => $value)
                  <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->slug }}</td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->meta_title }}</td>
                    <td>{{ $value->meta_description }}</td>
                    <td>{{ !empty( $value->status) ? 'Active' : 'Inactive'}}</td>
                    <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                    <td>
                        <a href="{{ url('panel/category/edit/'.$value->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Do you want to delete?');" href="{{ url('panel/category/delete/'.$value->id) }}" class="btn btn-danger btn-sm ms-2"><i class="fa fa-trash" aria-hidden="true"></i>
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
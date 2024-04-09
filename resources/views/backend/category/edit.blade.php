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
                <form class="row g-3" action="{{ url('panel/category/update',$getCategoryData->id) }}" method="post">
                    {{ csrf_field() }}
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputNanme4" name="name" value="{{ $getCategoryData->name }}">
                  </div>

                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="inputNanme4" name="slug" value="{{ $getCategoryData->slug }}">
                  </div>

                  <div class="col-12">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $getCategoryData->title }}">
                  </div>

                   <div class="col-12">
                      <label for="meta_title" class="form-label">Meta Title</label>
                      <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ $getCategoryData->meta_title }}">
                      <div style="color:red">{{ $errors->first('meta_title') }}</div>
                  </div>

                  <div class="col-12">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea type="text" class="form-control" id="meta_description" name="meta_description" rows="5">{{ $getCategoryData->meta_description }}</textarea>
                    <div style="color:red">{{ $errors->first('meta_description') }}</div>
                  </div>

                  <div class="col-12">
                    <label for="meta_keywords" class="form-label">Meta Keyword</label>
                    <textarea type="text" class="form-control" id="meta_keywords" name="meta_keywords" rows="5">{{ $getCategoryData->meta_keywords }}</textarea>
                    <div style="color:red">{{ $errors->first('meta_keywords') }}</div>
                  </div>

                  <div class="col-12">
                    <label for="inputPassword4" class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="1" {{ ($getCategoryData->status == 1) ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ ($getCategoryData->status == 0) ? 'selected' : '' }}>Inactive</option>
                    </select>
                  </div>

                  <div class="float-start">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('panel/category/list') }}" class="btn btn-secondary">Back</a>
                  </div>
                </form><!-- Vertical Form -->
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
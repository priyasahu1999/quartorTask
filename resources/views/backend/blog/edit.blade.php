@extends('backend.layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Add New Blog</h5>
                <!-- Vertical Form -->
                <form class="row g-3" action="" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Title</label>
                    <input type="text" class="form-control" id="inputNanme4" name="title" value="{{ $getRecord->title }}">
                    <div style="color:red">{{ $errors->first('title') }}</div>
                  </div>

                  <div class="col-12 mt-4">
                    <label for="title" class="form-label">Category</label>
                    <select class="form-control" name="category_id" required>
                        <option value="">select Category</option>
                            @foreach($getCategory as $key => $catValues)
                              <option {{ ($getRecord->category_id == $catValues->id) ? 'selected' : ''}} value="{{ $catValues->id }}">{{ $catValues->name }}</option>
                            @endforeach
                        <div style="color:red">{{ $errors->first('category_id') }}</div>
                    </select>
                  </div>

                  <div class="col-12 mt-4">
                    <label for="image_file" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image_file" name="image_file">
                        @if(!empty($getRecord->getImage()))
                          <img src="{{ $getRecord->getImage() }}" style="height:100px; width:100px;">
                        @endif
                  </div>

                  <div class="col-12 mt-4">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="file" class="form-control tinymce-editor" id="description" name="description">{{ $getRecord->description }}</textarea>
                  </div>
                  
                  <div class="col-12 mt-4">
                    @php
                         $tags="";
                       foreach ($getRecord->getTag as $key => $value) {
                            $tags.= $value->tag_name.',';
                       }
                    @endphp
                    <label for="tags" class="form-label">Tags</label>
                    <input type="text" class="form-control" id="tags" name="tags" value="{{ $tags }}">
                  </div>

                   <div class="col-12 mt-4">
                      <label for="meta_title" class="form-label">Meta Title</label>
                      <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ $getRecord->meta_title }}">
                      <div style="color:red">{{ $errors->first('meta_title') }}</div>
                  </div>

                  <div class="col-12 mt-4">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea type="text" class="form-control" id="meta_description" name="meta_description" rows="5">{{ $getRecord->meta_description }}</textarea>
                    <div style="color:red">{{ $errors->first('meta_description') }}</div>
                  </div>

                  <div class="col-12 mt-4">
                    <label for="meta_keywords" class="form-label">Meta Keyword</label>
                    <textarea type="text" class="form-control" id="meta_keywords" name="meta_keywords" rows="5">{{ $getRecord->meta_keywords }}</textarea>
                    <div style="color:red">{{ $errors->first('meta_keywords') }}</div>
                  </div>

                  <div class="col-12 mt-4">
                    <label for="inputPassword4" class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="0" {{ ($getRecord->status == 0) ? 'selected' : '' }}>Inactive</option>
                        <option value="1" {{ ($getRecord->status == 1) ? 'selected' : '' }}>Active</option>
                    </select>
                  </div>

                  <div class="float-start mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ url('panel/blog/list') }}" class="btn btn-secondary">Back</a>
                  </div>
                </form><!-- Vertical Form -->
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
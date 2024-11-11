@extends('partials.index')

@section('hed')
<title>Admin - Edit Profile</title>
@endsection

@section('content')
@include('components.error-validation')

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center">
        <h6>Edit Profile</h6>
      </div>
      <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="row justify-content-between">
            <!-- Profile Information -->
            <div class="col-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name', optional($data)->name) }}" placeholder="Full Name" required>
              </div>
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control"
                       value="{{ old('title', optional($data)->title) }}" placeholder="Job Title" required>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ old('email', optional($data)->email) }}" placeholder="Email" required>
              </div>
              <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control"
                       value="{{ old('phone', optional($data)->phone) }}" placeholder="Phone" required>
              </div>
              <div class="form-group">
                <label>Biodata</label>
                <textarea name="biodata" class="form-control" rows="4" placeholder="Biodata" required>{{ old('biodata', optional($data)->biodata) }}</textarea>
              </div>
            </div>

            <!-- Social Links and Files -->
            <div class="col-6">
              <div class="form-group">
                <label>GitHub Link</label>
                <input type="url" name="link_to_github" class="form-control"
                       value="{{ old('link_to_github', optional($data)->link_to_github) }}" placeholder="GitHub Profile URL" required>
              </div>
              <div class="form-group">
                <label>LinkedIn Link</label>
                <input type="url" name="link_to_linkedin" class="form-control"
                       value="{{ old('link_to_linkedin', optional($data)->link_to_linkedin) }}" placeholder="LinkedIn Profile URL" required>
              </div>
              <div class="form-group">
                <label>Profile Photo</label>
                <input type="file" name="photo" class="form-control">
                @if(optional($data)->photo)
                  <small>Current file: {{ $data->photo }}</small>
                @endif
              </div>
              <div class="form-group">
                <label>CV</label>
                <input type="file" name="cv" class="form-control">
                @if(optional($data)->cv)
                  <small>Current file: {{ $data->cv }}</small>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <button type="submit" class="btn btn-primary">Save Profile</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

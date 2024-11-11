@extends('partials.index')

@section('hed')
    <title>Edit Video</title>
@endsection

@section('content')
    @include('components.error-validation')

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Edit Video</h6>
                </div>
                <form action="{{ route('vidio.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                   value="{{ old('title', $data->title ?? '') }}" required placeholder="Enter video title">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="4" class="form-control"
                                      placeholder="Enter video description">{{ old('description', $data->description ?? '') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="url">Video URL</label>
                            <input type="url" name="url" id="url" class="form-control"
                                   value="{{ old('url', $data->url ?? '') }}" required placeholder="Enter video URL">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

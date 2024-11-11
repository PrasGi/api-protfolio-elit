@extends('partials.index')

@section('hed')
<title>Edit Education</title>
@endsection

@section('content')
@include('components.error-validation')

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Edit Education</h6>
            </div>
            <form action="{{ route('education.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div id="education-rows">
                        @foreach($educations as $education)
                            <div class="row education-row mb-2 align-items-center" data-education-id="{{ $education->id }}">
                                <div class="col-md-3">
                                    <input type="text" name="educations[{{ $loop->index }}][title]" class="form-control" placeholder="Title" value="{{ $education->title }}" required>
                                </div>
                                <div class="col-md-3">
                                    <textarea name="educations[{{ $loop->index }}][description]" class="form-control" placeholder="Description">{{ $education->description }}</textarea>
                                </div>
                                <div class="col-md-2">
                                    <input type="date" name="educations[{{ $loop->index }}][start_date]" class="form-control" value="{{ $education->start_date }}" required>
                                </div>
                                <div class="col-md-2">
                                    <input type="date" name="educations[{{ $loop->index }}][end_date]" class="form-control" value="{{ $education->end_date }}">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger btn-delete-education">Delete</button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="button" id="add-education-btn" class="btn btn-primary mb-3">Add Education</button>
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let educationIndex = {{ $educations->count() }};

        // Add new education row
        document.getElementById('add-education-btn').addEventListener('click', function () {
            let newEducationRow = `
                <div class="row education-row mb-2 align-items-center">
                    <div class="col-md-3">
                        <input type="text" name="educations[${educationIndex}][title]" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="col-md-3">
                        <textarea name="educations[${educationIndex}][description]" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="educations[${educationIndex}][start_date]" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="educations[${educationIndex}][end_date]" class="form-control">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-delete-education">Delete</button>
                    </div>
                </div>
            `;
            document.getElementById('education-rows').insertAdjacentHTML('beforeend', newEducationRow);
            educationIndex++;
        });

        // Delete education row
        document.getElementById('education-rows').addEventListener('click', function (event) {
            if (event.target.classList.contains('btn-delete-education')) {
                event.target.closest('.education-row').remove();
            }
        });
    });
</script>

@endsection

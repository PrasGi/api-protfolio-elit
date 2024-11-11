@extends('partials.index')

@section('hed')
<title>Edit Experiences</title>
@endsection

@section('content')
@include('components.error-validation')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Edit Experiences</h6>
            </div>
            <form action="{{ route('experiences.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div id="experience-rows">
                        @foreach($experiences as $experience)
                            <div class="row experience-row mb-2 align-items-center" data-experience-id="{{ $experience->id }}">
                                <div class="col-md-3">
                                    <input type="text" name="experiences[{{ $loop->index }}][title]" class="form-control" placeholder="Job Title" value="{{ $experience->title }}" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="experiences[{{ $loop->index }}][company]" class="form-control" placeholder="Company Name" value="{{ $experience->company }}" required>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="experiences[{{ $loop->index }}][position]" class="form-control" placeholder="Position" value="{{ $experience->position }}" required>
                                </div>
                                <div class="col-md-2">
                                    <input type="date" name="experiences[{{ $loop->index }}][start_date]" class="form-control" value="{{ $experience->start_date }}" required>
                                </div>
                                <div class="col-md-2">
                                    <input type="date" name="experiences[{{ $loop->index }}][end_date]" class="form-control" value="{{ $experience->end_date }}">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger btn-delete-experience">Delete</button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="button" id="add-experience-btn" class="btn btn-primary mb-3">Add Experience</button>
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
        let experienceIndex = {{ $experiences->count() }};

        // Add new experience row
        document.getElementById('add-experience-btn').addEventListener('click', function () {
            let newExperienceRow = `
                <div class="row experience-row mb-2 align-items-center">
                    <div class="col-md-3">
                        <input type="text" name="experiences[${experienceIndex}][title]" class="form-control" placeholder="Job Title" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="experiences[${experienceIndex}][company]" class="form-control" placeholder="Company Name" required>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="experiences[${experienceIndex}][position]" class="form-control" placeholder="Position" required>
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="experiences[${experienceIndex}][start_date]" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="experiences[${experienceIndex}][end_date]" class="form-control">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-delete-experience">Delete</button>
                    </div>
                </div>
            `;
            document.getElementById('experience-rows').insertAdjacentHTML('beforeend', newExperienceRow);
            experienceIndex++;
        });

        // Delete experience row
        document.getElementById('experience-rows').addEventListener('click', function (event) {
            if (event.target.classList.contains('btn-delete-experience')) {
                event.target.closest('.experience-row').remove();
            }
        });
    });
</script>
@endsection

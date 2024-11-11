@extends('partials.index')

@section('hed')
<title>Edit Skills</title>
@endsection

@section('content')
@include('components.error-validation')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Edit Skills</h6>
            </div>
            <form action="{{ route('skills.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div id="skill-rows">
                        @foreach($skills as $skill)
                            <div class="row skill-row mb-2 align-items-center" data-skill-id="{{ $skill->id }}">
                                <input type="hidden" name="skills[{{ $loop->index }}][id]" value="{{ $skill->id }}">
                                <div class="col-md-5">
                                    <input type="text" name="skills[{{ $loop->index }}][name]" class="form-control" placeholder="Skill Name" value="{{ $skill->name }}" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="skills[{{ $loop->index }}][point]" class="form-control" placeholder="Point" value="{{ $skill->point }}" required>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger btn-delete-skill">Delete</button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="button" id="add-skill-btn" class="btn btn-primary mb-3">Add Skill</button>
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
        let skillIndex = {{ $skills->count() }};

        // Add new skill row
        document.getElementById('add-skill-btn').addEventListener('click', function () {
            let newSkillRow = `
                <div class="row skill-row mb-2 align-items-center">
                    <input type="hidden" name="skills[${skillIndex}][id]" value="">
                    <div class="col-md-5">
                        <input type="text" name="skills[${skillIndex}][name]" class="form-control" placeholder="Skill Name" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="skills[${skillIndex}][point]" class="form-control" placeholder="Point" required>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-delete-skill">Delete</button>
                    </div>
                </div>
            `;
            document.getElementById('skill-rows').insertAdjacentHTML('beforeend', newSkillRow);
            skillIndex++;
        });

        // Delete skill row
        document.getElementById('skill-rows').addEventListener('click', function (event) {
            if (event.target.classList.contains('btn-delete-skill')) {
                event.target.closest('.skill-row').remove();
            }
        });
    });
</script>
@endsection

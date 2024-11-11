@extends('partials.index')

@section('hed')
<title>Edit Projects</title>
@endsection

@section('content')
@include('components.error-validation')

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Edit Projects</h6>
            </div>
            <form action="{{ route('project.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div id="project-sections">
                        @foreach($projects as $project)
                            <div class="project-section mb-3" data-project-id="{{ $project->id }}">
                                <h5>Project #{{ $loop->index + 1 }}</h5>

                                <div class="form-group">
                                    <label for="projects[{{ $loop->index }}][title]">Project Title</label>
                                    <input type="text" name="projects[{{ $loop->index }}][title]" class="form-control" placeholder="Enter project title" value="{{ $project->title }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="projects[{{ $loop->index }}][description]">Project Description</label>
                                    <textarea name="projects[{{ $loop->index }}][description]" class="form-control" rows="4" placeholder="Enter project description">{{ $project->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="projects[{{ $loop->index }}][photo]">Project Photo (Upload)</label>
                                    <input type="file" name="projects[{{ $loop->index }}][photo]" class="form-control-file">
                                    @if ($project->photo)
                                        <p><img src="{{ $project->photo }}" alt="Project Photo" width="100"></p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="projects[{{ $loop->index }}][url]">Project URL</label>
                                    <input type="text" name="projects[{{ $loop->index }}][url]" class="form-control" placeholder="Enter project URL" value="{{ $project->url }}" required>
                                </div>

                                <button type="button" class="btn btn-danger btn-delete-project">Delete Project</button>
                            </div>
                        @endforeach
                    </div>

                    <button type="button" id="add-project-btn" class="btn btn-primary mb-3">Add Project</button>
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
        let projectIndex = {{ $projects->count() }};

        // Add new project section
        document.getElementById('add-project-btn').addEventListener('click', function () {
            let newProjectSection = `
                <div class="project-section mb-3" data-project-id="new-${projectIndex}">
                    <h5>Project #${projectIndex + 1}</h5>

                    <div class="form-group">
                        <label for="projects[${projectIndex}][title]">Project Title</label>
                        <input type="text" name="projects[${projectIndex}][title]" class="form-control" placeholder="Enter project title" required>
                    </div>

                    <div class="form-group">
                        <label for="projects[${projectIndex}][description]">Project Description</label>
                        <textarea name="projects[${projectIndex}][description]" class="form-control" rows="4" placeholder="Enter project description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="projects[${projectIndex}][photo]">Project Photo (Upload)</label>
                        <input type="file" name="projects[${projectIndex}][photo]" class="form-control-file" required>
                    </div>

                    <div class="form-group">
                        <label for="projects[${projectIndex}][url]">Project URL</label>
                        <input type="text" name="projects[${projectIndex}][url]" class="form-control" placeholder="Enter project URL" required>
                    </div>

                    <button type="button" class="btn btn-danger btn-delete-project">Delete Project</button>
                </div>
            `;
            document.getElementById('project-sections').insertAdjacentHTML('beforeend', newProjectSection);
            projectIndex++;
        });

        // Delete project section
        document.getElementById('project-sections').addEventListener('click', function (event) {
            if (event.target.classList.contains('btn-delete-project')) {
                event.target.closest('.project-section').remove();
            }
        });
    });
</script>
@endsection

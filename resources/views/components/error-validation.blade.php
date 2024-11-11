@if ($errors->any())
<div class="alert alert-warning fade show text-light d-flex justify-content-between align-items-center" role="alert">
  <div>
    <strong>Oops!</strong>
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

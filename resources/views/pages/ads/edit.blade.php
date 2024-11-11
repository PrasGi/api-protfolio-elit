@extends('admin.partials.index')

@section('hed')
<title>Admin | Edit Film</title>
@endsection

@section('content')
@include('admin.components.error-validation')

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 d-flex justify-content-between align-items-center">
        <h6>Edit Ads</h6>
      </div>
      <form action="{{ route('admin.ads.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="row justify-content-between">
            <!-- Refresh Page Ads -->
            <div class="col-4">
              <h5>Refresh Page Ads</h5>
              <div class="form-group">
                <label>Status</label>
                <select name="refresh_page_ads_status" class="form-control">
                  <option value="on" {{ optional($ads)->refresh_page_ads_status == 'on' ? 'selected' : '' }}>On</option>
                  <option value="off" {{ optional($ads)->refresh_page_ads_status == 'off' ? 'selected' : '' }}>Off</option>
                </select>
              </div>
              <div class="form-group">
                <label>Image URL</label>
                <input type="file" name="refresh_page_ads_image_url" class="form-control"
                       value="{{ optional($ads)->refresh_page_ads_image_url ?? '' }}" placeholder="Image URL">
              </div>
              <div class="form-group">
                <label>Redirect URL</label>
                <input type="url" name="refresh_page_ads_redirect_url" class="form-control"
                       value="{{ optional($ads)->refresh_page_ads_redirect_url ?? '' }}" placeholder="Redirect URL">
              </div>
            </div>

            <!-- Minute Ads -->
            <div class="col-4">
              <h5>Minute Ads</h5>
              <div class="form-group">
                  <label>Status</label>
                  <select name="minute_ads_status" class="form-control">
                      <option value="on" {{ optional($ads)->minute_ads_status == 'on' ? 'selected' : '' }}>On</option>
                      <option value="off" {{ optional($ads)->minute_ads_status == 'off' ? 'selected' : '' }}>Off</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Redirect URL</label>
                  <input type="url" name="minute_ads_redirect_url" class="form-control"
                         value="{{ optional($ads)->minute_ads_redirect_url ?? '' }}" placeholder="Redirect URL">
              </div>
              <div class="form-group">
                  <label>Interval (minutes)</label>
                  <input type="number" name="minute_ads_interval" class="form-control"
                         value="{{ optional($ads)->minute_ads_interval ?? '' }}" placeholder="Interval in minutes">
              </div>
            </div>

            <!-- Static Ads -->
            <div class="col-4">
              <h5>Static Ads</h5>
              <div class="form-group">
                  <label>Status</label>
                  <select name="static_ads_status" class="form-control">
                      <option value="on" {{ optional($ads)->static_ads_status == 'on' ? 'selected' : '' }}>On</option>
                      <option value="off" {{ optional($ads)->static_ads_status == 'off' ? 'selected' : '' }}>Off</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Image URL</label>
                  <input type="file" name="static_ads_image_url" class="form-control"
                         value="{{ optional($ads)->static_ads_image_url ?? '' }}" placeholder="Image URL">
              </div>
              <div class="form-group">
                  <label>Redirect URL</label>
                  <input type="url" name="static_ads_redirect_url" class="form-control"
                         value="{{ optional($ads)->static_ads_redirect_url ?? '' }}" placeholder="Redirect URL">
              </div>
            </div>
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

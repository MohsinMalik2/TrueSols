@extends('admin-layouts.master')
@section('settings_select','active')
@section('content')
<div class="blog-edit-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="avatar me-75">
                            <img src="{{asset('storage/profile-images/'.$user->image)}}" width="38" height="38" alt="Avatar" />
                        </div>
                        <div class="author-info">
                            <h6 class="mb-25">{{$user->name}}</h6>
                            <p class="card-text">{{$user->email}}</p>
                        </div>
                    </div>
                    <!-- Form -->
                    <form id="profile-settings" class="mt-2">
                        @csrf
                        <div class="row d-flex align-items-center">
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name" value="{{$user->name}}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <label class="form-label" for="tagline">Tagline <small class="text-muted">(maximum 100 letters)</small></label>
                                    <input type="text" id="tagline" class="form-control" maxlength="100" name="tagline" value="{{$user->tagline}}" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label">Content</label>
                                    <textarea class="form-control char-textarea" id="content" cols="30" rows="10" name="content" val="{{$user->content}}"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="mb-2">
                                    <label class="form-label" for="github">Github Link </label>
                                    <input type="text" id="github" class="form-control" name="github" value="{{$user->github}}" />
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="mb-2">
                                    <label class="form-label" for="linkedIn">LinkedIn Link </label>
                                    <input type="text" id="linkedIn" class="form-control" name="linkedIn" value="{{$user->linkedIn}}" />
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="mb-2">
                                    <label class="form-label" for="twitter">Twitter Link </label>
                                    <input type="text" id="twitter" class="form-control" name="twitter" value="{{$user->twitter}}" />
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="mb-2">
                                    <label class="form-label" for="facebook">Facebook Link </label>
                                    <input type="text" id="facebook" class="form-control" name="facebook" value="{{$user->facebook}}" />
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="border rounded p-2">
                                    <h4 class="mb-1">Featured Image</h4>
                                    <div class="d-flex flex-column flex-md-row">
                                        <img src="{{asset('storage/profile-images/'.$user->image)}}" id="image" class="rounded me-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" />
                                        <div class="featured-info">
                                            <small class="text-muted">Required image resolution 800x400, image size 10mb.</small>
                                            <p class="my-50">
                                            </p>
                                            <div class="d-inline-block">
                                                <input class="form-control" type="file" id="displayProfile" name="image" accept="image/*" value="{{$user->image}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-50">
                                <button type="submit" class="btn btn-primary me-1">Save Changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                    <!--/ Form -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard -->
@endsection

@section('scripts')
<script src="{{asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
<script>
    $(document).ready(function() {
        'use strict';
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var select = $('.select2');
        var profileImage = $('#image');
        var displayProfile = $('#displayProfile');

        // Basic Select2 select
        select.each(function() {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>');
            $this.select2({
                // the following code is used to disable x-scrollbar when click in select input and
                // take 100% width in responsive also
                dropdownAutoWidth: true,
                tags: true,
                width: '100%',
                dropdownParent: $this.parent()
            });
        });

        // Change featured image
        if (displayProfile.length) {
            $(displayProfile).on('change', function(e) {
                var reader = new FileReader(),
                    files = e.target.files;
                reader.onload = function() {
                    if (profileImage.length) {
                        profileImage.attr('src', reader.result);
                    }
                };
                reader.readAsDataURL(files[0]);
            });
        }
    });


    $('#profile-settings').submit(function(e) {

        e.preventDefault();
      
        
        var formdata = new FormData();
        formdata.append('image', document.getElementById('displayProfile').files[0]);
        formdata.append('name', $('#name').val());
        formdata.append('tagline', $('#tagline').val());
        formdata.append('content', $('#content').val());
        formdata.append('github', $('#github').val());
        formdata.append('linkedIn', $('#linkedIn').val());
        formdata.append('facebook', $('#facebook').val());
        formdata.append('twitter', $('#twitter').val());

        alert(formdata);
        var url = "{{route('admin.setting-form')}}";

        $.ajax({
        type: "POST",
        url: url,
        data: formdata,
        contentType: false,
        processData: false,
        success: function(response) {
          if (response == 'saved') {
            swal({
              title: "Profile Saved!",
              text: "Profile is Now Uploaded!",
              icon: "success",
              button: "OK",
            });
          } else {
            swal({
              title: "Error!",
              text: "Profile could not be upload please contact Admin!",
              icon: "error",
              button: "OK",
            });
          }
        }
    });


    });
</script>
@endsection
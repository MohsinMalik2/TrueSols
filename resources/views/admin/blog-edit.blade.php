@extends('admin-layouts.master')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/horizontal-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-quill-editor.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-blog.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="blog-edit-wrapper">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start">
            <div class="avatar me-75">
              <img src="../../../app-assets/images/portrait/small/avatar-s-9.jpg" width="38" height="38" alt="Avatar" />
            </div>
            <div class="author-info">
              <h6 class="mb-25">Chad Alexander</h6>
              <p class="card-text">May 24, 2020</p>
            </div>
          </div>
          <!-- Form -->
          <form action="javascript:;" id="blog_form" class="mt-2">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label" for="blog-edit-title">Title</label>
                  <input type="text" name="id" id="id" value="{{$blog->id}}" hidden>
                  <input type="text" id="blog-edit-title" class="form-control" value="{{$blog->title}}" />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label" for="blog-edit-category">Category</label>
                  <select id="blog-edit-category" class="select2 form-select" multiple value="{{$blog->category}}">
                    <option value="Fashion" >Fashion</option>
                    <option value="Food">Food</option>
                    <option value="Gaming" >Gaming</option>
                    <option value="Quote">Quote</option>
                    <option value="Video">Video</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label" for="blog-edit-slug">Slug</label>
                  <input type="text" id="blog-edit-slug" class="form-control" value="{{$blog->slug}}"/>
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label" for="blog-edit-status">Status</label>
                  <select class="form-select" id="blog-edit-status" value="{{$blog->status}}">
                    <option value="Published">Published</option>
                    <option value="Pending">Pending</option>
                    <option value="Draft">Draft</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12" style="float: right">
                <div class="demo-inline">
                    <div class="d-flex flex-column mt-0">
                        <label class="form-check-label mb-50" for="portfolioActive">Active</label>
                        <div class="form-check form-check-primary form-switch">
                            <input type="checkbox" 
                            @if ($blog->active=='1')
                            checked="" 
                            @endif
                            class="form-check-input" id="blogActive" name="blog_is_active">
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-12">
                <div class="mb-2">
                  <label class="form-label">Content</label>
                  <div id="blog-editor-wrapper">
                    <div id="blog-editor-container">
                      <div class="editor" id="blog-content">
                        {{$blog->content}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="border rounded p-2">
                  <h4 class="mb-1">Featured Image</h4>
                  <div class="d-flex flex-column flex-md-row">
                    <img src="../../../app-assets/images/slider/03.jpg" id="blog-feature-image" class="rounded me-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" />
                    <div class="featured-info">
                      <small class="text-muted">Required image resolution 800x400, image size 10mb.</small>
                      <p class="my-50">
                        <a href="#" id="blog-image-text">C:\fakepath\banner.jpg</a>
                      </p>
                      <div class="d-inline-block">
                        <input class="form-control" type="file" id="blogCustomFile" accept="image/*" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 mt-50">
                <button type="submit" class="btn btn-primary me-1" id='save_blog_btn'>Save Changes</button>
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
@endsection

@section('scripts')
<script src="{{asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/editors/quill/katex.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/editors/quill/highlight.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  (function(window, document, $) {
    'use strict';

    var select = $('.select2');
    var editor = '#blog-editor-container .editor';
    var blogFeatureImage = $('#blog-feature-image');
    var blogImageText = document.getElementById('blog-image-text');
    var blogImageInput = $('#blogCustomFile');
    
    // Basic Select2 select
    select.each(function() {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        // the following code is used to disable x-scrollbar when click in select input and
        // take 100% width in responsive also
        dropdownAutoWidth: true,
        width: '100%',
        dropdownParent: $this.parent()
      });
    });

    // Snow Editor

    var Font = Quill.import('formats/font');
    Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
    Quill.register(Font, true);

    var blogEditor = new Quill(editor, {
      bounds: editor,
      modules: {
        formula: true,
        syntax: true,
        toolbar: [
          [{
              font: []
            },
            {
              size: []
            }
          ],
          ['bold', 'italic', 'underline', 'strike'],
          [{
              color: []
            },
            {
              background: []
            }
          ],
          [{
              script: 'super'
            },
            {
              script: 'sub'
            }
          ],
          [{
              header: '1'
            },
            {
              header: '2'
            },
            'blockquote',
            'code-block'
          ],
          [{
              list: 'ordered'
            },
            {
              list: 'bullet'
            },
            {
              indent: '-1'
            },
            {
              indent: '+1'
            }
          ],
          [
            'direction',
            {
              align: []
            }
          ],
          ['link', 'image', 'video', 'formula'],
          ['clean']
        ]
      },
      theme: 'snow'
    });

    // Change featured image
    if (blogImageInput.length) {
      $(blogImageInput).on('change', function(e) {
        var reader = new FileReader(),
          files = e.target.files;
        reader.onload = function() {
          if (blogFeatureImage.length) {
            blogFeatureImage.attr('src', reader.result);
          }
        };
        reader.readAsDataURL(files[0]);
        blogImageText.innerHTML = blogImageInput.val();
      });
    }
  })(window, document, jQuery);
</script>

{{-- syed aizaz hasan working  --}}


<script>


$('#save_blog_btn').click(function (e) { 
  e.preventDefault();

  /* To capture the content from quill editor */
  var contentCapture = $("#blog-content .ql-editor").html();

  var formdata=new FormData();
  formdata.append('image',document.getElementById('blogCustomFile').files[0]);
  formdata.append('title',$('#blog-edit-title').val());
  formdata.append('id',$('#id').val());
  formdata.append('categories',$('#blog-edit-category').val());
  formdata.append('slug',$('#blog-edit-slug').val());
  formdata.append('status',$('#blog-edit-status').val());
  if(document.getElementById('blogActive').checked)
  {
    var active=1; 
  }else{
    var  active=0;
  }
  formdata.append('active',active);
  formdata.append('content',contentCapture);
  var url="{{route('admin.blog_edit')}}";
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type: "POST",
    url:url,
    data:formdata,
    contentType: false,
    processData: false,
    success: function (response) {
      if(response=='saved')
      {
        swal({
          title: "Blog Updated!",
          text: "Blog was Updated Successfully!",
          icon: "success",
          button: "OK",
        });
      }else{
        swal({
          title: "Error!",
          text: "Blog Could NOT be updated please contact Admin!",
          icon: "error",
          button: "OK",
        });
      }
    }
  });
  
});

</script>


@endsection
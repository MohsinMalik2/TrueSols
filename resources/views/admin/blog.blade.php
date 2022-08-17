@extends('admin-layouts.master')
@section('blogs_select','active')
@section('content')

    <section id="blog-page">
        <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-12 col-md-12 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h4 class="card-title">Blogs</h4>
                                        <a class="btn btn-primary ml-auto" href="{{route('admin.blog-new')}}">Add New </a>
                                    </div>
                                    <div class="card-datatable">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Categories</th>
                                                    <th>Slug</th>
                                                    <th>Thumbnail</th>
                                                    <th>Created On</th>
                                                    <th>Created By</th>
                                                    <th>Updated At</th>
                                                    <th>Updated By</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($blogList as $blog)
                                                    <tr>
                                                        <td>{{$blog->title}}</td>
                                                        <td>{{$blog->category}}</td>
                                                        <td>{{$blog->slug}}</td>
                                                        <td>{{$blog->thumbnail}}</td>
                                                        <td>{{$blog->created_at}}</td>
                                                        <td>{{$blog->created_by}}</td>
                                                        <td>{{$blog->updated_at}}</td>
                                                        <td>{{$blog->updated_by}}</td>
                                                        <td >
                                                            <div class="d-inline-flex">
                                                                <a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-small-4">
                                                                        <circle cx="12" cy="12" r="1"></circle>
                                                                        <circle cx="12" cy="5" r="1"></circle>
                                                                        <circle cx="12" cy="19" r="1"></circle>
                                                                    </svg>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <a href="javascript:;" class="dropdown-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text font-small-4 me-50">
                                                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                                        </svg>Details</a><a href="javascript:;" class="dropdown-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive font-small-4 me-50">
                                                                            <polyline points="21 8 21 21 3 21 3 8"></polyline>
                                                                            <rect x="1" y="3" width="22" height="5"></rect>
                                                                            <line x1="10" y1="12" x2="14" y2="12"></line>
                                                                        </svg>Archive</a>
                                                                        <a href="blog-delete/{{$blog->id}}" class="dropdown-item delete-record">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 font-small-4 me-50">
                                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                        </svg>Delete</a>
                                                                </div>
                                                            </div>
                                                            <a class="item-edit" href="blog-edit-form/{{$blog->id}}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-small-4">
                                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                                </svg>
                                                            </a>
                                                        </td>                                                        
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Medal Card -->
        </div>
    </section>
        <!-- Dashboard -->
@endsection

@section('scripts')
@endsection
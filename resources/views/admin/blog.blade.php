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
                                                        <td>{{$blog->categoryList->name}}</td>
                                                        <td>{{$blog->slug}}</td>
                                                        <td>{{$blog->thumbnail}}</td>
                                                        <td>{{$blog->created_at}}</td>
                                                        <td>{{$blog->user->name}}</td>
                                                        <td>{{$blog->updated_at}}</td>
                                                        <td>{{$blog->user->name}}</td>
                                                        <td >        
                                                            <a href="blog-delete/{{$blog->id}}" class="delete-record">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 font-small-4 me-50">
                                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                </svg>
                                                            </a>
                                                            <a class="item-edit" href="{{route('admin.blog_edit_form', $blog->id)}}">
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
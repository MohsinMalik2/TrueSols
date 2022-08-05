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
                                        <button class="btn btn-primary ml-auto" data-bs-toggle="modal" data-bs-target="#blog-form-modal" onclick="initPortfolioForm()">Add New </button>
                                    </div>
                                    <div class="card-datatable">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Tags</th>
                                                    <th>Thumbnail</th>
                                                    <th>Attachments</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($blogList as $blog)
                                                    <tr>
                                                        <th>{{$blog->name}}</th>
                                                        <th>{{$blog->description}}</th>
                                                        <th>{{$blog->tags}}</th>
                                                        <th>{{$blog->thumbnail}}</th>
                                                        <th>{{$blog->attachments}}</th>
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
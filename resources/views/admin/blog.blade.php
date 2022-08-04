@extends('admin-layouts.master')
@section('content')
    <!-- Dashboard Ecommerce Starts -->
    <section id="blog">
        <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                Blog List
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-primary" href="{{route('admin.blog-new')}}">
                                    Add New Blog
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table>
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
                                        <th><img src="{{asset('blog-thumbnail-images/' $blog->thumbnail)}}" alt=""></th>
                                        <th>{{$blog->attachments}}</th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Medal Card -->
        </div>
    </section>
    <!-- Dashboard Ecommerce ends -->
@endsection

@section('scripts')
@endsection
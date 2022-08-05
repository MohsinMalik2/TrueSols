@extends('admin-layouts.master')
@section('portfolio_select','active')
@section('styles')
<style>
</style>
@endsection
@section('content')
<!-- Dashboard  -->
<section id="portfolio-page">
    <div class="row match-height">
        <!-- Medal Card -->
        <div class="col-xl-12 col-md-12 col-12">
            <div class="card card-congratulation-medal">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Portfolio</h4>
                                    <button class="btn btn-primary ml-auto" data-bs-toggle="modal" data-bs-target="#portfolio-form-modal">Add New </button>
                                </div>
                                <div class="card-datatable">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Tags</th>
                                                <th>URL</th>
                                                <th>Thumbnail</th>
                                                <th>Is Active</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($portfolioList as $portfolio)
                                            <tr>
                                                <td class="text-truncate" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{$portfolio->name}}" style="max-width:70px;">{{$portfolio->name}}</td>
                                                <td class="text-truncate" style="max-width:70px;">{{$portfolio->category}}</td>
                                                <td class="text-truncate" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{$portfolio->tags}}" style="max-width:70px;">{{$portfolio->tags}}</td>
                                                <td class="text-truncate" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{$portfolio->url}}" style="max-width:70px;">{{$portfolio->url}}</td>
                                                <td class="text-truncate" style="max-width:70px;">
                                                    <img width="100px" src="{{asset('storage/portfolio-images/'.$portfolio->thumbnail)}}" alt="thumbnail">
                                                </td>
                                                <td class="text-truncate" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Project is Live" style="max-width:70px;">{{$portfolio->is_active}}</td>
                                                <td class="text-truncate" style="max-width:70px;">{{$portfolio->created_at}}</td>
                                                <td class="text-truncate" style="max-width:70px;">{{$portfolio->updated_at}}</td>
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
                                                                </svg>Archive</a><a href="javascript:;" class="dropdown-item delete-record">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 font-small-4 me-50">
                                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                </svg>Delete</a>
                                                        </div>
                                                    </div>
                                                    <a href="javascript:;" class="item-edit">
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
<!-- Modal -->
<div class="modal fade" id="portfolio-form-modal" tabindex="-1" aria-labelledby="portfolio-form-modal-title" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="portfolio-form-modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.portfolio-form') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Thumbnail </label>
                                <div class="mb-1">
                                    <input type="file" placeholder="Upload File" class="form-control" name="thumbnail" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Name </label>
                                <div class="mb-1">
                                    <input type="text" placeholder="Project Title" class="form-control" name="name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Tags </label>
                                <div class="mb-1">
                                    <select class="select2 form-select" multiple="multiple" id="default-select-multi" name="tags[]">
                                        <option value="square">Square</option>
                                        <option value="rectangle">Rectangle</option>
                                        <option value="rombo">Rombo</option>
                                        <option value="romboid">Romboid</option>
                                        <option value="trapeze">Trapeze</option>
                                        <option value="traible">Triangle</option>
                                        <option value="polygon" selected>Polygon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Category </label>
                                <div class="mb-1">
                                    <select class="select2 form-select" name="category">
                                        @foreach($categories as $category)
                                        <option value={{$category->id}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>URL </label>
                                <div class="mb-1">
                                    <input type="text" class="form-control" name="url">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="demo-inline">
                                    <div class="d-flex flex-column mt-0">
                                        <label class="form-check-label mb-50" for="portfolioActive">Active</label>
                                        <div class="form-check form-check-primary form-switch">
                                            <input type="checkbox" checked="" class="form-check-input" id="portfolioActive" name="is_active">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('app-assets/js/scripts/tables/table-datatables-advanced.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>



<script>
    $(document).ready(function() {

    });
</script>
@endsection
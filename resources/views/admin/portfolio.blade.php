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
                                                    <a onclick="deletePortfolio('{{$portfolio->id}}')" class="item-delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 font-small-4 me-50">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                    </a>
                                                    <a onclick="editPortfolio('{{$portfolio->id}}','{{$portfolio->name}}','{{$portfolio->thumbnail}}','{{$portfolio->category}}','{{$portfolio->url}}','{{$portfolio->is_active}}')" class="item-edit">
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
                    <input type="hidden" id="uuid">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Thumbnail </label>
                                <div class="mb-1">
                                    <input type="file" placeholder="Upload File" class="form-control" name="thumbnail" id="thumbnail"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Name </label>
                                <div class="mb-1">
                                    <input type="text" placeholder="Project Title" class="form-control" name="name" id="name"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Tags </label>
                                <div class="mb-1">
                                    <select class="select2 form-select" multiple="multiple" id="default-select-multi" id="tags" name="tags[]">
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
                                    <select class="select2 form-select" name="category" id="category">
                                        @foreach($categories as $category)
                                        <option value={{$category->id}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>URL </label>
                                <div class="mb-1">
                                    <input type="text" class="form-control" name="url" id="url">
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
    editPortfolio('1','Amazone','1660737077.jpg','3','333.com','on')
    function editPortfolio(id,name,thumbnail,category,url,is_active){
        $("uuid").val(id);
        $("#name").val(name);
        $("#thumbnail").attr('placeholder', thumbnail);
        $("#category").val(category);
        $("#url").val(url);
        if(is_active == "on"){
            $("#portfolioActive").attr('checked');
        }
        else{
            $("#portfolioActive").removeAttr('checked');
        }

        $("#portfolio-form-modal").modal('show');

    }

    function deletePortfolio(id){
        alert(id);
    }
</script>
@endsection
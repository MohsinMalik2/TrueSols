@extends('admin-layouts.master')
@section('portfolio_select','active')
@section('content')
        <!-- Dashboard  -->
        <section id="portfolio-page">
            <div class="row match-height">
                <!-- Medal Card -->
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="card card-congratulation-medal">
                        <div class="card-body">

                            <!-- Ajax Sourced Server-side -->
                                <section id="ajax-datatable">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header border-bottom">
                                                    <h4 class="card-title">Portfolio</h4>
                                                    <button class="btn btn-primary ml-auto" data-bs-toggle="modal" data-bs-target="#portfolio-form-modal" onclick="initPortfolioForm()">Add New </button>
                                                </div>
                                                <div class="card-datatable">
                                                    <table class="datatables-ajax table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>Full name</th>
                                                                <th>Email</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            <!--/ Ajax Sourced Server-side -->
                        </div>
                    </div>
                </div>
                <!--/ Medal Card -->
            </div>
        </section>
        <!-- Dashboard -->

        
        <!-- Modal -->
        <div class="modal fade" id="portfolio-form-modal" tabindex="-1" aria-labelledby="portfolio-form-modal-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="portfolio-form-modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name </label>
                                        <div class="mb-1">
                                            <input type="text" placeholder="Email Address" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Gmail </label>
                                        <div class="mb-1">
                                            <select class="select2 form-select" multiple="multiple" id="default-select-multi">
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
                                        <label>CNIC/PASSPORT Number </label>

                                        <div class="mb-1">
                                            <div class="dropzone dropzone-area" id="dpz-single-file">
                                                <div class="dz-message">Drop files here or click to upload.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="demo-inline-spacing">
                                            <div class="form-check form-check-primary mt-1">
                                                <input type="radio" id="customColorRadio1" name="customColorRadio1" class="form-check-input" checked="">
                                                <label class="form-check-label" for="customColorRadio1">CNIC</label>
                                            </div>
                                            <div class="form-check form-check-primary mt-1">
                                                <input type="radio" id="customColorRadio1" name="customColorRadio1" class="form-check-input" checked="">
                                                <label class="form-check-label" for="customColorRadio1">Passport</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>UK Mobile Number </label>
                                        <div class="mb-1">
                                            <input type="number" placeholder="CNIC/PASSPORT Number" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>PAK Mobile Number </label>
                                        <div class="mb-1">
                                            <input type="number" placeholder="CNIC/PASSPORT Number" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="demo-inline">
                                            <div class="d-flex flex-column mt-0">
                                                <label class="form-check-label mb-50" for="ukCompany">UK Company</label>
                                                <div class="form-check form-check-primary form-switch">
                                                    <input type="checkbox" checked="" class="form-check-input" id="ukCompany">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-flex flex-column mt-0">
                                            <label class="form-check-label mb-50" for="wiseStatus">Wise Status</label>
                                            <div class="form-check form-check-primary form-switch">
                                                <input type="checkbox" checked="" class="form-check-input" id="wiseStatus">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex flex-column mt-0">
                                            <label class="form-check-label mb-50" for="amazoneSignUp">Amazon Sign Up</label>
                                            <div class="form-check form-check-primary form-switch">
                                                <input type="checkbox" checked="" class="form-check-input" id="amazoneSignUp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mb-1">
                                        <label class="form-label"></label>
                                        <label for="fp-date-time">Verification Call Date </label>

                                        <input type="text" id="fp-date-time" class="form-control flatpickr-date-time flatpickr-input active" placeholder="YYYY-MM-DD HH:MM">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Total Amount </label>
                                        <div class="mb-1">
                                            <input type="number" placeholder="Email Address" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Amount Recieved </label>
                                        <div class="mb-1">
                                            <input type="number" placeholder="Email Address" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Login</button>
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
<script src="" ></script>

<script>

    function initPortfolioForm(){
        $chunk_id = $("#portfolio-form-modal");
        alert($chunk_id.attr('class'));

        if($chunk_id.hasClass('modal')){
            alert("chunk");
            var singleFile = $('#dpz-single-file');
            singleFile.dropzone({
                paramName: 'file', // The name that will be used to transfer the file
                maxFiles: 1
            });
        };
    }
    
</script>
@endsection
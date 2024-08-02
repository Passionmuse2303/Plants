@extends('Layout.admin_layout')
@section('page_title')
<title>Variety Overview</title>
@endsection
@section('content')
<main class="main-wrap">

    <section class="content-main">
        <header class="card card-body mb-4">
            <div class="row gx-3">
                <div class="col-lg-6 col-md-6 me-auto">
                    <input type="text" placeholder="Search..." class="form-control">
                </div>
                <div class="col-lg-6 col-md-6">
                    <a href="/admin/varietyReport/add" class="btn btn-primary btn-sm rounded float-end">Create new
                        variety
                        report</a>
                    <a href="#" class="btn btn-primary btn-sm rounded float-end mx-1">Import</a>
                    <a href="/admin/varietyReport/exportCSV"
                        class="btn btn-primary btn-sm rounded float-end mx-1">Export</a>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="row">
            @foreach ($varietyReports_data as $varietyReport)
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="card card-product-grid varietyreport-item">
                    <div class="varietyreport-image-container">
                        <img class="varietyreport-image" src="{{asset($varietyReport->image_url)}}" alt="Product">
                        <div class="container">
                            <div
                                class="row justify-content-center align-items-center varietyreport-actions text-center">
                                <div class="col-6 col-md-3 mb-3">
                                    <a class="varietyreport-actions-view"
                                        href="/admin/varietyReport/view/{{$varietyReport->id}}">
                                        <img src="/assets/admin/imgs/products/view_icon.svg" alt="View">
                                    </a>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <a class="varietyreport-actions-edit"
                                        href="/admin/varietyReport/edit/{{$varietyReport->id}}">
                                        <img src="/assets/admin/imgs/products/edit_icon.svg" alt="Edit">
                                    </a>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <a class="varietyreport-actions-delete"
                                        href="/admin/varietyReport/delete/{{$varietyReport->id}}">
                                        <img src="/assets/admin/imgs/products/delete_icon.svg" alt="Delete">
                                    </a>
                                </div>
                                <!--<div class="col-6 col-md-3 mb-3">
                                  <a class="varietyreport-actions-archive" href="#"><span>Archive</span></a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="info-wrap">
                        <h3>{{$varietyReport->variety_name}}</h3>
                        <div class="d-flex justify-content-between sub-items varietyreport-info-item">
                            <span class="name">Variety</span>
                            <span>{{$varietyReport->id}}</span>
                        </div>

                        <div class="d-flex justify-content-between sub-items varietyreport-info-item">
                            <span class="name">Breeder name</span>
                            <span>{{$varietyReport->breeder->user->username}}</span>
                        </div>
                        <div class="d-flex justify-content-between sub-items varietyreport-info-item">
                            <span class="name">Grower name</span>
                            <span>{{$varietyReport->grower->user->username}}</span>
                        </div>
                        <div class="d-flex justify-content-between sub-items varietyreport-info-item">
                            <span class="name">Trial location</span>
                            <span>{{$varietyReport->trial_location}}</span>
                        </div>

                        <div class="d-flex justify-content-between sub-items varietyreport-info-item">
                            <span class="name">Propagation</span>
                            <span>{{$varietyReport->date_propagation}}</span>
                        </div>

                        <div class="d-flex justify-content-between sub-items varietyreport-info-item">
                            <span class="name">Potting</span>
                            <span>{{$varietyReport->date_potting}}</span>
                        </div>

                        <div class="d-flex justify-content-between sub-items varietyreport-info-item">
                            <span class="name">Amount of plants</span>
                            <span>{{$varietyReport->amount_plants}}</span>
                        </div>

                        <div class="d-flex justify-content-between sub-items varietyreport-info-item">
                            <span class="name">Amount of samples</span>
                            <span>{{$varietyReport->samples->count()}}</span>
                        </div>

                        <div class="d-flex justify-content-between sub-items varietyreport-info-item">
                            <span class="name">Next sample date</span>
                            <span>{{$varietyReport->date_planned_sample}}</span>
                        </div>

                    </div>
                </div> <!-- card-product  end// -->
            </div>
            @endforeach
        </div> <!-- row.// -->
        <div class="pagination-area mt-15 mb-50 d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-start">
                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i
                                class="material-icons md-chevron_right"></i></a></li>
                </ul>
            </nav>
        </div>
    </section> <!-- content-main end// -->
    <footer class="main-footer font-xs">
        <div class="row pb-30 pt-15">
            <div class="col-sm-6">
                <script>
                document.write(new Date().getFullYear())
                </script> ©, Breederplants
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end">
                    All rights reserved
                </div>
            </div>
        </div>
    </footer>
</main>
@endsection

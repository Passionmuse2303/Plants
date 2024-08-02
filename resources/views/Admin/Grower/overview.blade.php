@extends('Layout.admin_layout')
@section('page_title')
<title>Grower Overview</title>
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
                    <a href="#" class="btn btn-primary btn-sm rounded float-end mx-1">Import</a>
                    <a href="/admin/grower/exportCSV" class="btn btn-primary btn-sm rounded float-end mx-1">Export</a>
                    <a href="/admin/grower/add" class="btn btn-primary btn-sm rounded float-end mx-1">Add Grower</a>
                </div>
            </div>
        </header> <!-- card-header end// -->

        <div class="row">
            <div class="table-container">
                <div class="table">
                    <div class="table-row header">
                        <div class="cell">
                            Grower ID
                        </div>
                        <div class="cell">
                            Company
                        </div>
                        <div class="cell">
                            Contact
                        </div>
                        <div class="cell">
                            Street
                        </div>
                        <div class="cell">
                            City
                        </div>
                        <div class="cell">
                            Postal code
                        </div>
                        <div class="cell">
                            Country
                        </div>
                        <div class="cell">
                            Phone
                        </div>
                        <div class="cell">
                            Email
                        </div>
                        <div class="cell">
                            Website
                        </div>
                    </div>

                    @foreach ($growers_data as $grower)
                    <div class="table-row" onclick="window.location.href='/admin/grower/view/{{$grower->id}}';">
                        <div class="cell" data-title="Grower ID">
                            {{$grower->grower_id}}
                        </div>
                        <div class="cell" data-title="Company">
                            {{$grower->company_name}}
                        </div>
                        <div class="cell" data-title="Contact">
                            {{$grower->user->username}}
                        </div>
                        <div class="cell" data-title="Street">
                            {{$grower->street}}
                        </div>
                        <div class="cell" data-title="City">
                            {{$grower->city}}
                        </div>
                        <div class="cell" data-title="Postal code">
                            {{$grower->postal_code}}
                        </div>
                        <div class="cell" data-title="Country">
                            {{$grower->country}}
                        </div>
                        <div class="cell" data-title="Phone">
                            {{$grower->user->phonenumber}}
                        </div>
                        <div class="cell" data-title="Email">
                            {{$grower->user->email}}
                        </div>
                        <div class="cell" data-title="Website">
                            {{$grower->website}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div> <!-- table end -->
        </div><!-- table container end -->
        </div> <!-- row end -->


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
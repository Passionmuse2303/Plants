@extends('Layout.admin_layout')
@section('page_title')
<title>Breeder Overview</title>
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
                    <a href="#" id="importButton" class="btn btn-primary btn-sm rounded float-end mx-1">Import</a>
                    <a href="/admin/breeder/exportCSV" id="exportButton"
                        class="btn btn-primary btn-sm rounded float-end mx-1">Export</a>
                    <a href="/admin/breeder/add" class="btn btn-primary btn-sm rounded float-end mx-1">Add Breeder</a>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="row">
            <div class="table-container">
                <div class="table">
                    <div class="table-row header">
                        <div class="cell">
                            Breeder ID
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
                    @foreach ($breeders_data as $breeder)
                    <div class="table-row" onclick='window.location.href="/admin/breeder/view/{{$breeder->id}}";''>
                            <div class="cell" data-title="Grower ID">
                                {{$breeder->breeder_id}}
                            </div>
                            <div class="cell" data-title="Company">
                                {{$breeder->company_name}}
                            </div>
                            <div class="cell" data-title="Contact">
                                {{$breeder->user->username}}
                            </div>
                            <div class="cell" data-title="Street">
                                {{$breeder->street}}
                            </div>
                            <div class="cell" data-title="City">
                                {{$breeder->city}}
                            </div>
                            <div class="cell" data-title="Postal code">
                                {{$breeder->postal_code}}
                            </div>
                            <div class="cell" data-title="Country">
                                {{$breeder->country}}
                            </div>
                            <div class="cell" data-title="Phone">
                                {{$breeder->user->phonenumber}}
                            </div>
                            <div class="cell" data-title="Email">
                                {{$breeder->user->email}}
                            </div>
                            <div class="cell" data-title="Website">
                                {{$breeder->website}}
                            </div>
                        </div>
                    @endforeach
                </div> <!-- table end -->
            </div><!-- table container end -->
        </div> <!-- row end -->
        <!-- {{ $breeders_data->onEachSide(2)->links() }} -->

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


    <!-- popups html-->
    <div class="modal-overlay" id="modalOverlay"></div>

    <div class="modal-content p-3" id="importPopup">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Import CSV</h5>
            <button type="button" class="close" id="closeImportButton">&times;</button>
        </div>
        <input type="file" class="form-control-file" id="csvFileInput">
        <button class="btn btn-primary btn-sm rounded mt-20" id="importFileButton">Import</button>
    </div>

    <div class="modal-content p-3" id="exportPopup">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Export CSV</h5>
            <button type="button" class="close" id="closeExportButton">&times;</button>
        </div>
        <div class="form-group">
            <label for="exportOption">Export Option:</label>
            <select class="form-control" id="exportOption">
                <option value="everything">Export Everything</option>
                <option value="grower_ids">Export Specific Grower IDs</option>
            </select>
        </div>
        <div class="form-group" id="growerIdsContainer" style="display: none;">
            <label for="growerIds">Grower IDs (comma separated):</label>
            <input type="text" class="form-control" id="growerIds">
        </div>
        <button class="btn btn-primary btn-sm rounded mt-20" id="exportFileButton">Export</button>
    </div>
    <!-- end popups html-->


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
@section(' page_js') <script>
                        const importButton = document.getElementById('importButton');
                        const closeImportButton = document.getElementById('closeImportButton');
                        const exportButton = document.getElementById('exportButton');
                        const closeExportButton = document.getElementById('closeExportButton');
                        const modalOverlay = document.getElementById('modalOverlay');
                        const importPopup = document.getElementById('importPopup');
                        const exportPopup = document.getElementById('exportPopup');
                        const exportOption = document.getElementById('exportOption');
                        const growerIdsContainer = document.getElementById('growerIdsContainer');

                        const openPopup = (popup) => {
                        modalOverlay.style.display = 'block';
                        document.body.style.overflow = 'hidden'; // Prevent scrolling
                        popup.classList.add('show');
                        };

                        const closePopup = (popup) => {
                        modalOverlay.style.display = 'none';
                        document.body.style.overflow = 'auto'; // Restore scrolling
                        popup.classList.remove('show');
                        };

                        importButton.addEventListener('click', () => openPopup(importPopup));
                        closeImportButton.addEventListener('click', () => closePopup(importPopup));
                        exportButton.addEventListener('click', () => openPopup(exportPopup));
                        closeExportButton.addEventListener('click', () => closePopup(exportPopup));
                        modalOverlay.addEventListener('click', () => {
                        closePopup(importPopup);
                        closePopup(exportPopup);
                        });

                        // Prevent modal from closing when clicking inside it
                        importPopup.addEventListener('click', (e) => {
                        e.stopPropagation();
                        });
                        exportPopup.addEventListener('click', (e) => {
                        e.stopPropagation();
                        });

                        exportOption.addEventListener('change', (e) => {
                        if (e.target.value === 'grower_ids') {
                        growerIdsContainer.style.display = 'block';
                        } else {
                        growerIdsContainer.style.display = 'none';
                        }
                        });
                        </script>
                        @endsection

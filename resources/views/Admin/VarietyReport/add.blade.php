@extends('Layout.admin_layout')
@section('page_title')
<title>Variety Add</title>
@endsection
@section('content')
<main class="main-wrap">

    <section class="content-main">


        <div class="row">
            <div class="container mt-5">
                <h2 class="mb-30">Add New Variety Report</h2>
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="variety">Variety</label>
                                <input type="text" name="variety_name" class="form-control" id="variety"
                                    placeholder="Enter Variety">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="growerId">Grower</label>
                                <select id="growerId" name="grower_id" class="form-control">
                                    @foreach ($growers_data as $grower)
                                    <option value="{{$grower->id}}">{{$grower->user->username}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="breederId">Breeder</label>
                                <select id="breederId" name="breeder_id" class="form-control">
                                    @foreach ($breeders_data as $breeder)
                                    <option value="{{$breeder->id}}">{{$breeder->user->username}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="amountOfPlants">Amount of Plants</label>
                                <input type="number" class="form-control" name="amount_plants" id="amountOfPlants"
                                    placeholder="Enter Amount of Plants">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="pot_size">Pot Size</label>
                                <input type="text" class="form-control" id="pot_size" name="pot_size"
                                    placeholder="Enter Pot Size">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="pot_trial">Pot Trial</label>
                                <select id="pot_trial" class="form-control" name="pot_trial">
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="trial_location">Trial Location</label>
                                <input type="text" class="form-control" id="pot_sizetrial_location"
                                    name="trial_location" placeholder="Enter trial location">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image"
                                    placeholder="Enter Image">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="open_field_trial">Open Field Trial</label>
                                <select id="open_field_trial" name="open_field_trial" class="form-control">
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="propagationDate">Propagation Date</label>
                                <input type="date" class="form-control" name="date_propagation" id="propagationDate">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="pottingDate">Potting Date</label>
                                <input type="date" class="form-control" name="date_potting" id="pottingDate">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3    0">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="plannedSampleDates">Planned Sample Dates (for notifications)</label>
                                <div id="plannedSampleDatesContainer">
                                    <div class="input-group mb-2">
                                        <input type="date" class="form-control" name="date_planned_sample">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-15">Add Variety Report</button>
                </form>
            </div>
        </div>
        <!-- end row -->



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
@if(Session::has('flash_message'))
<script>
alert('Added New Variety Report Successfully!');
</script>
@elseif(Session::has('validation_flash_error'))
@php
$error = $errors->all();
@endphp
<script>
var errors = @json($error);
if (errors.length > 0) {
    alert('Validation Error!\n' + errors.join('\n'));
}
</script>
@endif
@endsection
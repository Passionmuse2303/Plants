@extends('Layout.admin_layout')
@section('page_title')
<title>Sample Edit</title>
@endsection
@section('content')
<main class="main-wrap">

    <section class="content-main">


        <div class="row">
            <div class="container mt-5">
                <h2 class="mb-30">Edit Sample</h2>
                <form method="POST" action="/admin/sample/edit" enctype="multipart/form-data">
                    @csrf
                    <input type="text" hidden name="id" value="{{$sample_info->id}}">
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="sampleImage">Sample Image</label>
                                <input type="file" class="form-control" id="sampleImage" name="image">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="sampleDate">Sample Date</label>
                                <input type="date" class="form-control" id="sampleDate"
                                    value="{{$sample_info->sample_date}}" name="sample_date">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="leafColor">Leaf Color</label>
                                <input type="text" class="form-control" id="leafColor"
                                    value="{{$sample_info->leaf_color}}" name="leaf_color">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="amountBranches">Amount of Branches</label>
                                <input type="number" class="form-control" id="amountBranches"
                                    value="{{$sample_info->amount_branches}}" name="amount_branches">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="flowerBuds">Flower Buds</label>
                                <input type="number" class="form-control" id="flowerBuds"
                                    value="{{$sample_info->flower_buds}}" name="flower_buds">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="branchColor">Branch Color</label>
                                <input type="text" class="form-control" id="branchColor"
                                    value="{{$sample_info->branch_color}}" name="branch_color">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="roots">Roots</label>
                                <input type="text" class="form-control" id="roots" value="{{$sample_info->roots}}"
                                    name="roots">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="flowerColor">Flower Color</label>
                                <input type="text" class="form-control" id="flowerColor"
                                    value="{{$sample_info->flower_color}}" name="flower_color">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="flowerPetals">Flower Petals</label>
                                <input type="number" class="form-control" id="flowerPetals"
                                    value="{{$sample_info->flower_petals}}" name="flower_petals">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="floweringTime">Flowering Time</label>
                                <input type="text" class="form-control" id="floweringTime"
                                    value="{{$sample_info->flowering_time}}" name="flowering_time">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="lengthFlowering">Length of Flowering</label>
                                <input type="text" class="form-control" id="lengthFlowering"
                                    value="{{$sample_info->length_flowering}}" name="length_flowering">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="seeds">Seeds</label>
                                <select id="seeds" class="form-control" value="{{$sample_info->seeds}}" name="seeds">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="seedsColor">Seeds Color</label>
                                <input type="text" class="form-control" id="seedsColor"
                                    value="{{$sample_info->seeds_color}}" name="seeds_color">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="amountSeeds">Amount of Seeds</label>
                                <input type="number" class="form-control" id="amountSeeds"
                                    value="{{$sample_info->amount_seeds}}" name="amount_seeds">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-20">Edit sample</button>
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
alert('Edited Sample Successfully!');
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
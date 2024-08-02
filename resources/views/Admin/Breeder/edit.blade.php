@extends('Layout.admin_layout')
@section('page_title')
<title>Breeder Edit</title>
@endsection
@section('content')
<main class="main-wrap">

    <section class="content-main">


        <div class="row">

            <div class="container mt-5">
                <h2 class="mb-30">Edit Grower</h2>
                <form method="POST" action="/admin/breeder/edit">
                    @csrf
                    <input type="text" hidden class="form-control" id="id" name="id" value="{{$breeder_info->id}}">
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="growerId">Grower ID</label>
                                <input type="text" class="form-control" value="{{$breeder_info->breeder_id}}"
                                    id="growerId" name="breeder_id" placeholder="Enter Grower ID">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" value="{{$breeder_info->company_name}}"
                                    name="company_name" id="company_name" placeholder="Enter Company Name">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" value="{{$breeder_info->user->username}}"
                                    name="username" id="contact" placeholder="Enter Contact Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="street">Street</label>
                                <input type="text" class="form-control" value="{{$breeder_info->street}}" name="street"
                                    id="street" placeholder="Enter Street">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" value="{{$breeder_info->city}}" name="city"
                                    id="city" placeholder="Enter City">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="postalCode">Postal Code</label>
                                <input type="text" class="form-control" value="{{$breeder_info->postal_code}}"
                                    name="postal_code" id="postalCode" placeholder="Enter Postal Code">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" value="{{$breeder_info->country}}"
                                    name="country" id="country" placeholder="Enter Country">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" value="{{$breeder_info->user->phonenumber}}"
                                    name="phonenumber" id="phone" placeholder="Enter Phone Number">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" value="{{$breeder_info->user->email}}"
                                    name="email" id="email" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" value="{{$breeder_info->website}}"
                                    name="website" id="website" placeholder="Enter Website">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-15">Edit Breeder</button>
                </form>
            </div>

        </div> <!-- row end -->



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
alert('Edited Breeder Information Successfully!');
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
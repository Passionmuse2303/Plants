@extends('Layout.admin_layout')
@section('page_title')
<title>Grower Add</title>
@endsection
@section('content')
<main class="main-wrap">
    <section class="content-main">
        <div class="row">
            <div class="container mt-5">
                <h2 class="mb-30">Add New Grower</h2>
                <form method="POST" action="/admin/grower/add">
                    @csrf
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="growerId">Grower ID</label>
                                <input type="text" class="form-control" name="grower_id" id="growerId"
                                    placeholder="Enter Grower ID">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" name="company_name" id="company"
                                    placeholder="Enter Company Name">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" name="username" id="contact"
                                    placeholder="Enter Contact Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="street">Street</label>
                                <input type="text" class="form-control" name="street" id="street"
                                    placeholder="Enter Street">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="Enter City">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="postalCode">Postal Code</label>
                                <input type="text" class="form-control" name="postal_code" id="postalCode"
                                    placeholder="Enter Postal Code">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" name="country" id="country"
                                    placeholder="Enter Country">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phonenumber" id="phone"
                                    placeholder="Enter Phone Number">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" name="website" id="website"
                                    placeholder="Enter Website">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="Password" class="form-control" id="password" name="password"
                                    placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="password_confirmation">Confirm</label>
                                <input type="Password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Enter Confirm Password">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-15">Add Grower</button>
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
alert('Added New Grower Successfully!');
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
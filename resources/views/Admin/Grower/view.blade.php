@extends('Layout.admin_layout')
@section('page_title')
<title>Grower View</title>
@endsection
@section('content')
<main class="main-wrap">

    <section class="content-main">


        <div class="row">

            <div class="container mt-5">
                <h2 class="mb-30">View Grower</h2>
                <div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="growerId">Grower ID</label>
                                <input type="text" class="form-control" name="grower_id" id="growerId"
                                    value="{{$grower_info->grower_id}}" placeholder="Enter Grower ID">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" name="company_name" id="company"
                                    value="{{$grower_info->company_name}}" placeholder="Enter Company Name">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" name="username" id="contact"
                                    value="{{$grower_info->user->username}}" placeholder="Enter Contact Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="street">Street</label>
                                <input type="text" class="form-control" name="street" id="street"
                                    value="{{$grower_info->street}}" placeholder="Enter Street">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="Enter City"
                                    value="{{$grower_info->city}}">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="postalCode">Postal Code</label>
                                <input type="text" class="form-control" name="postal_code" id="postalCode"
                                    value="{{$grower_info->postal_code}}" placeholder="Enter Postal Code">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" name="country" id="country"
                                    value="{{$grower_info->country}}" placeholder="Enter Country">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phonenumber" id="phone"
                                    value="{{$grower_info->user->phonenumber}}" placeholder="Enter Phone Number">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{$grower_info->user->email}}" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" name="website" id="website"
                                    value="{{$grower_info->website}}" placeholder="Enter Website">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-15"
                        onclick="window.location.href='/admin/grower/edit/{{$grower_info->id}}';">Edit Grower</button>
                    <button class="btn btn-primary mt-15">Delete Grower</button>
                </div>
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
@endsection

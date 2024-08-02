@extends('Layout.admin_layout')
@section('page_title')
<title>Breeder View</title>
@endsection
@section('content')
<main class="main-wrap">

    <section class="content-main">


        <div class="row">

            <div class="container mt-5">
                <h2 class="mb-30">View Breeder</h2>
                <div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="growerId">Breeder ID</label>
                                <input type="text" class="form-control" value="{{$breeder_info->breeder_id}}"
                                    id="growerId" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" id="company"
                                    value="{{$breeder_info->company_name}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" id="contact"
                                    value="{{$breeder_info->user->username}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="street">Street</label>
                                <input type="text" class="form-control" value="{{$breeder_info->street}}" id="street"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" value="{{$breeder_info->city}}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="postalCode">Postal Code</label>
                                <input type="text" class="form-control" id="postalCode"
                                    value="{{$breeder_info->postal_code}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" value="{{$breeder_info->country}}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone"
                                    value="{{$breeder_info->user->phonenumber}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email"
                                    value="{{$breeder_info->user->email}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website" value="{{$breeder_info->website}}"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-15"
                        onclick="window.location.href='/admin/breeder/edit/{{$breeder_info->id}}';">Edit
                        Breeder</button>
                    <button class="btn btn-primary mt-15"
                        onclick="window.location.href='/admin/breeder/delete/{{$breeder_info->id}}';">Delete
                        Breeder</button>
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
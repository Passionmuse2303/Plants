@extends('Layout.user_layout')
@section('page_title')
<title>Add sample page</title>
@endsection
@section('content')
<div class="page-header breadcrumb-wrap2">
    <div class="container">
        <div class="d-flex">
            <div class="credit ">
                <div class="notification" onclick="window.history.back();">
                    <img src="/assets/user/imgs/Chevron_Left.svg" alt="">
                </div>
            </div>
            <div class="notification text-center w-100">
                <h2 style="color: #fff;">Add Sample</h2>
            </div>
        </div>
    </div>
</div>
<section class="pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 m-auto">
                <div class="contact-from-area padding-20-row-col wow FadeInUp">

                    <form class="contact-form-style text-center" id="contact-form" action="/user/sample/add"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="text" hidden name="variety_report_id" value="{{$varietyReport_id}}">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <label for="date">Date</label>
                                    <input placeholder="Enter Date" name="sample_date" type="date">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <label for="leaf_color">Leaf color</label>
                                    <input placeholder="Enter Leaf color" name="leaf_color" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <label for="branches">Amount of branches</label>
                                    <input placeholder="Total amount of branches" name="amount_branches" type="number">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <label for="flower_buds">Flower buds</label>
                                    <input placeholder="Flower buds" name="flower_buds" type="number">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <label for="branch_color">Branch color</label>
                                    <input placeholder="Enter Branch color" name="branch_color" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <label for="roots">Roots</label>
                                    <input name="roots" placeholder="Enter roots" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <label for="flower_color">Flower color</label>
                                    <input name="flower_color" placeholder="Enter Flower color" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <label for="flowering_time">Flowering time</label>
                                    <input name="flowering_time" placeholder="Flowering time" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <label for="flowering_length">Length of flowering</label>
                                    <input name="length_flowering" placeholder="Length of flowering" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <label for="seeds">Seeds</label>
                                    <input name="seeds" placeholder="Seeds" type="number">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <label for="seeds_color">Seed color</label>
                                    <input name="seeds_color" placeholder="Seed color" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-style mb-20">
                                    <label for="amount_seeds">Amount of seeds</label>
                                    <input name="amount_seeds" placeholder="Amount of seeds" type="number">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="input-style mb-20">
                                    <label for="flower_petals">Flower Petal</label>
                                    <input name="flower_petals" placeholder="Enter flower petal" type="text">
                                </div>
                            </div>
                            <!-- Upload Pictures with good design -->
                            <div class="col-lg-12 col-md-12">
                                <div class="input-style mb-20">
                                    <label for="pictures">Upload Pictures</label>
                                    <div class="upload-container">
                                        <div class="upload-icon">
                                            <img src="/assets/user/imgs/upload_icon.png" alt="Upload Icon">
                                        </div>
                                        <div class="upload-text">
                                            <span>Upload Pictures of plant</span>
                                        </div>
                                        <button type="button" class="upload-button">Upload</button>
                                        <input name="image" type="file" class="upload-input">
                                    </div>
                                </div>
                            </div>

                            <!-- submit button -->
                            <div class="col-lg-12 col-md-12">
                                <div class="input-style mb-20">
                                    <button type="submit" class="btn btn-fill-out btn-block hover-up"
                                        name="submit">Submit</button>
                                </div>
                            </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</section>
@if(Session::has('flash_message'))
<script>
alert('Added New Sample Successfully!');
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
@section('page_js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const uploadButton = document.querySelector('.upload-button');
    const uploadInput = document.querySelector('.upload-input');

    uploadButton.addEventListener('click', function() {
        uploadInput.click();
    });
});
</script>
<script>
// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('2cf80a1c8376672f6eb5', {
    cluster: 'mt1',
    encrypted: true
});

var channel = pusher.subscribe('notification');
channel.bind('news', function(data) {
    alert(JSON.stringify(data));
});
</script>
@endsection
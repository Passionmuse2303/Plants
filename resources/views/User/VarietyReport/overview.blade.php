@extends('Layout.user_layout')
@section('page_title')
<title>Varierty Reports overview page</title>
@endsection
@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="credit">
                <img src="/assets/user/imgs/avatar.png" alt="">
                <div class="user">
                    <h5>Welcome Back</h5>
                    <h2>Boat & CO</h2>
                </div>
            </div>
            <div class="notification">
                <img src="/assets/user/imgs/notification-bing.svg" alt="">
            </div>
        </div>
    </div>
</div>
<section class="main-section">
    <div class="container custom">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-header mb-20">
                    <h1 class="font-xxl">Varieties</h1>
                </div>
            </div>
            <div class="row loop-grid loop-list ">
                @foreach ($varietyReports_data as $varietyReport)
                <div class="col-md-6 col-sm-12">
                    <article class="wow fadeIn animated hover-up mb-30">
                        <div class="post-thumb rounded">
                            <img src="{{asset($varietyReport->image_url)}}" alt="">
                        </div>
                        <div class="entry-content-2">
                            <h3 class="post-title mb-15">
                                <a
                                    href="/user/varietyReport/detail/{{$varietyReport->id}}">{{$varietyReport->variety_name}}</a>
                            </h3>
                            <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                <div>
                                    <span class="post-on"> Start Date: {{$varietyReport->date_propagation}}</span>
                                </div>

                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
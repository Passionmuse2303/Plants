@extends('Layout.user_layout')
@section('page_title')
<title>Variety Report detail page</title>
@endsection
@section('content')
<section class="main-section-2">
    <div class="container custom">
        <div class="row" style="margin: 0; padding: 0;">
            <div class="col-lg-12" style="margin: 0; padding: 0;">
                <div class="loop-grid pr-30">
                    <div class="row">
                        <div class="col-12" style="margin: 0; padding: 0;">
                            <article class="first-post mb-30 wow fadeIn animated hover-up">
                                <div class="img-hover-slide position-relative overflow-hidden">
                                    <div class="top-right-icon">
                                        <div class="notification">
                                            <img src="/assets/user/imgs/Chevron_Left.svg" alt="">
                                        </div>
                                    </div>
                                    <div class="post-thumb img-hover-scale text-center">
                                        <a href="blog-post-right.html">
                                            <img src="{{asset($varietyReports_info->image_url)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="entry-content">

                                    <div class="d-flex justify-content-between mb-20">
                                        <h2>{{$varietyReports_info->variety_name}}</h2>
                                        <a href="" class="btn btn-fill-out hover-up"
                                            style="padding: 10px 18px; font-size: 10px; border: none;">Edit</a>
                                    </div>


                                    <div class="d-flex justify-content-between sub-items">
                                        <span class="name">Variety</span>
                                        <span>{{$varietyReports_info->id}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between sub-items">
                                        <span class="name">Breeder name</span>
                                        <span>{{$varietyReports_info->breeder->user->username}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between sub-items">
                                        <span class="name">Grower name</span>
                                        <span>{{$varietyReports_info->grower->user->username}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between sub-items">
                                        <span class="name">Trial Location</span>
                                        <span>{{$varietyReports_info->trial_location}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between sub-items">
                                        <span class="name">Date of propagation</span>
                                        <span>{{$varietyReports_info->date_propagation}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between sub-items">
                                        <span class="name">Date of potting</span>
                                        <span>{{$varietyReports_info->date_potting}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between sub-items">
                                        <span class="name">Amount of plants</span>
                                        <span>{{$varietyReports_info->amount_plants}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between sub-items">
                                        <span class="name">Amount of samples</span>
                                        <span>{{$varietyReports_info->samples->count()}}</span>
                                    </div>

                                    <div class="d-flex justify-content-between sub-items">
                                        <span class="name">Next sample date</span>
                                        <span>{{$varietyReports_info->date_planned_sample}}</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>

                <div class="row loop-grid loop-list ">
                    @foreach ($varietyReports_info->samples as $sample)
                    <div class="col-md-6 col-sm-12">
                        <article class="wow fadeIn animated hover-up mb-30">
                            <div class="post-thumb">
                                <img src="{{asset($sample->image_urls)}}" alt="">
                            </div>
                            <div class="entry-content-2">
                                <h3 class="post-title mb-15">
                                    <a href="/user/sample/view/{{$sample->id}}">{{$sample->id}}</a>
                                </h3>
                                </p>
                                <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                    <div>
                                        <span class="post-on"> Start Date: {{$sample->sample_date}}</span>
                                    </div>

                                </div>
                            </div>
                        </article>

                    </div>
                    @endforeach
                    <div class="col-lg-12 col-md-12">
                        <div class="input-style mb-20">
                            <a href="/user/sample/add/{{$varietyReports_info->id}}">
                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="submit">Add
                                    New SAmple</button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
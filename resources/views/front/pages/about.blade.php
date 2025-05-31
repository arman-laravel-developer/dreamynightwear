@extends('front.master')

@section('title')
{{$generalSettingView->site_name}} - About Us
@endsection

@section('body')
    <div class="page-header text-center" style="background-image: url('{{asset('/')}}front/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">About us</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About us</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content pb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="about-text text-center mt-3">
                        <h2 class="title text-center mb-2">Who We Are</h2><!-- End .title text-center mb-2 -->
                        <p>{!! $about->who_we_are !!}</p>
{{--                        <img src="{{asset('/')}}front/assets/images/about/about-2/signature.png" alt="signature" class="mx-auto mb-5">--}}

                        <img src="{{asset($about->image)}}" alt="image" class="mx-auto mb-6 mt-3">
                    </div><!-- End .about-text -->
                </div><!-- End .col-lg-10 offset-1 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

    </div><!-- End .page-content -->
@endsection

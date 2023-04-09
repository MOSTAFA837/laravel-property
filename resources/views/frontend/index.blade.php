@extends('frontend.frontend_dashboard')
@section('main')
    <!-- banner-section -->
    @include('frontend.home.index.banner');


    <!-- category-section -->
    @include('frontend.home.index.category');


    <!-- feature-section -->
    @include('frontend.home.index.feature');


    <!-- video-section -->
    @include('frontend.home.index.video');


    <!-- deals-section -->
    @include('frontend.home.index.deals');


    <!-- testimonial-section end -->
    @include('frontend.home.index.testimonial');


    <!-- chooseus-section -->
    @include('frontend.home.index.chooseus');


    <!-- place-section -->
    @include('frontend.home.index.place');


    <!-- team-section -->
    @include('frontend.home.index.team');


    <!-- cta-section -->
    @include('frontend.home.index.cta');


    <!-- news-section -->
    @include('frontend.home.index.news');


    <!-- download-section -->
    @include('frontend.home.index.download');
@endsection

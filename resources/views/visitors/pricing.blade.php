@extends("layouts.spacedcustomlayout")

@section("body")

    <div class="banner banner-inner banner-s2 banner-s2-inner tc-light">
        <div class="banner-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7 col-sm-9">
                        <div class="banner-content">
                            <div class="line-animate">
                                <span class="line line-top"></span>
                                <span class="line line-right"></span>
                                <span class="line line-bottom"></span>
                                <span class="line line-left"></span>
                            </div>
                            <p class="sub-heading">Packages</p>
                            <h1 class="banner-heading">Flexible Packages for Everyone</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-image">
                <img src="images/bg-a.jpg" alt="banner">
            </div>
        </div>
    </div>


</header>
<!-- START SECTION BANNER -->

<div class="section section-x">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <div class="section-head section-md">
                    <h5 class="heading-xs dash">Packages</h5>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
        <div class="row gutter-vr-30px">
                                    <div class="col-md-4">
                <div class="career-menu">
                                        <a href="{{route('stockplans')}}" class="btn-career">Stock Investment <em class="ti-arrow-right"></em></a>
                </div>
            </div>
                                    <div class="col-md-4">
                <div class="career-menu">
                                        <a href="{{route('forexplans')}}" class="btn-career">Forex Investment <em class="ti-arrow-right"></em></a>
                </div>
            </div>
                                    <div class="col-md-4">
                <div class="career-menu">
                                        <a href="{{route('cryptoplans')}}" class="btn-career">Crypto Investment <em class="ti-arrow-right"></em></a>
                </div>
            </div>
                                    <div class="col-md-4">
                <div class="career-menu">
                                        <a href="{{route('realestateplan')}}" class="btn-career">Real Estate Investment <em class="ti-arrow-right"></em></a>
                </div>
            </div>
                                </div>
    </div><!-- .container -->
</div>



    <!-- code -->

    <!-- end code -->
<!-- section / cta-->
<div class="section section-cta bg-primary tc-light">
    <div class="container">
        <div class="row gutter-vr-30px align-items-center justify-content-between">
            <div class="col-lg-8 text-center text-lg-left">
                <div class="cta-text-s2">
                    <h2><span>Start your journey to</span> <strong> Financial freedom </strong></h2>
                </div>
            </div>
            <div class="col-lg-4 text-lg-right text-center">
                <div class="cta-btn">
                    <a href="{{route('register')}}" class="btn btn-lg">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

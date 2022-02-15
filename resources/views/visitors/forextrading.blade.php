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
                        <p class="sub-heading">Our Services</p>
                        <h1 class="banner-heading">Forex Trading</h1>
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



















<div class="section section-x tc-grey-alt" style='padding-bottom: 10px;'>
<div class="container">
    <div class="row justify-content-between align-items-center gutter-vr-30px">
        <div class="col-lg-4 order-lg-last">
            <div class="image-block">
                <img src="serv/8.jpg" alt="">
            </div>
        </div><!-- .col -->
        <div class="col-lg-8">
            <div class="text-block">
                <h5 class="heading-xs dash">auxilliary tradex Capital</h5>
                <h2>Forex Trading</h2>
                <p class="lead">
                                        Forex is a portmanteau of foreign currency and exchange.
                                        Foreign exchange is the process of changing one currency into
                                        another currency for a variety of reasons, usually for commerce,
                                        trading, or tourism. According to a recent triennial report from the Bank for
                                        International Settlements (a global bank for national central banks),
                                        the average was more than $5.1 trillion in daily forex trading volume.
Because of the worldwide reach of trade, commerce, and finance, forex markets tend to be the largest and
most liquid asset markets in the world.

Market participants use forex to hedge against international currency and interest rate risk, to speculate on
geopolitical events, and to diversify portfolios, among several other reasons.
                                        </p>
            </div>
        </div><!-- .col -->
    </div><!-- .row -->
</div>
</div>




<div class="project-area project-call section-m bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-lg-flex text-center text-lg-left align-items-center justify-content-between">
                        <h2 class="fw-4">Want to see more services? </h2>
                                                        <a href="{{route('services')}}" class="btn">See All Services</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- END SECTION BLOG -->

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

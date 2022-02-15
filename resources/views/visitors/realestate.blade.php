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
                        <h1 class="banner-heading">Real Estate Investment</h1>
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














<div class="section section-x section-services tc-grey-alt" style='padding-bottom: 10px;'>
    <div class="container">
                    <div class="row justify-content-center ">
        <div class="col-lg-8 text-center">
            <div class="section-head section-md">
                <h5 class="heading-xs dash dash-both">Real Estate Investment</h5>
                <h2>Hot Deals From Real Estate</h2>
                                        <p>Real estate investment involves the purchase, ownership, management, rental and/or sale of real estate for profit.
                                            Improvement of realty property as part of a real estate investment strategy is generally considered to be a
                                            sub-specialty of real estate investing called real estate development. Real estate is an asset form with limited
                                            liquidity relative to other investments (such as stocks or bonds that openly trade on financial markets).
                                            It is also capital intensive (although capital may be gained through mortgage leverage) and is highly cash flow dependent.
                                            If these factors are not well understood and managed by the investor, real estate becomes a risky investment.</p>
            </div>
        </div>
    </div>
        <div class="row align-items-center gutter-vr-30px">
            <div class="col-lg-6">
                <div class="image-block">
                    <img src="images/hs/2.jpg" alt="">
                </div>
            </div><!-- .col -->
            <div class="col-lg-5 offset-lg-1">
                <div class="text-block">
                    <h3>$620,000</h3>
                    <p>Zak Hale 9 | Offered for $620,000 | 4 BR/ 4.5 BA | 2,460 sq. ft. Interior.</p>
                    <a href="estate87dd.html?d=2" class="btn">View Details</a>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
        <div class="row align-items-center gutter-vr-30px">
            <div class="col-lg-6 order-lg-last offset-lg-1">
                <div class="image-block">
                    <img src="images/hs/3.jpg" alt="">
                </div>
            </div><!-- .col -->
            <div class="col-lg-5">
                <div class="text-block">
                    <h3>$1,450,000</h3>
                    <p>This stunning modern-styled townhome located within the private
                                golf and ocean club community of Kohanaiki is a 4 BR/ 4.5 BA dream with a lounge pool,
                                spa, and detached guest ohana</p>
                    <a href="estateb558.html?d=3" class="btn">View Details</a>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
        <div class="row align-items-center gutter-vr-30px">
            <div class="col-lg-6">
                <div class="image-block">
                    <img src="images/hs/1.jpg" alt="">
                </div>
            </div><!-- .col -->
            <div class="col-lg-5 offset-lg-1">
                <div class="text-block">
                    <h3>$350,000</h3>
                    <p>4/5.5/2 |5,472 sqft |8,060 sqft lot
                                Location:Afton oaks</p>
                    <a href="estate2d2b.html?d=1" class="btn">View Details</a>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
        <div class="row align-items-center gutter-vr-30px">
            <div class="col-lg-6 order-lg-last offset-lg-1">
                <div class="image-block">
                    <img src="images/hs/4.jpg" alt="">
                </div>
            </div><!-- .col -->
            <div class="col-lg-5">
                <div class="text-block">
                    <h3>$26,430</h3>
                    <p>Bds | 1 Ba | 360 SQFT Location: 225 East 4th Street, Apt 18, New York. </p>
                    <a href="estatecdf7.html?d=4" class="btn">View Details</a>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
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

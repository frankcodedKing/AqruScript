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
                        <h1 class="banner-heading">Invest on stocks</h1>
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
                <img src="serv/stock-2.png" alt="">
            </div>
        </div><!-- .col -->
        <div class="col-lg-8">
            <div class="text-block">
                <h5 class="heading-xs dash">auxilliary tradex Capital</h5>

                                        <h2>Stock or Share</h2>
                <p class="lead">
                                        A stock or share (also known as a company's "equity") is a
                                        financial instrument that represents ownership in a company or corporation
                                        and represents a proportionate claim on its assets (what it owns)
                                        and earnings (what it generates in profits).


Stock ownership implies that the shareholder owns a slice of the company equal to the number of shares held as a
proportion of the company's total outstanding shares. For instance, an individual or entity that owns 100,000
shares of a company with one million outstanding shares would have a 10% ownership stake in it.
Most companies have outstanding shares that run into the millions or billions.
                                        </p>

                                        <div class="gap gap-8x d-none d-lg-block"></div>
    <div class="row justify-content-center gutter-vr-30px">
        <div class="col-12">
            <div class="text-box service-box bg-secondary h-full">
                <h2>How do I invest in stocks with 0% commission</h2>
                                        <ul>
                                            <li>
                                                <b>
<i class="fa fa-check-square"></i> Create an account
                                                </b>
                                            </li><br>
                                            <li>
                                                <b>
<i class="fa fa-check-square"></i> Choose a deposit plan
                                                </b>
                                            </li><br>
                                            <li>
                                                <b>
<i class="fa fa-check-square"></i> Make deposit
                                                </b>
                                            </li><br>
                                            <li>
                                                <b>
<i class="fa fa-check-square"></i> Get your ROI on plan completion
                                                </b>
                                            </li><br>
                                        </ul>
            </div>
        </div>
    </div><!-- .row -->
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

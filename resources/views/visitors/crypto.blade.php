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
                        <h1 class="banner-heading">Cryptocurrency Trading</h1>
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
                <img src="serv/3.jpg" alt="">
            </div>
        </div><!-- .col -->
        <div class="col-lg-8">
            <div class="text-block">
                <h5 class="heading-xs dash">auxilliary tradex Capital</h5>
                <h2>Cryptocurrencies</h2>
                <p class="lead">
                                        Auxilliary Tradex now offers all traders the opportunity to trade a wide range of the top ranked digital
                        coins 24/7*. Today cryptocurrencies have become known to most people as a conventional and popular investment option.
                        The main purpose of this new technology is to allow people to buy, trade, and invest without the need for
                        banks or any other financial institution. Cryptocurrencies are
                        highly volatile and can be profitable to any trader’s portfolio.
Cryptocurrencies are not physical coins they are electronic, a digital asset that remains as data.
The technology behind the cryptocurrency controls a large part of its value which holds new technology on
the secure way to identify and transfer money.
The first digital coin introduced was the Bitcoin and today it remains as the standard that all other coins
compare themselves to. Following in its steps came Litecoin, so to date they stand as the top 2 highly
valued coins on the market. There are several other coins also reaching a high-level market share such as
Bitcoin and Bitcoin Cash, Dash, Ripple, Ethereum and Ethereum Classic.
                                        </p>
            </div>
        </div><!-- .col -->
    </div><!-- .row -->
    <div class="gap gap-8x d-none d-lg-block"></div>
    <div class="row justify-content-center gutter-vr-30px">
        <div class="col-12">
            <div class="text-box service-box bg-secondary h-full">
                <h4 class="fw-6 mtm-5">Why trade Cryptocurrencies with auxilliary tradex Capital?</h4>
                                        <p>
                                           Cryptocurrencies could potentially be the currency of the future with more people gaining interest and price
                        value going up. Auxilliary Tradex offers competitive spreads, with no commissions charged on transactions making it
                        more profitable. When trading with Auxilliary Tradex you are trading on the price changes of the digital coin, and not
                        physically purchasing it.
                        Trading with Auxilliary Tradex ensures that you will trade with a 100% reputable broker.

                                        </p>
            </div>
        </div>
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

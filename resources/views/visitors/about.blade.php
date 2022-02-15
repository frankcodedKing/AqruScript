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
                        <p class="sub-heading">About Us</p>
                        <h1 class="banner-heading">We are Specialist in Financial Solutions</h1>
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


<div class="section section-x tc-grey-alt" style="padding-top: 70px; padding-bottom: 70px;">
<div class="container">
    <div class="row justify-content-between gutter-vr-30px"><!-- .col -->
        <div class="col-lg-12">
            <div class="text-block mtm-8 text-box-ml-2x">
                <h5 class="heading-xs dash">Who We Are</h5>
                                        <div class="row">
                                        <div class="col-lg-6">
            <h2>We are an international financial company engaged in investment activities,
                                    which are related to trading on financial markets and cryptocurrency
                                    exchanges performed by qualified professional traders.</h2>
        </div>
                                        <div class="col-lg-6"  style="width: 100%;">
            <div class="image-block">
                <img src="images/image-b.jpg" alt=""  style="width: 100%;">
            </div>
        </div>
                                        </div>
                                        <br>

                <p class="lead">
                                        Auxilliary Tradex is an experienced team dedicated to providing the best investment experience
                                        and top notch customer
                                        service to our investors. <br><br> We are a leading financial investment platform focusing on various aspect of finance and wealth
                                        management by providing access to over 4,000 funds and assets listed on the major capital markets ranging from investments
                                        banking, stock Broking, fund escrow services, forex, Gold and the most recently developed Cryptocurrencies, ETFs and Assets
                                        listed on the major stock markets, ISA’s investment services, Pensions and insurance bonds(onshore and offshore), third party
                                        providers such as Self Invested Personal pensions providers, advisory professionals, discretionary investment managers,
                                         portfolio management, lifetime cash flow modeling
                                        and a comprehensive financial planning infrastructure for investors in a more tax-efficient way.
                                        </p>
                                        <br><br>
                                        <h5>  {{$compd? $compd->aboutTitle : ""}} </h5>
                                        <p class="lead">

                                            {{$compd? $compd->aboutText : ""}}


                                        </p>

                                        <div class="row gutter-vr-30px" style='margin-top: 500px;'>
        <div class="col-md-6">
            <div class="text-block bg-primary tc-light d-flex">
                <div class="row align-items-center m-0">
                    <div class="col-12 p-0 col-xl-6 order-xl-last">
                        <div class="box-image">
                            <img src="images/team-r.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 p-lg-0">
                        <div class="text-box team-pad">
                            <h4>Connecting Opportunities</h4>
                            <p>Opportunities arise daily and are numerous, and we provide you with the means to connect from one to the other</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .col -->
        <div class="col-md-6">
            <div class="text-block bg-primary tc-light d-flex">
                <div class="row align-items-center m-0">
                    <div class="col-12 p-0 col-xl-6 order-xl-last">
                        <div class="box-image">
                            <img src="images/team-s.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 p-lg-0">
                        <div class="text-box team-pad">
                            <h4>Freedom of Choice</h4>
                            <p class="tc-grey">Benefit from tailored solutions that meet your needs. Over 100 tradable assets and unlimited market access</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .col -->
    </div>
                                        <br><br>
                <p>
                                        Auxilliary Tradex is a private limited liability company established on 24th January 2014, incorporated on 11th December 2020 and have
                                        gained popular support and trust from worldwide customers and investors owing totally to the teams dedication,
                                        hard work and sincerity by using our own in-depth knowledge supported by proven technology and systems already
                                        developed to provide our investors and clients with a simple and efficient way to invest and manage assets,

maintain records,
have access to bank term deposits listed on major exchanges and stock markets, provide access to reports and analysis tools
and a high-touch client/customer service team through a team of over 72 of our own highly trained service staff.

<br>
<br>
We are in control of our investors experience as we operate using our own proprietary sophisticated trading technologies
that allows us to react quickly to market trends and investors demands to regulate changes with no reliance on external
technology. We can set our own priorities and control the cost involved, hence we have been reckoned to
providing bespoke technology and comprehensive functionality for the efficient management of investors portfolio as we are
founded with the vision to create transparent trading and investment experience for our client. We are interested in
successful and transparent traders that will create high trading and investment volume for we are proud to help many
customers to make revenue as we provide real-time market data from leading analytical agencies. <br>
Auxilliary Tradex have had a very strong relationship with equity and funding providers
since our inception, we have also had experience of working across multiple sectors
and offering variety of full partner led services from experienced and professionals with passion for working on corporate
finance transactions, delivering transactions on the best all round investments services ranging from acquisitions, MBO,
Growth and capital development, replacement capital, real estates funding and arranging long term financing.
<br>
<br>
On each sector , our team is selected from our pool of experienced and expert trade financiers,
real estates specialists, veteran stock and forex brokers, seasoned account managers and
financial advisers having had long track record of success in their respective professionals
to perfect their duty owed to Auxilliary Tradex investors and also aid in providing access
to appropriate specialists dependent on the type of transaction being undertaken.
<br>
<br>
Whatever the investment capacity you have in mind, Auxilliary Tradex is committed to providing you with a
ladder to successful investments as we bring billionaire strategies to the millionaire doorsteps.  As at 31st December 2020,
as a Group we have £27.8bn of funds under direction on behalf of 103,000 investor clients and over 2,000 advisers.
<br>
<br>
In a world filled with financial uncertainties and inconsistencies, we urge you to join us on the path to
success with Auxilliary Tradex by starting up your investments now !!
                                        </p>
            </div><!-- .text-block  -->
        </div><!-- .col -->
    </div><!-- .row -->


</div><!-- .container -->
</div>
<!-- .section -->

<!-- section -->
<div class="section section-x bg-primary is-bg-half tc-grey">

<!-- bg -->
<div class="bg-image bg-half style-right">
    <img src="images/post-thumb-md-c.html" alt="">
</div>
<!-- end bg -->

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row gutter-vr-30px">
                <div class="col-md-10">
                    <div class="section-head section-head-col m-0">
                        <h5 class="heading-xs dash mywhite">OUR VALUES</h5>
                        <h2>What we care about makes us who we are.</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-box res-pr-1rem">
                        <h4 class="fw-6">Quality</h4>
                        <p class="mywhite">We put our best effort into each unique project knowing that the more we put into it, the more we get out of it.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-box res-pr-1rem">
                        <h4 class="fw-6">Great Experiences</h4>
                        <p class="mywhite">A great client experience begins with a great team member experience.We foster an environment for self financial success.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-box res-pr-1rem">
                        <h4 class="fw-6">Integrity</h4>
                        <p class="mywhite">Our reputation for transparency and trustworthiness has constantly put us at the top as our clients invest often smile home knowing that we are reliable.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-box res-pr-1rem">
                        <h4 class="fw-6">Freedom</h4>
                        <p class="mywhite">Fierce independence runs in our blood. As Knapsack evolves we prioritize our freedom and sustainability over rapid growth.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- .section -->

<div class="section section-x tc-light section-feature-alt">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <div class="section-head section-md">
                <h5 class="heading-xs dash dash-both">Our Approach</h5>
                <h2>Why choose auxilliary tradex Capital</h2>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-sm-6 bdr-rt bdr_dark_v1 text-center">
            <div class="feature feature-alt">
                <div class="feature-icon">
                    <em class="icon ti-file"></em>
                </div>
                <div class="feature-content">
                    <h3>Legal Company</h3>
                    <p>Our company conducts absolutely legal activities in the legal field.
                                                    We are certified to operate investment business, we are legal and safe.</p>
                    <a href="{{route('register')}}" class="btn btn-arrow">Get Started</a>
                </div>
            </div>
        </div><!-- .col -->
        <div class="col-lg-3 col-sm-6 bdr-rt bdr_dark_v1 text-center">
            <div class="feature feature-alt">
                <div class="feature-icon">
                    <em class="icon ti-lock"></em>
                </div>
                <div class="feature-content">
                    <h3>High reliability</h3>
                    <p>We are trusted by a huge number of people. We are working hard
                                                    constantly to improve the level of our security system and minimize possible risks.</p>
                    <a href="{{route('register')}}" class="btn btn-arrow">Get Started</a>
                </div>
            </div>
        </div><!-- .col -->
        <div class="col-lg-3 col-sm-6 bdr-rt bdr_dark_v1 text-center">
            <div class="feature feature-alt">
                <div class="feature-icon">
                    <em class="icon ti-wallet"></em>
                </div>
                <div class="feature-content">
                    <h3>Quick Withdrawal</h3>
                    <p>Our all retreats are treated spontaneously once requested. There are high maximum limits.</p>
                    <a href="{{route('register')}}" class="btn btn-arrow">Get Started</a>
                </div>
            </div>
        </div><!-- .col -->
        <div class="col-lg-3 col-sm-6 bdr-rt bdr_dark_v1 text-center">
            <div class="feature feature-alt">
                <div class="feature-icon">
                    <em class="icon ti-user"></em>
                </div>
                <div class="feature-content">
                    <h3>Referral Program</h3>
                    <p>We are offering 10% (percent) of referral income through our referral program.
                                                    You can increase your income by simply referring people.</p>
                    <a href="{{route('register')}}" class="btn btn-arrow">Get Started</a>
                </div>
            </div>
        </div><!-- .col -->
    </div><!-- .row -->

                <div class="row">
        <div class="col-lg-3 col-sm-6 bdr-rt bdr_dark_v1 text-center">
            <div class="feature feature-alt">
                <div class="feature-icon">
                    <em class="icon ti-headphone-alt"></em>
                </div>
                <div class="feature-content">
                    <h3>24/7 Support</h3>
                    <p>We provide 24/7 customer support through e-mail, telegram, whatsapp and livechat.
                                                    Our support representatives are periodically available to elucidate any difficulty.</p>
                    <a href="{{route('register')}}" class="btn btn-arrow">Get Started</a>
                </div>
            </div>
        </div><!-- .col -->
        <div class="col-lg-3 col-sm-6 bdr-rt bdr_dark_v1 text-center">
            <div class="feature feature-alt">
                <div class="feature-icon">
                    <em class="icon ti-server"></em>
                </div>
                <div class="feature-content">
                    <h3>Dedicated Server</h3>
                    <p>We are using a dedicated server for the website which allows us exclusive use of the resources of the entire server.</p>
                    <a href="{{route('register')}}" class="btn btn-arrow">Get Started</a>
                </div>
            </div>
        </div><!-- .col -->
        <div class="col-lg-3 col-sm-6 bdr-rt bdr_dark_v1 text-center">
            <div class="feature feature-alt">
                <div class="feature-icon">
                    <em class="icon ti-lock"></em>
                </div>
                <div class="feature-content">
                    <h3>SSL Secured</h3>
                    <p>Comodo Essential-SSL Security encryption confirms that the presented content is genuine and legitimate.</p>
                    <a href="{{route('register')}}" class="btn btn-arrow">Get Started</a>
                </div>
            </div>
        </div><!-- .col -->
        <div class="col-lg-3 col-sm-6 bdr-rt bdr_dark_v1 text-center">
            <div class="feature feature-alt">
                <div class="feature-icon">
                    <em class="icon ti-shield"></em>
                </div>
                <div class="feature-content">
                    <h3>DDOS Protection</h3>
                    <p>We are using one of the most experienced, professional, and trusted DDoS Protection and mitigation provider.</p>
                    <a href="texas-{{route('services')}}" class="btn btn-arrow">Read More</a>
                </div>
            </div>
        </div><!-- .col -->
    </div>
</div>
<!-- bg -->
<div class="bg-image overlay-dark bg-fixed">
    <img src="images/bg-c.jpg" alt="">
</div>
<!-- .bg -->
</div>
<!-- team -->
<div class="section section-x team tc-grey">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <div class="section-head section-md">
                <h5 class="heading-xs dash dash-both">Meet the team</h5>
                <h2>The reason for our success</h2>
            </div>
        </div>
    </div><!-- .row -->
    <div class="row justify-content-center gutter-vr-30px">
        <div class="col-lg-3">
            <div class="team-single text-center">
                <div class="team-image">
                    <img src="team/1.jpg" alt="">
                </div>
                <div class="team-content">
                    <h5 class="team-name">JAMES NORMAND</h5>
                    <p>Non-Executive Chairman</p>
                                                <p>

                                                    Mr Normand qualified as a Chartered Accountant in 1978, having trained with Spicer and Pegler
                                                (now part of Deloitte). Following a secondment (from 1985 to 1987) to 3i plc, Mr Normand specialised
                                                for the next 15 years in the provision of advice to management buy-out and buy-in teams and on corporate
                                                acquisitions, disposals and capital raisings. Since 2002, Mr Normand has filled management and finance
                                                officer roles for a number of different commercial and charitable organisations. Most recently,
                                                from 2009 to 2016, he was Finance Director of Pathfinder Minerals Plc, an AIM-traded minerals company.
                                                In an unremunerated extra-curricular capacity, Mr Normand is active in the governance of the Church of
                                                England, being Chair of the London Diocesan Synod’s House of Laity and Chair
                                                of the Finance and Remuneration Committees of the Bishop of London’s Council.

                                                </p>
                </div>
            </div>
        </div><!-- .col -->
        <div class="col-lg-3">
            <div class="team-single text-center">
                <div class="team-image">
                    <img src="team/3.jpg" alt="">
                </div>
                <div class="team-content">
                    <h5 class="team-name">RODGER SARGENT</h5>
                    <p>Executive Director</p>
                                                <p>

                                                    Mr Sargent has been the founder and finance director of many quoted and private companies over
                                                    the past twenty years, including Sports Internet Group plc, Bigblu Broadband plc, Audioboom Group plc
                                                    and S4 Capital plc. He previously ran the family office of Betfair
                                                    founder, Andrew Black. He qualified as a chartered accountant with PwC, London in 1996.

                                                </p>
                </div>
            </div>
        </div><!-- .col -->
        <div class="col-lg-3">
            <div class="team-single text-center">
                <div class="team-image">
                    <img src="team/4.jpg" alt="">
                </div>
                <div class="team-content">
                    <h5 class="team-name">SIMON GRANT-RENNICK</h5>
                    <p>Independent Non-Executive Director</p>
                                                <p>

                                                    Mr Grant Rennick is a graduate of the Cambourne School of Mines. His expertise encompasses not
                                                only mining and minerals but also metals, agriculture and property. He has managed mining companies,
                                                both public and private, in Uganda and in Malawi; metal trading businesses in Bermuda and in the UK;
                                                was a co-founder of Industrial Mineral Finance House which provides consultancy services covering all
                                                aspects of the industrial minerals’ sector, and established a property development business (since sold).
                                                Mr Grant-Rennick is chairman of Aquis-traded. He is currently involved with mining enterprises in Botswana,
                                                Malawi and Mexico; and
                                                in agribusinesses producing macadamia nuts, paprika and chilli, in sub-Saharan Africa.

                                                </p>
                </div>
            </div>
        </div><!-- .col -->
        <div class="col-lg-3">
            <div class="team-single text-center">
                <div class="team-image">
                    <img src="team/2.jpg" alt="">
                </div>
                <div class="team-content">
                    <h5 class="team-name">COLIN MCQUADE</h5>
                    <p>Non-Executive Director</p>
                                                <p>

                                                    Mr McQuade is a senior technology executive with over two decades of experience working
                                                for global blue-chip companies. He is currently Chief Technology Officer for BGL Group Limited,
                                                a financial services business specialising in home and vehicle insurance and owner of comparethemarket.com.
                                                Prior to this, he was Head of Change Technology at Barclays International, leading a global team responsible
                                                for delivering technology products and services across multiple areas including markets, investment banking,
                                                corporate banking and Barclaycard International.

Before Barclays, Mr McQuade spent ten years at Sky Group in London, where he held the position of Managing Director, Group TV and Digital Platforms. In addition,
                                                he has held senior executive positions at AOL, Orange Group and Yahoo! Europe. Prior to his career in business,
                                                Mr McQuade served for eleven years in the Army, within the Royal Corps of Signals, where he specialised in secure,
                                                strategic telecommunications systems.

                                                </p>
                </div>
            </div>
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .container -->
</div>
<div class="section section-x bg-primary tc-grey" style="padding-bottom: 0px;">
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-12">
            <div class="section-head section-md">
                <h5 class="heading-xs dash dash-both mywhite">FAQ</h5>
                <h2>Frequently Asked Questions</h2>
            </div>
        </div>
    </div>
    <div class="row gutter-vr-30px">
                                    <div class="col-12">
            <div class="faq-item bg-light">
                <h4>How long does it take to process my withdrawal?</h4>
                <p>Once we receive your withdrawal request we process immediately and send to your receiving wallet</p>
            </div>
        </div>
                                    <div class="col-12">
            <div class="faq-item bg-light">
                <h4>How do I make a deposit?</h4>
                <p>Quickly log in to your account, on your dashboard, click deposit, and choose your Investment Plan and follow the directions.</p>
            </div>
        </div>
                                    <div class="col-12">
            <div class="faq-item bg-light">
                <h4>Can this company be trusted?</h4>
                <p>Of course YES! It's Properly Registered, it's Been running for years, we've acquired thousands of Investors worldwide with pleasant testimonies on TRUSTPILOT and the last but not the least, we also engaged in proprietary trading and Investing activities that involves all market sectors to provide enough profits for our Investors.</p>
            </div>
        </div>
                                    <div class="col-12">
            <div class="faq-item bg-light">
                <h4>How do I make a withdrawal?</h4>
                <p>To make a withdrawal request, click on the WITHDRAW button at your dashboard and input the required details to withdraw.</p>
            </div>
        </div>
                                    <div class="col-12">
            <div class="faq-item bg-light">
                <h4>How many times can i make a deposit?</h4>
                <p>You can make as many deposit as you want on any of our pricing plans and any deposit request must be redeemed, you are also not allowed on the starters plan where you can only invest 3 times after which you would increase your Investment</p>
            </div>
        </div>
                                    <div class="col-12">
            <div class="faq-item bg-light">
                <h4>Can I have more than one account?</h4>
                <p>You cannot have more than one account only investors on special pricing plans are allowed to do so</p>
            </div>
        </div>


    </div>
</div>
</div>

<div class="pre-sec section-l bg-light">
<!-- code -->
<div class="section section-cta bg-primary tc-light">
    <div class="container">
        <div class="row gutter-vr-30px align-items-center justify-content-between">
            <div class="col-lg-8 text-center text-lg-left">
                <div class="cta-text">
                    <h2>Still have a question? <strong> Let’s talk</strong></h2>
                </div>
            </div>
            <div class="col-lg-4 text-lg-right text-center">
                <div class="cta-btn">
                                            <a href="{{route('contact')}}" class="btn">Contact us</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end code -->
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

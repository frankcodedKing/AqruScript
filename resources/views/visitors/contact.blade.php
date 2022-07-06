@extends("layouts.layout")

@section("body")

<div class="section section-x">
    <div class="container">
        <div class="row gutter-vr-30px">
            <div class="col-lg-4">
                
                <div class="text-block">
                    <div class="section-head">
                        <!--<h5 class="heading-xs dash fw-4">Send us a message</h5>--><br>
                        <h2>Tell us how we may help you and leave us your contact info</h2>
                    </div>
                </div>
            </div><!-- .col -->
            <div class="col-lg-8">
                                    <form class="" action="{{route('postcontact')}}" method="POST">
                                        @csrf
                    <div class="form-results"></div>
                    <div class="row">
                        <div class="form-field col-md-6">
                            <input name="name" required type="text" placeholder="Your Name" class="input bg-white">
                        </div>
                        <div class="form-field col-md-6">
                            <input name="email" required type="email" placeholder="Your Email" class="input bg-white">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field col-md-6">
                                                            <input name="phone" type="tel" placeholder="Your Phone" class="input bg-white">
                        </div>
                        <div class="form-field col-md-6">
                            <input name="subject" type="text" placeholder="Subject" class="input bg-white">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-field col-md-12">
                            <textarea name="message" required placeholder="Briefly tell us what you want... " class="input input-msg bg-white" aria-required="true"></textarea>
                            <br><br>
                            <button type="submit" class="btn btn-md" name="send">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- .section -->

<!-- section  -->
<!--        <div class="section tc-light section-x" style="padding-bottom: 30px;">-->
<!--    <div class="container">-->
<!--        <div class="row gutter-vr-30px">
<!--            <div class="col-md-12">-->
<!--                <div class="contact-text">
<!--                    <div class="text-box">
<!--                        <h3>Visit Us</h3>
<!--                        <p class="lead"><em class="contact-icon ti-direction"></em> 17 Grosvenor Street, London, England, W1K 4QG UK</p>
<!--                    </div>-->
<!--                    <ul class="contact-list">-->
<!--                        <li>-->
<!--                            <em class="contact-icon ti-mobile"></em>-->
<!--                            <div class="conatct-content">-->
<!--                                <a href="tel:+44-7888-878150">+44-7888-878150</a>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <em class="contact-icon ti-email"></em>-->
<!--                            <div class="conatct-content">-->
<!--                                <a href="mailto:{{$compd? $compd->companyEmail : "coming soon"}}">{{$compd? $compd->companyEmail : "coming soon"}}</a>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                                                        <li>-->
<!--                            <em class="contact-icon ti-world"></em>-->
<!--                            <div class="conatct-content">-->
<!--                                                                    <a href="{{route('index')}}">www.auxilliarytradex.com</a>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div><!-- .col -->
<!--        </div><!-- .row -->
<!--    </div><!-- .container -->
    <!-- bg -->
<!--    <div class="bg-image bg-fixed">-->
<!--        <img src="images/bg-l.jpg" alt="">-->
<!--    </div>-->
    <!-- .bg -->
<!--</div>-->

<!-- code -->

<!-- end code -->
<!-- section / cta-->
<!--<div class="section section-cta bg-primary tc-light">-->
<!--<div class="container">-->
<!--    <div class="row gutter-vr-30px align-items-center justify-content-between">-->
<!--        <div class="col-lg-8 text-center text-lg-left">-->
<!--            <div class="cta-text-s2">-->
<!--                <h2><span>Start your journey to</span> <strong> Financial freedom </strong></h2>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-lg-4 text-lg-right text-center">-->
<!--            <div class="cta-btn">-->
<!--                <a href="{{route('register')}}" class="btn btn-lg">Get Started</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</div>-->


@endsection()

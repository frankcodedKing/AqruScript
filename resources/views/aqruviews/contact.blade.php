@extends("layouts.aqrulayout")
@section("body")





<!-- here -->
<main class="main" id="main">
    <div class="template-contact-wrap">
      <section class="template-contact-layout content-container p-y-block">
        <div class="template-contact-upper content-default">
          <h1 class="template-contact-upper__heading">Help &amp; Support</h1>
          <p>If you have any questions, we&#8217;d be happy to answer your enquiry. Simply fill out the form below and a
            member of our team will get back to you as soon as possible.</p>
        </div>
        <div class="template-contact-main">
          <div class="template-contact-main">
            {{-- <div class="template-contact-form" id="contact-form"
              data-recaptcha-key="6LfYSAkbAAAAAHB_nApy0IjRJHhWCmAJRnZodgFP"
              data-subject-options="[{&quot;value&quot;:&quot;Account Opening&quot;,&quot;label&quot;:&quot;Account Opening&quot;},{&quot;value&quot;:&quot;Product Query&quot;,&quot;label&quot;:&quot;Product Query&quot;},{&quot;value&quot;:&quot;Funding my Account&quot;,&quot;label&quot;:&quot;Funding my Account&quot;}]">
            </div> --}}

              <!-- Yield section STart here  -->

  
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
            <div class="col-lg-8 card border-0 shadow rounded-3  form-control">
                                    <form class="" action="{{route('postcontact')}}" method="POST">
                                        @csrf
                    <div class="form-results"></div>
                    <div class="row">
                        <div class="form-field col-md-6 shadow rounded-3  form-control">
                            <input name="name" required type="text" placeholder="Your Name" class="input bg-white">
                        </div>
                        <div class="form-field col-md-6 form-group form-control">
                            <input name="email" required type="email" placeholder="Your Email" class="input bg-white">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 shadow rounded-3  form-control">
                                                            <input name="phone" type="tel" placeholder="Your Phone" class="input bg-white">
                        </div>
                        <div class="form-field col-md-6">
                            <input name="subject" type="text" placeholder="Subject" class="input bg-white">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 shadow rounded-3 form-control">
                            <textarea name="message" required placeholder="Briefly tell us what you want... " class="input input-msg bg-white" aria-required="true"></textarea>
                            <br><br>
                            <button type="submit" class="btn btn-md" name="send" style="background-color: blueviolet; border-color: #fff;">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


            <div class="template-contact-options">
              {{-- <article class="template-contact-options__option"> <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                  viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                  <path d="M0 0h24v24H0z" fill="none" />
                  <path
                    d="M11.5 2C6.81 2 3 5.81 3 10.5S6.81 19 11.5 19h.5v3c4.86-2.34 8-7 8-11.5C20 5.81 16.19 2 11.5 2zm1 14.5h-2v-2h2v2zm0-3.5h-2c0-3.25 3-3 3-5 0-1.1-.9-2-2-2s-2 .9-2 2h-2c0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.5-3 2.75-3 5z" />
                </svg>
                <h3>Help Center</h3>
                <div class="content-default">
                  <p>For more information and help articles for AQRU, visit our Help Center.</p>
                </div> <a class="template-contact-options__option__link" href="https://intercom.help/aqru-finance/en"
                  title="Visit Our Help Center">Visit Our Help Center</a>
              </article> --}}
              <article class="template-contact-options__option"> <svg xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 32 32" width="24" height="24">
                  <path d="M0 0h32v32H0z" fill="none" />
                  <path fill="currentColor"
                    d="M26.665 5.339H5.336a2.662 2.662 0 00-2.653 2.665L2.67 23.995a2.673 2.673 0 002.666 2.665h21.329a2.673 2.673 0 002.666-2.665V8.004a2.673 2.673 0 00-2.666-2.665zm0 5.33L16 17.332 5.336 10.669V8.004L16 14.667l10.665-6.663z" />
                </svg>
                <h3>Email</h3>
                <div class="content-default">
                  <p>Send us an email and one of our team will get back to you.</p>
                </div> <a href="mailto:help@aqru.io" class="template-contact-options__option__link"> help@aqrufinance.com </a>
              </article>
              {{-- <article class="template-contact-options__option"> <svg xmlns="http://www.w3.org/2000/svg"
                  enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor">
                  <g>
                    <rect fill="none" height="24" width="24" />
                  </g>
                  <g>
                    <path
                      d="M22,3l-1.67,1.67L18.67,3L17,4.67L15.33,3l-1.66,1.67L12,3l-1.67,1.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3v16 c0,1.1,0.9,2,2,2l16,0c1.1,0,2-0.9,2-2V3z M11,19H4v-6h7V19z M20,19h-7v-2h7V19z M20,15h-7v-2h7V15z M20,11H4V8h16V11z" />
                  </g>
                </svg>
                <h3>Media</h3> <a href="mailto:media@aqru.io" class="template-contact-options__option__link">
                  media@aqru.io </a>
              </article> --}}
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <!-- here -->

  


  <!-- main here  -->
 
 
 
  <section class="mailing-list">
    <div class="mailing-list__layout content-container">
      <div class="mailing-list__content">
        <h2 class="mailing-list__heading">Get Crypto-smart and join our mailing list.</h2>
        <div class="mailing-list__body content-default"> For the latest updates, articles, offers and earning
          opportunities, sign up today! </div>
      </div>
      <div id="mailing-list-form" class="mailing-list__form"></div>
    </div>
  </section>



    <!-- Yield section Stop here  -->

@endsection

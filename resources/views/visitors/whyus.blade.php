@extends("layouts.layout")


@section("body")


<div class="security-header about__header">
	<div class="container">
		<div class="security__title">We are the best in the industry</div>
		<div class="Security__description">Acorns is ideal for anyone seeking to access the profit potential the markets present.</div>
			<div class="row" style="margin-top:30px">
				<div data-aos="fade-right"
					 data-aos-delay="100" class="col s12 m4 why">
                    
					<img src="{{('acorn/img/roi2.png')}}" />
					<div class="why__asset-title white-text">Guaranteed Investment Returns</div>
					<p class="center white-text">Forecasts returns and rewards for the trades and investments you make using our proprietary model.</p>
				</div>
				<div data-aos="fade-right"
					 data-aos-delay="400" class="col s12 m4 why">
                     
					<img src="{{('acorn/img/retirement2.png')}}" />
					<div class="why__asset-title white-text">Retirement Spending needs</div>
					<p class="center white-text">Forecasts retirement spending by using your current spending and adjusting for age.</p>
				</div>
				<div data-aos="fade-right"
					 data-aos-delay="700" class="col s12 m4 why">
                     
					<img src="{{('acorn/img/hidden-charges.png')}}" />
					<div class="why__asset-title white-text">No hidden charges</div>
					<p class="center white-text">Choose an investment plan and get your full investment returns without any hidden charges.</p>
				</div>
			</div>
	</div>
</div>
<div class="container" style="padding: 50px 0px 180px 0px;">
    <div class="center industry" style="margin:30px 0 30px 0">
		<p>We provide forex, cryptocurrency and futures portfolios with clients looking to access the managed accounts space in a meaningful way. That has been our distinctive feature for years now, coupled with our experienced team up to the challenge of finding unique managers to fit distinctive needs.</p>
		<p>Trading on the markets can potentially provide those with the required skill access to significant returns which attract tons of people to trading every year.</p>
		<p>Acorns provide a solution for investors with little or no knowledge about the financial market benefit from its high volatility and yield. We put you forward with a fully variable structure to access the optimum managed trading service available.</p>
		<p>Our managed trading service has achieved returns of over 60% per month for investors and the team behind Acorns includes institutional traders and expert traders with over 25 years worth of combined experience. Therefore, by choosing to have your trading account managed by Acorns, you will gain access to any of the trading strategies we have available.</p>
		<p>Also you will benefit from our expertise in the markets and our years of experience of connecting investors to trading strategies that seeks substantial returns.</p>
		<p>You do not pay any fees to get in. Here at Acorns, we charge you a monthly performance fee of 2-5% of any profits achieved meaning you keep the remaining 95-98%.</p>
		<p>Here at Acorns , we are reliable ,trustworthy and transparent.</p>  
	</div>
			<div class="row" style="margin-top:30px">
				<div data-aos="fade-right"
					 data-aos-delay="100" class="col s12 m4 why">
					<div class="why__asset-title ">Our</br>Experience</div>
					<p class="center ">Acorns has achieved returns of over 60% per month for investors who have accessed the managed trading service. With over 25 years combined trading experience the Acorns trading team aims to maximize profits for investors in a compliant and regulated environment.</p>
				</div>
				<div data-aos="fade-right"
					 data-aos-delay="400" class="col s12 m4 why">
					<div class="why__asset-title ">100%</br>Transparency</div>
					<p class="center ">Smart investors take note. Our performance results speak for themselves and can be viewed 24/7 for you to verify. Here at Acorns, we charge you a monthly performance fee of 2-5% of any profits achieved meaning you keep the remaining 95-98%.</p>
				</div>
				<div data-aos="fade-right"
					 data-aos-delay="700" class="col s12 m4 why">
					<div class="why__asset-title ">Risk</br>Management</div>
					<p class="center ">You can select the amount of capital you are willing to risk for this type of investment, and we will make sure that your capital is secured while you make profit.</p>
				</div>
			</div>
		<div class="why">
			<a class="hero-cta" href="{{ route('register') }}">Get started</a>
		</div>
</div>



@endsection()

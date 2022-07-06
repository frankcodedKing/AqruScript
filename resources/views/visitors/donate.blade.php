@extends("layouts.layout")

    
        

@section("body")

<div class="row" style="padding: 50px 0px;height:auto">
	<div class="container">
	 <div class="col s12 m6">
		<div class="get-in-touch"  style="color: #74c947;" >Standing with Ukraine</div>
			<p>
Acorns has committed $10 million minimum to help the humanitarian crisis in Ukraine through its Acorns Charity Foundation. The donation will be split between major intergovernmental organizations and nonprofit organizations already on the ground, including UNICEF, UNHCR, the UN Refugee Agency, iSans and People in Need, to help support displaced children and families in Ukraine and its neighboring countries.<br>
Your support helps us raise and quickly distribute money for humanitarian needs. So that the people of Ukraine could get help where they need it the most. We’re always open for cooperation. 

</p>
<p>Acorns Charity has an ongoing collaboration with agencies like Lifeline Ukraine, Ukraine Emergency Appeal via its Luxembourg Committee, having worked together to provide assistance following the Beirut Explosion. Our latest donation will go toward protecting the welfare of Ukraine's 7.5 million children. As the conflict escalates, so will the needs of the children and their families. UNICEF’s current actions include pre-positioning of critical supplies, providing safe drinking water, supporting families on the move, child protection, emergency educational resources and psychosocial support.
			</br>	     
Let’s unchain the real power of the blockchain for good.

</p>
<strong>
<p  style="font-size: 26px; color: #74c947;">
    Amount Raised - $8,993,824
</p></strong>


	</div>
	
	<div class="col s12 m6 ">
    
		<img src="https://unchain.fund/images/home/heart.png"/>
	</div>
	

	</div>
	
	
</div>

<div class="row">
	<div class="container">
	 <div class="col s12 m6 ">
		<div class="get-in-touch" >Here are wallets you can donate to</div>
		<br>
		
		
			<strong>Bitcoin</strong><p id="btc" > 1KqwqxJQFHhzV4USpG5exqKWAnFeATJLeN</p> <button type="button" class="btn btn-danger" onclick="copyToClipboard('btc')">Copy </button><br><br>
			<strong>Ethereum(Bep20)</strong><p id="eth"> 0xd7ce5cf20da56bb6b598168fdcb939ec611fc411</p><button type="button" class="btn btn-danger" onclick="copyToClipboard('eth')">Copy</button><br><br>
			<strong>USDT(Bep20)</strong><p id="usdt" > 0xd7ce5cf20da56bb6b598168fdcb939ec611fc411</p><button type="button" class="btn btn-danger" onclick="copyToClipboard('usdt')">Copy </button><br><br>
			
			<strong>Litecoin</strong><p id="ltc" > LMrPSReG4nPZGfSB5WJj1GVNxruDopPn3s</p><button type="button" class="btn btn-danger" onclick="copyToClipboard('ltc')">Copy </button>
			
			<br>

			<p>
			    Important note: we are not raising funds for weapons.
			</p>

<!--<p class="text-large">Referral link:</p>-->
<script>

function copyToClipboard(elementId) {

  // Create a "hidden" input
  var aux = document.createElement("input");

  // Assign it the value of the specified element
  aux.setAttribute("value", document.getElementById(elementId).innerHTML);

  // Append it to the body
  document.body.appendChild(aux);

  // Highlight its content
  aux.select();

  // Copy the highlighted text
  document.execCommand("copy");

  // Remove it from the body
  document.body.removeChild(aux);

}

</script>

                                
                                
                                
                                
	</div>
	
	

	</div>
	
	
</div>


@endsection()



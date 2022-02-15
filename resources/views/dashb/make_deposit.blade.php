@extends('dashb.dashlayout')
@section('dashbody')



<section class="content-header">
    <h1>
    Fund Deposit
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="#">Deposit</a></li>
      <li class="breadcrumb-item active">Fund Deposit</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="row">

       <div class="col-lg-12 col-12">

           <div class="row">

              <div class="col-12">
                  <h3 class="page-header">Deposit Request</h3>
              </div>

              <div class="col-lg-6 col-12">
                  <div class="box bg-info box-solid">
                    <div class="box-header with-border">
                      <h4 class="box-title">make deposit</h4>
                      <ul class="box-controls pull-right">
                        <li><a class="box-btn-close" href="#"></a></li>
                        <li><a class="box-btn-slide"  href="#"></a></li>
                        <li><a class="box-btn-fullscreen" href="#"></a></li>
                      </ul>
                    </div>

                    <div class="box-content">
                      <div class="box-body">
                        <form action="{{route('userdashb_deposit_request')}}" method="post" >
                            @csrf
                          <div class="form-group row">
                              <label class="col-12" for="login1-username">select method</label>
                              <div class="col-12">
                                  <select required name="method" id="" class="form-control">
                                      <option value="btc_address">BTC</option>
                                      <option value="eth">Eth</option>
                                      <option value="paypal">Paypal</option>
                                  </select>

                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-12" for="lock1-password1">Amount (in usd)</label>
                              <div class="col-12">
                                  <input type="number" required class="form-control" id="lock1-password1" name="amount" placeholder="Enter Amount in USD">
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-12">
                                  <label class="switch switch-border switch-info">
                                    <input type="checkbox">
                                    <span class="switch-indicator"></span>
                                    <span class="switch-description"></span>&nbsp; Remember this option?
                                  </label>
                              </div>
                          </div>
                          <div class="form-group row mb-0">
                              <div class="col-12">
                                  <button type="submit" class="btn btn-success">
                                      <i class="fa fa-arrow-right mr-5"></i> Proceed with deposit
                                  </button>
                              </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
              </div>


           </div>

       </div>

    </div>

  </section>



@endsection()

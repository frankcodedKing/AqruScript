@extends('dashb.dashlayout')
@section('dashbody')




<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      Investment Plans
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="#">Real Estate Investment Packages</a></li>
      <li class="breadcrumb-item active">Plans</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- START Card With Image -->
    <h4 class="box-title mb-10">Real Estate Investment Packages</h4>
    <div class="row">
     @if (isset($plans)  && $plans->count() > 0)
         @foreach ($plans as $plan)
         <div class="col-md-12 col-lg-4">
          <div class="box box-default pull-up">
              <img class="card-img-top img-responsive" src="dashb/images/card/img{{$loop->index + 1}}.jpg" alt="Card image cap">
            <div class="box-body text-center">
                <h4 class="box-title"><span>{{$plan->plan}}</span></h4>
                <p><div class="col-12 col-md-12">
                  <div class="box box-body bg-hexagons-white pull-up">
                    <div class="media align-items-center p-0">
                      <div class="text-center">
                        <a href="#"><i class="cc LSK mr-5" title="OMG"></i></a>
                        </div>
                        <div>
                        <h3 class="no-margin text-bold">percent</h3>
                        <span>{{$plan->percentage}}</span>
                        </div>
                    </div>
                    <div class="flexbox align-items-center mt-25">
                      <div>
                        <p class="no-margin font-weight-600"><span class="text-yellow">{{$plan->minimum}}</span> </p>
                        <p class="no-margin">Minimum</p>
                        </div>
                        <div class="text-right">
                        <p class="no-margin font-weight-600"><span class="text-yellow">{{$plan->maximum}}</span></p>
                        <p class="no-margin">Maximum</p>
                       </div>
                    </div>
                  </div>
                </div></p>
                <p>
            <form action="{{route('userdashb_plan')}}" method="POST">
                    @csrf
                      <input type="text" hidden name="plan" value="{{$plan->plan}}" id="">
                    <div class="form-group">
                        <label>Select Duration</label>
                        <select name="duration" class="form-control">
                          <option value="1">1 Week</option>
                          <option value="2">2 Weeks</option>
                          <option value="3">3 Weeks</option>
                          <option value="4">4 Weeks</option>
                          <option value="5">5 Weeks</option>
                        </select>
                      </div>
                  </p>
                  <p>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <button type="button" class="btn btn-danger">Amount</button>
                    </div>
                    <!-- /btn-group -->
                    <input type="number" name="amount" class="form-control">
                </div>
                </p>
                  <button type="submit" class="btn btn-primary">Invest</button>
            </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

         @endforeach
     @else

     <div class="col-md-12 col-lg-12">
      <div class="box box-default pull-up" style="text-align: center">
        <h4>
          No investment plan set by admin
        </h4>
      </div>
     </div>

     @endif






    </div>
    <!-- /.row -->
    <!-- END Card with image -->


  </section>





@endsection()

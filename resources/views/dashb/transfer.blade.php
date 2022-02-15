@extends('dashb.dashlayout')
@section('dashbody')




<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      Fund Transfer
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="#">Deposit & Transfer</a></li>
      <li class="breadcrumb-item active">Transfer</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
          <!-- Default box -->
            <div class="box box-solid bg-dark">
              <div class="box-header with-border">
                <h3 class="box-title">Funds user to user tranfer</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                          title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
              </div>




              <div class="col-lg-6 col-12">
                <div class="box bg-info box-solid">
                  <div class="box-header with-border">
                    <h4 class="box-title">make Transfer</h4>
                    <ul class="box-controls pull-right">
                      <li><a class="box-btn-close" href="#"></a></li>
                      <li><a class="box-btn-slide"  href="#"></a></li>
                      <li><a class="box-btn-fullscreen" href="#"></a></li>
                    </ul>
                  </div>

                  <div class="box-content">
                    <div class="box-body">
                      <form action="{{route('userdashb_tranfer_post')}}" method="post" >
                          @csrf
                        <div class="form-group row">
                            <label class="col-12" for="login1-username">Select Beneficiary</label>
                            <div class="col-12">
                                <input class="form-control"  type="email" name="beneficiary" placeholder="enter beneficiary email" id="">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="lock1-password1">Amount (in usd)</label>
                            <div class="col-12">
                                <input type="number" required class="form-control" id="lock1-password1" name="amount" placeholder="Enter Amount in USD">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-arrow-right mr-5"></i> Proceed with tranfer
                                </button>
                            </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>


              <div class="box-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered no-margin">
                        <thead>
                            <tr><td colspan="7"><h3>Funds Transfer History</h3></td></tr>
                          <tr>
                             <th class="text-center">S/N</th>

                             <th class="text-right"> Date</th>
                             <th class="text-right">Amount</th>
                             <th class="text-right">beneficiary</th>

                             <th class="text-right">Status</th>
                          </tr>
                         </thead>
                         <tbody>
                             @if ($transfer->count() >0)
                             @foreach ($transfer as $my_transfer)
                             <tr>
                                <td class="text-center">{{$loop->index + 1}}</td>
                                <td><a href="#" class="text-yellow hover-warning">{{$my_transfer->created_at->diffForHumans()}}</a></td>
                                <td class="text-right"><span>$</span> {{$my_transfer->amount}}</td>

                                <td class="text-right"><span>$</span> {{$my_transfer->beneficiary}}</td>
                                <td class="text-right"><span class="label label-success">Completed</span></td>
                             </tr>

                             @endforeach

                             @else
                             <tr>
                                <td class="text-center"></td>
                                <td colspan="5" class="text-center"><a href="#" class="text-yellow hover-warning">You have not made any inter user tranfer</a></td>

                             </tr>

                             @endif

                         </tbody>
                      </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
      </div>

    </div>
  </section>





@endsection()

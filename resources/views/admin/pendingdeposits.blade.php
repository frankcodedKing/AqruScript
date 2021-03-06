@extends("adminlayout.adminlayout")
@section("body")

<div class="container">
<!-- DATA TABLE-->
<section class="p-t-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-5 m-b-35">data table</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="rs-select2--light rs-select2--md">
                            <select class="js-select2" name="property">
                                <option selected="selected">All Properties</option>
                                <option value="">Option 1</option>
                                <option value="">Option 2</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <div class="rs-select2--light rs-select2--sm">
                            <select class="js-select2" name="time">
                                <option selected="selected">Today</option>
                                <option value="">3 Days</option>
                                <option value="">1 Week</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <button class="au-btn-filter">
                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                    </div>
                    <div class="table-data__tool-right">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>add item</button>
                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                            <select class="js-select2" name="type">
                                <option selected="selected">Export</option>
                                <option value="">Option 1</option>
                                <option value="">Option 2</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive table-responsive-data2">

                    <div class="card-header">
                        <strong>PENDING DEPOSITS</strong>

                    </div>


                    <table class="table">
                        <thead>
                            <tr>
                                <th>


                                        <span class="">ID</span>

                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Deposit</th>
                                <th>Balance</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pendingDeposit)
                            @foreach ( $pendingDeposit as $deposit )
                            <tr class="tr-shadow">
                                <td>
                                    <label class="">

                                        <span class="">{{$loop->index}}</span>
                                    </label>
                                </td>
                                <td>{{$deposit->name}}</td>
                                <td>
                                    <span class="desc">{{$deposit->email}}</span>
                                </td>
                                <td>
                                   <span class="desc">{{$deposit->amount}}</span>
                                </td>
                                <td>{{$deposit->method}}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="view">
                                                <i class="zmdi zmdi-account"></i>
                                            </button>
                                        </a>
                                        <a href="{{route('viewuser', $deposit->userId)}}">
                                            <button class="item" data-toggle="tooltip" type="button" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                        </a>
                                       <a href="{{route('approve_deposit', $deposit->id)}}">
                                        <button class="item" data-toggle="tooltip" type="button" data-placement="top" title="Approve deposit">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>
                                       </a>
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                            <i class="zmdi zmdi-more"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                            @endforeach

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!-- END DATA TABLE-->

@endsection

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
                        <strong>INVESTMENT PLANS</strong>

                    </div>

<div class="table table-responsive">

    <table class="table" style="background-color: rgb(226, 215, 215)">
        <thead>
            <tr>
                <th>


                        <span class="">ID</span>

                </th>
                <th>Package Name</th>
                <th>Minimum Deposit</th>
                <th>Maximum Deposit</th>
                <th>Percentage</th>
                <th>Duration</th>
                <th>repeat</th>
                <th>No of repeat</th>
                <th>Type</th>
                <th></th>
            </tr>

        </thead>
        <tbody>
            @if ($allplans)
                @foreach ( $allplans as $plan )
                <form action="{{route('editinvestmentplan', $plan->id)}}" method="post">
                    @csrf
                    <tr class="tr-shadow">
                        <td>
                            <label class="">

                                <span class="">{{$loop->index}}</span>
                            </label>
                        </td>
                        <td><input type="text" name="plan"  required value="{{$plan->plan}}" id=""></td>
                        <td>
                            <span class="desc"><input type="number"  required value="{{$plan->minimum}}" name="minimum" id=""></span>
                        </td>

                        <td><input type="number" required name="maximum"  id="" value="{{$plan->maximum}}"></td>
                        <td>
                            <input type="text" required name="percentage"  value="{{$plan->percentage}}" id="">
                        </td>
                        <td><input type="text" required name="duration" placeholder="duration in days" value="{{$plan->duration}}" id=""></td>
                        <td>
                            <input type="text" required name="repeat" placeholder=""  value="{{$plan->repeat}}" id="">
                        </td>
                        <td><input type="number" required name="noofrepeat"  value="{{$plan->noofrepeat}}" id=""></td>

                        <td> <select name="type"  required id="">
                            <option value="{{$plan->type}}">{{$plan->type}}</option>

                            <option value="landbanking">Land Banking Plan</option>
                            <option value="realestateplan">Real Estate Plan</option>
                            <option value="cryptoplans">Crypto Plan</option>
                            <option value="forexplans">Forex Plan</option>
                            <option value="stockplans">Stock plan</option>

                        </select> </td>

                        <td>
                            <button type="submit" type="submit" class="btn btn-primary">Add</button>
                        </td>
                        <td>
                            <a href="{{route('deleteinvestmentplan',$plan->id)}}"><button type="button" class="btn btn-danger">delete</button></a>
                        </td>
                    </tr>
                </form>
                <tr class="spacer"></tr>
                @endforeach
            @endif

            <tr class="spacer"></tr>
            <tr><td colspan="4">Create new plan</td></tr>
            <tr>
                <form action="{{route('createinvestmentplan')}}" method="post">
                    @csrf
                    <tr class="tr-shadow">
                        <td>
                            <label class="">
                                <span class="">1</span>
                            </label>
                        </td>
                        <td><input type="text" required name="plan" placeholder="Plan Name" value="" id=""></td>
                        <td>
                            <span class="desc"><input type="number" required value="" placeholder="minimum amount" name="minimum" id=""></span>
                        </td>
                        <td><input type="number" name="maximum" placeholder="maximum amount" required id="" value=""></td>
                        <td>
                            <input type="text" name="percentage" placeholder="plan percent"  required  value="" id="">
                        </td>
                        <td><input type="text" name="duration" placeholder="duration in days" required value="" id=""></td>
                        <td>
                            <input type="text" name="repeat" required value="" id="">
                        </td>
                        <td><input type="number" name="noofrepeat" placeholder="no of times it is to repeat" required value="" id=""></td>
                        <td> <select name="type" required id="">

                            <option value="landbanking">Land Banking Plan</option>
                            <option value="realestateplan">Real Estate Plan</option>
                            <option value="cryptoplans">Crypto Plan</option>
                            <option value="forexplans">Forex Plan</option>
                            <option value="stockplans">Stock plan</option>

                        </select> </td>
                        <td>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </td>

                    </tr>
                </form>
            </tr>
        </tbody>
    </table>
</div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!-- END DATA TABLE-->

@endsection

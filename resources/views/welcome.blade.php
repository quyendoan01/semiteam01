@extends('layouts.appad')

@section('content')
    <!-- Navbar -->
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <!-- End Navbar -->
    <div class="container-fluid">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Trade</p>
                                        <h4 class="font-weight-bolder" style="color: purple">
                                            @if (isset($total_5_days))
                                                ${{number_format( (float) $total_5_days[4], 2, '.', ',')}}
                                            @endif
                                        </h4>
                                        <p class="mb-0">
                                            @if ($total_5_days[3] > 0)
                                                @if ($total_5_days[4] >= $total_5_days[3])
                                                    <span class="text-success text-sm font-weight-bolder">+{{number_format(( (float) $total_5_days[4]/ (float) $total_5_days[3]*100 - 100) ,2)}}%</span>
                                                @else
                                                    <span class="text-warning text-sm font-weight-bolder">{{number_format(( (float) $total_5_days[4]/(float)$total_5_days[3]*100 - 100),2)}}%</span>
                                                @endif
                                            @else
                                                <span class="text-success text-sm font-weight-bolder">{{number_format(( (float) $total_5_days[4]),2)}}%</span>
                                            @endif

                                            since yesterday
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-primary text-center rounded-circle">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Client</p>
                                        <h5 class="font-weight-bolder">
                                            {{number_format(count($client_today), 0, ',')}}
                                        </h5>
                                        <p class="mb-0">
                                            @if (count($client_yesterday) > 0)
                                            @if (count($client_today) >= count($client_yesterday))
                                            <span class="text-success text-sm font-weight-bolder">+{{ number_format(count($client_today)/count($client_yesterday)*100 - 100,2)}}%</span>
                                        @else
                                            <span class="text-warning text-sm font-weight-bolder">{{number_format(count($client_today)/count($client_yesterday)*100 - 100,2)}}%</span>
                                        @endif
                                            @else
                                            <span class="text-success text-sm font-weight-bolder">+{{ number_format(count($client_today))}}%</span>
                                            @endif

                                            since yesterday
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-dark shadow-danger text-center rounded-circle">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Import</p>
                                        <h5 class="font-weight-bolder" style="color: mediumblue">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z"/>
                                                <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                              </svg>
                                            {{number_format( (float) $import_5_days[4], 2, '.', ',')}}$
                                        </h5>
                                        <p class="mb-0">
                                            @if ($import_5_days[3] > 0)
                                            @if ($import_5_days[4] >= $import_5_days[3])
                                                <span class="text-success text-sm font-weight-bolder">+{{number_format(( (float) $import_5_days[4]/ (float) $import_5_days[3]*100 - 100) ,2)}}%</span>
                                            @else
                                                <span class="text-warning text-sm font-weight-bolder">{{number_format(( (float) $import_5_days[4]/ (float) $import_5_days[3]*100 - 100) ,2)}}%</span>
                                            @endif
                                            @else
                                            <span class="text-success text-sm font-weight-bolder">{{number_format(( (float) $import_5_days[4]) ,2)}}%</span>
                                            @endif

                                            since yesterday
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-info shadow-success text-center rounded-circle">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Export</p>
                                        <h5 class="font-weight-bolder" style="color: forestgreen">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z"/>
                                                <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                              </svg>
                                        {{number_format( (float) $export_5_days[4], 2, '.', ',')}}$

                                        </h5>
                                        <p class="mb-0">
                                            @if ($export_5_days[3] > 0)
                                            @if ($export_5_days[4] >= $export_5_days[3])
                                            <span class="text-success text-sm font-weight-bolder">+{{number_format(( (float) $export_5_days[4]/ (float) $export_5_days[3]*100 - 100) ,2)}}%</span>
                                        @else
                                            <span class="text-warning text-sm font-weight-bolder">{{number_format(( (float) $export_5_days[4]/ (float) $export_5_days[3]*100 - 100) ,2)}}%</span>
                                        @endif
                                        @else
                                        <span class="text-success text-sm font-weight-bolder">+{{number_format(( (float) $export_5_days[4]))}}%</span>
                                            @endif

                                            since yesterday
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-warning text-center rounded-circle">
                                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-7 mb-lg-0 mb-4">
                    <div class="card z-index-2 h-100">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                            <h5 class="text-capitalize"><b>Sales overview</b></h5>
                            <p class="text-sm mb-0">
                                The last <span class="font-weight-bold">5 days</span>
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="chart">
                                <canvas id="saleChart" style="width:100%;max-width:700px"></canvas>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card card-carousel overflow-hidden h-100 p-0">
                        <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                            <div class="carousel-inner border-radius-lg h-100">
                                <div class="carousel-item h-100 active"
                                    style="background-image: url('../assets/img/carousel-1.jpg'); background-size: cover;">
                                    <canvas id="proChart" style="width:100%;max-width:600px;height:100%"></canvas>
                                </div>
                                <div class="carousel-item h-100"
                                    style="background-image: url('../assets/img/carousel-1.jpg'); background-size: cover;">
                                    <canvas id="catChart" style="width:600px;max-width:600px;height:533px"></canvas>
                                </div>
                            </div>
                            <button class="carousel-control-prev w-5 me-3" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next w-5 me-3" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-7 mb-lg-0 mb-4">
                    <div class="card ">
                        <div class="card-header pb-0 p-3" style="padding: 0">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-2">Sales by Client</h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center ">
                                <tbody>
                                    <input type="hidden" value="{{$id = 0}}">
                                    @foreach ($jname_clients as $jname)

                                    <tr>
                                        <td class="w-30">
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div>
                                                    <b>{{$id + 1}}</b>
                                                </div>
                                                <div class="ms-4">
                                                    <p class="text-xs font-weight-bold mb-0">Name:</p>
                                                    <h6 class="text-sm mb-0">{{$jname}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                                <h6 class="text-sm mb-0">{{$clients[$id]->count}}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Value:</p>
                                                <h6 class="text-sm mb-0">${{number_format( (float) $jtotal_clients[$id], 2, '.', ',')}}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                    <input type="hidden" value="{{$id += 1}}">

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Staff</h6>
                            </div>
                        </div>
                        <div class="card-body p-3" style="padding: 0 !important">
                            <table class="table align-items-center ">
                                <tbody>
                                    @foreach ($staff as $staf)
                                    <input type="hidden"
                                        name=" {{ $infor = DB::table('users')->where('id', $staf->user_id)->get() }}">
                                    <tr>
                                        <td class="w-30">
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div>
                                                    <b>US{{$staf->user_id}}</b>
                                                </div>
                                                <div class="ms-4">
                                                    <p class="text-xs font-weight-bold mb-0">Name:</p>
                                                   <h6 class="text-sm mb-0">{{$infor[0]->user_name}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Sales:</p>
                                                <h6 class="text-sm mb-0">{{$staf->count}}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Role:</p>
                                                <h6 class="text-sm mb-0">{{$infor[0]->role}}</h6>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer pt-3 ">
                <div class="container-fluid" >
                    <div class="row align-items-center justify-content-lg-between">
                        <div style="float:right">
                            <div class="copyright text-center text-sm text-muted text-lg-start" style="float:right">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Semi T1</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script>
        const xValues = [];
        var totalValue = {{$jtotal_5_days}};
        var importValue = {{$jimport_5_days}};
        var exportValue = {{$jexport_5_days}};
for (let i = 0; i <= 4; i++) {
  let date = new Date();
  date.setDate(date.getDate() - i);
  let formattedDate = date.toLocaleDateString(undefined, { month: 'long', day: 'numeric' });
  xValues.unshift(formattedDate);
}




new Chart("saleChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      data: totalValue,
      borderColor: "red",
      fill: false
    }, {
      data: exportValue,
      borderColor: "green",
      fill: false
    }, {
      data: importValue,
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});


var proxValues = {!! $jpro_name !!};
var proyValues = {{$jpro_quantity}};
var probarColors = [
    "#e8c3b9",
  "forestgreen",
  "#555",
  "brown",
  "#2b5797"
];

new Chart("proChart", {
  type: "pie",
  data: {
    labels: proxValues,
    datasets: [{
      backgroundColor: probarColors,
      data: proyValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Top 5 items in stock the most"
    }
  }
});


var catxValues = {!! $jtotal_product_name !!};
var catyValues = {{$jtotal_product_quantity}};
var catbarColors = [
"goldenrod",
  "#00aba9",
  "crimson",
  "#e8c3b9",
  "forestgreen"
];

new Chart("catChart", {
  type: "pie",
  data: {
    labels: catxValues.reverse(),
    datasets: [{
      backgroundColor: catbarColors,
      data: catyValues.reverse()
    }]
  },
  options: {
    title: {
      display: true,
      text: "Top 5 most traded items"
    }
  }
});
        </script>
@endsection

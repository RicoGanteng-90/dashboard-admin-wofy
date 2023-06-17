@extends('main-layout.layout')

@section('title', 'Home')

@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

        <!-- Count columns -->
          <div class="row">



            <!-- Traffic columns -->
        <div class="col-lg-12">

            <!-- Website Traffic -->
            <div class="card">
              <div class="card-body pb-0">
                <h5 class="card-title">Website Traffic </h5>

                <div id="trafficChart" style="min-height: 472px;" class="echart"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    echarts.init(document.querySelector("#trafficChart")).setOption({
                      tooltip: {
                        trigger: 'item'
                      },
                      legend: {
                        top: '5%',
                        left: 'center'
                      },
                      series: [{
                        name: 'Access From',
                        type: 'pie',
                        radius: ['40%', '70%'],
                        avoidLabelOverlap: false,
                        label: {
                          show: false,
                          position: 'center'
                        },
                        emphasis: {
                          label: {
                            show: true,
                            fontSize: '18',
                            fontWeight: 'bold'
                          }
                        },
                        labelLine: {
                          show: false
                        },
                        data: [{
                            value: {{$cat1count}},
                            name: 'Makeup'
                          },
                          {
                            value: {{$cat2count}},
                            name: 'Paket Wedding'
                          },
                          {
                            value: {{$cat3count}},
                            name: 'Extra Wedding'
                          },
                          {
                            value: {{$cat4count}},
                            name: 'Paket Foto'
                          }
                        ]
                      }]
                    });
                  });
                </script>

              </div>
            </div><!-- End Website Traffic -->


          </div><!-- End Right side columns -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-lg-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Orders</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$orderscount}}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-lg-6">

                <div class="card info-card customers-card">

                  <div class="card-body">
                    <h5 class="card-title">Customers</h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{$customercount}}</h6>

                      </div>
                    </div>

                  </div>
                </div>

              </div>
              <!-- End Customers Card -->

            <!-- Lunas Card -->
            <div class="col-xxl-4 col-lg-6">
                <div class="card info-card revenue-card">

                  <div class="card-body">
                    <h5 class="card-title">Lunas </h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                      </div>
                      <div class="ps-3">
                        <h6>Rp. {{number_format($lunassum,2,',','.')}}</h6>

                      </div>
                    </div>
                  </div>

                </div>
              </div><!-- End Lunas Card -->

            <!-- Belum Lunas Card -->
            <div class="col-xxl-4 col-lg-6">

                <div class="card info-card customers-card">

                  <div class="card-body">
                    <h5 class="card-title">Belum lunas </h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-coin"></i>
                      </div>
                      <div class="ps-3">
                        <h6>Rp. {{number_format($notlunassum,2,',','.')}}</h6>

                      </div>
                    </div>

                  </div>
                </div>

              </div>
              <!-- End Belum Lunas Card -->

              <!-- Belum Lunas Card -->
            <div class="col-xxl-4 col-lg-6">

                <div class="card info-card customers-card">

                  <div class="card-body">
                    <h5 class="card-title">Belum lunas </h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi-person-x"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{$notlunascount}}</h6>

                      </div>
                    </div>

                  </div>
                </div>

              </div>
              <!-- End elum Lunas Card -->

              <!-- Sudah Lunas Card -->
            <div class="col-xxl-4 col-lg-6">

                <div class="card info-card customers-card">

                  <div class="card-body">
                    <h5 class="card-title">Lunas </h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-check-fill"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{$lunascount}}</h6>

                      </div>
                    </div>

                  </div>
                </div>

              </div>
              <!-- End Sudah Lunas Card -->

              <!-- Product Card -->
            <div class="col-xxl-4 col-lg-6">

                <div class="card info-card customers-card">

                  <div class="card-body">
                    <h5 class="card-title">Product </h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-bag-check"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{$productcount}}</h6>

                      </div>
                    </div>

                  </div>
                </div>

              </div>
              <!-- End Product Card -->

              <!-- Employee Card -->
              <div class="col-xxl-4 col-lg-6">

                <div class="card info-card customers-card">

                  <div class="card-body">
                    <h5 class="card-title">Employee </h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-fill-lock"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{$employeecount}}</h6>

                      </div>
                    </div>

                  </div>
                </div>

              </div>
          <!-- End Employee Card -->

          <!-- Admin Card -->
          <div class="col-xxl-4 col-lg-6">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Admin </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-badge"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$admincount}}</h6>

                  </div>
                </div>

              </div>
            </div>

          </div>
      <!-- End Admin Card -->

            <!-- Customer Card -->
            <div class="col-xxl-4 col-lg-6">

                <div class="card info-card customers-card">

                <div class="card-body">
                    <h5 class="card-title">Customer </h5>

                    <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-hearts"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{$customercount}}</h6>

                    </div>
                    </div>

                </div>
                </div>

            </div>
        <!-- End Admin Card -->

            <!-- Partner Card -->
            <div class="col-xxl-4 col-lg-6">

                <div class="card info-card customers-card">

                <div class="card-body">
                    <h5 class="card-title">Partner </h5>

                    <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-fill-add"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{$partnercount}}</h6>

                    </div>
                    </div>

                </div>
                </div>

            </div>
        <!-- End Partner Card -->

            <!-- Partner Card -->
            <div class="col-xxl-4 col-lg-6">

                <div class="card info-card customers-card">

                <div class="card-body">
                    <h5 class="card-title">Message </h5>

                    <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-chat-left-text"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{$messagecount}}</h6>

                    </div>
                    </div>

                </div>
                </div>

            </div>
        <!-- End Partner Card -->

          </div>

    </section>

  </main><!-- End #main -->
@endsection

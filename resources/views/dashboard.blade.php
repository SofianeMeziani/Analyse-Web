@extends("general")
                            

@section("content")

<!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 ">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Nombre de pages</h5>
                      <span class="h2 font-weight-bold mb-0">350</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap">Internes : 310</span> <br>
                    <span class="text-nowrap">Externes : 40</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Temps de reponse</h5>
                      <span class="h2 font-weight-bold mb-0">2,35</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="ni ni-sound-wave"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap">Minimum : 1,23 ms</span> <br>
                    <span class="text-nowrap">Maximum : 4,76 ms</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Liens morts</h5>
                      <span class="h2 font-weight-bold mb-0">13</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="ni ni-button-power"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap">Internes : 9</span> <br>
                    <span class="text-nowrap">Externes : 4</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">ressources manquantes</h5>
                      <span class="h2 font-weight-bold mb-0">10</span>
                    </div>
                    <!--div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div-->
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap">Internes : 6</span> <br>
                    <span class="text-nowrap">Externes : 4</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Statistiques</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" >Nom de la page</th>
                    <th scope="col" >Temps de rep</th>
                    <th scope="col" >Lien mort</th>
                    <th scope="col" >Err Ressources</th>
                    <th scope="col" >Err Balises</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=-1; ?>
                  @foreach ($urls as $url_array)
                  <?php $i++; ?>
                    @foreach ($url_array as $url)
                    <tr>
                      <td scope="row">
                        {{$url}}
                      </td>
                      <td>
                        
                      </td>
                      <td>
                        340 niv :<?php echo $i ?>
                      </td>
                      <td>
                        340
                      </td>
                      <td>
                        <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                      </td>
                    </tr>
                    <!--?php $i++; ?-->
                  @endforeach
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
   
	
@endsection

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
                      <span class="h2 font-weight-bold mb-0"><?php echo ($internal_links + $external_links); ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap">Internes : <?php echo $internal_links; ?></span> <br>
                    <span class="text-nowrap">Externes : <?php echo $external_links; ?></span>
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
                      <span class="h2 font-weight-bold mb-0"><?php echo round((array_sum($load_time)/count($load_time)), 2); ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="ni ni-sound-wave"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap">Minimum : <?php echo round(min($load_time), 2); ?> ms</span> <br>
                    <span class="text-nowrap">Maximum : <?php echo round (max($load_time), 2); ?> ms</span>
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
                      <span class="h2 font-weight-bold mb-0"><?php echo $nb_broken; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="ni ni-button-power"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap">Erreur 404 : <?php echo $nb_broken404; ?></span> <br>
                    <span class="text-nowrap">Autres : <?php echo $nb_broken-$nb_broken404; ?></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Images Rssourse</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo count($r_manquante_arr); ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-nowrap">Existantes : <?php  echo (count($r_manquante_arr) - $nb_r_broken); ?></span> <br>
                    <span class="text-nowrap">Manquantes : <?php echo $nb_r_broken; ?></span>
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
                  <a href="#" class="btn btn-sm btn-primary load_more">Voir plus</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" style="text-align: center;">Nom de la page</th>
                    <th scope="col" style="text-align: center;">Reponse (ms)</th>
                    <th scope="col" style="text-align: center;">Niveau</th>
                    <th scope="col" style="text-align: center;">Status</th>
                    <th scope="col" style="text-align: center;">Syntaxe</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=-1; $j=1?>
                  @foreach ($urls as $url_array)
                    <?php $i++; ?>
                    @foreach ($url_array as $url)
                      <tr>
                        <td scope="row">
                          {{$j}} - <a href= <?php
                          echo $url;
                          if (strlen($url) > 40)
                            $url = substr($url, 0, 40)."....";

                            ?> target="_blank">{{$url}}</a>
                        </td>
                        <td style="text-align: center; font-size: 16px">
                          <?php $loadT = $load_time[$j - 1]; 
                                if ($loadT < $tmoyen - 20) {
                                  ?> <span class="badge badge-success"><?php echo $loadT ?></span> <?php
                                  } else if ($loadT > $tmoyen + 20) {
                                    ?> <span class="badge badge-danger"><?php echo $loadT ?></span> <?php
                                  } else {
                                    ?> <span class="badge badge-warning"><?php echo $loadT ?></span> <?php
                                  }
                          ?>
                        </td>
                        <td style="text-align: center;">
                          <?php echo $i ?>
                        </td>
                        <td style="text-align: center;">
                          <?php $status = $broken_link[$j-1];
                          if (strcmp($status, "Valide") === 0) {

                            ?> <span class="badge badge-success"><?php echo $status;
                           ?></span> <?php 
                         } else if ((strcmp($status, "Redirection") === 0)){
                          ?> <span class="badge badge-warning"><?php echo $status;
                           ?></span> <?php }
                            else {
                           ?> <span class="badge badge-danger"><?php echo $status;
                           ?></span> <?php } ?>
              
                        </td>
                        <td style="text-align: center;">
                          <?php if ($analyse_synt == 0) {echo "Non demandé";} else {?>
                          <?php if (strcmp(($syntaxe_errors[$j - 1])[0], "CORRECT") == 0){ ?> <span class="badge badge-success"><?php echo "Correcte";
                           ?></span> <?php } else { ?> <span class="badge badge-danger"><?php echo "Fausse"; ?></span> <?php }} ?>
                        </td>
                      </tr>
                      <?php $j++; ?>
                    @endforeach
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <br>
          <div class="col text-right">
            <a href="#" class="btn btn-sm btn-primary load_more">Voir plus</a>
            <a href="#" class="btn btn-sm btn-primary go_up">Retour en haut</a>
          </div>
          <?php if (count($syntaxe_errors) > 0){ ?>
          <?php if(strcmp($syntaxe_errors[0][0], "CORRECT") !== 0 && $syntaxe_errors[0][1] !== 0 && $analyse_synt == 1){ ?>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Erreur de syntaxe </label>
            <?php chdir(substr(getcwd(), 0,strpos(getcwd(), 'AnalyseWeb'))."AnalyseWeb/app/Http/Controllers/AnalyseWebCompilation");
                $myFile = "tags.txt";
                $lines = file($myFile);
                $num_ligne = $syntaxe_errors[0][1]; ?>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" readonly><?php 
                if ($num_ligne > 1){
                  echo ($num_ligne-2)." |   ".$lines[$num_ligne-2-1];
                  echo ($num_ligne-1)." |   ".$lines[$num_ligne-1-1];
                } else if ($num_ligne > 0) {
                  echo ($num_ligne-1)." |   ".$lines[$num_ligne-1-1];
                }
                echo ($num_ligne)." |   ".$lines[$num_ligne-1];
                if(count($lines) >= $num_ligne+1)
                echo ($num_ligne+1)." |   ".$lines[$num_ligne+1-1]; 
               if(count($lines) >= $num_ligne+2)
                echo ($num_ligne+2)." |   ".$lines[$num_ligne+2-1]; 
               ?>La balise <<?php echo $syntaxe_errors[0][0]; ?>> n'est pas fermee correctement (ligne <?php echo $num_ligne ?>).</textarea>
          </div>

          <br>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Correction </label>
            <?php chdir(substr(getcwd(), 0,strpos(getcwd(), 'AnalyseWeb'))."AnalyseWeb/app/Http/Controllers/AnalyseWebCompilation");
                $myFile = "tags.txt";
                $lines = file($myFile);
                $num_ligne = $syntaxe_errors[0][2]; ?>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" readonly><?php 
                if ($num_ligne > 1){
                  echo ($num_ligne-2)." |   ".$lines[$num_ligne-2-1];
                  echo ($num_ligne-1)." |   ".$lines[$num_ligne-1-1];
                } else if ($num_ligne > 0) {
                  echo ($num_ligne-1)." |   ".$lines[$num_ligne-1-1];
                }
                echo ($num_ligne)." |   ".$lines[$num_ligne-1];
                if(count($lines) >= $num_ligne+1)
                echo ($num_ligne+1)." |   ".$lines[$num_ligne+1-1]; 
              if(count($lines) >= $num_ligne+2)
                echo ($num_ligne+2)." |   ".$lines[$num_ligne+2-1]; 
               ?>La balise <<?php echo $syntaxe_errors[0][0]; ?>> devrait etre fermee a la ligne (ligne <?php echo $num_ligne ?>).</textarea>
          </div>
        <?php } }?>

        </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script type="text/javascript">
        $('table tr:lt(11)').addClass('active');

        $('a.load_more').on('click', function(e) {
          e.preventDefault();  
          var $rows = $('table tr');
          var lastActiveIndex = $rows.filter('.active:last').index();
          $rows.filter(':lt(' + (lastActiveIndex + 12) + ')').addClass('active');
        });

        $('.load_more').click(function () {
          $('html, body').animate({
              scrollTop:$(document).height()
          }, 'slow');
          return false;
        });

        $('.go_up').click(function () {
          $('html, body').animate({
              scrollTop:0
          }, 'slow');
          return false;
        });
      </script>

      <style type="text/css">
        table a {color: #525f7f}
        table tr { display: none; }
        table tr.active { display: table-row; }
      </style>

@endsection

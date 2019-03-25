@extends("general")
                            
@section("content")
<!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 ">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
	          <div class="row" style="margin-top: -100px">
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
	                        <i class="fas fa-link"></i>
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
	                        <i class="fas fa-clock"></i>
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
	                        <i class="fas fa-cut"></i>
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
	                        <i class="fas fa-images"></i>
	                      </div>
	                    </div>
	                  </div>
	                  <p class="mt-3 mb-0 text-muted text-sm">
	                    <span class="text-nowrap">Valide(s) : <?php  echo (count($r_manquante_arr) - $nb_r_broken); ?></span> <br>
	                    <span class="text-nowrap">Invalide(s) : <?php echo $nb_r_broken; ?></span>
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
      <div >
        <form action="" id="pdf_form" method="POST" target="_blank"> 
          @csrf
          <div class="media-body ml-2 d-none d-lg-block">
            <input id="hid" type="hidden" name="name" value=""> 
            <button onclick="pdf('{{$id}}')" name="{{$id}}" type="button" class="btn btn-danger btn-md" >Générer le rapport en PDF&nbsp;
              <i class="fas fa-file-pdf"></i></button>

              <button onclick="mail()" type="button" class="btn btn-secondary btn-md" >Recevoir le rapport par mail&nbsp;
              <i class="fas fa-envelope"></i></button>
          </div>
        </form>
      </div> 
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">


          <?php if (count($r_links) > 0 && $op_images == 1) { ?>
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Images</h3>
                </div>

              </div>
            </div>   
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush" id="table_images">
                <thead class="thead-light">
                  <tr class="tr_img">
                    <th scope="col" style="text-align: center;">Lien de l'image</th>
                    <th scope="col" style="text-align: center;">Apercu</th>
                    <th scope="col" style="text-align: center;">Status</th>
                  </tr>
                </thead>
                <tbody>
                 
                  @foreach ($r_links as $key => $value)
                   
                      <tr class="tr_img">
                        <td scope="row">
                          <?php echo ($key + 1); ?> - <a href= <?php
                          echo $value;
                          $value_reduced = $value;
                          if (strlen($value) > 60)
                            $value_reduced = substr($value, 0, 60)."....";

                            ?> target="_blank">{{$value_reduced}}</a>
                        </td>
                        <td style="text-align: center;">
                          <a target="_blank" href=<?php echo "\"".$value."\""; ?>><img style="height: 20px; width: auto;" src=<?php echo "\"".$value."\""; ?>></a>
                        </td>

                        <td style="text-align: center;">
                          <?php $status_img = $r_manquante_arr[$key];
                          if (strcmp($r_manquante_arr[$key], "Valide") === 0) {

                            ?> <span class="badge badge-success"><?php echo "Valide";
                           ?></span> <?php 
                         } 
                            else {
                           ?> <span class="badge badge-danger"><?php echo "Invalide";
                           ?></span> <?php } ?>
              
                        </td>

                      </tr>
                    
                  @endforeach
                </tbody>
              </table>
            </div>
          </div> <br>
          <div class="col text-right">
            <a id="load_more_img" href="#" class="btn btn-sm btn-primary load_more_img">Voir plus</a>
            <a href="#" class="btn btn-sm btn-primary go_up">Retour en haut</a>
          </div>
          <br>
          <?php } ?>



          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Statistiques</h3>
                </div>
              </div>
            </div>   
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush" id="table_stats">
                <thead class="thead-light">
                  <tr class="tr_stat">
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
                      <tr class="tr_stat">
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
            <a id="load_more_stat" href="#" class="btn btn-sm btn-primary load_more">Voir plus</a>
            <a id="load_all_stat" href="#" class="btn btn-sm btn-primary load_all">Voir tout</a>
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
        $('tr.tr_stat:lt(6)').addClass('active');
        $('tr.tr_img:lt(4)').addClass('active');

        $('a.load_more').on('click', function(e) {
          e.preventDefault();  
          //var $rows = $('table tr');
          var $rows = $('tr.tr_stat');
          var lastActiveIndex = $rows.filter('.active:last').index();
          $rows.filter(':lt(' + (lastActiveIndex + 7) + ')').addClass('active');
        });

        $('a.load_all').on('click', function(e) {
          e.preventDefault();  
          //var $rows = $('table tr');
          var $rows = $('tr.tr_stat');
          var lastActiveIndex = $rows.filter('.active:last').index();
          $rows.filter(':lt(' + (lastActiveIndex + 10000) + ')').addClass('active');
        });

        $('a.load_more_img').on('click', function(e) {
          e.preventDefault();  
          //var $rows = $('table tr');
          var $rows = $('tr.tr_img');
          var lastActiveIndex = $rows.filter('.active:last').index();
          $rows.filter(':lt(' + (lastActiveIndex + 5) + ')').addClass('active');
        });

        $('.load_more').click(function () {
          document.getElementById('load_more_stat').scrollIntoView({
            behavior: 'smooth'
          });
          return false;
        });

        $('.load_all').click(function () {
          document.getElementById('load_all_stat').scrollIntoView({
            behavior: 'smooth'
          });
          return false;
        });

        $('.load_more_img').click(function () {
          document.getElementById('load_more_img').scrollIntoView({
            behavior: 'smooth'
          });
          return false;
        });

        $('.go_up').click(function () {
          $('html, body').animate({
              scrollTop:0
          }, 'slow');
          return false;
        });

        function pdf(name) {
          document.getElementById("hid").value=name;
          form = document.getElementById("pdf_form");
          form.action = "/pdf";
          form.submit();
        }

        function mail() {
          form = document.getElementById("pdf_form");
          target=""
          form.action = "/send-mail";
          form.submit();
        }

        @if (isset($message) && $message == "sent")
          swal.fire("Merci", "Votre message a bien été envoyée", "success");
        @endif

      </script>

      <style type="text/css">
        table a {color: #525f7f}
        table tr { display: none; }
        table tr.active { display: table-row; }
      </style>

      <style type="text/css">
        .header {
          background-image: url("https://i.pinimg.com/originals/cc/d4/09/ccd409e4173f80a4f39f69aa29a5e150.gif") !important;
          background-size: 60% !important;
          background-repeat: no-repeat !important;
          background-color: #ABE6DA !important;
         /* background-image: url("https://nsec-dz.com/images/proactif.gif") !important;*/
         /* box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22) !important;*/
        }
        .card, textarea {
          box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24) !important;
          transition: all 0.3s cubic-bezier(.25,.8,.25,1) !important;
        }

        .card:hover, textarea:hover {
          box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22) !important;
        }
      </style>

@endsection

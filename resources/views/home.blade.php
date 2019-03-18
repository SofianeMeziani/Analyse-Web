@extends("general")
                            

@section("content")
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center"> 
              <div class="col-12">
                <h3 class="mb-0">Analyseur de sites</h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="" id="url_form" method="POST"> 
              @csrf
              <div class="row">
                <div class="col-lg-10">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-12">
                        <input type="text" id="url" name="url" class="form-control form-control-alternative" value="" placeholder="Entrer le lien du site à analyser">
                      </div>
                    </div>
                  </div>  
                </div>
                <div class="col-lg-2">
                  <button onclick="checkURL();" type="button" class="btn btn-primary btn-md" >Analyser</button>
                  <button id="show_loading_modal" style="display: none" 
                      data-toggle="modal" 
                      data-target="#modal-form-analyse"
                      data-backdrop="static" 
                      data-keyboard="false">
                  </button>
                </div>                    
              </div>

              <div class="col-md-12">
              </div>

              <div class="form-row col-md-10">
                <div class="form-group col-md-4">
                  <label for="inputCity">Temps accepté</label>
                  <input type="number" name="TempsRep" class="form-control form-control-sm" id="inputCity" value="200" min="0">
                </div> 
                <div class="form-group col-md-4">
                  <label for="inputState">Profondeur</label>
                  <select id="inputState" name="Profondeur" class="form-control form-control-sm">
                    <option value="0">0</option>
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputExternLinks">Liens externes</label>
                  <select id="inputExternLinks" name="liensx" class="form-control form-control-sm">
                    <option value="0">Non</option>
                    <option value="1" selected="">Oui</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputExternLinks">Analyse syntaxique</label>
                  <select id="inputExternLinks" name="analyse_synt" class="form-control form-control-sm">
                    <option value="0" selected>Non</option>
                    <option value="1">Oui</option>
                  </select>
                </div>
                
                
                <div class="form-group col-md-4">
                  <label for="inputExternLinks">Analyse d'images</label>
                  <select id="inputExternLinks" name="op_images" class="form-control form-control-sm">
                    <option value="0">Non</option>
                    <option value="1" selected="">Oui</option>
                  </select>
                </div>

              </div>
            </form>   
          </div>


          <div class="pl-lg-4">
            <div id="vv" class="row col-lg-10 container">

              <button class="btn btn-icon btn-2 btn-success" type="button" data-toggle="modal" data-target="#modal-form-add">
                <span class="btn-inner--text">Ajouter</span>
                <span class="btn-inner--icon"><i class="ni ni-favourite-28"></i></span>
              </button>
              <button class="btn btn-icon btn-2 btn-danger" type="button" data-toggle="modal" data-target="#modal-form-delete">
                <span class="btn-inner--text">Retirer</span>
                <span class="btn-inner--icon"><i class="ni ni-favourite-28"></i></span>
              </button>


              <div class="modal fade" id="modal-form-add" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                 <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                       <div class="modal-body p-0">
                          <div class="card bg-secondary shadow border-0">
                             <div class="card-body px-lg-5 py-lg-5">
                              <div class="text-center text-muted mb-4">
                                  <small>Ajoutez le lien et le titre !</small>
                              </div>
                                <form  id="fav_form" action="" method="POST">
                                  @csrf
                                   <div class="form-group mb-3">
                                      <div class="input-group input-group-alternative">
                                         <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-laptop"></i></span>
                                         </div>
                                         <input name="link" class="form-control" placeholder="Le lien" type="text" required>
                                      </div>
                                   </div>
                                   <div class="form-group">
                                      <div class="input-group input-group-alternative">
                                         <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-notification-70"></i></span>
                                         </div>
                                         <input name="name" class="form-control" placeholder="Nom du site" type="text" required>
                                      </div>
                                   </div>
                                   <div class="text-center">
                                      <button onclick="addButton()" class="btn btn-icon btn-2 btn-success" type="button" data-toggle="modal" data-target="#modal-form">
                                        <span class="btn-inner--text">Ajouter</span>
                                        <span class="btn-inner--icon"><i class="ni ni-favourite-28"></i></span>
                                      </button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                   </div>
                                </form>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>

              <div class="modal fade" id="modal-form-delete" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                  <div class="modal-content">
                   <div class="modal-body p-0">
                      <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                          <div class="text-center text-muted mb-4">
                            <small>Cliquez sur les favoris a supprimer !</small>
                          </div>
                          <form id="del_fav_form" action="" method="POST">
                            @csrf
                            <input id="del" type="hidden" name="name" value="17">
                            <div id="v0"></div>
                            <div id="v1"><br></div>
                            <div id="v2"><br></div>
                            <div id="v3"><br></div>
                            <div id="v4"><br></div>
                            <br><br>
                            <div>
                              <button type="button" class="btn btn-secondary col-md-12" data-dismiss="modal">Fermer</button>
                            </div>

                          </form>
                        </div>
                      </div>
                   </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="modal-form-analyse" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                  <div class="modal-content">
                   <div class="modal-body p-0">
                      <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                          <div class="col-md-6" style="margin: 0 auto">
                            <img id="loading" style="height: 100px; width: 100px;" src="./assets/img/loading.gif">
                          </div>
                          <div class="col-md-12">
                            <p id="loading_p" style="text-align: center">
                              Analyse du site en cours...
                            </p>
                          </div>
                          <div class="col-md-12">
                            <button onclick="stopAnalyse()" type="button" class="btn btn-secondary col-md-12" data-dismiss="modal">Arrêter l'analyse</button>
                          </div>
                        </div>
                      </div>
                   </div>
                  </div>
                </div>
              </div>



            </div>

            <br>
          </div> 
        </div>
      </div>
    </div>
  </div>
    

  <script type="text/javascript">



    var fav = <?php echo json_encode($fav); ?>;
    function getClickCallback(i) {
      return function() {
      document.getElementById("url").value = fav[i]['link'];
      };
    }
    function getClickCallback2(i) {
      return function() {
      document.getElementById("del").value = this.name;
      delButton();
      };
    }

    for (var i = 0; i < fav.length; i++) {
      var name  = fav[i]['name'];
      var links = fav[i]['link'];
      var btn = document.createElement("BUTTON");
      var t = document.createTextNode(name);
      btn.appendChild(t);
      btn.className="btn btn-default";
      btn.id=name;
      document.getElementById("vv").appendChild(btn);
      document.getElementById(name).onclick = getClickCallback(i);
    }

    for (var i = 0; i < fav.length; i++) {
      var name  = fav[i]['name'];
      var links = fav[i]['link'];
      var id = fav[i]['id'];
      var btn1 = document.createElement("BUTTON");
      var t = document.createTextNode(name);
      btn1.appendChild(t);
      btn1.className="btn btn-danger col-md-12";
      btn1.name=id;
      document.getElementById("v"+i).appendChild(btn1);
      document.getElementsByName(id)[0].onclick = getClickCallback2(i);
    }

    function checkURL() {
      var expression = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
      var regex = new RegExp(expression);
      var t = document.getElementById("url").value;

      if (t.match(regex)) {
        document.getElementById('show_loading_modal').click();
        form = document.getElementById("url_form");
        form.action = "/dashboard";
        form.submit();
      } else {
          swal("","Veuillez entrer un lien valide", "error")
        }
    }

    function stopAnalyse() {
      window.stop();
    }

    function addButton() {
      form1 = document.getElementById("fav_form");
      form1.action = "/create";
      form1.submit();
    }

    function delButton() {
      form2 = document.getElementById("del_fav_form");
      form2.action = "/del";
      form2.submit();
    }


  </script>

<style type="text/css">
        .navbar-vertical {
          background-image: url("https://cdn.hipwallpaper.com/i/93/63/Fx2mvz.png") !important;
          box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23) !important;
          background-position: bottom !important;
          background-repeat: no-repeat;
        }
        .header {
          background-image: url("https://i.gifer.com/J4o.gif") !important;
         /* background-image: url("http://gifette.g.i.pic.centerblog.net/d683f6cd.gif") !important;
          */
          box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22) !important;
        }
        .card {
          box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24) !important;
          transition: all 0.3s cubic-bezier(.25,.8,.25,1) !important;
        }

        .card:hover {
          box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22) !important;
        }

        
      </style>
@endsection


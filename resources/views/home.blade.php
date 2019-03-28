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


          <div class="pl-lg-4" style="margin-top: -25px">
            <div id="vv" class="row col-lg-10 container">

               <div class="col-12" style="margin-bottom: 15px">
                <h3 class="mb-0">Sites Web favoris</h3>
              </div>
             

              <button class="btn btn-icon btn-2 btn-success" type="button" data-toggle="modal" data-target="#modal-form-add">
                <span class="btn-inner--text">Ajouter</span>
                <span class="btn-inner--icon"><i class="fas fa-star"></i></i></span>
              </button>
              <button class="btn btn-icon btn-2 btn-danger" type="button" data-toggle="modal" data-target="#modal-form-delete">
                <span class="btn-inner--text">Retirer</span>
                <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
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
                            <input id="del" type="hidden" name="name" value="">
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
                            <button id="bb" onclick="stopAnalyse();" type="button" class="btn btn-secondary col-md-12" data-dismiss="modal">Arrêter l'analyse</button>
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

    $(function(){
      foo(fav);
    });

    @if (Session::has("message") && Session::get("message")=="sent")
      swal.fire("Merci", "Votre message a bien été envoyée", "success");
    @endif

  </script>

  

@endsection


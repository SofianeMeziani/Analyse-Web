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

                <div class="pl-lg-4">

                  <div class="row col-lg-10 container">
                    <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="http://www.dealabs.com">Dealabs</button>
                    <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="http://www.univ-rouen.fr">Univ-Rouen</button>
                    <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="http://www.youtube.com">YouTube</button>
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
                                  <form role="form">
                                     <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                           <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-laptop"></i></span>
                                           </div>
                                           <input class="form-control" placeholder="Le lien" type="text">
                                        </div>
                                     </div>
                                     <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                           <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-notification-70"></i></span>
                                           </div>
                                           <input class="form-control" placeholder="Nom du site" type="text">
                                        </div>
                                     </div>
                                     <div class="text-center">
                                        <button class="btn btn-icon btn-2 btn-success" type="button" data-toggle="modal" data-target="#modal-form">
                                          <span class="btn-inner--text">Ajouter</span>
                                          <span class="btn-inner--icon"><i class="ni ni-favourite-28"></i></span>
                                        </button>
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
                                    <small>Cliquez sur les favoris a supprimer!</small>
                                </div>
                                  <form role="form">
                                     <div class="">
                                        <button type="button" class="btn btn-danger col-md-12">
                                          Dealabs
                                        </button>
                                        <br><br>                                       
                                        <button type="button" class="btn btn-danger col-md-12">
                                          Univ-Rouen 
                                        </button>
                                        <br><br>                                       
                                        <button type="button" class="btn btn-danger col-md-12">
                                          YouTube 
                                        </button>
                                     </div>

                                  </form>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>



                  </div>

                  <br>
                  
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
                      <button onclick="checkURL();" type="button" class="btn btn-primary btn-md">Analyser</button>
                    </div>                    
                  </div>

                <div class="form-row col-md-10">
                  <div class="form-group col-md-4">
                    <label for="inputExternLinks">Liens externes</label>
                    <select id="inputExternLinks" name="liensx" class="form-control form-control-sm">
                      <option value="0" selected>Non</option>
                      <option value="1">Oui</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputState">Profondeur</label>
                    <select id="inputState" name="Profondeur" class="form-control form-control-sm">
                      <option value="1" selected>1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputCity">Temps de rep moyen</label>
                    <input type="number" name="TempsRep" class="form-control form-control-sm" id="inputCity" value="1">
                  </div>   
                </div>

                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    

    <script type="text/javascript">
      function checkURL() {
        var expression = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
      var regex = new RegExp(expression);
      var t = document.getElementById("url").value;

      if (t.match(regex)) {
        form = document.getElementById("url_form");
        form.action = "/dashboard";
        form.submit();
      } else {
        swal("","Veuillez entrer un lien valide", "error")
      }
      }
    </script>
@endsection
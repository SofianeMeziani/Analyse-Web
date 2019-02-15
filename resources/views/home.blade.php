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
                      <button onclick="checkURL();" type="button" class="btn btn-primary btn-lg">Analyser</button>
                    </div>                    
                  </div>

                  <br>

                  <div class="container row">
                    <div class="custom-control custom-checkbox col-sm">
                      <input class="custom-control-input" name="liensx" id="customCheck2" type="checkbox" checked>
                            <label class="custom-control-label" for="customCheck2">Liens externes</label>
                    </div>
                    <div class="col-sm">
                      <label  for="customCheck2">Profondeur</label>
                            <input class="custom-control-label" name="Profondeur" id="customCheck2" type="number" min="1" max="10" value="1">
                    </div>
                    <div class="col-sm">
                      <label  for="customCheck2">Temps de rep moyen</label>
                            <input class="custom-control-label" name="TempsRep" id="customCheck34" type="number" min="1" max="10" value="1">
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
        form.action = "/analyse";
        form.submit();
      } else {
        swal("","Veuillez entrer un lien valide", "error")
      }
      }
    </script>
@endsection
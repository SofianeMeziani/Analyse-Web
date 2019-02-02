@extends("general")

@section("content")

  <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center"> 
                <div class="col-8">
                  <h3 class="mb-0">Mon compte</h3>
                </div>
                <div class="col-4 text-right">
                  <button onclick="updatePersonalInfo(); return false;" class="btn btn-sm btn-primary">Enregistrer</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="" id="personalinfo_form" method="POST"> 
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <h6 class="heading-small text-muted mb-4">Informations de l'utilisateur</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nom</label>
                        <input type="text" id="name" name="name" class="form-control form-control-alternative" value="{{$user->name}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="email">Adresse email</label>
                        <input disabled="true" type="mail" id="email" class="form-control form-control-alternative"  value="{{$user->email}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="password_old">Mot de passe actuel</label>
                        <input type="password" name="current" id="password_old" class="form-control form-control-alternative" placeholder="Mot de passe actuel" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="password_1">Nouveau mot de passe</label>
                        <input type="password" name="password" id="password_1" class="form-control form-control-alternative" placeholder="Nouveau mot de passe" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="ipassword_2">Confirmation du mot de passe</label>
                        <input type="password" id="password_2" class="form-control form-control-alternative" placeholder="Confirmation du mot de passe">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    

    <script type="text/javascript">
      function validatePassword() {
        var pass = document.getElementById("password_1");
        var confirm = document.getElementById("password_2");
        if (pass.value==""){
          return 2;
        } else {
          if (pass.value != confirm.value) {
            pass.style.border = "1px solid red";
            confirm.style.border = "1px solid red";
            return 1;
          } else if (pass.value.length < 6){
            return 0;
          }}
        }

      function validatePersonalInfo() {
        errors = 0;
        var name = document.getElementById("name");
        if (name.value == "") {
          fname.style.border = "1px solid red";
          errors = 1;
        }
        return errors;
      }


      function updatePersonalInfo()
      {
        var errors = validatePersonalInfo();
        var errors_2 = validatePassword();
        var pass_old = document.getElementById('password_old'); 
        if (errors_2 == 2) {
          if (errors == 1) {
            swal("","Merci de remplir tous les champs obligatoirs !", "warning");
          } else {
            var form = document.getElementById("personalinfo_form");
            form.action = "/update-personal-info";
            form.submit();
          }
        } else if (errors_2 == 0) {
            swal("","Veuillez entrer un mot de passe >= 6", "error");
        } else {
            if (pass_old.value==""){
              swal("","Veuillez entrer votre mot de passe actuel correct", "error");
            } else if (errors_2 == 1) {
                swal("","Votre mot de passe de confirmation n'est pas correct !", "error");
                } else {
                    var form = document.getElementById("personalinfo_form");
                    form.action = "/update-password";
                    form.submit();
                }
        }
        
      }

      @if (Session::has("message") && Session::get("message")=="updated")
              swal("", "Votre mot de passe a bien été mis à jour.", "success");
      @elseif (Session::has("message") && Session::get("message")=="notupdated")
              swal("", "Votre mot de passe actuelle est incorrect !", "error");
      @elseif (Session::has("message") && Session::get("message")=="infoupdated")
              swal("", "Vos informations personnelles ont bien été à jour", "success");
      @endif
    </script>
    
@endsection
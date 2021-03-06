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
    </div>

    <script type="text/javascript">
      @if (Session::has("message") && Session::get("message")=="updated")
              swal.fire("", "Votre mot de passe a bien été mis à jour.", "success");
      @elseif (Session::has("message") && Session::get("message")=="notupdated")
              swal.fire("", "Votre mot de passe actuelle est incorrect !", "error");
      @elseif (Session::has("message") && Session::get("message")=="infoupdated")
              swal.fire("", "Vos informations personnelles ont bien été à jour", "success");
      @endif
    </script>
    
@endsection
@extends("general")
                            

@section("content")

<div class="container-fluid mt--7">
	<div class="row mt-5">
		<div class="col">
			<div class="card bg-default shadow">
			    <div class="card-header bg-transparent border-0">
			      <h3 class="text-white mb-0">Historique d'analyses</h3>
			    </div>
		    	<div class="table-responsive">
					<table class="table align-items-center table-dark table-flush">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Numéro</th>
								<th scope="col">Lien du site Web</th>
								<th scope="col">Profondeur</th>
								<th scope="col">Interne seule</th>
								<th scope="col">Date de l'analyse</th>
								<th scope="col">Consulter / Supprimer</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							@foreach ($histories as $history)
								<tr>
									<th scope="row">
										<div class="media align-items-center">
											<div class="media-body">
												<span class="mb-0 text-sm"><?php echo (count($histories) - $i + 1); $i++; ?></span>
											</div>
										</div>
									</th>
									<td>
										<div class="media align-items-center">
											<div class="media-body">
												<span class="mb-0 text-sm">{{$history["url"]}}</span>
											</div>
										</div>
									</td>
									<td>
										<div class="media align-items-center">
											<div class="media-body">
												<span class="mb-0 text-sm">{{$history["prof"]}}</span>
											</div>
										</div>
									</td>
									<td>
										<div class="media align-items-center">
											<div class="media-body">
												<span class="mb-0 text-sm"><?php if (!$history["tdep"]) echo "Oui" ; else echo "Non";?></span>
											</div>
										</div>
									</td>
									<td>
										<div class="media align-items-center">
											<div class="media-body">
												<span class="mb-0 text-sm">{{$history["created_at"]}}</span>
											</div>
										</div>
									</td>
									<td>
										<div class="media align-items-center">
											<div class="media-body">
												<a target="_blank" href="/history/{{$history['id']}}" class="btn btn-primary btn-sm">Consulter</a>
											</div>
											<div class="media-body">
												<a target="_blank" href="/history/{{$history['id']}}" class="btn btn-danger btn-sm">Supprimer</a>
											</div>
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
	    		</div>
		  	</div>
		</div>
	</div>
</div>

<style type="text/css">
        .navbar-vertical {
          /*background-image: url("http://gifette.g.i.pic.centerblog.net/d683f6cd.gif") !important;*/
          box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23) !important;
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

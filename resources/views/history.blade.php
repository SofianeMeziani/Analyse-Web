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
								<th scope="col">Num</th>
								<th scope="col">Lien du site Web</th>
								<th scope="col">Prof</th>
								<th scope="col">Temps d'analyse</th>
								<th scope="col">Externe</th>
								<th scope="col">Date de l'analyse</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<form action="" id="History_form" method="POST" target=""> 
              				@csrf
              				<input id="hid" type="hidden" name="name" value="">
							<?php $i = 1; ?>
							@foreach ($histories as $history)
								<tr>
									<th scope="row">
										<div class="media align-items-center">
											<div class="media-body">
												<span class="mb-0 text-sm "><?php echo (count($histories) - $i + 1); $i++; ?></span>
											</div>
										</div>
									</th>
									<td>
										<div class="media align-items-center">
											<div class="media-body">
												<?php 
												$value_reduced = $history["url"];
												if (strlen($history["url"]) > 30)
                            					$value_reduced = substr($history["url"], 0, 30)."....";
                           						  ?>
												<span class="mb-0 text-sm">{{$value_reduced}}</span>
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
												<span class="mb-0 text-sm"><?php if (($history["loading_time"]) < 60 ) echo (round($history["loading_time"], 2))." s"; 
																					else echo (round($history["loading_time"]/60, 2))." m"?></span>
											</div>
										</div>
									</td>
									<td>
										<div class="media align-items-center">
											<div class="media-body">
												<span class="mb-0 text-sm"><?php if (!$history["tdep"]) echo "Non" ; else echo "Oui";?></span>
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
												<button onclick="viewHistory(name)" target="_blank" name="{{$history['id']}}" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></button>
											</div>
											<div class="media-body">
												<button onclick="delHistory(name)"  name="{{$history['id']}}" class="btn btn-danger btn-sm" type="button"><i class="far fa-trash-alt"></i></button>
											</div>
										</div>
									</td>
								</tr>
							@endforeach
						</tbody></form>
					</table>
	    		</div>
		  	</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	function viewHistory(name) {
		document.getElementById("hid").value=name;
		form = document.getElementById("History_form");
		form.target = "_blank";
		form.action = "/getHistory";
		form.submit();
    }

	function delHistory(name) {
		document.getElementById("hid").value=name;
		event.preventDefault();
		form = document.getElementById("History_form");
		form.target = "";
		Swal.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {
		    form.action = "/delHistory";
      		form.submit();
		  }
		})			
	}

	@if (Session::has("message") && Session::get("message")=="deleted")
		swal.fire("", "l'enregistrement est supprimé.", "success");
	@endif
</script>

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

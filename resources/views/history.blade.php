@extends("general")
                            

@section("content")

<div class="container-fluid mt--7">
	<div class="row mt-5">
		<div class="col">
			<div class="card bg-default shadow">
			    <div class="card-header bg-transparent border-0">
			      <h3 class="text-white mb-0">Card tables</h3>
			    </div>
		    	<div class="table-responsive">
					<table class="table align-items-center table-dark table-flush">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Analyse Nb</th>
								<th scope="col">Site</th>
								<th scope="col">Date</th>
								<th scope="col">Vue</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($histories as $history)
								<tr>
									<th scope="row">
										<div class="media align-items-center">
											<div class="media-body">
												<span class="mb-0 text-sm">{{$history["id"]}}</span>
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
												<span class="mb-0 text-sm">{{$history["created_at"]}}</span>
											</div>
										</div>
									</td>
									<td>
										<div class="media align-items-center">
											<div class="media-body">
												<a href="/history/{{$history['id']}}" class="btn btn-primary btn-sm">View</a>
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

@endsection

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>All Students</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	</head>
	<body>
		<section style="padding-top: 60px;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								All Students <a href="/add-student" class="btn btn-success">Add New</a>
							</div>
							<div class="card-body">
								@if(Session::has('student_deleted'))
									<div class="alert alert-success" role="alert">
										{{Session::get('student_deleted')}}
									</div>
								@endif
								<table class="table table-stripped">
									<thead>
										<tr>
											<th>Name</th>
											<th>Profile Image</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($students as $student)
											<tr>
												<td>{{$student->name}}</td>
												<td><img src="{{asset('images')}}/{{$student->profileimage}}" style="max-width: 60px;"></td>
												<td>
													<a href="/edit-student/{{$student->id}}" class="btn btn-info">Edit</a>
													<a href="/delete-student/{{$student->id}}" class="btn btn-danger">Delete</a>
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
		</section>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Edit Student</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	</head>
	<body>
		<section style="padding-top: 60px;">
			<div class="container">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="card">
							<div class="card-header">
								Edit Student
							</div>
							<div class="card-body">
								@if(Session::has('student_updated'))
									<div class="alert alert-success" role="alert">
										{{Session::get('student_updated')}}
									</div>
								@endif
								<form method="POST" action="{{route('student.update')}}" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<input type="hidden" name="id" value="{{$student->id}}">
										<label for="name">Name</label>
										<input type="text" name="name" value="{{$student->name}}" class="form-control">
									</div>
									<div class="form-group">
										<label for="file">Choose Profile Image</label>
										<input type="file" name="file" class="form-control" onchange="previewFile(this)">
										<img id="previewImg" alt="profile image" src="{{asset('images')}}/{{$student->profileimage}}" style="max-width: 130px; margin-top: 20px;">
									</div>
									<button type="submit" class="btn btn-primary">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
		<script type="text/javascript">
			function previewFile(input){
				var file=$("input[type=file]").get(0).files[0];
				if(file){
					var reader=new FileReader();
					reader.onload=function(){
						$('#previewFile').attr("src",reader.result);
					}
					reader.readAsDataURL(file);
				}
			}
		</script>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add New Student</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>
	<body>
		<section style="padding-top: 60px;">
			<div class="container">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="card">
							<div class="card-header">
								Add New Student
							</div>
							<div class="card-body">
								@if(Session::has('student_added'))
									<div class="alert alert-success" role="alert">
										{{Session::get('student_added')}}
									</div>
								@endif
								<form method="POST" action="{{route('student.store')}}" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" name="name" class="form-control">
									</div>
									<div class="form-group">
										<label for="file">Choose Profile Image</label>
										<input type="file" name="file" class="form-control" onchange="previewFile(this)">
										<img id="previewImg" alt="profile image" style="max-width: 130px; margin-top: 20px;">
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
		@if(Session::has('student_added'))
			<script type="text/javascript">
				toastr.success("{!! Session::get('student_added') !!}");
			</script>
		@endif
		@if(Session::has('student_added'))
			<script type="text/javascript">
				swal("Great Job!","{!! Session::get('student_added')!!}","success",{
					button:"OK",
				})
			</script>
		@endif
	</body>
</html>
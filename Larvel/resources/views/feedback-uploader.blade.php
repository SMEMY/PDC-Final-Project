@extends('master.master')



<!-- @section('page-title', 'hahahahah') -->
@section('page-title')
hahahaha
@endsection





@section('custom-css')

    body{
        <!-- background: green !important; -->
    }
@endsection


@section('content')
<div class="page-wrapper" style="min-height: 371px;">

			<div class="content container-fluid">





				<div class="row justify-content-center">

					<div class="col-md-10">
						<div class="card">
							<div class="card-header p-lg-5">
								<h4 class="card-title mb-0">Address Form</h4>
							</div>
							<div class="card-body">
								<form action="#">
									<!-- <div class="form-group row mb-0">
										<label class="col-form-label col-lg-2">Two Addons</label>
										<div class="col-lg-12">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Right dropdown">
												<div class="input-group-append">
													<button type="button" class="btn btn-white dropdown-toggle"
														data-toggle="dropdown">Categories</button>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#">Action</a>
														<a class="dropdown-item" href="#">Another action</a>
														<a class="dropdown-item" href="#">Something else here</a>
														<div role="separator" class="dropdown-divider"></div>
														<a class="dropdown-item" href="#">Separated link</a>
													</div>
												</div>
											</div>
										</div>
									</div> -->
                                    <div class="row" id="files">
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="text" class="form-control " id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter email">
                                        </div>
                                        <div class="input-group mb-5 col-md-12">
                                            <select class="custom-select" id="inputGroupSelect02">
                                                <option selected>Choose...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                            </div>
                                        </div>
                                    </div>

									<div class="row mt-3">
										<div class="form-group m-auto ">
											<button type="button" id="file-remover"
												class="btn btn-info mx-auto rounded-circle d-none"
												style="font-size: 20px;" onclick="removeFile()">&times;</button>
											<button type="button" class="btn btn-info mx-auto rounded-circle"
												style="font-size: 20px;;" onclick="addFile()">&plus;</button>
										</div>
									</div>

									<div class="text-right mt-5">
										<button type="submit" class="btn btn-primary w-25"
											onclick="afterText()">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>





			</div>
		</div>
@endsection


@section('cutom-js')
<script>

		var count4 = 2;
		function addFile() {
			var txt1 =
				`<div class="form-group col-md-12 ">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="text" class="form-control " id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter email">
                                        </div>
                                        <div class="input-group mb-5 col-md-12">
                                            <select class="custom-select" id="inputGroupSelect02">
                                                <option selected>Choose...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                            </div>
                                        </div>`;

			$("#files").children().last().after(txt1);
			$('#file-remover').removeClass('d-none');
			count4++;   // Insert new elements after img
		}
		function removeFile() {

			if (count4 != 2) {
				$('#files').children().last().remove();
				$('#files').children().last().remove();
				count4--;
			}
			if (count4 == 2) {
				$('#file-remover').addClass('d-none');

			}

		}
		


	</script>
    @endsection

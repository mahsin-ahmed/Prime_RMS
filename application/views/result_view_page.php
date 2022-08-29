<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ tittle of the browser ---------->
	<title>PU Result Portal</title>
	<!-- shot icon left top corner of browser -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/prime_logo.png">

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css?v=<?php echo time(); ?>">
</head>

<body>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<div class="row welcome_msg marquee">
						<h3>Welcome to PRIME UNIVERSITY Result Portal</h3>
					</div>
					<div class="row">
						<div class="col-md-2">							
						<span class="hm_btn"><a href="https://www.primeuniversity.edu.bd">Home</a></span>
						</div>
						<div class="col-md-9">
							<div class="banner"><img src="../../assets/img/prime_logo.png" alt="No Image"> prime university</div>
						</div>
					</div>
				</div>
				<div class="loading-img">
					<img src="<?php echo base_url(); ?>/assets/img/loading.gif" alt="Please wait">
				</div>

				<div class="row card-body">
					<div class="col-md-3">
						<div>
							<form id="search_student">
								<div class="input-group form-group">
									<input type="text" class="form-control" minlength="12" maxlength="12" id="sid" name="sid" placeholder="Please enter your ID" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
								</div>

								<div class="row">
									<div class="com-md-6">
										<div class="form-group searchr check-button">
											<input type="submit" value="Search" class="btn btn-md">
										</div>
									</div>
									<div class="com-md-6">
										<div class="form-group searcha">
											<input type="button" onclick="reset_sid_result_view()" value="Reset" class="btn btn-md">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-8 result_table" id="result_table">
						<div class="row heading_result">Final Result</div>
						<div class="row">
							<div class="col-md-3"><img class="std_image" src="<?php echo base_url(); ?>/assets/img/prime_logo.png" alt="No image found"></div>
							<div class="col-md-9">
								<table class="">
									<tbody>
										<tr>
											<td class="f_col">ID</td>
											<td class="s_col">:</td>
										</tr>
										<tr>
											<td class="f_col">Name</td>
											<td class="s_col">:</td>
										</tr>
										<tr>
											<td class="f_col">Batch</td>
											<td class="s_col">:</td>
										</tr>
										<tr>
											<td class="f_col">Ending Semester</td>
											<td class="s_col">:</td>
										</tr>
										<tr>
											<td class="f_col">Department</td>
											<td class="s_col">:</td>
										</tr>
										<tr>
											<td class="f_col">Obtained Degree</td>
											<td class="s_col">:</td>
										</tr>
										<tr>
											<td class="f_col">CGPA</td>
											<td class="s_col">:</td>
										</tr>
										<tr>
											<td class="f_col">Published Date</td>
											<td class="s_col">:</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						Permanent Campus: 114/116 Mazar Road, Mirpur-1, Dhaka 1216, Bangladesh.
					</div>
					<div class="d-flex justify-content-center links"><span class="pAddress">(Previous Address: 2A/1, North East of Darussalam Road, Mirpur-1, Dhaka 1216, Bangladesh, since inception in 2002 to 31st January 2017) </span></div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
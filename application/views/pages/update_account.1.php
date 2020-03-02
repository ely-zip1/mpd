<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Update Account</h1>
		</div>
		<h2 class="section-title">Update your withdrawal info</h2>
		<div class="container mt-5">
			<div class="row">
				<div class="col-12 col-sm-8 offset-sm-2 ">
					<div class="login-brand"> </div>
					<div class="card card-primary">
						<div class="card-header">
							<h4>Withdrawal Account</h4>
						</div>
						<div class="card-body">

						<div class="alert alert-success alert-dismissible <?php if(isset($message)){echo 'show';}?> fade">
							<div class="alert-body">
								<button class="close" data-dismiss="alert">
								<span>×</span>
								</button>
								Account updated!
							</div>
						</div>

							<div id="accordion">
								<!-- <div class="accordion shadow-sm">
									<div class="accordion-header collapsed" role="button" data-toggle="collapse"
										data-target="#panel-body-1" aria-expanded="false">
										<h4><span class="fas fa-university"></span> Bank Transfer</h4>
									</div>
									<div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion"
										style="">
										<form action="POST">
											<div class="form-group row">
												<label for="bank_name" class="col-sm-3 col-form-label">Bank Name</label>
												<div class="col-sm-9">
													<input type="text" class="form-control form-control-sm"
														id="bank_name"> </div>
											</div>
											<div class="form-group row">
												<label for="account_name" class="col-sm-3 col-form-label">Account
													Name</label>
												<div class="col-sm-9">
													<input type="text" class="form-control form-control-sm"
														id="account_name"> </div>
											</div>
											<div class="form-group row">
												<label for="account_number" class="col-sm-3 col-form-label">Account
													Number</label>
												<div class="col-sm-9">
													<input type="text" class="form-control form-control-sm"
														id="account_number"> </div>
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-primary btn-sm" tabindex="4">
													Submit </button>
											</div>
										</form>
									</div>
								</div> -->
								<div class="accordion shadow-sm">
									<div class="accordion-header" role="button" data-toggle="collapse"
										data-target="#panel-body-2" aria-expanded="true">
										<h4><span class="fab fa-btc"></span> Bitcoin</h4>
									</div>
									<div class="accordion-body show" id="panel-body-2" data-parent="#accordion">
										<!-- <form action="POST" > -->
										<?php echo form_open('UpdateAccount'); ?>
											<div class="form-group row">
												<label for="btc_address" class="col-sm-3 col-form-label">BTC
													Address</label>
												<div class="col-sm-9">
													<input type="text" class="form-control form-control-sm"
														id="btc_address" name="btc_address" value="<?php if(isset($btc_address)){echo $btc_address;} ?>"> 
													</div>
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-primary btn-sm" tabindex="4">
													Submit </button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="footer"> </div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
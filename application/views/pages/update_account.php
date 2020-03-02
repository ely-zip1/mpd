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
							<h4>Withdrawal Options</h4>
						</div>
						<div class="card-body">
						<?php 
							if($this->session->flashdata('success_message') != null){
									echo '	<div class="alert alert-success">
												'. $this->session->flashdata('success_message') .'
											  </div>';
							}

							if($this->session->flashdata('missing_account') != null){
									echo '	<div class="alert alert-warning">
												'. $this->session->flashdata('missing_account') .'
											  </div>';
							}

							echo validation_errors();
							?>
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active show" id="btc-tab" data-toggle="tab" href="#btc"
										role="tab" aria-controls="btc" aria-selected="true">Coins.ph</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="bank-tab" data-toggle="tab" href="#bank" role="tab"
										aria-controls="bank" aria-selected="false">Bank Account</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="gc-tab" data-toggle="tab" href="#gc" role="tab"
										aria-controls="gc" aria-selected="false">GCash</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="remit-tab" data-toggle="tab" href="#remit" role="tab"
										aria-controls="remit" aria-selected="false">Remittance</a>
								</li>
							</ul>


							<div class="tab-content" id="myTabContent">

								<div class="tab-pane fade show active" id="btc" role="tabpanel"
									aria-labelledby="btc-tab">
									<?php echo form_open($form_submission,'name="btc-form"'); ?>
									<div class="form-group col-md-8">
										<label for="btc-address">Coins.ph Address</label>
										<input type="text" class="form-control" id="btc-address" name="btc-address" value="<?php if (isset($btc_address))
											{
												echo $btc_address;
											} ?>">

									</div>
									<input type="hidden" name="pay-type" value="btc" />
									<div class="form-group col-md-8">
										<button type="submit" class="btn btn-primary btn-sm" name="btc-submit">
											Submit
										</button>
									</div>
									</form>
								</div>
<!-- ----------------------------------------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------------------------------------- -->
								<div class="tab-pane fade" id="bank" role="tabpanel"
									aria-labelledby="bank-tab">
									<?php echo form_open($form_submission,'name="bank-form"'); ?>
									<div class="form-group col-md-8">
										<label for="bank-name">Bank Name</label>
										<input type="text" class="form-control" id="bank-name" name="bank-name" value="<?php if (isset($bank_name))
											{
												echo $bank_name;
											} ?>">

									</div>
									<div class="form-group col-md-8">
										<label for="bank-account-name">Account Name</label>
										<input type="text" class="form-control" id="bank-account-name"  name="bank-account-name" value="<?php if (isset($bank_account_name))
											{
												echo $bank_account_name;
											} ?>">

									</div>
									<div class="form-group col-md-8">
										<label for="bank-account-number">Account Number</label>
										<input type="text" class="form-control" id="bank-account-number" name="bank-account-number" value="<?php if (isset($bank_account_number))
											{
												echo $bank_account_number;
											} ?>">

									</div>
									<input type="hidden" name="pay-type" value="bank" />
									<div class="form-group col-md-8">
										<button type="submit" class="btn btn-primary btn-sm" name="bank-submit">
											Submit
										</button>
									</div>
									</form>
								</div>
<!-- ----------------------------------------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------------------------------------- -->
								<div class="tab-pane fade" id="gc" role="tabpanel" aria-labelledby="gc-tab">
								<?php echo form_open($form_submission,'name="gc-form"'); ?>
								<div class="form-group col-md-8">
									<label for="gc-address">GCash Address</label>
									<input type="text" class="form-control" id="gc-address" name="gc-address" value="<?php if (isset($gc))
											{
												echo $gc;
											} ?>">

								</div>
								<input type="hidden" name="pay-type" value="gc" />
								<div class="form-group col-md-8">
									<button type="submit" class="btn btn-primary btn-sm" name="gc-submit">
									Submit
									</button>
								</div>
								</form>
								</div>
<!-- ----------------------------------------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------------------------------------- -->
								<div class="tab-pane fade" id="remit" role="tabpanel"
									aria-labelledby="remit-tab">
									<?php echo form_open($form_submission,'name="remit-form"'); ?>
									<div class="form-group col-md-8">
										<label for="remit-center">Remittance Center</label>
										<input type="text" class="form-control" id="remit-center" name="remit-center"  value="<?php if (isset($remit_center))
											{
												echo $remit_center;
											} ?>">

									</div>
									<div class="form-group col-md-8">
										<label for="remit-center">Recipient Name</label>
										<input type="text" class="form-control" id="remit-fname" name="remit-fname" placeholder="First Name" value="<?php if (isset($remit_fname))
											{
												echo $remit_fname;
											} ?>">

										<input type="text" class="form-control mt-2" id="remit-mname" name="remit-mname" placeholder="Middle Name" value="<?php if (isset($remit_mname))
											{
												echo $remit_mname;
											} ?>">
											
										<input type="text" class="form-control mt-2" id="remit-lname" name="remit-lname" placeholder="Last Name" value="<?php if (isset($remit_lname))
											{
												echo $remit_lname;
											} ?>">

									</div>
									<div class="form-group col-md-8">
										<label for="remit-address">Recipient Address</label>
										<input type="text" class="form-control" id="remit-address" name="remit-address"  value="<?php if (isset($remit_address))
											{
												echo $remit_address;
											} ?>">

									</div>
									<div class="form-group col-md-8">
										<label for="remit-phone-number">Mobile Number</label>
										<input type="text" class="form-control" id="remit-phone-number" name="remit-phone-number"  value="<?php if (isset($remit_phone))
											{
												echo $remit_phone;
											} ?>">

									</div>
									<input type="hidden" name="pay-type" value="remit" />
									<div class="form-group col-md-8">
										<button type="submit" class="btn btn-primary btn-sm" name="remit-submit">
											Submit
										</button>
									</div>
									</form>
								</div>
<!-- ----------------------------------------------------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------------------------------------- -->
							</div><!-- tab-content -->
							<!-- card body-->
						</div>
						<!-- card -->
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
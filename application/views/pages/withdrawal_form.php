<div class="main-content">
	<section class="section">
		<div class="section-header">
			<!-- <h1>Update Account</h1>  -->
		</div>
		<div class="container mt-5">
			<div class="row">
				<div class="col-6 offset-3">
					<div class="card card-success">
						<div class="card-header">
							<h4>Withdraw</h4>
						</div>
						<div class="card-body">

							<div class="row">
								<?php echo form_open('Withdrawal/request')?>

								<div class="form-group col-12">
									<label for="growth">Account Growth</label>
									<input id="growth" type="text" value="<?= set_value('growth','',true)?>"
										class="form-control <?php if(strlen(form_error('growth')) > 0){echo "is-invalid";} ?>"
										name="growth" readonly />
									<div class="invalid-feedback">
										<?php echo form_error('growth');?>
									</div>
								</div>

								<div class="form-group col-12">
									<label for="amount">Withdraw Amount</label>
									<input id="amount" type="text" value="<?= set_value('amount','',true)?>"
										class="form-control <?php if(strlen(form_error('amount')) > 0){echo "is-invalid";} ?>"
										name="amount" readonly />
									<div class="invalid-feedback">
										<?php echo form_error('amount');?>
									</div>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-success btn-lg btn-block">
										Request Withdrawal
									</button>
								</div>

								</form>
							</div>

							<div class="row">

							</div>
						</div>
					</div>
				</div>
				<!-- 
				<div class="col-4">
					<div class="card card-info">
						<div class="card-header">
							<h4 class="text-center">GCash</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-6">
									<p>Minimum Amount</p>
									<p>Maximum Amount</p>
									<p>Charges (Fixed)</p>
									<p>Charges (5%)</p>
									<p>Duration</p>

									<a href="withdrawal/validate" class="btn btn-info">
										<span class="fas fa-plus"></span> 
										Request Withdrawal
									</a>

								</div>
								<div class="col-6 text-right">
									<p><strong> P200</strong></p>
									<p><strong> P20,000</strong></p>
									<p><strong> P2</strong></p>
									<p><strong> 1%</strong></p>
									<p`><strong> P1</strong></p>
								</div>
							</div>
						</div>
					</div>
				</div> -->
			</div>

			<div class="row">
				<div class="col-12 col-sm-12">
					<div class="login-brand">
						<h4>Your Withdrawals</h4>
					</div>
					<div class="card card-primary">
						<div class="card-body">
							<table class="table table-hover">
								<thead>
									<tr>
										<th scope="col">Amount</th>
										<th scope="col">Payment Mode</th>
										<th scope="col">Status</th>
										<th scope="col">Date Requested</th>
									</tr>
								</thead>
							</table>
						</div>
						<div class="footer"> </div>
					</div>
				</div>
			</div>
		</div>
</div>
</section>
</div>
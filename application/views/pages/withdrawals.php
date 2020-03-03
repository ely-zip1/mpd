<div class="main-content">
	<section class="section">
		<div class="section-header">
			<!-- <h1>Update Account</h1>  -->
		</div>
		<div class="container mt-5">
			<div class="row">
				<div class="col-12">
					<div class="card card-primary">
						<div class="card-header">
							<h4>Withdrawal</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-12">
								    <div class="alert alert-info text-center">
                                      Withdrawal request cut off: 10AM.  Releasing time: 5PM
                                    </div>
								</div>
								<div class="col-12">
								    <div class="alert alert-warning text-center">
                                      All withdrawals are subject to 10% tax deduction.
                                    </div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-6">
									<p>Minimum Amount</p>
								</div>

								<div class="col-6 text-right">
									<p><strong> $5</strong></p>
								</div>
							</div>

							<div class="row">
								<div class="col-6">
									<p>Total Profit</p>
								</div>

								<div class="col-6 text-right">
									<p><strong> $<?php if(isset($total_profit))echo $total_profit;?></strong></p>
								</div>

							</div>

							<!-- <div class="row">
								<div class="col-6">
									<p>Deductions (Tax)</p>
								</div>

								<div class="col-6 text-right">
									<p><strong>-10%</strong></p>
								</div>

							</div> -->

							<!-- <div class="row">
								<div class="col-6">
									<p>Withdrawable Amount</p>
								</div>

								<div class="col-6 text-right">
									<p><strong> $<?php if(isset($withdrawable_amount))echo $withdrawable_amount;?></strong></p>
								</div>

							</div> -->
							<?php echo form_open('withdrawals');?>

							<div class="row">
								<div class="form-group col-12">

									<label for="withdraw_mode">Withdrawal Mode</label>
									<select class="form-control" name="withdraw_mode">
										<option value="bitcoin">Coins.ph</option>
										<option value="bank">Bank Transfer</option>
										<option value="gcash">Gcash</option>
										<option value="remittance">Remittance Centers</option>
									</select>
								</div>

								<div class="form-group col-12">
									<label for="withdraw_amount">Withdrawal Amount</label>
									<input id="withdraw_amount" type="text"
										value="<?= set_value('withdraw_amount','',true)?>"
										class="text-right form-control <?php if(strlen(form_error('withdraw_amount')) > 0){echo "is-invalid";} ?>"
										name="withdraw_amount" autofocus />
									<div class="invalid-feedback">
										<?php echo form_error('withdraw_amount');?>
									</div>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block"
									<?php if(!$can_withdraw) echo 'disabled'; ?>>
									<span class="fas fa-plus"></span>
									Request Withdrawal
								</button>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12 col-sm-12">
					<div class="login-brand">
						<h4>Withdrawal History</h4>
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
								<tbody>
									<?php foreach ($withdrawal_data as $row){?>
									    <tr>
									        <td>$ <?php echo $row['amount']; ?></td>
									        <td><?php echo $row['payment_mode']; ?></td>
									        <td><?php echo $row['status']; ?></td>
									        <td><?php echo $row['date']; ?></td>
									    </tr>
									<?php }?>
								</tbody>
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
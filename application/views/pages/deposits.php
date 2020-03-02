<div class="main-content">
	<section class="section">
		<div class="section-header">
			<!-- <h1>Update Account</h1>  -->
        </div>
		<div class="container mt-5">
			<!-- <?php print_r($deposit_data);?> -->
			<div class="row">
				<div class="col-12 col-sm-12">
					<div class="login-brand"> 
                        <h4>Your Deposits</h4>
                    </div>
					<div class="card card-primary">
						<div class="card-body">
							<table class="table table-hover">
								<thead>
									<tr>
										<th scope="col">Package</th>
										<th scope="col">Amount</th>
										<th scope="col">Payment Mode</th>
										<th scope="col">Status</th>
										<th scope="col">Date Created</th>
										<th scope="col">Date Approved</th>
									</tr>
								</thead>
								<tbody>
									    <?php foreach ($deposit_data as $row){?>
								    <tr>
										<td><?php echo $row['package']; ?></td>
										<td>$ <?php echo $row['amount']; ?></td>
										<td><?php echo $row['mode']; ?></td>
										<td><?php echo $row['status']; ?></td>
										<td><?php echo $row['date']; ?></td>
										<td><?php echo $row['date_approved']; ?></td>
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
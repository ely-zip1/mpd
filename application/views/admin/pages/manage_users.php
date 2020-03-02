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
						<h4>Registered Users</h4>
					</div>
					<div class="card card-info">
						<div class="card-body">
                            <!-- <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav> -->
							<table class="table table-hover table-bordered table-sm">

								<thead>
									<tr>
										<th>Client Name</th>
										<th>Email</th>
										<th>Phone No.</th>
										<th>Total Deposit</th>
										<th>Date Joined</th>
										<th>Referred By</th>
									</tr>
								</thead>

								<tbody>
									<?php foreach ($users as $user) { ?>
									<tr>
										<td><?php echo $user['fname']. ' ' .$user['lname']; ?></td>
										<td><?php echo $user['email']; ?></td>
										<td><?php echo $user['phone']; ?></td>
										<td>$ <?php echo number_format($user['total_deposit'],2); ?></td>
										<td><?php echo $user['date_joined']; ?></td>
										<td><?php echo $user['referred_by']; ?></td>
										<td>
											<a class="btn btn-success btn-sm"
												href="<?php echo base_url('user_details/show/'.$user['id']) ?>"> Details </a>
										</td>
									</tr>
									<?php } ?>
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
<div class="main-content">
	<section class="section">
		<div class="section-header">
            <h1>Referral</h1> 
        </div>
		<div class="container mt-5">
			<div class="row">
				<div class="col-12 col-sm-8 offset-sm-2 ">
					<div class="login-brand">
                        <h3 class="text-center">MP Diamonds Affiliate Program</h3> 
                    </div>
					<div class="card">
						<div class="card-body">
                            <p class="text-center">
                                <strong>
                                Your affiliate link
                                </strong>
                            </p>
                            <p>
                                <h5 class="text-center">
                                    <a href="my/ref/<?php echo $referral_code;?>" class="badge badge-primary">
                                    https://mp-diamonds.com/my/ref/<?php echo $referral_code;?>
                                    </a>
                                </h5>
                            </p>
                        </div>
						<div class="footer"> </div>
                    </div>
                </div>
                <div class="col-10 offset-sm-1">
			<div class="row">
				<div class="col-12">
					<div class="login-brand"> 
                        <h4>Affiliates</h4>
                    </div>
					<div class="card card-primary">
						<div class="card-body">
						    <div style="overflow-x:auto;">
							<table class="table table-hover">
								<thead>
									<tr>
										<th scope="col">Name</th>
										<th scope="col">Email</th>
										<th scope="col">Phone Number</th>
										<th scope="col">Date Joined</th>
										<th scope="col">Type</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($referrals as $referral) { ?>
									<tr>
										<td><?php echo $referral['name']; ?></td>
										<td><?php echo $referral['email']; ?></td>
										<td><?php echo $referral['phone']; ?></td>
										<td><?php echo $referral['date']; ?></td>
										<td><?php echo $referral['is_direct']; ?></td>
										
									</tr>
									<?php } ?>
								</tbody>
							</table>
							</div>
						</div>
						<div class="footer"> </div>
					</div>
					</div>
				</div>
                </div>
			</div>
		</div>
	</section>
</div>
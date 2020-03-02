<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2 shadow">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand"> 
			  <a href="<?= base_url();?>"><img src="<?= base_url();?>assets/img/MPD_Logo_blue.png" alt="logo" width="150"></a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm"> 
			  <a href="<?= base_url();?>"><img src="<?= base_url();?>assets/img/MPD_Logo_small_blue.png" alt="logo" width="40"></a>
		</div>
		<ul class="sidebar-menu">
			<!-- <li class="menu-header">Dashboard</li> -->
			<li class="dropdown <?php echo $this->uri->segment(1) == 'dashboard' ? 'active' : ''; ?>"> <a
					href="dashboard" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a> </li>

			<li class="dropdown <?php echo $this->uri->segment(1) == 'plans' ? 'active' : ''; ?>"> <a
				href="<?= base_url();?>plans" class="nav-link"><i class="fas fa-award"></i><span>Investment Plans</span></a> </li>

			<li class="dropdown <?php echo $this->uri->segment(1) == 'UpdateAccount' ? 'active' : ''; ?>"> <a
					href="<?= base_url();?>UpdateAccount" class="nav-link"><i class="fas fa-user"></i><span>Personal Account</span></a> </li>

			<li class="dropdown <?php echo $this->uri->segment(1) == 'UpdatePassword' ? 'active' : ''; ?>"> <a
					href="<?= base_url();?>UpdatePassword" class="nav-link"><i class="fas fa-user"></i><span>Change Password</span></a> </li>
					
			<li class="dropdown <?php echo $this->uri->segment(1) == 'deposits' ? 'active' : ''; ?>"> <a href="deposits"
					class="nav-link"><i class="fas fa-money-bill"></i><span>Your Investments</span></a> </li>

			<li class="dropdown <?php echo $this->uri->segment(1) == 'withdrawals' ? 'active' : ''; ?>"> <a
					href="withdrawals" class="nav-link"><i
						class="fas fa-hand-holding-usd"></i><span>Withdrawals</span></a> </li>

			<li class="dropdown <?php echo $this->uri->segment(1) == 'referral' ? 'active' : ''; ?>"> <a href="referral"
					class="nav-link"><i class="fas fa-users"></i><span>Affiliates</span></a> </li>

			<li class="dropdown <?php echo $this->uri->segment(1) == 'support' ? 'active' : ''; ?>"> <a href="support"
					class="nav-link"><i class="fas fa-envelope"></i><span>Support</span></a> </li>
		</ul>
	</aside>
</div>
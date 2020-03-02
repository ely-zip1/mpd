
         <section class="section">
               <div class="container mt-5">
                     <div class="row">
                           <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                                 <div class="row">
                                       <div class="col-12">
                                          <div class="login-brand">
                                                <a href="<?= base_url();?>"><img src="<?= base_url();?>assets/img/MPD_Logo.png" alt="logo" width="200"></a>
                                          </div>
                                       </div>
                                 </div>

                                 <div class="card card-primary">
                                       <div class="card-header">
                                             <h2 class="text-center">Login</h2>
                                       </div>

                                       <div class="card-body">
                                          
                                                <?php 
                                                
                                                if(isset($validation_error)){
                                                      echo '<div class="alert alert-danger">';
                                                      echo $validation_error;
                                                      echo '</div>';
                                                } 
                                                
                                                ?>
                                             <!-- <form method="POST" action="#" class="needs-validation" novalidate=""> -->
                                             <?php echo form_open('login'); ?>
                                             <div class="form-group">
                                                   <label for="email">Email</label>
                                                   <input id="email" type="email"
                                                         class="form-control <?php if(strlen(form_error('email')) > 0){echo "is-invalid";} ?>"
                                                         name="email" tabindex="1" autofocus
                                                         value="<?= set_value('email','',true)?>">
                                                   <div class="invalid-feedback">
                                                         <?php echo form_error('email');?>
                                                   </div>
                                             </div>

                                             <div class="form-group">
                                                   <div class="d-block">
                                                         <label for="password" class="control-label">Password</label>
                                                         <div class="float-right">
                                                               <a href="<?php echo base_url(); ?>forgot_password"
                                                                     class="text-small">
                                                                     Forgot Password?
                                                               </a>
                                                         </div>
                                                   </div>
                                                   <input id="password" type="password"
                                                         class="form-control <?php if(strlen(form_error('password')) > 0){echo "is-invalid";} ?>"
                                                         name="password" tabindex="2">
                                                   <div class="invalid-feedback">
                                                         <?php echo form_error('password');?>
                                                   </div>
                                             </div>

                                             <!-- <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                                              <label class="custom-control-label" for="remember-me">Remember Me</label>
                                                        </div>
                                                  </div> -->

                                             <div class="form-group">
                                                   <button type="submit" class="btn btn-primary btn-lg btn-block"
                                                         tabindex="4">
                                                         Login
                                                   </button>
                                             </div>
                                             </form>

                                       </div>
                                 <div class="mb-3 text-muted text-center" >
                                       Don't have an account? <a href="<?php echo base_url(); ?>registration">Create
                                             One</a>
                                 </div>
                                 </div>
                           </div>
                     </div>
               </div>
         </section>
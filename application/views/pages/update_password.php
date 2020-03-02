<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Password</h1>
        </div>
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">

            </div>

            <div class="card card-primary">

                <div class="card-body">
                  <div class="row">
                      <div class="col-12">
                      <?php if(isset($_SESSION['update_password_message'])){
                          echo '<div class="alert alert-success">';
                          echo $_SESSION['update_password_message'];
                          echo '</div>';
                      }?>
                    </div>
                </div>
              
                <?php echo form_open('UpdatePassword'); ?>
                  <div class="form-group">
                    <label for="current-password">Current Password</label>
                    <input id="current-password" type="password" name="current-password" tabindex="1" required autofocus 
                        class="form-control <?php if(strlen(form_error('current-password')) > 0){echo "is-invalid";} ?>"
                        tabindex="1" autofocus
                        value="<?= set_value('current-password','',true)?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('current-password');?>
                    </div>
                  </div>                               

                  <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input id="new-password" type="password" name="new-password" tabindex="1" required 
                        class="form-control <?php if(strlen(form_error('new-password')) > 0){echo "is-invalid";} ?>"
                        tabindex="1" autofocus
                        value="<?= set_value('new-password','',true)?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('new-password');?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" name="password-confirm" tabindex="1" required 
                        class="form-control <?php if(strlen(form_error('password-confirm')) > 0){echo "is-invalid";} ?>"
                        tabindex="1" autofocus
                        value="<?= set_value('password-confirm','',true)?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('password-confirm');?>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Update Password
                    </button>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
<section class="section">
  <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="row">
          <div class="col-12">
            <div class="login-brand">
              <a href="<?= base_url();?>"><img src="<?= base_url();?>assets/img/MPD_Logo.png" alt="logo" width="200"></a>
            </div>
          </div>
        </div>
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="text-center">Registration
            </h4>
          </div>
          <div class="card-body">
            <div class="row">
              <?php if(isset($_SESSION['success'])){ $this->load->view('templates/hero_registration'); }?>
            </div>
            <?php echo form_open('registration'); ?>
            <div class="row">
              <div class="form-group col-6">
                <label for="frist_name">First Name
                </label>
                <input id="first_name" type="text" value="<?= set_value('first_name','',true)?>"
                       class="form-control <?php if(strlen(form_error('first_name')) > 0){echo "is-invalid";} ?>"
                       name="first_name" autofocus />
                <div class="invalid-feedback">
                  <?php echo form_error('first_name');?>
                </div>
              </div>
              <div class="form-group col-6">
                <label for="last_name">Last Name
                </label>
                <input id="last_name" type="text" value="<?= set_value('last_name','',true)?>"
                       class="form-control <?php if(strlen(form_error('last_name')) > 0){echo "is-invalid";} ?>"
                       name="last_name" autofocus />
                <div class="invalid-feedback">
                  <?php echo form_error('last_name');?>
                </div>
              </div>
              <div class="form-group col-6">
                <label for="phone">Phone Number
                </label>
                <input id="phone" type="text" value="<?= set_value('phone','',true)?>"
                       class="form-control <?php if(strlen(form_error('phone')) > 0){echo "is-invalid";} ?>" name="phone"
                       autofocus />
                <div class="invalid-feedback">
                  <?php echo form_error('phone');?>
                </div>
              </div>
              <div class="form-group col-6">
                <label for="income_src">Source of Income
                </label>
                <input id="income_src" type="text" value="<?= set_value('income_src','',true)?>"
                       class="form-control <?php if(strlen(form_error('income_src')) > 0){echo "is-invalid";} ?>"
                       name="income_src" autofocus />
                <div class="invalid-feedback">
                  <?php echo form_error('income_src');?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="email">Email
              </label>
              <input id="email" type="text" value="<?= set_value('email','',true)?>"
                     class="form-control <?php if(strlen(form_error('email')) > 0){echo "is-invalid";} ?>" name="email"
                     autofocus />
              <div class="invalid-feedback">
                <?php echo form_error('email');?>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-6">
                <label for="password" class="d-block">Password
                </label>
                <input id="password" type="password"
                       class="form-control <?php if(strlen(form_error('password')) > 0){echo "is-invalid";} ?>"
                       name="password" autofocus />
                <div class="invalid-feedback">
                  <?php echo form_error('password');?>
                </div>
              </div>
              <div class="form-group col-6">
                <label for="password2" class="d-block">Password Confirmation
                </label>
                <input id="password2" type="password"
                       class="form-control <?php if(strlen(form_error('password2')) > 0){echo "is-invalid";} ?>"
                       name="password2" autofocus />
                <div class="invalid-feedback">
                  <?php echo form_error('password2');?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-6">
                <label for="street_ad">Street Address
                </label>
                <input id="street_ad" type="text" value="<?= set_value('street_ad','',true)?>"
                       class="form-control <?php if(strlen(form_error('street_ad')) > 0){echo "is-invalid";} ?>"
                       name="street_ad" autofocus />
                <div class="invalid-feedback">
                  <?php echo form_error('street_ad');?>
                </div>
              </div>
              <!--div class="form-group col-6">
                <label for="brgy_ad">
                </label>
                <input id="brgy_ad" type="text" value="<?= set_value('brgy_ad','',true)?>"
                       class="form-control <?php if(strlen(form_error('brgy_ad')) > 0){echo "is-invalid";} ?>"
                       name="brgy_ad" autofocus />
                <div class="invalid-feedback">
                  <?php echo form_error('brgy_ad');?>
                </div>
              </div-->
              
              <input type="hidden" name="brgy_ad" value="" />
              
              <div class="form-group col-6">
                <label for="city_ad">City
                </label>
                <input id="city_ad" type="text" value="<?= set_value('city_ad','',true)?>"
                       class="form-control <?php if(strlen(form_error('city_ad')) > 0){echo "is-invalid";} ?>"
                       name="city_ad" autofocus />
                <div class="invalid-feedback">
                  <?php echo form_error('city_ad');?>
                </div>
              </div>
              <div class="form-group col-6">
                <label for="province_ad">Province
                </label>
                <input id="province_ad" type="text" value="<?= set_value('province_ad','',true)?>"
                       class="form-control <?php if(strlen(form_error('province_ad')) > 0){echo "is-invalid";} ?>"
                       name="province_ad" autofocus />
                <div class="invalid-feedback">
                  <?php echo form_error('province_ad');?>
                </div>
              </div>
              <div class="form-group col-6">
                <label for="zip">Zip Code
                </label>
                <input id="zip" type="text" value="<?= set_value('zip','',true)?>"
                       class="form-control <?php if(strlen(form_error('zip')) > 0){echo "is-invalid";} ?>"
                       name="zip" autofocus />
                <div class="invalid-feedback">
                  <?php echo form_error('zip');?>
                </div>
              </div>
              <div class="form-group col-6">
                <label for="country">Country
                </label>
                <select id="country" name="country"
                        class="selectpicker countrypicker form-control <?php if(strlen(form_error('country')) > 0){echo "is-invalid";} ?>"
                        data-default="Philippines">
                </select>
                <div class="invalid-feedback">
                  <?php echo form_error('country');?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-12">
                <label>Referrer's Code
                </label>
                <div for="referral" class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">MPDIAMONDS.COM/MY/REF/
                    </div>
                  </div>
                  <input id="referral" name="referral" value="<?= set_value('referral',$referral_code,true)?>"
                         type="text"
                         class="form-control <?php if(strlen(form_error('referral')) > 0){echo "is-invalid";} ?>"
                         placeholder="Referrer's code" readonly>
                </div>
                <div class="invalid-feedback">
                  <?php echo form_error('referral');?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block">
                Register
              </button>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

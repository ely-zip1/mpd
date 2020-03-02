<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?php echo ucfirst($package) . ' ' . 'Package'; ?></h1>
    </div>
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Payment Options</h4>
            </div>
            <div class="card-body">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active show" id="btc-tab" data-toggle="tab" href="#btc" role="tab"
                    aria-controls="btc" aria-selected="true">Coins.ph</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="eth-tab" data-toggle="tab" href="#eth" role="tab" aria-controls="eth"
                    aria-selected="false">Ethereum</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="gc-tab" data-toggle="tab" href="#gc" role="tab" aria-controls="gc"
                    aria-selected="false">GCash</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pp-tab" data-toggle="tab" href="#pp" role="tab" aria-controls="pp"
                    aria-selected="false">PayPal</a>
                </li>
              </ul>


              <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="btc" role="tabpanel" aria-labelledby="btc-tab">
                  <?php echo form_open($form_submission,'name="btc-form"'); ?>
                  <div class="form-group col-md-8">
                    <label for="btc-address">Coins.ph Address</label>
                    <input type="text" class="form-control" id="btc-address" readonly value="<?php if (isset($btc))
                              {
                                  echo $btc;
                              } ?>">

                  </div>
                  <div class="form-group col-md-8">
                    <label for="btc-amount">Amount ($600 - $5,999)</label>
                    <input type="text" class="form-control <?php if (strlen(form_error('btc-amount')) > 0)
                              {
                                  echo "is-invalid";
                              } ?>" id="btc-amount" name="btc-amount" value="<?php if (isset($btc_value))
                              {
                                  set_value('btc-amount', $btc_value, true);
                              } ?>">
                    <div class="invalid-feedback">
                      <?php echo form_error('btc-amount'); ?>
                    </div>
                  </div>
                  <input type="hidden" name="pay-type" value="btc" />
                  <div class="form-group col-md-8">
                    <button type="submit" class="btn btn-warning btn-sm" name="btc-submit">
                      Submit
                    </button>
                  </div>
                  </form>
                </div>

                <div class="tab-pane fade" id="eth" role="tabpanel" aria-labelledby="eth-tab">
                  <?php echo form_open($form_submission,'name="eth-form"'); ?>
                  <div class="form-group col-md-8">
                    <label for="eth-address">Ethereum Address</label>
                    <input type="text" class="form-control" id="eth-address" readonly value="<?php if (isset($eth))
                              {
                                  echo $eth;
                              } ?>">

                  </div>
                  <div class="form-group col-md-8">
                    <label for="eth-amount">Amount ($600 - $5,999)</label>
                    <input type="text" class="form-control <?php if (strlen(form_error('eth-amount')) > 0)
                              {
                                  echo "is-invalid";
                              } ?>" id="eth-amount" name="eth-amount" value="<?php if (isset($eth_value))
                              {
                                  set_value('eth-amount', $eth_value, true);
                              } ?>">
                    <div class="invalid-feedback">
                      <?php echo form_error('eth-amount'); ?>
                    </div>
                  </div>
                  <input type="hidden" name="pay-type" value="eth" />
                  <div class="form-group col-md-8">
                    <button type="submit" class="btn btn-warning btn-sm" name="eth-submit">
                      Submit
                    </button>
                  </div>
                  </form>
                </div>

                <div class="tab-pane fade" id="gc" role="tabpanel" aria-labelledby="gc-tab">
                  <?php echo form_open($form_submission,'name="gc-form"'); ?>
                  <div class="form-group col-md-8">
                    <label for="gc-address">GCash Address</label>
                    <input type="text" class="form-control" id="gc-address" readonly value="<?php if (isset($gc))
                              {
                                  echo $gc;
                              } ?>">

                  </div>
                  <div class="form-group col-md-8">
                    <label for="gc-amount">Amount ($500 - $4,999)</label>
                    <input type="text" class="form-control <?php if (strlen(form_error('gc-amount')) > 0)
                              {
                                  echo "is-invalid";
                              } ?>" id="gc-amount" name="gc-amount" value="<?php if (isset($gc_value))
                              {
                                  set_value('gc-amount', $gc_value, true);
                              } ?>">
                    <div class="invalid-feedback">
                      <?php echo form_error('gc-amount'); ?>
                    </div>
                  </div>
                  <input type="hidden" name="pay-type" value="gc" />
                  <div class="form-group col-md-8">
                    <button type="submit" class="btn btn-warning btn-sm" name="gc-submit">
                      Submit
                    </button>
                  </div>
                  </form>
                </div>

                <div class="tab-pane fade" id="pp" role="tabpanel" aria-labelledby="pp-tab">
                  <?php echo form_open($form_submission,'name="pp-form"'); ?>
                  <div class="form-group col-md-8">
                    <label for="pp-address">Paypal Address</label>
                    <input type="text" class="form-control" id="pp-address" readonly value="<?php if (isset($pp))
                              {
                                  echo $pp;
                              } ?>">

                  </div>
                  <div class="form-group col-md-8">
                    <label for="pp-amount">Amount ($600 - $5,999)</label>
                    <input type="text" class="form-control <?php if (strlen(form_error('pp-amount')) > 0)
                              {
                                  echo "is-invalid";
                              } ?>" id="pp-amount" name="pp-amount" value="<?php if (isset($pp_value))
                              {
                                  set_value('pp-amount', $pp_value, true);
                              } ?>">
                    <div class="invalid-feedback">
                      <?php echo form_error('pp-amount'); ?>
                    </div>
                  </div>
                  <input type="hidden" name="pay-type" value="pp" />
                  <div class="form-group col-md-8">
                    <button type="submit" class="btn btn-warning btn-sm" name="pp-submit">
                      Submit
                    </button>
                  </div>
                  </form>
                </div>

              </div><!-- tab-content -->
              <!-- card body-->
            </div>
            <!-- card -->
          </div>
          <!-- col -->
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!-- section -->
  </section>
  <!-- main-content -->
</div>
<div id="content" class="col-sm-9">
    <h1 class="title">Checkout</h1>
    <form action="<?php echo site_url('myaccount/updatedata'); ?>" method="post">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
                </div>
                <div class="panel-body">
                    <fieldset id="account">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" value="<?php echo ucwords(strtolower($detail->user_name)); ?>" name="name" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <input type="text" class="form-control" value="<?php echo ucwords(strtolower($detail->user_address)); ?>" name="address" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Region</label>
                            <select class="form-control" name="lstRegion" readonly>
                                <option value=""> --- Please Select --- </option>
                                <?php 
                                foreach($listRegion as $r) { 
                                    if ($detail->region_id == $r->region_id) {
                                ?>
                                <option value="<?php echo $r->region_id; ?>" selected><?php echo $r->region_name; ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $r->region_id; ?>"><?php echo $r->region_name; ?></option>
                                <?php 
                                    }
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">City</label>
                            <input type="text" class="form-control" value="<?php echo ucwords(strtolower($detail->user_city)); ?>" name="city" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Zip Code</label>
                            <input type="text" class="form-control" value="<?php echo ucwords(strtolower($detail->user_zipcode)); ?>" name="zipcode" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Phone</label>
                            <input type="text" class="form-control" value="<?php echo $detail->user_phone; ?>" name="phone" readonly>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-book"></i> Your Shipping Address</h4>
                </div>
                <div class="panel-body">
                    <fieldset id="address" class="required">
                        <div class="form-group required">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" value="<?php echo set_value('ship_name'); ?>" name="ship_name" autocomplete="off" required autofocus>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Address</label>
                            <input type="text" class="form-control" value="<?php echo set_value('ship_address'); ?>" name="ship_address" autocomplete="off" required>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Region</label>
                            <select class="form-control" name="lstRegionShip" required>
                                <option value=""> --- Please Select --- </option>
                                <?php 
                                foreach($listRegion as $r) { 
                                ?>
                                <option value="<?php echo $r->region_id; ?>"><?php echo $r->region_name; ?></option>
                                <?php
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">City</label>
                            <input type="text" class="form-control" value="<?php echo set_value('ship_city'); ?>" name="ship_city" autocomplete="off" required>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Zip Code</label>
                            <input type="text" class="form-control" value="<?php echo set_value('ship_zipcode'); ?>" name="ship_zipcode" autocomplete="off" required>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Phone</label>
                            <input type="text" class="form-control" value="<?php echo set_value('ship_phone'); ?>" name="ship_phone" autocomplete="off" required>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="1" name="chkCopy">
                                My Shipping are the same with My Personal Detail.
                            </label>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title"><i class="fa fa-credit-card"></i> Payment Method</h4>
                </div>
                <div class="panel-body">
                    <p>Please select the preferred payment method to use on this order.</p>
                    <div class="radio">
                        <label><input type="radio" checked="checked" name="chkPayment">Cash On Delivery</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="chkPayment">Bank Transfer</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td class="text-center" width="20%">Image</td>
                                <td class="text-left">Product Name</td>
                                <td class="text-left" width="30%">Category</td>
                                <td class="text-right" width="10%">Quantity</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $totalQty = 0;
                            foreach ($listItem as $r) { 
                            ?>
                            <tr>
                                <td class="text-center">
                                    <a href="<?php echo site_url('product/item/'.$r->product_id.'/'.$r->product_name_seo); ?>">
                                    <img src="<?php echo base_url(); ?>img/product/<?php echo $r->product_image; ?>" width="100" heigth="100" alt="<?php echo ucwords(strtolower($r->product_name)); ?>" title="<?php echo ucwords(strtolower($r->product_name)); ?>" class="img-thumbnail" />
                                    </a>
                                </td>
                                <td class="text-left"><a href="<?php echo site_url('product/item/'.$r->product_id.'/'.$r->product_name_seo); ?>"><?php echo ucwords(strtolower($r->product_name)); ?></a></td>
                                <td class="text-left"><?php echo ucwords(strtolower($r->category_name)); ?></td>
                                <td class="text-right"><?php echo $r->temp_qty; ?></td>
                            </tr>
                            <?php 
                                $totalQty = ($totalQty+$r->temp_qty);
                            } 
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-right" colspan="3"><strong>Total Qty :</strong></td>
                                <td class="text-right"><?php echo $totalQty; ?></td>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-pencil"></i> Add Comments About Your Order</h4>
        </div>
        <div class="panel-body">
            <textarea rows="4" class="form-control" name="comments"></textarea>
            <br>
            <label class="control-label" for="confirm_agree">
                <input type="checkbox" value="1" required class="validate required" id="confirm_agree" name="confirm agree">
                <span>I have read and agree to the <a class="agree" href="<?php echo site_url('term_condition'); ?>"><b>Terms &amp; Conditions</b></a></span>
            </label>
            <div class="buttons">
                <div class="pull-right">
                    <input type="button" class="btn btn-primary" value="Confirm Order">
                </div>
            </div>
        </div>
    </div>

    </form>
</div>
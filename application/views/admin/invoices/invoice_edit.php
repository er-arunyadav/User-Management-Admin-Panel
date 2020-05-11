<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<section class="content">
  <div class="row">
    <div class="col-md-12">
        <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
        <?php endif; ?>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-pencil"></i> &nbsp; Edit Invoice</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/invoices'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Invoice List</a>
          <a href="<?= base_url('admin/invoices/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Invoice</a>
        </div>
        
      </div>
    </div>
  </div>


  <div class="row">  
    <?php echo form_open( base_url('admin/invoices/edit/'.$invoice_detail['id'])); ?>
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">BILL From</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
            <input type="hidden" name="company_id" value="<?= $invoice_detail['company_id']; ?>" >
            <div class="form-group">
              <label for="company_name" class="control-label">Company Name</label>
              <input type="text" name="company_name" class="form-control" id="company_name" value="<?= $invoice_detail['company_name']; ?>" placeholder="">
            </div>
            
            <div class="form-group">
              <label for="address1" class="control-label">Address Line1</label>
              <input type="text" name="company_address_1" class="form-control" id="address1" value="<?= $invoice_detail['company_address1']; ?>" placeholder="">
            </div>

            <div class="form-group">
              <label for="address2" class="control-label">Address Line2</label>
              <input type="address2" name="company_address_2" class="form-control" id="address2" placeholder="">
            </div>
            <div class="form-group">
              <label for="email" class="control-label">Email</label>
              <input type="email" name="company_email" class="form-control" id="" value="<?= $invoice_detail['company_email']; ?>" placeholder="">
            </div>
            <div class="form-group">
              <label for="mobile_no" class="control-label">Mobile No</label>
              <input type="number" name="company_mobile_no" class="form-control" id="" value="<?= $invoice_detail['company_mobile_no']; ?>" placeholder="">
            </div>

          </div>
          <!-- /.box-body -->
      </div>
    </div>

    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">BILL TO</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
            <div class="form-group">
              <label for="firstname" class="control-label">Customer</label>
              <select class="form-control" name="user_id" id="customer">
                <option value="">Please Select Customer</option>
                <?php foreach ($customer_list as $client): ?>
                  <?php if($invoice_detail['client_id'] == $client['id']) :?>
                  <option value="<?= $client['id'] ?>" selected><?= $client['username'] ?></option>
                 <?php else: ?>
                  <option value="<?= $client['id'] ?>"><?= $client['username'] ?></option>
                 <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="firstname" class="control-label">First Name</label>
              <input type="text" name="firstname" value="<?= $invoice_detail['firstname']; ?>" class="form-control" id="firstname" placeholder="">
            </div>
            <div class="form-group">
              <label for="address" class="control-label">Address</label>
              <input type="text" name="client_address" value="<?= $invoice_detail['client_address']; ?>" class="form-control" id="address" placeholder="">
            </div>

            <div class="form-group">
              <label for="email" class="control-label">Email</label>
              <input type="email" name="email" value="<?= $invoice_detail['client_email']; ?>" class="form-control" id="email" placeholder="">
            </div>
            <div class="form-group">
              <label for="mobile_no" class="control-label">Mobile No</label>
              <input type="number" name="mobile_no" value="<?= $invoice_detail['client_mobile_no']; ?>" class="form-control" id="mobile_no" placeholder="">
            </div>

          </div>
          <!-- /.box-body -->
      </div>
    </div>

    <div class="col-md-12">
      <div class="box">
        <div class="box-body">
          <div class="col-md-3">
            <div class="form-group">
              <label for="invoice_no" class="control-label">Invoice#</label>
              <input type="text" name="invoice_no" value="<?= strtoupper($invoice_detail['invoice_no']); ?>" class="form-control" id="invoice_no" placeholder="eg. Inv-1001">
            </div>
          </div>
          <div class="col-md-3">
            <label for="date" class="control-label">Billing Date</label>
            <input type="text" name="billing_date" value="<?= $invoice_detail['created_date']; ?>"  class="form-control datepicker" id="billing_date" placeholder="">
          </div>
          <div class="col-md-3">
            <label for="date" class="control-label">Due Date</label>
              <input type="text" name="due_date" value="<?= $invoice_detail['due_date']; ?>" class="form-control datepicker" id="due_date" placeholder="">
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="firstname" class="control-label">Status</label>
              <select class="form-control" name="payment_status">
                <?= $invoice_detail['payment_status']; ?>
                <option value="Unpaid" <?php if($invoice_detail['payment_status'] == 'Unpaid'){echo 'selected';} else{echo '';} ?> >Unpaid</option>
                <option value="Partially Paid" <?php if($invoice_detail['payment_status'] == 'Partially Paid'){echo 'selected';} else{echo '';} ?>>Partially Paid</option>
                <option value="Paid" <?php if($invoice_detail['payment_status'] == 'Paid'){echo 'selected';} else{echo '';} ?>>Paid</option>
                <option value="Overdue" <?php if($invoice_detail['payment_status'] == 'Overdue'){echo 'selected';} else{echo '';} ?>>Overdue</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="box">
        <div class="box-body">
          <table class="table">
            <thead>
              <tr>
                <th>Action</th>
                <th width="40%">Products</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Tax</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody class="field_wrapper">
              <?php $items_detail = unserialize($invoice_detail['items_detail']); ?>
              <?php $count = count($items_detail['product_description']); ?>
              <?php for($i=0; $i<$count; $i++): ?>
                <tr class="item">
                  <td>
                    <a href="javascript:void(0);" class="<?php if($i == 0){echo 'add_button btn-primary';} else{echo 'remove_button btn-danger calcEvent';}?> btn btn-sm " title="Add field"><i class="fa <?php if($i == 0){echo 'fa-plus';} else{echo 'fa-minus';}?>"></i></a>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" name="product_description[]" value="<?= $items_detail['product_description'][$i]; ?>" class="form-control calcEvent" id="product_description" placeholder="Description">
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" name="quantity[]" value="<?= $items_detail['quantity'][$i]; ?>" value="1" class="form-control calcEvent quantity" id="quantity" placeholder="">
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" name="price[]" value="<?= $items_detail['price'][$i]; ?>" class="form-control calcEvent price" id="price" placeholder="">
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" name="tax[]" value="<?= $items_detail['tax'][$i]; ?>" class="form-control calcEvent tax" id="tax" placeholder="">
                    </div>
                  </td>
                  <td>
                    <input type="hidden" name="total[]" value="<?= $items_detail['total'][$i]; ?>" class="form-control calcEvent item_total" placeholder="">
                    <strong class="item_total"><?= $items_detail['total'][$i]; ?></strong>
                  </td>

                </tr>
              <?php endfor; ?>  
            </tbody>
          </table>

          <div class="col-md-5 pull-right">
            <table class="table">
              <tr>
                <th><strong>Sub Total: </strong></th>
                <input type="hidden" name="sub_total" value="<?= $invoice_detail['sub_total']; ?>" class="sub_total">
                <td class="text-right"><span class="sub_total"><?= $invoice_detail['sub_total']; ?></span></td>
              </tr>
              <tr>
                <th><strong>Tax: </strong></th>
                <input type="hidden" name="total_tax" value="<?= $invoice_detail['total_tax']; ?>" class="total_tax">
                <td class="text-right"><span class="total_tax"><?= $invoice_detail['total_tax']; ?></span></td>
              </tr>
              <tr>
                <th><strong>Discount: </strong></th>
                <td class="text-right"><div class="form-group">
                    <input type="text" name="discount" value="<?= $invoice_detail['discount']; ?>" class="form-control calcEvent pull-right input-sm" id="discount" placeholder="" style="width: 40%">
                  </div></td>
              </tr>
              <tr>
                <input type="hidden" name="grand_total" class="grand_total" value="<?= $invoice_detail['grand_total']; ?>">
                <th><strong>Total: </strong></th>
                <td class="text-right"><span id="grand_total"><?= $invoice_detail['grand_total']; ?></span></td>
              </tr>
            </table>
          </div>  


        </div>
          <!-- /.box-body -->
      </div>
    </div>

    <div class="col-md-12">
      <div class="box">
        <div class="box-body">
           <div class="form-group">
              <label for="invoice_no" class="control-label">Client Note</label>
              <textarea name="client_note" class="form-control" rows="2" placeholder=""><?= $invoice_detail['client_note']; ?></textarea>
            </div>
            <div class="form-group">
              <label for="invoice_no" class="control-label">Terms & Condition</label>
              <textarea name="termsncondition" class="form-control" rows="3" placeholder="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
            </div>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="box">
        <div class="box-body">
          <input type="submit" name="submit" value="Save Invoice" class="btn btn-primary pull-right">
        </div>
      </div>
    </div>


    <?php echo form_close(); ?>

  </div>  

</section> 



 <!-- bootstrap datepicker -->
  <script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
  <script>
    $('.datepicker').datepicker({
      autoclose: true
    });
  </script>

  <script type="text/javascript">
    $(function(){

      //---------------------------------------------------------------
      $('#customer').change(function(e){
        var id = $('#customer').val();
        var post_data = {
          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
          type: 'POST',
          url: '<?= base_url("admin/invoices/customer_detail/"); ?>'+id,
          data: post_data,
          success: function(response){
            var data = JSON.parse(response);
            console.log(data.id);
            $('#firstname').val(data.firstname);
            $('#lastname').val(data.lastname);
            $('#email').val(data.email);
            $('#mobile_no').val(data.mobile_no);
          }
        });

      });

      //---------------------------------------------------------------
      $(document).on("click change paste keyup", ".calcEvent", function() {
        calculate_total();
      });

      var max_field = 10;
      var add_button = $('.add_button');
      var wrapper = $('.field_wrapper');
      var html_fields = '<tr class="item"><td> <a href="javascript:void(0);" class="remove_button btn btn-sm btn-danger" title="Remove field"><i class="fa fa-minus"></i></a> </td> <td> <div class="form-group"> <input type="text" name="product_description[]" class="form-control calcEvent" id="product_description" placeholder="Description"> </div> </td> <td> <div class="form-group"> <input type="text" name="quantity[]" value="1" class="form-control calcEvent quantity" id="quantity" placeholder=""> </div> </td> <td> <div class="form-group"> <input type="text" name="price[]" class="form-control calcEvent price" id="price" placeholder=""> </div> </td> <td> <div class="form-group"> <input type="text" name="tax[]" class="form-control calcEvent tax" id="tax" placeholder=""> </div> </td> <td> <input type="hidden" name="total[]" class="form-control calcEvent item_total" placeholder=""><strong class="item_total">0.00</strong> </td> </tr>';

      var x = 1; // 

      $(add_button).click(function(){
        calculate_total();
        if(x < max_field){
          x++;
          $(wrapper).append(html_fields);
        }

      });

      $(wrapper).on('click change keyup', '.remove_button', function(e){
        e.preventDefault();
        $(this).closest('tr').remove(); //Remove field html
        x--; //Decrement field counter
        calculate_total();
        console.log('remove');
      });

    });


     //---------------------------------------------------------------
     function calculate_total(){

        var sub_total    = 0;
        var total       = 0;
        var amountDue   = 0;
        var total_tax    = 0;

        $('tr.item').each(function(){
          var quantity = parseFloat($(this).find(".quantity").val());
          var price = parseFloat($(this).find(".price").val());
          var item_tax = $(this).find(".tax").val();

          var item_total = parseFloat(quantity * price) > 0 ? parseFloat(quantity * price) : 0 ;
          sub_total += parseFloat(price * quantity) > 0 ? parseFloat(price * quantity) : 0;
          total_tax += parseFloat(price * quantity * item_tax/100) > 0 ? parseFloat(price * quantity * item_tax/100) : 0;

          $(this).find('.item_total').text( item_total.toFixed(2) );
          $(this).find('.item_total').val( item_total.toFixed(2) ); 
        });

        var discount    = parseFloat($("[name='discount']").val()) > 0 ? parseFloat($("[name='discount']").val()) : 0;
        total += parseFloat(sub_total + total_tax - discount);

        $( '.sub_total' ).text( sub_total.toFixed(2) );
        $( '.sub_total' ).val( sub_total.toFixed(2) ); // for hidden field

        $( '.total_tax' ).text( total_tax.toFixed(2) );
        $( '.total_tax' ).val( total_tax.toFixed(2) ); // for hidden field

        $( '#grand_total' ).text( total.toFixed(2) );
        $( '.grand_total' ).val( total.toFixed(2) ); // for hidden field

     }


  </script>
  <script>
    $('#invoices').addClass('active');
  </script>

 
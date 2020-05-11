 <style type="text/css">
 	.invoice p{
 		line-height: 1em;
 	}
 	.invoice h2{
 		text-transform: uppercase;
 	}
 	.invoice-info{
 		padding-bottom: 50px;
 	}
 	.invoice-info strong{
 		padding-right: 50px;
 		text-transform: capitalize;
 	}
 	.billing{
 		background-color: #51b4db;
 		color: #fff;
 		font-weight: 700;
 		font-size: 14px;
 		padding: 10px 0px 10px 10px;
 		text-transform: uppercase;
 	}
 	.items_detail th{
 		background-color: #51b4db;
 		color: #fff;
 		text-transform: uppercase;
 	}
 </style>


 <!-- invoice start-->
	<section class="invoice">
		<div class="row">
			<div class="col-md-12">
				<div class="pull-right">  

					<a href="<?= base_url('admin/invoices/edit/'.$invoice_detail['id']); ?>" class="btn btn-success"><i class="fa fa-pencil"></i> Edit Invoice</a>
                
					<a class="btn btn-primary create_pdf" 
                    href="<?= base_url('admin/invoices/invoice_pdf_download/'.$invoice_detail['id']); ?>"><i class="fa fa-download"></i> Download</a>
                    
					<a class="btn btn-danger emailView" id="<?= $invoice_detail['id']; ?>" data-toggle="modal" href="#email"><i class="fa fa-envelope"></i> Send Email</a>
                    
				</div>	
			</div>
		</div>
		
	</section>

	  <section class="invoice">

		  <div class="row invoice-info">
		  	  <div class="col-md-6">
		  	  	<h1>Company Logo</h1>
		  	  </div>
		  	  <div class="col-md-4 text-right pull-right ">
		  	  	<h2>Invoice</h2>
		  	  	<p><strong>INVOICE ID : </strong> <?= strtoupper($invoice_detail['invoice_no']); ?> </p>
		  	  	<p><strong>BILLING DATE : </strong> <?= strtoupper($invoice_detail['created_date']); ?> </p>
		  	  	<p><strong>DUE DATE : </strong> <?= strtoupper($invoice_detail['due_date']); ?> </p>
		  	  </div>
		  </div>	  
		
		  <div class="row invoice-info">	
			   <div class="col-md-6 col-sm-6">
			   		<address>
			   		<p class="billing">Billing To</p>
					<p><strong> <?= $invoice_detail['firstname'].' '.$invoice_detail['lastname']; ?></strong></p>
					<p> <?= $invoice_detail['client_address']; ?> </p>
					<p> <?= $invoice_detail['client_email']; ?></p>
					<p> <?= $invoice_detail['client_mobile_no']; ?></p>
			   		</address>
			   		
			  </div>
			  <div class="col-md-6 col-sm-6 pull-rignt">
			  	<p class="billing">Billing From</p>
				<p><strong><?= $invoice_detail['company_name']; ?></strong></p>
				<p><?= $invoice_detail['company_address1']; ?></p>
				<p><?= $invoice_detail['company_email']; ?></p>
				<p><?= $invoice_detail['company_mobile_no']; ?></p>
			  </div>
			 
		  </div>
		  <table class="table table-striped table-hover items_detail">
			  <thead>
			  <tr>
				  <th>Product Description</th>
				  <th>Quantity</th>
				  <th>Price</th>
				  <th>Tax</th>
				  <th>Total</th>
			  </tr>
			  </thead>
			  <tbody>
			  	<?php $items_detail = unserialize($invoice_detail['items_detail']); ?>
			  	<?php $count = count($items_detail['product_description']); ?>
			 		<?php for($i=0; $i<$count; $i++): ?>
			 		<tr>
				 			<td><?= $items_detail['product_description'][$i]; ?></td>
				 			<td><?= $items_detail['quantity'][$i]; ?></td>
				 			<td><?= $items_detail['price'][$i]; ?></td>
				 			<td><?= $items_detail['tax'][$i]; ?></td>
				 			<td><?= $items_detail['total'][$i]; ?></td>
			 		</tr>
			 		<?php endfor; ?>
			  </tbody>
		  </table>

		  <div class="row">
		  	  <div class="col-xs-6 pull-right">
		          <div class="table-responsive">
		            <table class="table">
		              <tbody><tr>
		                <th style="width:50%">Subtotal:</th>
		                <td><?= $invoice_detail['sub_total']; ?></td>
		              </tr>
		              <tr>
		                <th>Tax</th>
		                <td><?= $invoice_detail['total_tax']; ?></td>
		              </tr>
		              <tr>
		                <th>Discount:</th>
		                <td><?= $invoice_detail['discount']; ?></td>
		              </tr>
		              <tr>
		                <th>Total:</th>
		                <td><?= $invoice_detail['grand_total']. ' '.$invoice_detail['currency']; ?></td>
		              </tr>
		            </tbody></table>
		          </div>
		        </div>	

		  </div>
		  <div class="row">
			<div class="col-md-12" style="padding-top:50px;">
				<p>Client Note:</p>
				<p style="color:#8f8f8f; font-size:10px;">
					<?= $invoice_detail['client_note']; ?>
				</p>
			</div>
		  </div>
		  <div class="row">
			<div class="col-md-12" style="padding-top:50px;">
				<p>Terms and Condition:</p>
				<p style="color:#8f8f8f; font-size:10px;">
					<?= $invoice_detail['termsncondition']; ?>
				</p>
			</div>
		  </div>
										  
		
		  
	  </section>
	  
    <!-- invoice end-->	  

	<section class="invoice">
		<div class="row">
			<div class="col-md-12">
				<div class="pull-right">  

					<a href="<?= base_url('admin/invoices/edit/'.$invoice_detail['id']); ?>" class="btn btn-success"><i class="fa fa-pencil"></i> Edit Invoice</a>
                
					<a class="btn btn-primary create_pdf" 
                    href="<?= site_url()?>invoices/invoice_pdf_download/<?= $invoice_detail['id']; ?>"><i class="fa fa-download"></i> Download</a>
                    
					<a class="btn btn-danger emailView" id="<?= $invoice_detail['id']; ?>" data-toggle="modal" href="#email"><i class="fa fa-envelope"></i> Send Email</a>
                    
				</div>	
			</div>
		</div>
	</section>


 <!-- Modal -->
  <div class="modal fade" id="email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		  <div class="modal-content">
			  <div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				  <h4 class="modal-title">Compose</h4> <!-- NaumaNJunaiD#007 -->
			  </div>
			  <div class="modal-body">
				  <form class="form-horizontal email-from" role="form">
				  	  <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />	
					  <div class="form-group">
						  <label  class="col-md-2 control-label">To</label>
						  <div class="col-md-10">
							  <input type="email" class="form-control" id="email" name="email" value="<?= $invoice_detail['client_email']; ?>" placeholder="">
                              <input type="hidden" class="form-control" id="file" name="file">
						  </div>
					  </div>
					  <div class="form-group">
						  <label  class="col-md-2 control-label">Cc / Bcc</label>
						  <div class="col-md-10">
							  <input type="email" class="form-control" id="cc" name="cc" placeholder="">
						  </div>
					  </div>
					  <div class="form-group">
						  <label class="col-md-2 control-label">Subject</label>
						  <div class="col-md-10">
							  <input type="text" class="form-control" id="subject" name="subject" value="Admin Lite Invoice" placeholder="">
						  </div>
					  </div>
					  <div class="form-group">
						  <label class="col-md-2 control-label">Message</label>
						  <div class="col-md-10">
							  <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
						  </div>
					  </div>

					  <div class="form-group">
						  <div class="col-md-offset-2 col-md-10">
							  <span class="btn green fileinput-button">
								<i class="fa fa-plus fa fa-white"></i>
								<span><a href="" id="pdf_url" target="_blank"></a></span>
							  </span>
							  <button type="button" class="btn btn-send sendEmail">Send</button>
						  </div>
					  </div>
				  </form>
			  </div>
		  </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


<script type="text/javascript">

	// Create pdf js function
	$('.emailView').click(function(e) {
	    var id = $('.emailView').attr('id');

	   var csrf = {
          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        };

	    $.ajax({
	        type: "POST",
	        url: "<?= site_url(); ?>admin/invoices/create_pdf/"+id,
			data: csrf,
	      	success: function(response) {
	      		console.log(response);
					if(response != ''){
						$("#pdf_url").attr("href", response);
						var index = response.lastIndexOf("/") + 1;
						var filename = response.substr(index);				 
						$("#pdf_url").html(filename);
						$("#file").val(filename);
						
					}
				}
	    }); 
		
	});

	// Sending Invoice with email attachment js function
	$('.sendEmail').click(function(e) {
	  	//alert($(".email-from").serialize());
	  
	    $.ajax({
				type: 'POST',
				url: '<?= site_url("admin/invoices/send_email_with_invoice"); ?>',
				data: $(".email-from").serialize(),
				beforeSend: function(){
					$(".sendEmail").attr('disabled', true);
					$(".sendEmail").html('<i class="fa fa-spinner fa-pulse"></i>');
				},
				success: function (response) {
					//alert(response);
					if(response){
						$(".sendEmail").attr('disabled', false);
						$(".sendEmail").html('Send');
						$(".email-from").trigger('reset');
						
						$('.close').trigger('click');
						//$('#email').modal('hide');
						
					}
				}
				
			});	   
		});


	function removePopup(){
		$('#email').removeClass('fade in')
		.addClass('fade').css('display', 'none');
		$('#email').attr('aria-hidden', 'true');
	}

	 
 
</script>
<script>
    $('#invoices').addClass('active');
 </script>
<?php

$html = '
	<section>
		<table border="" style="width: 100%">
			<tbody>
				<tr>
					<td width="60%"><h3>Company Logo</h3></td>
					<td>
						<h3>INVOICE</h3>
				  	  	<h4>INVOICE ID : '.strtoupper($invoice_detail['invoice_no']).'</h4>
				  	  	<h4>BILLING DATE : '.strtoupper($invoice_detail['created_date']).'</h4>
				  	  	<h4>DUE DATE : '.strtoupper($invoice_detail['due_date']).'</h4>
			  		</td>
				</tr>
			</tbody>
		</table>

		<table class="invoice" border="" style="width: 100%">
			<tbody>
				<tr >
					<th style="margin-right:1mm">
						<p>Billing To</p>
					</th>
					<th>
						<p>Billing From</p>
					</th>
				</tr>
				<tr>		
					<td>
						<p><strong> '.ucwords($invoice_detail['firstname'].' '.$invoice_detail['lastname']).' </strong></p>
						<p> '.$invoice_detail['client_address'].' </p>
						<p> '.$invoice_detail['client_email'].' </p>
						<p> '.$invoice_detail['client_mobile_no'].'  </p>
				   	</td>
				   	<td>
						<p><strong> '.ucfirst($invoice_detail['company_name']).' </strong></p>
						<p> '.$invoice_detail['company_address1'].' </p>
						<p> '.$invoice_detail['company_email'].' </p>
						<p> '.$invoice_detail['company_mobile_no'].' </p>
				   	</td>
				</tr>	
			</tbody>
		</table>


		<table class="invoice" border="" style="width: 100%">
			<thead>
				<tr class="">
					<th>Product Description</th>
				    <th>Quantity</th>
				    <th>Price</th>
				    <th>Tax</th>
				    <th>Total</th>
				</tr>
			</thead>
			<tbody>';

			$items_detail = unserialize($invoice_detail['items_detail']); 
			$count = count($items_detail['product_description']); 
			for($i=0; $i<$count; $i++):

			$html .= '
				<tr class="oddrow">
					<td> '.$items_detail['product_description'][$i].' </td>
					<td> '.$items_detail['quantity'][$i].' </td>
					<td> '.$items_detail['price'][$i].' </td>
					<td> '.$items_detail['tax'][$i].' </td>
					<td> '.$items_detail['total'][$i].' </td>
				</tr>';

			endfor;	

			$html .= '	
			
			</tbody>
		</table>


		<table align="right" class="calculation bpmTopic" width="50%">
	        <tbody>
		          <tr>
		            <th style="width:60%">Subtotal:</th>
		            <td>'.$invoice_detail['sub_total'].'</td>
		          </tr>
		          <tr>
		            <th>Tax</th>
		            <td>'.$invoice_detail['total_tax'].'</td>
		          </tr>
		          <tr>
		            <th>Discount:</th>
		            <td>'.$invoice_detail['discount'].'</td>
		          </tr>
		          <tr>
		            <th>Total:</th>
		            <td>'.$invoice_detail['grand_total']. ' '.$invoice_detail['currency'].'</td>
		          </tr>
	        </tbody>
	    </table>


	    <table class="client_notes" width="100%">
	    	<tbody>
	    		<tr>
	    			<th>Client Notes: </th>
	    		</tr>
	    		<tr>
	    			<td>'.$invoice_detail['client_note'].'</td>
	    		</tr>
	    	</tbody>
	    </table>


	    <table class="termsncondition footer" width="100%">
	    	<tbody>
	    		<tr>
	    			<th>Terms & Condition: </th>
	    		</tr>
	    		<tr>
	    			<td>'.$invoice_detail['termsncondition'].'</td>
	    		</tr>
	    	</tbody>
	    </table>



	</section>	
';

	echo $html;

?>
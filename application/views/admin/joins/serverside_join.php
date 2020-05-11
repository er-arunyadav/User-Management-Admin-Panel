<section class="content">
  	<div class="row">
		<div class="col-md-12">
			<h3>Datatable - ServerSide Processing with Join Example</h3>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p>Here we are fetching the record from two tables (user and payment) usign server-side datatable joins.</p>
		</div>
		<div class="col-md-6">
			<strong>USER TABLE:</strong>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Email</th>
						<th>Mobile No</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>nauman</td>
						<td>naumanahmedcs@gmail.com</td>
						<td>03469548054</td>
					</tr>
					<tr>
						<td>2</td>
						<td>rizwan</td>
						<td>rizwan@gmail.com</td>
						<td>12345</td>
					</tr>

				</tbody>
			</table>
		</div>
		<div class="col-md-6">
			<strong>PAYMENT TABLE:</strong>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>User ID<th>
						<th>Invoice#</th>
						<th>Amount</th>
						<th>Created Date</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>1<td>
						<td>INV-2002</td>
						<td>300</td>
						<td>2017-12-06</td>
					</tr>
					<tr>
						<td>1</td>
						<td>2<td>
						<td>INV-1001</td>
						<td>400</td>
						<td>2017-12-12</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>

  
 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Server Side Datatable With Join</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="na_datatable" class="table table-bordered table-striped" width="100%">
        <thead>
        <tr>
          <th>User Name</th>
          <th>Email</th>
          <th>Mobile No.</th>
          <th>Invoice#</th>
          <th>Amount</th>
          <th>Created Date</th>
        </tr>
        </thead>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>  


  <!-- DataTables -->
  <script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script>
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
      "processing": true,
      "serverSide": true,
      "ajax": "<?=base_url('admin/joins/datatable_json')?>",
      "order": [[0,'desc']],
      "columnDefs": [
        { "targets": 0, "name": "username", 'searchable':true, 'orderable':true},
        { "targets": 1, "name": "email", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "mobile_no", 'searchable':true, 'orderable':true},
        { "targets": 3, "name": "invoice_no", 'searchable':true, 'orderable':true},
        { "targets": 4, "name": "grand_total", 'searchable':true, 'orderable':true},
        { "targets": 5, "name": "created_date", 'searchable':false, 'orderable':false,'width':'100px'}
      ]
    });
  </script>
  
  


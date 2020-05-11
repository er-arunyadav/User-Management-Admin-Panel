 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-list"></i> &nbsp; Invoice List</h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/invoices/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Invoice</a>
        </div>
        
      </div>
    </div>
  </div>

   <div class="box">
    <div class="box-header">
      <h3 class="box-title">User Details</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
 
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>Invoice#</th>
          <th>Client</th>
          <th>Amount</th>
		      <th>Due Date</th>
          <th>Status</th>
          <th width="150" class="text-right">Action</th>
          
        </tr>
        </thead>
        <tbody>
          <?php foreach($invoice_detail as $data): ?>
          <tr>
            <td><?= $data['invoice_no']; ?></td>
            <td><?= $data['client_name']; ?></td>
            <td><?= $data['grand_total'] .' '. $data['currency']; ?></td>
            <td><?= date_time($data['due_date']); ?></td>
            <td><span class="btn btn-success btn-flat btn-xs"><?= $data['payment_status']; ?><span></td>
            <td><div class="btn-group pull-right">
              <a href="<?= base_url('admin/invoices/view/'.$data['id']); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
              <a href="<?= base_url('admin/invoices/invoice_pdf_download/'.$data['id']); ?>" class="btn btn-primary"><i class="fa fa-download"></i></a>
              <a href="<?= base_url('admin/invoices/edit/'.$data['id']); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
              <a href="<?= base_url('admin/invoices/del/'.$data['id']); ?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>
            </div></td>
		      </tr>
          <?php endforeach; ?>
        </tbody>
       
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
  $(function () {
    $("#example1").DataTable();
  });
</script> 
<script>
  $("#invoices").addClass('active');
</script>        

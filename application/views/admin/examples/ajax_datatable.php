  
 <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-8">
          <h4><i class="fa fa-list"></i> &nbsp; Datatable - ServerSide Processing (Ajax Base Search & Pagination)</h4>
        </div>
        <div class="col-md-4 text-right">
          <div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url('admin/example/create_users_pdf') ?>" class="btn btn-success">Export as PDF</a>
            <a href="<?= base_url('admin/example/export_csv') ?>" class="btn btn-success">Export as CSV</a>
          </div>
        </div>
        
      </div>
    </div>
  </div>

   <div class="box">
    <div class="box-header">
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="na_datatable" class="table table-bordered table-striped" width="100%">
        <thead>
        <tr>
          <th>#ID</th>
          <th>User Name</th>
          <th>Email</th>
          <th>Mobile No.</th>
          <th>Created Date</th>
          <th>Status</th>
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
      "ajax": "<?=base_url('admin/example/datatable_json')?>",
      "order": [[4,'desc']],
      "columnDefs": [
        { "targets": 0, "name": "id", 'searchable':true, 'orderable':true},
        { "targets": 1, "name": "username", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "email", 'searchable':true, 'orderable':true},
        { "targets": 3, "name": "mobile_no", 'searchable':true, 'orderable':true},
        { "targets": 4, "name": "created_at", 'searchable':false, 'orderable':false},
        { "targets": 5, "name": "is_active", 'searchable':true, 'orderable':true},
      ]
    });
  </script>
  
  


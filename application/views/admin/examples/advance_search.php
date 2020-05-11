  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">


  <section class="content" style="min-height: 0">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-body">
          <div class="col-md-6">
            <h4><i class="fa fa-list"></i> &nbsp; User List with Advanced Serarch Example</h4>
          </div>
          <div class="col-md-6 text-right">
            <div class="btn-group margin-bottom-20"> 
              <a href="<?= base_url('admin/example/create_users_pdf') ?>" class="btn btn-success">Export as PDF</a>
              <a href="<?= base_url('admin/example/export_csv') ?>" class="btn btn-success">Export as CSV</a>
            </div>
          </div>
          
        </div>
      </div>
    </div>

    <div class="box">
        <div class="box-header"></div>
        <div class="box-body table-responsive">  
          <?php echo form_open("/",'id="user_search"') ?>
              <div class="col-md-4">
                  <label>User Type</label><hr style="margin:5px 0px;" />
                  <input checked="checked" onchange="user_filter()" name="user_search_type" value="" type="radio"  /> ALL&nbsp;&nbsp;&nbsp;
                  <input onchange="user_filter()" name="user_search_type" value="1" type="radio"  /> ACTIVE&nbsp;&nbsp;&nbsp;
                  <input onchange="user_filter()" name="user_search_type" value="0" type="radio"  /> INACTIVE
              </div>
              <div class="col-md-3">
                  <label>Date From:</label><input name="user_search_from" type="text" class="form-control form-control-inline input-medium datepicker" id="" />
              </div>
              <div class="col-md-3"> 
                  <label>Date To:</label><input name="user_search_to" type="text" class="form-control form-control-inline input-medium datepicker" id="" /> 
              </div>
              <div class="col-md-2"> 
                  <button type="button" style="margin-top:20px;" onclick="user_filter()" class="btn btn-info">Submit</button>
                  <a href="<?= base_url('admin/example/advance_search'); ?>" class="btn btn-danger" style="margin-top:20px;">
                    <i class="fa fa-repeat"></i>
                  </a>
              </div>
          <?php echo form_close(); ?>
      </div>
    </div>  
</section>

 <section class="content">
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

  <!-- bootstrap datepicker -->
  <script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
  <script>
    $('.datepicker').datepicker({
      autoclose: true
    });
  </script>
  <!-- DataTables -->
  <script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script>
  //---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
      "processing": true,
      "serverSide": true,
      "ajax": "<?=base_url('admin/example/advance_datatable_json')?>",
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

  //---------------------------------------------------
  function user_filter()
  {
    var _form = $("#user_search").serialize();
    $.ajax({
        data: _form,
        type: 'post',
        url: '<?php echo base_url();?>admin/example/search',
        async: true,
        success: function(output){
            table.ajax.reload( null, false );
        }
    });
  }
  </script>
  
  


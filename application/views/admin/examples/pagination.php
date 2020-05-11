 
 <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-list"></i> &nbsp; User List with Pagination Example</h4>
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
    <div class="box-header">
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
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
        <tbody>
          <?php $i=0; foreach($all_users as $row): ?>
          <tr>
            <td><?= ++$i; ?></td>
            <td><?= $row['username']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['mobile_no']; ?></td>
            <td><?= date_time($row['created_at']) ?></td>
            <td><input type="checkbox" class="tgl-ios" <?= ($row['is_active'] == 1)? "checked" : ""; ?>><label for=""></label></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
       
      </table>
      <br>
      <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
      </div>
    </div>

    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>  
  
<script>
$("#view_users").addClass('active');
</script>        

<section class="content-header">

	<div class="row">

	    <div class="col-md-12">

	      <div class="box box-body">

	        <div class="col-md-6">

	          <h4><i class="fa fa-list"></i> &nbsp; Admin Roles & Permissions</h4>

	        </div>

	        <div class="col-md-6 text-right">

	          <a href="<?= base_url('admin/admin_roles/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Role</a>

	        </div>

	      </div>

	    </div>

	</div> 

	<div class="box">

        <div class="box-header">

        </div>

		<div class="box-body">

			<table id="example2" class="table table-bordered table-hover">

				<thead>

					<tr>

						<th width="50">ID</th>

						<th>Admin Role</th>

						<th width="100">Status</th>

						<th width="100">Permission</th>

						<th width="100">Action</th>

					</tr>

				</thead>

				<tbody>

					<?php foreach($records as $record): ?>

					<tr>

						<td><?php echo $record['admin_role_id']; ?></td>

						<td><?php echo $record['admin_role_title']; ?></td>

						<td><input class='tgl tgl-ios tgl_checkbox' 

							data-id="<?php echo $record['admin_role_id']; ?>" 

							id='cb_<?=$record['admin_role_id']?>' 

							type='checkbox' <?php echo ($record['admin_role_status']==1)? "checked" : ""; ?> />

							<label class='tgl-btn' for='cb_<?=$record['admin_role_id']?>'></label>

						</td>

						<td>
							
							<?php if(!in_array($record['admin_role_id'],array(1))): ?>

							<a href="<?php echo site_url("admin/admin_roles/access/".$record['admin_role_id']); ?>" class="btn btn-info btn-xs mr5" >

							<i class="fa fa-sliders"></i>

							</a>

							<?php endif; ?>

						</td>

						<td>

                            <?php if(!in_array($record['admin_role_id'],array(1))): ?>

							<a href="<?php echo site_url("admin/admin_roles/edit/".$record['admin_role_id']); ?>" class="btn btn-warning btn-xs mr5" >

							<i class="fa fa-edit"></i>

							</a>

							<a href="<?php echo site_url("admin/admin_roles/delete/".$record['admin_role_id']); ?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>

							<?php endif;?>

                        </td>

					</tr>

					<?php endforeach; ?>

				</tbody>

			</table>

		</div>

	</div>

</section>

<!-- /.content -->



<script>

	$("body").on("change",".tgl_checkbox",function(){

		$.post('<?=base_url("admin/admin_roles/change_status")?>',

		{

			'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',	

			id : $(this).data('id'),

			status : $(this).is(':checked') == true ? 1:0

		},

		function(data){

			$.notify("Status Changed Successfully", "success");

		});

	});



</script>
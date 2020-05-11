<section class="content-header">
	<div class="row">
	    <div class="col-md-12">
	      <div class="box box-body">
	        <div class="col-md-6">
	          <h4><i class="fa fa-plus"></i> &nbsp; Add New Role</h4>
	        </div>
	        <div class="col-md-6 text-right">
	        	<a href="#" onclick="window.history.go(-1); return false;" class="btn btn-primary pull-right"><i class="fa fa-reply mr5"></i> Back</a>
	        </div>
	      </div>
	    </div>
	</div> 
	<div class="box">
		<div class="box-header">
		</div>
		<div class="box-body">
			<?php echo form_open(base_url('admin/admin_roles/add'), 'id="frmvalidate"');  ?> 
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Admin Role</label>
                                <input class="form-control" type="text" name="admin_role_title" value="<?=isset($record['admin_role_title'])?$record['admin_role_title']:''?>" required="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Admin Role Status</label>
                                <div class="radio">
                                    <label>
                                    <input type="radio" name="admin_role_status"  value="1" <?php if(isset($record['admin_role_status']) && $record['admin_role_status']==1 ){echo 'checked';}?> checked="checked">
                                    Active
                                    </label>
                                    &nbsp;&nbsp;
                                    <label>
                                    <input type="radio" name="admin_role_status"  value="0" <?php if(isset($record['admin_role_status']) && $record['admin_role_status']==0 ){echo 'checked';}?>>
                                    Inactive
                                    </label>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="submit" value="submit"  />
                    <button type="submit" class="btn btn-success pull-right">Submit</button>
                </div>
            <?php echo form_close(); ?>
		</div>
	</div>
</section>

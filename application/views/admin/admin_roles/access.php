<section class="content-header">
	<div class="row">
	    <div class="col-md-12">
	      <div class="box box-body">
	        <div class="col-md-6">
	          <h4><i class="fa fa-list"></i> &nbsp; Admin Permission</h4>
	        </div>
	        <div class="col-md-6 text-right">
	        	<a href="#" onclick="window.history.go(-1); return false;" class="btn btn-primary pull-right"><i class="fa fa-reply mr5"></i> Back</a>
	        </div>
	      </div>
	    </div>
	</div> 
	<div class="box">
		<div class="box-header">
			<div class="row">
            	<div class="col-sm-12">
                    <h3 class="box-title">
                        <span class="mr5">Permission Access : </span> 
						<?=strtoupper($record['admin_role_title'])?>
                    </h3>
                </div>
            </div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<?php foreach($modules as $kk => $module): ?>
					<div class="col-md-12">
						<div class="row">
                        	<div class="col-sm-3">
                        		<h5 class="m-0">
                                	<strong class="f-16"><?=$module['module_name']?></strong>
                                </h5>
							</div>
                            <div class="col-sm-9">
								<?php foreach(explode("|",$module['operation']) as $k => $operation):?>
                                    <div class="col-sm-3 pb-15">	
                                        <span class="pull-left">
                                            <input type='checkbox'
                                            class='tgl tgl-ios tgl_checkbox'
                                            data-module='<?= $module['controller_name'] ?>'
                                            data-operation='<?= $operation; ?>'
                                            id='cb_<?=$kk.$k?>' 
                                            <?php if (in_array($module['controller_name'].'/'.$operation, $access)) echo 'checked="checked"';?>
                                            />
                                            <label class='tgl-btn' for='cb_<?=$kk.$k?>'></label> 
                                        </span>
                                        <span class="mt-15 pl-10">
											<?=ucwords($operation)?>
                                        </span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <hr style="margin:7px 0px;" />
					</div>  
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>


<script>
$("body").on("change",".tgl_checkbox",function(){
	$.post('<?=base_url("admin/admin_roles/set_access")?>',
	{
		'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		module : $(this).data('module'),
		operation : $(this).data('operation'),
		admin_role_id : <?=$record['admin_role_id']?>,
		status : $(this).is(':checked')==true?1:0
	},
	function(data){
		$.notify("Status Changed Successfully", "success");
	});
});
</script>



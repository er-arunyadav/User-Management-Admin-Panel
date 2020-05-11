<style type="text/css">
	#file-upload {
	    position: absolute;
	    left: -9999px;
	}
	label[for="file-upload"]{
	  padding:1em;  
	  display:inline-block;
	  background:#064D06;
	  color: #fff;
	  cursor:pointer;
	  &:hover{color:#fff}
	}
	.btn-upload{
		padding:1em;  
	  	display:inline-block;
	  	background:#011401;
	  	color: #fff;
	  	cursor:pointer;
	  	margin-left: -5px;
	  	border: 0;
	}
	#filename{
	  padding:1em;
	  float:left;
	  width:380px;
	  white-space: nowrap;
	  overflow:hidden;
	  color: #fff;
	  background:#3c763d;
	}
</style>

 <section class="content">
 	<div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-file"></i> &nbsp; File Upload Example</h4>
        </div>  
      </div>
    </div>
  </div>
	<div class="box">
        <div class="box-header"></div>
        <div class="box-body table-responsive">
			<p class="lead">No Plugins </p>
			<!-- Upload  -->

			<?php if(!empty($error)):
				echo '<span class="alert alert-danger" style="display: block;">';
				 foreach ($error as $item => $value):?>
			    	<?php echo $item;?>: <?php echo $value;?>
			<?php endforeach; echo '</span>'; endif; ?>
			
			<?php echo form_open_multipart('example/file_upload');?>
			  	<span id="filename">Select your file</span>
			    <label for="file-upload">Browse<input type="file" name="userfile" id="file-upload"></label>
			    <input type="submit" name="submit" value="Upload" class="btn-upload" />
			    <p><small class="text-success">Allowed Types: gif, jpg, png, jpeg, pdf</small></p>
			<?php echo form_close(); ?>

			<?php if(!empty($upload_data)):
				echo '<br><h3>Uploaded File Detail: </h3>';
				 foreach ($upload_data as $item => $value):?>
			    <li><?php echo $item;?>: <?php echo $value;?></li>
			<?php endforeach; endif; ?>

		</div>	
	</div>
</section>


<script type="text/javascript">
	$('#file-upload').change(function() {
    var filepath = this.value;
    var m = filepath.match(/([^\/\\]+)$/);
    var filename = m[1];
    $('#filename').html(filename);

});
</script>
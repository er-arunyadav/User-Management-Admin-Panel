<!DOCTYPE html>
<html lang="en">
    <head>
          <title><?=isset($title)?$title:'Login - AdminLite' ?></title>
          <!-- Tell the browser to be responsive to screen width -->
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
          <!-- Bootstrap 3.3.6 -->
          <link rel="stylesheet" href="<?= base_url() ?>public/bootstrap/css/bootstrap.min.css">
          <!-- Theme style -->
          <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/AdminLTE.min.css">
           <!-- Custom CSS -->
          <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/style.css">
           <!-- jQuery 2.2.3 -->
          <script src="<?= base_url() ?>public/plugins/jQuery/jquery-2.2.3.min.js"></script>
       
    </head>
    <body id="login-form">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <div class="login-title">
                        <h3><span>Admin Lite</span></h3>
                    </div>
                    <?php if(validation_errors() !== ''): ?>
                      <div class="alert alert-warning alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                          <?= validation_errors();?>
                          <?= isset($msg)? $msg: ''; ?>
                      </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                          <?=$this->session->flashdata('success')?>
                        </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('warning')): ?>
                        <div class="alert alert-warning">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                          <?=$this->session->flashdata('warning')?>
                        </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                          <?=$this->session->flashdata('error')?>
                        </div>
                    <?php endif; ?>
                    <div class="form-box">
                        <div class="caption">
                        </div>
                        <?php echo form_open(base_url('auth/forgot_password'), 'class="login-form" '); ?>
                            <div class="">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email Address" >
                                <input type="submit" name="submit" id="submit" class="form-control" value="Submit">
                                <p class="text-center"><a href="<?= base_url('auth/login'); ?>">You remember Password? Sign In </a></p>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?= base_url() ?>public/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>public/dist/js/app.min.js"></script>
</html>
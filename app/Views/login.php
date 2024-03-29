<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!-- font css -->
    <link rel="stylesheet" href="<?php echo base_url()?>/templates/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/templates/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/templates/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/templates/vendors/css/vendor.bundle.addons.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="<?php echo base_url()?>/templates/css/style.css?v=<?=mt_rand();?>" id="main-style-link">
    <title>SIPMB</title>

    <style>
    .errors {margin-bottom:0 !important;font-size: 12px;}
    .card.card-body {
      border-color: #ced4da;
    }
    .form-control {
      border-color: #ced4da;
    }
    .input-group-append .input-group-text,
    .input-group-prepend .input-group-text,
    .asColorPicker-trigger .input-group-text {
      border-color: #ced4da;
    }
    </style>
  </head>
<body>

<div class="container mt-3">

<div class="row justify-content-center">
<div class="col-md-12">

  <div class="card bg-primary text-white mb-0 rounded" style="background-color: #56348B !important">
    <div class="card-body">
      <div class="row">
        <div class="col-md-2">
        <img src="<?php echo base_url()?>/images/logo_uap.png" width="80" alt="" title="">
        </div>
        <div class="col-md-10" style="margin-left: -70px;">
        <h1 class="h3 text-white"><?php echo $profil['NAMA']; ?></h1>
        <p class="mb-0"><?php echo $profil['ALAMAT1'].', '.$profil['KOTA'].', Kode Pos: '.$profil['KODE_POS'].', Telp: '.$profil['TELEPON'];?></p>
        </div>
      </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-light py-0" style="background-color: #F9AA2E">
    <div class="container-fluid">
      <ul class="navbar-nav mr-auto">
        <!--<li class="nav-item">
        <a class="nav-link active">[USER : <?php //if(!empty($userlogin)){echo $userlogin;}else{echo 'Guest';}?>]</a>
        </li>-->
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link active"><i class="icon-exclamation"></i> TAHUN PMB [<?php if(!empty($tahunpmb)){echo $tahunpmb;}else{echo "Tahun PMB";}?>]</a>
        </li>
      </ul>
      </div>
    </nav>
  </div><!-- card -->


  <div class="card shadow rounded">
    <div class="card-body">
			  <div class="row justify-content-center">
			    <div class="col-md-4 border shadow-sm p-4">
            <h4>Login</h4>
            <hr>
            <?php if (session()->get('success')): ?>
              <div class="alert alert-success" role="alert">
                <?= session()->get('success') ?>
              </div>
            <?php endif; ?>
            <?php if (isset($validation)): ?>
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors('my_list') ?>
              </div>
              <?php endif; ?>
            <form class="" action="/" id="validation-form123" method="post">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" name="NAMA" id="NAMA" placeholder="Username" value="<?= set_value('NAMA') ?>">
                  <div class="input-group-append">
                      <span class="input-group-text"><i class="icon-user"></i></span>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                    <input type="password" class="form-control" name="PASS" id="PASS" placeholder="Password" value="">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="icon-lock"></i></span>
                    </div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary btn-block">Login</button>
               
            </form>
          </div>
        </div>
    </div>
  </div>

</div>
</div>


<div id="foot_container" class="py-3">
		<p class="text-center">&copy; <?php echo $profil['NAMA'];?></p>
	</div>

</div>


<!-- plugins:js -->
<script src="<?php echo base_url()?>/templates/vendors/js/vendor.bundle.base.js"></script>
<script src="<?php echo base_url()?>/templates/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="<?php echo base_url()?>/templates/js/template.js"></script>
<!-- endinject -->
<!--<script src="<?php //echo base_url()?>/templates/vendors/sweetalert2/sweetalert2.all.min.js"></script>
<?php //if (session()->get('error')): ?>
<script>
   const Toast = Swal.mixin({
		toast: true,
		position: 'top',
		showConfirmButton: true,
		timer: 5000
		});

		Toast.fire({
        icon: 'error',
        title: "&nbsp; <?//= session()->get('error') ?>"
      })
</script>
<?php //endif; ?>

<?php //if (session()->get('success')): ?>
<script>
   const Toast = Swal.mixin({
		toast: true,
		position: 'top',
		showConfirmButton: true,
		timer: 5000
		});

		Toast.fire({
        icon: 'success',
        title: "&nbsp; <?//= session()->get('success') ?>"
      })
</script>
<?php //endif; ?>-->

<script>
'use strict';
$(document).ready(function() {
    $(function() {

        $('#validation-form123').validate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {
                'NAMA': {
                    required: true,
                },
                'PASS': {
                    required: true,
                    minlength: 4,
                    maxlength: 30
                }
            },

            // Errors //
            errorPlacement: function errorPlacement(error, element) {
                var $parent = $(element).parents('.form-group');

                // Do not duplicate errors
                if ($parent.find('.jquery-validation-error').length) {
                    return;
                }

                $parent.append(
                    error.addClass('jquery-validation-error small form-text invalid-feedback')
                );
            },
            highlight: function(element) {
                var $el = $(element);
                var $parent = $el.parents('.form-group');

                $el.addClass('is-invalid');

                // Select2 and Tagsinput
                if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
                    $el.parent().addClass('is-invalid');
                }
            },
            unhighlight: function(element) {
                $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
            }
        });
    });
});

</script>

</body>
</html>
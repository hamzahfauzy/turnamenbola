<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Daftar</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= routeTo('assets/img/main-logo.png')?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?=routeTo('assets/js/plugin/webfont/webfont.min.js')?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?=routeTo('assets/css/fonts.min.css')?>']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
    <style>
        span{
            font-size: x-small;
        }
    </style>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?=routeTo('assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?=routeTo('assets/css/atlantis.min.css')?>">
</head>
<body style="min-height:auto;">
	<div class="container">
        <div class="row mt-4">
            <div class="col-sm-12 col-md-6 col-lg-4 mx-auto">
                <div class="card full-height">
                   
                    <div class="card-body">
                        <center>
                            <img src="<?=routeTo('assets/img/main-logo.png')?>" width="150px" height="100px" alt="logo" style="object-fit:contain;">
                        </center>
                        <div class="card-title text-center">Registration Form</div>
                        <div class="card-category text-center">Masukkan Nama, Username dan Password anda pada bidang di bawah ini.</div>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Jenis Registration</label>
                                <select name="jenis_user" class="form-control mb-2" id="jenis_user">
                                    <option value="">Pilih</option>
                                    <option value="team">Team</option>
                                    <option value="tournament">Tournament</option>
                                </select>


                                <label for="">Nama Team</label>
                                <input type="text" name="name" id="" class="form-control mb-2" placeholder="Nama Disini...">
                               
                                <label for="">Username </label> <span class="text-bold"> (Tanpa spasi)</span>
                                <input type="text" name="username" id="" class="form-control mb-2" placeholder="Username Disini...">
                                
                                <label for="">Kata Sandi</label>
                                <input type="password" name="password" id="" class="form-control mb-2" placeholder="Kata Sandi Disini...">
                                
                                <button class="btn btn-primary btn-block btn-round">Masuk</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
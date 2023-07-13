<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Jadwal Pertandingan</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?=asset('assets/img/main-logo.png')?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?=asset('assets/js/plugin/webfont/webfont.min.js')?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?=asset('assets/css/fonts.min.css')?>']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?=asset('assets/css/bootstrap.min.css')?>">
</head>
<body>
    <div class="container">
        <center>
            <img src="<?=asset('assets/img/main-logo.png')?>" alt="" width="100px">
            <h2>Jadwal Pertandingan</h2>
        </center>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th width="100">
                            <a href="<?=routeTo('schedules/index',['date' => $prev])?>" class="btn btn-default">
                                <i class="fas fa-arrow-left"></i> Sebelumnya
                            </a>
                        </th>
                        <th style="vertical-align:middle">
                            <center>
                                <?=$isToday ? 'Hari ini' : date('d-m-Y', strtotime($date))?>
                            </center>
                        </th>
                        <th width="100">
                            <a href="<?=routeTo('schedules/index',['date' => $next])?>" class="btn btn-default">
                                Selanjutnya <i class="fas fa-arrow-right"></i>
                            </a>
                        </th>
                    </tr>
                </table>

                <?php foreach($tournaments as $tournament): ?>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th colspan="3"><?=$tournament->name?></th>
                    </tr>
                    <?php if(empty($tournament->matches)): ?>
                    <tr>
                        <td colspan="3"><i>Tidak ada jadwal.</i></td>
                    </tr>
                    <?php endif ?>
                    <?php foreach($tournament->matches as $match): ?>
                    <tr style="cursor:pointer" onclick="document.querySelector('#match-<?=$match->id?>').click()">
                        <td width="45%" align="right">
                            <b><?=$match->home->name?></b>
                            <img src="<?=asset($match->home->logo)?>" alt="<?=$match->home->name?>" width="30px" height="30px" style="object-fit:contain">
                        </td>
                        <td width="10%" align="center">
                            <a href="<?=routeTo('schedules/detail',['id' => $match->id])?>" id="match-<?=$match->id?>"> - </a> 
                        </td>
                        <td width="45%">
                            <img src="<?=asset($match->away->logo)?>" alt="<?=$match->away->name?>" width="30px" height="30px" style="object-fit:contain">
                            <b><?=$match->away->name?></b>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</body>
</html>

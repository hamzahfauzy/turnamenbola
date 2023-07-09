<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header <?=config('theme')['panel_color']?>">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Buat Team Skuat</h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data skuat</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="<?=routeTo('teams/index')?>" class="btn btn-warning btn-round">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <input type="id_card_number" name="id_card_number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="gender" id="" class="form-control">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" name="birthdate" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">No Hp</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="address" class="form-control" >
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Posisi</label>
                                    <select name="position" id="" class="form-control">
                                        <option value="Coach">Coach</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Official">Official</option>
                                        <option value="GK">GK</option>
                                        <option value="DEFF">DEFF</option>
                                        <option value="MID">MID</option>
                                        <option value="ATTACK">ATTACK</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Pas Foto</label>
                                    <input type="file" name="pic_url" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Foto KTP</label>
                                    <input type="file" name="id_card_pic" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>
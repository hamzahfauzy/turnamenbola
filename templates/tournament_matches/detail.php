<?php load_templates('layouts/top') ?>
<div class="content">
    <div class="panel-header <?=config('theme')['panel_color']?>">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Detail Pertandingan</h2>
                    <h5 class="text-white op-7 mb-2">Memanajemen data pertandingan</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a href="<?=routeTo('crud/index?table=tournament_matches')?>" class="btn btn-warning btn-round">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row row-card-no-pd">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive table-hover table-sales">
                            <table>
                                
                                <tr>
                                    <td valign="top" width="230px">Tournament</td>
                                    <td valign="top" width="25px">:</td> 
                                    <td><?= $data->nama_turnamen ?></td> 
                                </tr>
                                <tr>
                                    <td valign="top" width="130px">Grup</td>
                                    <td valign="top" width="25px">:</td> 
                                    <td><?= $data->nama_grup ?></td> 
                                </tr>
                                <tr>
                                    <td valign="top" width="130px">Team Tuan Rumah</td>
                                    <td valign="top" width="25px">:</td> 
                                    <td><?= $data->team_home ?></td> 
                                </tr>
                                <tr>
                                    <td valign="top" width="130px">Team Tamu</td>
                                    <td valign="top" width="25px">:</td> 
                                    <td><?= $data->team_away ?></td> 
                                </tr>
                                <tr>
                                    <td valign="top" width="130px">Skor Team Tuan Rumah</td>
                                    <td valign="top" width="25px">:</td> 
                                    <td><?= $data->score_home ?></td> 
                                </tr>
                                <tr>
                                    <td valign="top" width="130px">Skor Team Tamu</td>
                                    <td valign="top" width="25px">:</td> 
                                    <td><?= $data->score_away ?></td> 
                                </tr>
                                <tr>
                                    <td valign="top" width="130px">Match Status</td>
                                    <td valign="top" width="25px">:</td> 
                                    <td><?= $data->match_status ?></td> 
                                </tr>
                                <tr>
                                    <td valign="top" width="130px">Deskripsi</td>
                                    <td valign="top" width="25px">:</td> 
                                    <td><?= $data->description ?></td> 
                                </tr>
                                <tr>
                                    <td valign="top" width="130px">Lapangan</td>
                                    <td valign="top" width="25px">:</td> 
                                    <td><?= $data->venue ?></td> 
                                </tr> 
                            </table>
                            <div class="mt-4">

                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="tournament_id" value="<?=$data->tournament_id?>" id="">
                                    <input type="hidden" name="match_id" value="<?=$data->id?>" id="">

                                    <?php 
                                        $label = 'Persons';
                                        $field = 'person_id';
                                    ?>
                                    <div class="form-group">
                                        <label for=""><?=$label?></label>
                                        <select name="<?=$field?>" id="<?=$field?>" class="form-control">
                                        <option value="">Pilih Person</option>
                                        <?php foreach($persons as $p){ ?>
                                            <option value="<?=$p->id?>"><?=$p->name?></option>
                                        <?php } ?>   
                                        </select>
                                    </div>
                                    
                                    <?php 
                                        $label = 'Team';
                                        $field = 'team_id';
                                    ?>
                                    <div class="form-group">
                                        <label for=""><?=$label?></label>
                                        <select name="<?=$field?>" id="<?=$field?>" class="form-control">
                                        <option value="">Pilih Team</option>
                                        <?php foreach($teams as $t){ ?>
                                            <option value="<?=$t->id?>"><?=$t->name?></option>
                                        <?php } ?>   
                                        </select>
                                    </div>
                                    
                                    <?php 
                                        $label = 'Status';
                                        $field = 'stats_type';
                                    ?>
                                    <div class="form-group">
                                        <label for=""><?=$label?></label>
                                        <select name="<?=$field?>" id="<?=$field?>" class="form-control">
                                            <option value="Goal">Goal</option>
                                            <option value="Assist">Assist</option>
                                            <option value="Yellow">Yellow</option>
                                            <option value="Red">Red</option>
                                            <option value="Og">Og</option>
                                        </select>
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
    </div>
</div>
<?php load_templates('layouts/bottom') ?>
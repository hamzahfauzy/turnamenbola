<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header <?=config('theme')['panel_color']?>">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold"><?=__('Team')?></h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data <?=__('team')?></h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="<?=routeTo('teams/create')?>" class="btn btn-secondary btn-round">Buat <?=__('Team')?></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="ml-md-auto py-2 py-md-0">
                            <?php
                                if(isset($team_tournament->status) == "Verified" && $team_tournament->status == "Verified"){?>
                                   <a href="<?=routeTo('teams/create-skuad')?>" class="btn btn-primary btn-round">Atur Skuad Team</a>
                            <?php  }

                          
                            ?>
                                
                            </div>
                            <?php if($success_msg): ?>
                                <div class="alert alert-success"><?=$success_msg?></div>
                                <?php endif ?>
                                <div class="table-responsive table-hover table-sales">
                                
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <th>Nama Tim</th>
                                            <th>Alamat</th>
                                            <th>No Hp</th>
                                            <th>Logo</th>
                                            <th class="text-right">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($datas as $index => $data): ?>
                                        <tr>
                                            <td>
                                                <?=$index+1?>
                                            </td>
                                            <td><?=$data->name?></td>
                                            <td><?=$data->address?></td>
                                            <td><?=$data->phone?></td>
                                            <td><a href="<?= asset($data->logo)?>" target="_blank">Lihat File</a></td>
                                            <td>
                            
                                                <a href="<?=routeTo('teams/edit',['id'=>$data->id])?>" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                <a href="<?=routeTo('teams/delete',['id'=>$data->id])?>" onclick="if(confirm('apakah anda yakin akan menghapus data ini ?')){return true}else{return false}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>
<?php load_templates('layouts/top');

$match_color = "secondary";

switch ($data->match_status) {
    case "Sedang Berlangsung":
        $match_color = "success";
        break;
    case "Selesai":
        $match_color = "warning";
    case "Pertandingan Selesai":
        $match_color = "danger";
        break;
}
?>
<div class="content">
    <div class="panel-header <?= config('theme')['panel_color'] ?>">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Detail Pertandingan</h2>
                    <h5 class="text-white op-7 mb-2">Memanajemen data pertandingan</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a href="<?= routeTo('crud/index?table=tournament_matches') ?>" class="btn btn-warning btn-round">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row">
            <div class="col">
                <div class="card card-body text-center">
                    <h3><?= $data->nama_turnamen ?></h3>
                    <h3><?= $data->nama_grup ?></h3>
                    <h4><?= date("l, d F Y | H:i T", strtotime($data->schedule_at)) ?></h4>

                    <div class="d-flex justify-content-around align-items-center py-5">
                        <div class="flex-1">
                            <h2><?= $data->team_home ?></h2>
                            <?php if ($data->match_status != "Pertandingan Selesai") : ?>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#event-home">Event</button>
                            <?php endif ?>
                            <!-- Modal -->
                            <div class="modal fade text-left" id="event-home">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form class="modal-content" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Player</label>
                                                <select name="player_id" class="form-control">
                                                    <option value="-" readonly> - Pilih Player -</option>
                                                    <?php foreach ($home_players as $player) : ?>
                                                        <option value="<?= $player->person_id ?>"> (<?= $player->position ?>) <?= $player->person->name ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="-" readonly> - Pilih Status -</option>
                                                    <option>Goal</option>
                                                    <option>Assist</option>
                                                    <option>Yellow</option>
                                                    <option>Red</option>
                                                    <option>Own Goal</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Waktu</label>
                                                <input type="text" name="time" class="form-control">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button name="match_event" value="home" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="flex-1">
                            <h2><span><?= $data->score_home ?></span> : <span><?= $data->score_away ?></span></h2>
                            <div class="badge badge-<?= $match_color ?> mx-auto mt-2"><?= count($recent_match_time_log) ? $recent_match_time_log[0]->value->status . " " . $data->match_status : '' ?></div>

                        </div>

                        <div class="flex-1">
                            <h2><?= $data->team_away ?></h2>
                            <?php if ($data->match_status != "Pertandingan Selesai") : ?>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#event-away">Event</button>
                            <?php endif ?>

                            <!-- Modal -->
                            <div class="modal fade text-left" id="event-away">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form class="modal-content" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Player</label>
                                                <select name="player_id" class="form-control">
                                                    <option value="-" readonly> - Pilih Player -</option>
                                                    <?php foreach ($away_players as $player) : ?>
                                                        <option value="<?= $player->person_id ?>"> (<?= $player->position ?>) <?= $player->person->name ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="-" readonly> - Pilih Status -</option>
                                                    <option>Goal</option>
                                                    <option>Assist</option>
                                                    <option>Yellow</option>
                                                    <option>Red</option>
                                                    <option>Own Goal</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Waktu</label>
                                                <input type="text" name="time" class="form-control">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button name="match_event" value="away" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>

                        <?php if ($data->match_status == "Pertandingan Selesai") : ?>
                        <?php elseif (in_array($data->match_status, ['Selesai', null])) : ?>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#match-time-start">Start</button>
                        <?php else : ?>
                            <form method="post">
                                <button name="match_time" value="stop" class="btn btn-warning">Stop</button>
                                <button name="match_time" value="finish" class="btn btn-danger">Selesai</button>
                            </form>
                        <?php endif ?>

                        <!-- Modal -->
                        <div class="modal fade text-left" id="match-time-start">
                            <div class="modal-dialog modal-dialog-centered">
                                <form class="modal-content" method="post">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="-" readonly> - Pilih Status -</option>
                                                <option>Babak Pertama</option>
                                                <option>Babak Kedua</option>
                                                <option>Babak Tambahan 1</option>
                                                <option>Babak Tambahan 2</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button name="match_time" value="start" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <table class="table table-striped">
                        <?php foreach ($match_log as $log) : ?>
                            <tr class="d-flex align-items-center justify-content-center">
                                <td class="flex-1 text-right">
                                    <?php if ($log->type == 'match_event' && $log->value->match_event == 'home') : ?>
                                        <div class="d-flex align-items-center justify-content-end h-100">
                                            <div class="mr-3">
                                                <span><?= $log->value->player->name ?></span>
                                                <br>
                                                <span><?= $log->value->status ?> </span>
                                            </div>
                                            <h3 style="flex-basis:30px"><?= $log->value->time ?>'</h3>
                                        </div>

                                    <?php endif ?>
                                </td>
                                <td class="flex-1 text-center h-100">
                                    <?php if ($log->type == 'match_time') : ?>
                                        <!-- <h4 class="m-0"><?= date("H:i", strtotime($log->time)) ?></h4> -->
                                        <h5 class="m-0"><?= nl2br($log->value->label) ?></h5>
                                    <?php endif ?>
                                </td>
                                <td class="flex-1 text-left">
                                    <?php if ($log->type == 'match_event' && $log->value->match_event == 'away') : ?>
                                        <div class="d-flex align-items-center justify-content-start h-100">
                                            <h3 style="flex-basis:30px"><?= $log->value->time ?>'</h3>
                                            <div class="ml-3 flex-1">
                                                <span><?= $log->value->player->name ?></span>
                                                <br>
                                                <span><?= $log->value->status ?> </span>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php load_templates('layouts/bottom') ?>
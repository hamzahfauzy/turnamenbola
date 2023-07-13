<?php 
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
<div class="card card-body text-center">
    <h3><?= $data->nama_turnamen ?></h3>
    <h3><?= $data->nama_grup ?></h3>
    <h4><?= date("l, d F Y | H:i T", strtotime($data->schedule_at)) ?></h4>

    <div class="d-flex justify-content-around align-items-center py-5">
        <div class="flex-even">
            <img src="<?=asset($data->team_home_logo)?>" alt="<?= $data->team_home ?>" width="100px" height="100px" style="object-fit:contain">
            <h2><?= $data->team_home ?></h2>
        </div>

        <div class="flex-even">
            <h2><span><?= $data->score_home ?></span> : <span><?= $data->score_away ?></span></h2>
            <div class="badge badge-<?= $match_color ?> mx-auto mt-2"><?= count($recent_match_time_log) ? $recent_match_time_log[0]->value->status . " " . $data->match_status : '' ?></div>

        </div>

        <div class="flex-even">
            <img src="<?=asset($data->team_away_logo)?>" alt="<?= $data->team_away ?>" width="100px" height="100px" style="object-fit:contain">
            <h2><?= $data->team_away ?></h2>
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
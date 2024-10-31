<?= $this->extend( theme_path('user/__layout/base') ) ?>

<?= $this->section("content") ?>

<div class="content d-flex align-items-center justify-content-between">
    <h3 class="content-title "> <?= esc( $title ) ?> - <?= pirate_format_stars_status($status, true) ?> </h3>

   <div>
       Filter by:
       <?= form_dropdown([
               'class' => 'form-control d-inline w-auto',
               'options' => [
                        'all' => 'all',
                        'credited' => 'credited',
                        'pending' => 'pending',
                        'rejected' => 'rejected',
               ],
            'onchange' => 'stars_log_status_changed(this)',
            'selected' => $status
       ]) ?>
   </div>


</div>

<div class="content">

    <table class="table" id="datatable" >
        <thead>
        <tr>
            <th>#</th>
            <th> <?= lang("User/StarsLog.tbl_type") ?> </th>
            <th> <?= lang("User/StarsLog.tbl_stars") ?> </th>
            <th class="text-center"> <?= lang("User/StarsLog.tbl_status") ?> </th>
        </tr>
        </thead>
        <tbody>

            <?php foreach ($earnings as $k => $earn) :  ?>

            <tr class="<?= $earn->type == \App\Models\EarningsModel::TYPE_REF_EARN ? 'bg-dark' : '' ?>">
                <td> <?=$k+1?> </td>
                <td> <?= clean_undscr_txt( $earn->type ) ?> </td>
                <td> <?= nf( $earn->stars ) ?> </td>
                <td class="text-center"> <?= pirate_format_stars_status($earn->status) ?> </td>
            </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

</div>

<?= $this->endSection() ?>





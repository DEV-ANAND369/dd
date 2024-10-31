<?=$this->extend(theme_path('user/__layout/base')) ?>

<?=$this->section("content") ?>

<div class="content">
    <h3 class="content-title "> <?=esc($title) ?> </h3>
</div>


<div class="content">
    <table class="table" id="datatable" >
        <thead>
        <tr>
            <th> <?=lang("User/Payouts.tbl_date") ?> </th>
            <th> <?=lang("User/Payouts.tbl_acc_details") ?> </th>
            <th> <?=lang("User/Payouts.tbl_method") ?> </th>
            <th> <?=lang("User/Payouts.tbl_star_val") ?> ( <?=get_currency_code() ?> )</th>
        </tr>
        </thead>

        <tbody>

        <?php foreach ($payouts as $payout): ?>

            <tr>
                <td> <?=format_date_time($payout->updated_at) ?> </td>
                <td> <?=$payout->account_details ?> </td>
                <td> <?=$payout->payment_method ?> </td>
                <td> <?=$payout->money_balance ?>  </td>
            </tr>

        <?php
        endforeach; ?>


        </tbody>
    </table>
</div>



<?=$this->endSection() ?>

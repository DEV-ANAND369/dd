<div class="x_panel">

    <div class="x_content">

        <div class="form-group">
            <span>Last Logged At:&nbsp; </span>
            <?php if(! $user->isFirstLogin()): ?>
            <b> <?= \CodeIgniter\I18n\Time::parse($user->last_logged_at)->humanize() ?></b>
            <?php else: ?>
            <i> user not logged yet </i>
            <?php endif; ?>
        </div>

        <div class="form-group mb-0">
            <span class="">Registered At:&nbsp; </span>
            <b><?= format_date_time($user->created_at, true) ?></b>
        </div>

    </div>
</div>
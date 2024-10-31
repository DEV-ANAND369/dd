<?= $this->extend( theme_path('user/__layout/base') ) ?>

<?= $this->section("content") ?>

<div class="content d-flex align-items-center justify-content-between">
    <h3 class="content-title ">My Links - ( <span class="text-muted">  <?= count( $links ) ?> </span> ) </h3>

    <div>
        <div class="dropdown mr-10">
            <button class="btn" data-toggle="dropdown" type="button" id="dropdown-toggle-btn-1" aria-haspopup="true" aria-expanded="false">
                Status: <span class="text-muted"> <?= ucwords($status) ?> </span>  <i class="fa fa-angle-down ml-5" aria-hidden="true"></i> <!-- ml-5 = margin-left: 0.5rem (5px) -->
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdown-toggle-btn-1">
                <a href="<?= site_url("/user/my-links?type={$type}&status=all") ?>" class="dropdown-item">All</a>
                <a href="<?= site_url("/user/my-links?type={$type}&status=" . \App\Models\LinkModel::STATUS_APPROVED) ?>" class="dropdown-item">Active</a>
                <a href="<?= site_url("/user/my-links?type={$type}&status=" . \App\Models\LinkModel::STATUS_PENDING) ?>" class="dropdown-item">Pending</a>
                <a href="<?= site_url("/user/my-links?type={$type}&status=" . \App\Models\LinkModel::STATUS_REJECTED) ?>" class="dropdown-item">Rejected</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn" data-toggle="dropdown" type="button" id="dropdown-toggle-btn-1" aria-haspopup="true" aria-expanded="false">
              Type: <span class="text-muted"> <?= ucwords($type) ?> </span>  <i class="fa fa-angle-down ml-5" aria-hidden="true"></i> <!-- ml-5 = margin-left: 0.5rem (5px) -->
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdown-toggle-btn-1">
                <a href="<?= site_url("/user/my-links?type=all&status={$status}") ?>" class="dropdown-item">All</a>
                <a href="<?= site_url("/user/my-links?type=" . \App\Models\LinkModel::TYPE_STREAM . "&status={$status}") ?>" class="dropdown-item"> <?= ucwords(\App\Models\LinkModel::TYPE_STREAM) ?></a>
                <a href="<?= site_url("/user/my-links?type=" . \App\Models\LinkModel::TYPE_DIRECT_DL .  "&status={$status}") ?>" class="dropdown-item"> <?= ucwords(\App\Models\LinkModel::TYPE_DIRECT_DL) ?> </a>
                <a href="<?= site_url("/user/my-links?type=" . \App\Models\LinkModel::TYPE_TORRENT_DL . "&status={$status}") ?>" class="dropdown-item"> <?= ucwords(\App\Models\LinkModel::TYPE_TORRENT_DL) ?> </a>

            </div>
        </div>
    </div>
</div>



    <div class="content">


        <table class="table" id="datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>Link</th>
                <th>Type</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($links as $k => $link) : ?>
                <tr>
                    <th> <?= $k+1 ?> </th>
                    <td> <a href="<?= esc( $link->link ) ?>" class="text-light"  target="_blank">
                            <?= esc( $link->link ) ?>
                        </a>
                    </td>
                    <td>
                        <span class="badge"> <?= $link->type ?> </span>
                    </td>
                    <td>
                        <span class="badge"><?= theme_format_links_stats( $link->status ) ?></span>
                    </td>
                    <td>
                       <span class="text-muted"> <?= format_date_time( $link->created_at ) ?> </span>
                    </td>
                    <td>
                        <a class="font-weight-semi-bold" href="<?= site_url("/user/links/redirect?id=" . encode_id($link->movie_id)) ?>">
                            Get Movie
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>

    </div>



<?= $this->endSection() ?>






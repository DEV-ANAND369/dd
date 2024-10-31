<?= $this->extend( theme_path('user/__layout/base') ) ?>

<?= $this->section("content") ?>

    <div class="content">
        <h3 class="content-title ">Recommended TV Shows  <span class="text-muted">to Add Links</span> </h3>
    </div>

<?php if(! empty($series)): ?>

    <div class="content">


        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Imdb ID</th>
                <th>Title</th>
                <th class="text-right">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($series as $k => $show) : ?>
                <tr>
                    <th> <?= $k+1 ?> </th>
                    <td> <a href="https://www.imdb.com/title/<?= $show->imdb_id ?>" class="text-muted" target="_blank">
                            <?= $show->imdb_id ?>
                        </a>
                    </td>
                    <td>
                        <a href="<?= $show->getViewLink(true) ?>" class="text-light">
                            <?= esc( $show->title ) ?>
                        </a>
                    </td>
                    <td class="text-right font-weight-semi-bold">
                        <a href="<?= site_url("/user/series/view/" . encode_id($show->id)) ?>">View it</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

<?php endif; ?>

<?= $this->endSection() ?>
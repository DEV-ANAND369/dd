<?= $this->extend( theme_path('user/__layout/base') ) ?>

<?= $this->section("content") ?>

<div class="content">
    <h3 class="content-title ">Recommended Movies  <span class="text-muted">to Add Links</span> </h3>
</div>

<?php if(! empty($movies)): ?>

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

            <?php foreach ($movies as $k => $movie) : ?>
                <tr>
                    <th> <?= $k+1 ?> </th>
                    <td> <a href="https://www.imdb.com/title/<?= $movie->imdb_id ?>" class="text-muted" target="_blank">
                            <?= $movie->imdb_id ?>
                        </a>
                    </td>
                    <td>
                        <a href="<?= $movie->getViewLink(true) ?>" class="text-light">
                            <?= esc( $movie->getMovieTitle() ) ?>
                        </a>
                    </td>
                    <td class="text-right font-weight-semi-bold">
                        <a href="<?= site_url("/user/links/add/" . encode_id( $movie->id )) ?>">Add it</a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>

    </div>

<?php endif; ?>

<?= $this->endSection() ?>

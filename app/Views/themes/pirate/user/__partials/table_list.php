<table class="table" id="<?= $datatable ?  'datatable' : '' ?>" >
    <thead>
    <tr>
        <th>#</th>
        <th><?= lang('User/Dashboard.tbl_title') ?></th>
        <th>Imdb ID</th>
        <th>Tmdb ID</th>
        <th class="text-right"><?= lang('User/Dashboard.tbl_action') ?></th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($movies as $k => $movie) : ?>
        <tr>
            <th> <?= $k+1 ?> </th>
            <td>
                <a href="<?= $movie->getViewLink(true) ?>" class="text-light">
                    <?=  esc( $movie->getMovieTitle() )   ?>
                </a>
            </td>
            <td>  <?= $movie->imdb_id ?? '--' ?>
            </td>
            <td>  <?= $movie->tmdb_id ?? '--' ?>
            </td>
            <td class="text-right font-weight-semi-bold">
                <?php $url = $isMovies ? "/user/links/add/" . encode_id( $movie->id ) : "user/series/view/" . encode_id( $movie->id ) ;  ?>
                <a href="<?= site_url( $url ) ?>">Get it</a>            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>
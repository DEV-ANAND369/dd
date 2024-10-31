<?= $this->extend( theme_path('user/__layout/base') ) ?>

<?= $this->section("content") ?>


<div class="content">
    <h3 class="content-title "><?= esc( $series->title ) ?>  ( <small class="text-muted">TV Show </small> )    </h3>

</div>

<div class="row row-eq-spacing">
    <div class="col-lg-9">
        <div class="card get-episode-card" >
            <h4 class="card-title font-size-18"> Get Episode    </h4>
            <div class="row">
                <div class="col">
                    <div class="form-group mr-15">
                        <label>
                            Season                                        </label>
                        <input type="number" name="season" min="1" class="form-control" placeholder="Ex: 1" required="required">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>
                            Episode                                        </label>
                        <input type="number" name="episode" min="1" class="form-control" placeholder="Ex: 1" required="required">
                    </div>
                </div>
                <?= form_hidden('series_imdb_id', $series->imdb_id) ?>
                <div class="col">
                    <div class="form-group mx-15">
                        <label style="visibility: hidden">
                            Get it                                        </label>
                        <button class="btn btn-primary btn-block w-auto user-get-episode" >
                            <div class="spinner-border mr-5 " role="status" > </div>&nbsp;
                            Get it</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="poster">
            <div class="w-200 mw-full ">
                <div class="card m-0 mb-10 p-5">
                    <img src="<?= poster_uri( $series->poster ) ?>" class="img-fluid w-full" alt="">
                    <div class="p-5">
                        Imdb Id:
                        <span class="badge badge-secondary font-weight-semi-bold float-right">
                            <?= $series->imdb_id ?>
                        </span>
                    </div>
                </div>



            </div>
        </div>

    </div>



</div>





<?php if(! empty($seasons)): ?>

    <div class="content">
        <h3 class="content-title font-size-20"> Episodes List    </h3>
    </div>

    <?php foreach ($seasons as $season => $episodes) :
        if(empty($episodes))   continue;  ?>

        <div class="card mt-0 ">
            <h2 class="card-title font-size-18">
                Season <?= $season ?>
            </h2>

            <nav aria-label="Page navigation example">
                <ul class="pagination">

                    <?php foreach ($episodes as $episode => $data) : ?>

                    <li class="page-item user-get-episode" data-season="<?= $season ?>" data-episode="<?= $episode ?>">
                        <a href="#" class=" page-link font-weight-semi-bold <?= $data['is_ok'] ? 'bg-primary' : '' ?>">
                            <div class="spinner-border mr-5 " role="status" > </div>
                             E<?= sprintf("%02d", $episode) ?>
                        </a>
                    </li>

                    <?php endforeach; ?>

                </ul>
            </nav>

        </div>

    <?php endforeach; ?>
<?php endif; ?>



<?= $this->endSection() ?>

<?= $this->extend( theme_path('__layout/base') ) ?>



<?= $this->section("content") ?>

<div class="container-fluid">

    <div class="row align-items-center">
        <div class="col-auto mx-auto">
            <div class="content mx-15 mt-20 mb-0">
                <h1 class="content-title font-size-36 mb-0 ">
                    <?= esc( $page->title ) ?>
                </h1>
            </div>
        </div>
    </div>

    <div class="content mt-15">

        <div class="row">
            <div class="col-lg-7 mx-auto ">
                <?= $page->content ?>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection() ?>

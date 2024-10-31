<div class="form-group mb-0">
    <div>
        <?= form_label("Link {$k}:") ?>
        <span class="link-status float-right font-size-12">
                                            Status: <?= theme_format_links_stats( $link->status ) ?>
                                        </span>
    </div>
    <div class="input-group mb-0">
        <?= form_input([
            'type'  => 'url',
            'class' => 'form-control link',
            'readonly' => 'readonly',
            'value' => $link->link
        ]) ?>
    </div>
</div>
<div class="row row-eq-spacing px-0 mt-5 mb-0">

    <div class="col">
        <div class="form-group row">
            <label class="control-label col-md-3">Res.:</label>                                <div class="col-md-9">
                <?= form_dropdown([
                    'options' => getResolutionFormatOptions(),
                    'selected' => $link->resolution,
                    'class' => 'form-control form-control-sm resolution',
                    'disabled' => 'disabled'
                ]) ?>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="form-group row">

            <label class="control-label col-md-4">Quality :</label>
            <div class="col-md-8">
                <?= form_dropdown([
                    'options' => getQualityFormatOptions(),
                    'selected' => $link->quality,
                    'class' => 'form-control form-control-sm quality',
                    'disabled' => 'disabled'
                ]) ?>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="form-group row">

            <label class="control-label col-md-3">Size:</label>
            <div class="col-md-9">
                <div class="input-group">

                    <?= form_input([
                        'type'  => 'number',
                        'min'   => 1,
                        'step'  => 'any',
                        'class' => 'form-control form-control-sm size-val',
                        'value' => $link->size_val,
                        'disabled' => 'disabled'
                    ]) ?>

                    <?= form_dropdown([
                        'options' => [
                            'MB' => 'MB',
                            'GB' => 'GB'
                        ],
                        'selected' => $link->size_lbl,
                        'class' => 'form-control form-control-sm dl-size-label',
                        'disabled' => 'disabled'
                    ]) ?>

                </div>

            </div>
        </div>
    </div>

</div>

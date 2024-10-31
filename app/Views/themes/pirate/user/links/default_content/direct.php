<div class="direct-dl-group">
    <div class="form-group mb-0">
        <label>Link 1:</label>
        <div class="input-group mb-0">
            <?= form_input([
                'type'  => 'url',
                'name'  => 'direct_dl_links[1][url]',
                'class' => 'form-control link'
            ]) ?>
        </div>
    </div>
    <div class="row row-eq-spacing px-0 mt-5 mb-0">

        <div class="col">
            <div class="form-group row">
                <label class="control-label col-md-3">Res.:</label>                                <div class="col-md-9">
                    <?= form_dropdown([
                        'name' => "direct_dl_links[1][resolution]",
                        'options' => getResolutionFormatOptions(),
                        'selected' => '',
                        'class' => 'form-control form-control-sm resolution'
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group row">

                <label class="control-label col-md-4">Quality :</label>
                <div class="col-md-8">
                    <?= form_dropdown([
                        'name' => "direct_dl_links[1][quality]",
                        'options' => getQualityFormatOptions(),
                        'selected' => '',
                        'class' => 'form-control form-control-sm quality'
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
                            'name'  => 'direct_dl_links[1][size_val]',
                            'min'   => 1,
                            'step'  => 'any',
                            'class' => 'form-control form-control-sm size-val'
                        ]) ?>

                        <?= form_dropdown([
                            'name' => "direct_dl_links[1][size_lbl]",
                            'options' => [
                                'MB' => 'MB',
                                'GB' => 'GB'
                            ],
                            'selected' => old("direct_dl_links.1.size_lbl", ''),
                            'class' => 'form-control form-control-sm dl-size-label'
                        ]) ?>

                    </div>

                </div>
            </div>
        </div>

    </div>




</div>
<div class="form-group st-group">
    <?= form_label('Link 1:') ?>
    <?= form_input([
        'type' => 'url',
        'name' => 'st_links[1][url]',
        'placeholder' => 'https://my-stream-site.com/watch/xxxxx',
        'class' => 'form-control link'
    ]) ?>

    <?php if(! empty(get_stream_types())): ?>
    <div class="row row-eq-spacing px-0  mt-5 mb-0">
        <div class="col-4 px-0">
            <div class="form-group mb-0 row">
                <label class="control-label col-md-4">Quality :</label>
                <div class="col-md-8">
                    <?= form_dropdown([
                        'name' => "st_links[1][quality]",
                        'options' => get_stream_types(),
                        'selected' => '',
                        'class' => 'form-control form-control-sm quality'
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>



</div>
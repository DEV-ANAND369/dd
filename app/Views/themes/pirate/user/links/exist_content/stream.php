<div>
    <?= form_label("Link {$k}:") ?>
    <span class="link-status float-right font-size-12">
                                Status: <?= theme_format_links_stats( $link->status ) ?>
                                </span>
</div>

<?=
form_input([ 'type' => 'url',
        'placeholder' => 'https://my-stream-site.com/watch/xxxxx',
        'class' => 'form-control link',
        'value' => $link->link,
        'readonly' => 'readonly']
)
?>

<div class="row row-eq-spacing px-0  mt-5 mb-0">
    <div class="col-4 px-0">
        <div class="form-group mb-0 row">
            <label class="control-label col-md-4">Quality :</label>
            <div class="col-md-8">
                <?= form_dropdown([
                    'options' => get_stream_types(),
                    'class' => 'form-control form-control-sm quality',
                    'selected' => $link->quality,
                    'disabled' => 'disabled'
                ]) ?>
            </div>
        </div>
    </div>





</div>

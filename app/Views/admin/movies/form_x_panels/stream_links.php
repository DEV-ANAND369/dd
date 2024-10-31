

<div class="x_title d-flex align-items-center justify-content-between">
    <h2>Stream Links </h2>

    <?php if(! empty($movie->id)): ?>
    <a href="<?= admin_url('/statistics/views?movie=' . $movie->id) ?>">
        <i class="fa fa-line-chart"></i>&nbsp;
        Views Analytics
    </a>
    <?php endif; ?>
</div>


<div class="x_content">

    <div  id="st-group-content">
        <?php if(! empty($streamLinks)): ?>
            <?php foreach ($streamLinks as $key => $link):
                $key += 1; ?>
                <div class="main-form-group st-group">

                    <?= form_label("Link {$key}:", "", ['class'=>'font-weight-bold']) ?>

                    <div class="link-meta-info mb-1">
                        <span class="requests-count">Requests :  <?= $link->requests ?></span>
                        <span class="status float-right">Status : <?= format_links_status( $link->status ) ?> </span>
                    </div>


                    <div class="input-group mb-2">
                        <?php $fields = [
                            'type' => 'url',
                            'name' => "st_links[{$key}][url]",
                            'class' => 'form-control link',
                            'value' => old("st_links.{$key}.url", $link->link)
                        ]; if( $link->isApiBased() ) $fields['readonly'] = 'readonly' ?>
                        <?= form_input($fields) ?>

                        <span class="input-group-btn ml-2 ">
                                <button type="button" class="btn btn-light link-approved mb-0"  <?= is_link_btn_disabled($link, true) ?> >
                                    <i class="fa fa-check"></i>
                                    <span class="spinner-border spinner-border-sm loader" style="display: none" role="status" aria-hidden="true"></span>
                                    <span class="sr-only">Loading...</span>
                                </button>
                                <button type="button" class="btn btn-light text-danger link-rejected mb-0" <?= is_link_btn_disabled($link) ?>>
                                    <i class="fa fa-close"></i>
                                    <span class="spinner-border spinner-border-sm loader" style="display: none" role="status" aria-hidden="true"></span>
                                    <span class="sr-only">Loading...</span>
                                </button>
                            </span>
                    </div>

                    <div class="row">
                        <?php if(! empty(get_stream_types())): ?>
                        <div class="col-lg-4">
                            <div class="form-group row">

                                <?= form_label('Type :', '', ['class'=>'control-label col-md-4']) ?>

                                <div class="col-md-8">

                                    <?= form_dropdown([
                                        'name' => "st_links[{$key}][quality]",
                                        'options' => get_stream_types(),
                                        'selected' => $link->quality,
                                        'class' => 'form-control form-control-sm quality'
                                    ]) ?>

                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-lg-8">
                            <div class="text-right meta-bottom-right">
                                <a  href="<?= esc( $link->link ) ?>" target="_blank"><i class="fa fa-external-link"></i>&nbsp; Open Link</a>
                                <p class="mb-0 d-inline-block ml-3">by&nbsp;
                                    <a href="<?= admin_url('/users/edit/' . $link->user()->id) ?>" class="text-info">
                                        <?= esc( $link->user()->username ) ?>
                                    </a></p>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="st_links[<?= $key ?>][id]" class="link-id" value="<?= $link->id ?>" >
                    <?=  ! empty($link->api_id) ?  form_hidden("st_links[{$key}][api_id]", $link->api_id) : '' ?>


                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <?php for($i = 1; $i <= 2; $i++) : ?>
            <div class="main-form-group st-group">
                <div class="form-group " >
                    <?= form_label("Link {$i}:", '', ['class'=>'font-weight-bold']) ?>
                    <div class="input-group">
                        <?= form_input([
                            'type' => 'url',
                            'name' => "st_links[{$i}][url]",
                            'class' => 'form-control link',
                            'value' => old("st_links.{$i}.url")
                        ]) ?>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <?php if(! empty(get_stream_types())): ?>
                        <div class="form-group row">

                            <?= form_label('Type :', '', ['class'=>'control-label col-md-4']) ?>


                            <div class="col-md-8">

                                <?= form_dropdown([
                                    'name' => "st_links[{$i}][quality]",
                                    'options' => get_stream_types(),
                                    'class' => 'form-control form-control-sm quality'
                                ]) ?>

                            </div>


                        </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>

            <?php endfor; ?>
        <?php endif; ?>
    </div>


    <div class="text-right">
        <button type="button" class="btn btn-light font-weight-bold " id="clone-st-group">
            <i class="fa fa-plus"></i>&nbsp;
            Add more
        </button>
    </div>



</div>
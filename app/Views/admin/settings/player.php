<?php $this->extend( 'admin/__layout/default' ) ?>


<?php $this->section('content') ?>

<div class="row">
    <div class="col-lg-9">

        <?= form_open('/admin/settings/player/update', [ 'method' => 'post', 'class' => 'form-horizontal form-label-left' ] ) ?>

        <div class="x_panel">

            <div class="x_content">

                <div class="form-group row">
                    <label class="control-label col-md-3 pt-0">Autoplay</label>
                    <div class="col-md-9">
                        <div class="checkbox">
                            <label class="mb-0">
                                <?= form_checkbox('player_autoplay','', get_config('player_autoplay')) ?>
                                Enable/ Disable
                            </label>
                        </div>
                        <small>Enable or disable autoplay on player</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 pt-0">Video Title</label>
                    <div class="col-md-9">
                        <div class="checkbox">
                            <label class="mb-0">
                                <?= form_checkbox('player_title','', get_config('player_title')) ?>
                                Show/ Hide
                            </label>
                        </div>
                        <small>Show/ hide title of the video on tool bar</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 pt-0">Home page button</label>
                    <div class="col-md-9">
                        <div class="checkbox">
                            <label class="mb-0">
                                <?= form_checkbox('player_home_page_btn','', get_config('player_home_page_btn')) ?>
                                Show/ Hide
                            </label>
                        </div>
                        <small>Show/ hide home page button of the video on tool bar</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 pt-0">Color dot on server name</label>
                    <div class="col-md-9">
                        <div class="checkbox">
                            <label class="mb-0">
                                <?= form_checkbox('color_dot_on_player_links','', get_config('color_dot_on_player_links')) ?>
                                Show/ Hide
                            </label>
                        </div>
                        <small>Show/ hide color dots on the server links. <br> If it is reported links, we show <i>yellow</i> color and default showing the <i>green color</i> </small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3">Servers limit per group</label>
                    <div class="col-md-9">
                        <?= form_input([
                            'type' => 'number',
                            'name' => 'max_stream_servers_per_group',
                            'class' => 'form-control',
                            'value' => get_config('max_stream_servers_per_group'),
                            'min' => 0
                        ]) ?>
                        <small>You can set a limit on showing server links in each group on the player</small>
                    </div>
                </div>



                <div class="text-right">
                    <?= form_button([
                        'type' => 'submit',
                        'class' => 'btn btn-primary'
                    ], 'update') ?>
                </div>



            </div>
        </div>


        <?= form_close() ?>

    </div>
</div>

<?php $this->endSection() ?>

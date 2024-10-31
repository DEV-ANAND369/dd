<div class="footer text-center">

    <?php if(! empty( footer_txt_content() ) && empty(  lang('Footer.notice') )) : ?>
    <div class="footer-notice  text-muted p-20 pb-0 ">
        <?= esc( footer_txt_content() )  ?>
    </div>
    <?php endif; ?>

    <?php if(! empty( lang('Footer.notice') )) : ?>
        <div class="footer-notice  text-muted p-20 pb-0">
            <?= lang('Footer.notice') ?>
        </div>
    <?php endif; ?>

    <?php $links = get_footer_links();
    if(! empty($links)) : ?>
        <div class="footer-menu mt-20">
            <?php foreach ($links as $link) {
                echo anchor( $link['url'], $link['title'], [
                    'class' => 'text-muted d-inline-block mx-10'
                ]);
            } ?>
        </div>
    <?php endif; ?>

    <div class="copyright py-20">
       <?= ! empty( lang('Footer.copyright') ) ? lang('Footer.copyright') :  esc( site_copyright() ) ?>
    </div>
</div>


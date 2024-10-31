


<!-- Add Links By Imdb Id  -->
<div class="modal" id="add-links-by-imdb-id-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="javascript:void(0)" data-dismiss="modal" class="close" role="button" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
            <h5 class="modal-title">Add Link/s</h5>
            <form action="">
                <div class="form-group mb-10 ">
                    <label class="required">Enter Imdb or Tmdb Id</label>
                    <input type="text" name="imdb_id"  class="form-control" placeholder="tt2432453" required="required">
                    <small class="text-muted"> You should enter movie or series IMDB/ Tmdb id to continue.  </small>

                </div>
                <div class="form-group mb-20 text-right">
                    <label>Select Type: </label>&nbsp;
                    <select name="mtype" class="form-control w-auto d-inline-block ">
                        <option value="movie">Movie</option>
                        <option value="series">Series</option>
                    </select>
                </div>


                <div class="mt-20"> <!-- text-right = text-align: right, mt-20 = margin-top: 2rem (20px) -->
                    <a href="javascript:void(0)" data-dismiss="modal" class="btn mr-5" role="button">Close</a>
                    <a href="javascript:void(0)" class="btn btn-primary float-right" id="user-links-pre-process" role="button">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        Process</a>
                </div>
            </form>
        </div>
    </div>
</div>


<?php //if( service('auth')->isLogged() ){
//    echo $this->include( 'partials/admin_bar' );
//} ?>


<script>

    const BASE_URL = '<?= esc( site_url() ) ?>';
    const EMBED_SLUG = '<?= esc( embed_slug() ) ?>';
    const DOWNLOAD_SLUG = '<?= esc( download_slug() ) ?>';
    const VIEW_SLUG = '<?= esc( view_slug() ) ?>';

    const isAdblockDetectorEnabled = '';

</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="<?= theme_assets('/vendors/datatables/jquery.dataTables.min.js') ?>"></script>

<?php $this->renderSection('scripts'); ?>

<script src="<?= theme_assets('js/template.min.js?v=1.3') ?>"></script>
<script src="<?= theme_assets('js/custom.min.js?v=1.3' . time()) ?>"></script>

<!--footer custom codes-->
<?= footer_custom_codes () ?>

<script>
    $(document).ready( function () {
        if($('#datatable').length === 1){
            $('#datatable').DataTable({
                "pageLength": 25
            });
        }
    } );
</script>


</body>
</html>
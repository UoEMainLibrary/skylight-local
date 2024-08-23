</div> <!--END of ROW - move into col sidebar -->
</div><!--END of container - move into col sidebar -->
<div class="footer">
    <div class="hidden-xs col-md-2 text-center">
        <a href="https://www.ed.ac.uk" title="Link to University of Edinburgh Home Page" target="_blank" href=""  data-toggle="modal" data-target="#newTabNotice" data-href="https://www.ed.ac.uk"> <img
                style="height: 100px; width: 100px; position: relative; margin: 25px auto"
                src="<?php echo base_url() ?>/theme/<?php echo $this->config->item('skylight_theme'); ?>/images/eduni-logo.png"
                alt="University of Edinburgh Logo"></a>
    </div>
    <div class="col-xs-12 col-md-10">
        <ul>
            <li><a href="https://www.ed.ac.uk/about/website/website-terms-conditions">Terms &amp; conditions</a></li>

            <li><a href="https://www.ed.ac.uk/about/website/privacy">Privacy &amp; cookies</a></li>

            <li><a title="Website Accessibility Link" target="_blank" href=""  data-toggle="modal" data-target="#newTabNotice" data-href="./accessibility">Accessibility</a></li>

            <li><a href="https://www.ed.ac.uk/about/website/freedom-information">Freedom of Information Publication
                    Scheme</a></li>

        </ul>

        <p>Hosted by The University of Edinburgh</p>
        <p>Copyright © 2017 Coimbra Group</p>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="newTabNotice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Notice</h4>
            </div>
            <div class="modal-body">
                <p>This link will open in a new tab. Would you like to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button id="openTab" type="button" class="btn btn-primary">Proceed</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#newTabNotice').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var href = button.data('href');
        
        var modal = $(this);
        modal.find('#openTab').off('click').on('click', function () {
            window.open(href, '_blank');
            modal.modal('hide');
        });
    });
</script>

<script src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/js/script.js"></script>
<script
    src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/js/google_map.js"></script>
<script
    src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/js/disable_map_scroll.js"></script>
<script
    src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/js/home_page_slideshow.js"></script>
<script
    src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/js/map_view.js"></script>
<script
    src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/js/visible.js"></script>
</body>

</html>
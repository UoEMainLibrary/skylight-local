<?php

$subject_field = $this->skylight_utilities->getField("Subject");
$bitstream_field = $this->skylight_utilities->getField("Bitstream");
$thumbnail_field = $this->skylight_utilities->getField("Thumbnail");
$filters = array_keys($this->config->item("skylight_filters"));

$numBitstreams = 0;
$bitstreamLinks = array();


?>
<div class="col-md-9 col-sm-9 col-xs-12">
    <h1 class="itemtitle"><?php echo $record_title ?></h1>

<table>
    <tbody>
    <?php foreach($recorddisplay as $key) {

        $element = $this->skylight_utilities->getField($key);
        if(isset($solr[$element])) {
            echo '<tr><th>'.$key.'</th><td>';
            foreach($solr[$element] as $index => $metadatavalue) {
                // if it's a facet search
                // make it a clickable search link
                if(in_array($key, $filters)) {

                    $orig_filter = urlencode($metadatavalue);
                    $lower_orig_filter = strtolower($metadatavalue);
                    $lower_orig_filter = urlencode($lower_orig_filter);

                    echo '<a href="./search/*:*/' . $key . ':%22'.$lower_orig_filter.'%7C%7C%7C'.$orig_filter.'%22">'.$metadatavalue.'</a>';
                }
                else {
                    echo $metadatavalue;
                }
                if($index < sizeof($solr[$element]) - 1) {
                    echo '; ';
                }
            }
            echo '</td></tr>';
        }
    }
    ?>
    </tbody>
</table>

<?php
if(isset($solr[$bitstream_field]) && $link_bitstream) {

    echo '<div class="record_bitstreams">';

    $bitstream_array = array();

    foreach ($solr[$bitstream_field] as $bitstream_for_array)
    {
        $b_segments = explode("##", $bitstream_for_array);
        $b_seq = $b_segments[4];
        $bitstream_array[$b_seq] = $bitstream_for_array;
    }

    ksort($bitstream_array);
    $b_seq =  "";

    foreach($bitstream_array as $bitstream) {
        $mp4ok = false;
        $b_segments = explode("##", $bitstream);
        $b_filename = $b_segments[1];
        $b_handle = $b_segments[3];
        $b_seq = $b_segments[4];
        $b_handle_id = preg_replace('/^.*\//', '',$b_handle);

        if ((strpos($b_filename, ".pdf") > 0) or (strpos($b_filename, ".PDF") > 0))
        {
            $b_uri = './record/'.$b_handle_id.'/'.$b_seq.'/'.$b_filename;
            $bitstreamLink = $this->skylight_utilities->getBitstreamURI($bitstream);
            ?>
            <br>
            <object class="pdfviewer" width="660" height="928" data="<?php echo $b_uri ?>"
                    type="application/pdf">
                <p><span class="label">It appears you do not have a PDF plugin for this browser.</span>
                </p>
            </object>
            <br>
            Click <?php echo '<a href ="'.$bitstreamLink.'" target="_blank">'.$b_filename.'</a>' ?> to download.
            (<span class="bitstream_size"><?php echo getBitstreamSize($bitstream); ?></span>)<br><br>
            <?php
        }
    }
    echo '</div>';
}
    ?>
    <div class="row">
        <button class="btn btn-info" onClick="history.go(-1);"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back to Search Results</button>
    </div>
</div>


<div class="search-facets">
    <?php if (isset($facets)) { //print_r($facets)?>



    <?php foreach ($facets as $facet) {

        $inactive_terms = array();
        $active_terms = array();

        ?>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="./browse/<?php echo $facet['name']; ?>" title="<?php echo $facet['name'] ?>"><?php echo $facet['name'] ?></a>
            </li>
        </ul>

        <?php if(preg_match('/Date/',$base_search) && $facet['name'] == 'Date') {
            $fpattern =  '#\/'.$facet['name'].'.*\]#';
            $fremove = preg_replace($fpattern,'',$base_search, -1);

            $fpattern =  '#\/'.$facet['name'].'.*\%5D#';
            $fremove = preg_replace($fpattern,'',$fremove, -1);
            ?>

            <ul class="selected">
                <li>
                    Clear <?php echo $facet['name']; ?> filters <a class="deselect" href='<?php echo $fremove;?>' title="<?php echo $facet['name'] ?>"></a>
                </li>
            </ul>

        <?php }

        $numterms = 0;
        foreach($facet['terms'] as $term) {

            if($term['active']) {
                $active_terms[] = $term;
            } else {
                $inactive_terms[] = $term;
            }
            $numterms++;
        }

        if(sizeof($active_terms) > 0) { ?>
            <ul class="selected">
                <?php foreach($active_terms as $term) {
                    $pattern =  '#\/'.rawurlencode($facet['name']).':%22'.preg_quote($term['name'],-1).'%22#';
                    $remove = preg_replace($pattern,'',$base_search, -1);
                    ?>
                    <li><?php echo $term['display_name'];?> (<?php echo $term['count']; ?>) <a class="deselect" href='<?php echo $remove;?>' title="Remove <?php echo $term['display_name'] ?>"></a></li>
                    <?php
                }
                ?> </ul> <?php
        }
        ?>
        <ul>
            <?php foreach($inactive_terms as $term) {
                ?>
                <li>
                    <a href='<?php echo $base_search; ?>/<?php echo $facet['name']; ?>:<?php echo '%22'.$term['name'].'%22' ?><?php echo $base_parameters ?>' title="<?php echo $facet['name'] ?>"><?php echo $term['display_name'];?> (<?php echo $term['count']; ?>)
                    </a>
                </li>
                <?php
            }

            foreach($facet['queries'] as $term) {
                $pattern =  '#\/'.rawurlencode($facet['name']).'.*\]#';
                $remove = preg_replace($pattern,'',$base_search, -1);

                $pattern =  '#\/'.rawurlencode($facet['name']).'.*\%5D#';
                $remove = preg_replace($pattern,'',$remove, -1);

                if($term['count'] > 0) {
                    ?>
                    <li>
                        <a class="deselect" href='<?php echo $remove; ?>/<?php echo $facet['name']; ?>:<?php echo $term['name']; ?><?php if(isset($operator)) echo '?operator='.$operator; ?>' title="Remove <?php echo $term['display_name'] ?>"><?php echo $term['display_name'];?> (<?php echo $term['count']; ?>)
                        </a>
                    </li>
                    <?php
                }
            }

            if(empty($facet['terms']) && empty($facet['queries'])) { ?>
                <li>No matches</li>
            <?php }
            else {
                if($numterms == $this->config->item('skylight_facet_limit')) { ?>
                    <li><a href="./browse/<?php echo $facet['name']; ?>" title="More ...">More ...</a></li>
                <?php }
            } ?>
        </ul>
    <?php } ?>
<?php } ?>
</div>
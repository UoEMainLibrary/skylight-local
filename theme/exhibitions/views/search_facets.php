 <?php if (isset($facets)) {?>
    
     <?php foreach ($facets as $facet) {

         $inactive_terms = array();
         $active_terms = array();

         ?>
        <h4 class="accordion" alt="search bar section title"><a alt="dropdown menu on click"><?php echo $facet['name'] ?></a></h4>

        <?php if(preg_match('/Date/',$base_search) && $facet['name'] == 'Date') {
            $fpattern =  '#\/'.$facet['name'].'.*\]#';
            $fremove = preg_replace($fpattern,'',$base_search, -1);
		
            $fpattern =  '#\/'.$facet['name'].'.*\%5D#';
            $fremove = preg_replace($fpattern,'',$fremove, -1);
        ?>

        <ul class="selected" alt="currently selected filter">
            <li>
                Clear <?php echo $facet['name']; ?> filters <a class="deselect" href='<?php echo $fremove;?>' alt="deselect filter on click"></a>
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
        <ul class="selected" alt="currently selected filter">
            <?php foreach($active_terms as $term) {
                //SR May 19
                if (strpos($term['display_name'],"|||") > 0)
                {
                    $term['display_name'] = ucfirst(substr($term['display_name'], strpos($term['display_name'], ' ||| ') + 5, 100));
                }
               $pattern =  '#\/'.rawurlencode($facet['name']).':%22'.preg_quote($term['name'],-1).'%22#';
               $remove = preg_replace($pattern,'',$base_search, -1);
            ?>
            <li><?php echo $term['display_name'];?> (<?php echo $term['count']; ?>) <a class="deselect" href='<?php echo $remove;?>'></a></li>
        <?php
            }
        ?> </ul> <?php
        }
        ?>
        <ul class="panel" alt="list of filters">
        
        <?php foreach($inactive_terms as $term) {
            //SR May 19
            if (strpos($term['display_name'],"|||") > 0)
            {
                $term['display_name'] = ucfirst(substr($term['display_name'], strpos($term['display_name'], ' ||| ') + 5, 100));
            }?>
                <li class="siderbar-list-item">
                    <a href='<?php echo $base_search; ?>/<?php echo $facet['name']; ?>:"<?php echo $term['name']; ?>"<?php echo $base_parameters ?>' alt="apply filter on click"><?php echo $term['display_name'];?> (<?php echo $term['count']; ?>)
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
                <a class="deselect" href='<?php echo $remove; ?>/<?php echo $facet['name']; ?>:<?php echo $term['name']; ?><?php if(isset($operator)) echo '?operator='.$operator; ?>' alt="remove filter on click"><?php echo $term['display_name'];?> (<?php echo $term['count']; ?>)
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
           <li><a href="./browse/<?php echo $facet['name']; ?>" alt="view full list of filter for this section">More ...</a></li>
       <?php }
            } ?>
        </ul>
    <?php } ?>
<?php } ?>

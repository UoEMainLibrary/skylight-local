<?php

// Set up some variables to easily refer to particular fields you've configured
// in $config['skylight_searchresult_display']

$title_field = $this->skylight_utilities->getField('Title');
$author_field = $this->skylight_utilities->getField('Creator');
$date_field = $this->skylight_utilities->getField('Date');
$type_field = $this->skylight_utilities->getField('Type');
$abstract_field = $this->skylight_utilities->getField('Agents');
$subject_field = $this->skylight_utilities->getField('Subject');

$base_parameters = preg_replace("/[?&]sort_by=[_a-zA-Z+%20. ]+/","",$base_parameters);
if($base_parameters == "") {
    $sort = '?sort_by=';
}
else {
    $sort = '&sort_by=';
}
?>

<div class="col-md-9 col-sm-9 col-xs-12">
    <div class="row">
        <div class="centered text-center">
            <nav>
                <ul class="pagination pagination-sm pagination-xs">
                    <?php
                    foreach ($paginationlinks as $pagelink)
                    {
                        echo $pagelink;
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
    <div class="row search-row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 results-num">
            <h5 class="text-muted">Showing <?php echo $rows ?> results </h5>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 results-num sort">
            <h5 class="text-muted">Sort By:
                <?php foreach($sort_options as $label => $field) {
                    if($label == 'Relevancy')
                    {
                        ?>
                        <em><a href="<?php echo $base_search.$base_parameters.$sort.$field.'+desc'?>"><?php echo $label ?></a></em>
                        <?php
                    }
                    else {
                        ?>

                        <em><?php echo $label ?></em>
                        <?php if($label != "Date") { ?>
                            <a href="<?php echo $base_search.$base_parameters.$sort.$field.'+asc' ?>">A-Z</a> |
                            <a href="<?php echo $base_search.$base_parameters.$sort.$field.'+desc' ?>">Z-A</a>
                        <?php } else { ?>
                            <a href="<?php echo $base_search.$base_parameters.$sort.$field.'+desc' ?>">newest</a> |
                            <a href="<?php echo $base_search.$base_parameters.$sort.$field.'+asc' ?>">oldest</a>
                        <?php } } } ?>
            </h5>
        </div>

    </div>
    <?php
    foreach ($docs as $index => $doc)
    {
        $ancestors = $doc['ancestors'];
        $uri = $doc['uri'];
        $skip = false;
        if ($uri == "/repositories/15/archival_objects/190197"
            or $uri == "/repositories/15/archival_objects/208190"
            or $uri == "/repositories/15/archival_objects/228537")
        {
            $skip = true;
        }
        else
        {
          foreach ($ancestors as $ancestor)
          {
            if (($ancestor == "/repositories/15/archival_objects/190197")
            or ($ancestor == "/repositories/15/archival_objects/208190")
            or ($ancestor == "/repositories/15/archival_objects/228537"))
            {
                $skip = true;
            }
          }
        }
    if (!$skip)
    {

    ?>
    <div class="row search-row">
    <h3><a href="./record/<?php echo $doc['id']?>/<?php echo $doc['types'][0]?>">
    <?php


                    $strip_rec_title = strip_tags($doc[$title_field]);

                    if(strpos($strip_rec_title, ',')) {
                        echo substr($strip_rec_title, 0, strpos($strip_rec_title, ','));
                    }
                    else    {
                        echo $strip_rec_title;
                    } ?></a></h3>

            <?php
            if (isset($doc["component_id"])) {
                $component_id = $doc["component_id"];
                echo'<div class="component_id">' . $component_id . '</div>';
            } ?>

            <?php if(array_key_exists($author_field,$doc)) { ?>
                <?php

                $num_authors = 0;
                echo 'Interviewer/agent: ';
                foreach ($doc[$author_field] as $author) {
                    $orig_filter = urlencode($author);

                    echo '<a class="agent" href="./search/*:*/Agent:%22'.urlencode($orig_filter).'%22">'.$author.'</a>';
                    $num_authors++;
                    if($num_authors < sizeof($doc[$author_field])) {
                        echo ' ';
                    }
                }
                ?>
            <?php } ?>

            <?php if(array_key_exists($subject_field,$doc)) { ?>
                <div class="tags">
                    <?php

                    $num_subject = 0;
                    foreach ($doc[$subject_field] as $subject) {

                        $orig_filter = urlencode($subject);
                        echo '<a class="subject" href="./search/*:*/Subject:%22'.urlencode($orig_filter).'%22">'.$subject.'</a>';
                        $num_subject++;
                        if($num_subject < sizeof($doc[$subject_field])) {
                            echo ' ';
                        }
                    }

                    ?>
                </div>
            <?php } ?>
            <?php if(array_key_exists('summary',$doc)) { ?>
                <div class="interview_summary">
                    <?php

                    $text = $doc['summary'];
                    $needle = urldecode($query);
                    $hits = explode($needle, $text);
                    $max_length_summary = 200;

                    if(sizeof($hits) > 1) {
                        foreach ($hits as $a => $b) {
                            if ($a % 2 != 0) {
                                $before = $hits[$a - 1];
                                $after = $b;
                                if (strlen($before) > $max_length_summary)
                                    $before = '...' . substr($before, strlen($before) - $max_length_summary);

                                if (strlen($b) > $max_length_summary)
                                    $after = substr($b, 0, $max_length_summary);

                                echo $before . '<b class="hit">' . $needle . '</b>' . $after . '...<br/>';
                            }

                        }
                    }
                    else {
                        if(strlen($text) > $max_length_summary)
                            echo substr($text, 0,$max_length_summary) . '...';
                        else
                            echo $text;
                    }

                    ?>
                </div>
            <?php } ?>
        </div> <!-- close row-->
        <?php

    } // end for each search result
   }


    ?>
    <div class="row">
        <div class="centered text-center">
            <nav>
                <ul class="pagination pagination-sm pagination-xs">
                    <?php
                    foreach ($paginationlinks as $pagelink)
                    {
                        echo $pagelink;
                    }
                    ?>

                </ul>
            </nav>
        </div>
    </div>
</div> <!-- close col 9 -->

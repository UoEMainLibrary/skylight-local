<?php
$title_field = $this->skylight_utilities->getField('Title');
 ?>


<div class="col-md-9 col-sm-9 col-xs-12">
    <br>

<!--
    <p>In this space we present some creative reflections on material recorded for the Regional Ethnology of Scotland Project (RESP). These creative responses show the richness of the recordings as sources and become – in and of themselves – new sources which illuminate life and society.</p>

    <p>This changing space will display material – video, images, sound and text – as the RESP progresses.</p>

    <h1 class="itemtitle">Two questions and a short recording …:</h1>

    <p>“Early in the pandemic, while we were still getting used to the idea of lockdown, my colleague Mark Mulhern suggested, as many routine tasks were not possible, that I use my time to “record a creative response to the current situation”. So, between late April and June 2020 I sent out requests for assistance to people in the UK, Ireland the USA and Australia – to get their responses to the situation, and to record something of their current environment.</p>

    <p>These videos are my response to the contributions. They speak of trepidation, but also of hope. For many there was a sense of potential – a resetting and having time to evaluate how we choose to be. One year on I am not sure how much of that feeling remains.</p>

    <p>I am grateful to the EERC for this opportunity, and I hope the videos do justice to the generous contributions. Colin Gateley”</p>

    <table>
        <tr style="text-align: center">
            <?php
                 $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54268/CV7-street.mp4";
                 $audio = '<video controls width="250" preload="metadata" title="CV7-street.mp4" poster="/theme/eerc/images/CV7-street.png">';
                 $audio .= '<source src="' . $do_url . '">';
                 $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                 echo $audio;
            ?>
           &nbsp;
            <?php
                 $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54268/CV7-human.mp4";
                 $audio = '<video controls width="250" reload="metadata" title="CV7-human.mp4" poster="/theme/eerc/images/CV7-human.png">';
                 $audio .= '<source src="' . $do_url . '">';
                 $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                 echo $audio;
            ?>
            &nbsp;
            <?php
                  $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54268/CV7-share.mp4";
                  $audio = '<video controls width="250" preload="metadata" title="CV7-share.mp4" poster="/theme/eerc/images/CV7-share.png">';
                  $audio .= '<source src="' . $do_url . '">';
                  $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                  echo $audio;
            ?>
        </tr>
        <tr>
            <?php
                 $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54268/CV7-strange.mp4";
                 $audio = '<video controls width="250" preload="metadata" title="CV7-strange.mp4" poster="/theme/eerc/images/CV7-strange.png">';
                 $audio .= '<source src="' . $do_url . '">';
                 $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                 echo $audio;
            ?>
            &nbsp;
            <?php
                 $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54268/CV7-fish.mp4";
                 $audio = '<video controls width="250" preload="metadata" title="CV7-fish.mp4" poster="/theme/eerc/images/CV7-fish.png">';
                 $audio .= '<source src="' . $do_url . '">';
                 $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                 echo $audio;
            ?>
            &nbsp;
            <?php
                 $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54268/CV7-gift.mp4";
                 $audio = '<video controls width="250" preload="metadata" title="CV7-gift.mp4" poster="/theme/eerc/images/CV7-gift.png">';
                 $audio .= '<source src="' . $do_url . '">';
                 $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                 echo $audio;
            ?>
        </tr>
        <tr>
            <?php
                 $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54268/CV7-3am.mp4";
                 $audio = '<video controls width="250" preload="metadata" title="CV7-3am.mp4" poster="/theme/eerc/images/CV7-3am.png">';
                 $audio .= '<source src="' . $do_url . '">';
                 $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                 echo $audio;
            ?>
            &nbsp;
            <?php
                 $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54268/CV7-garden.mp4";
                 $audio = '<video controls width="250" preload="metadata" title="CV7-garden.mp4" poster="/theme/eerc/images/CV7-garden.png">';
                 $audio .= '<source src="' . $do_url . '">';
                 $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                 echo $audio;
            ?>
            &nbsp;
            <?php
                 $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54268/CV7-isolated.mp4";
                 $audio = '<video controls width="250" preload="metadata" title="CV7-isolated.mp4" poster="/theme/eerc/images/CV7-isolated.png">';
                 $audio .= '<source src="' . $do_url . '">';
                 $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                 echo $audio;
            ?>
        </tr>
        <tr>
            <?php
                $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54268/CV7-focus.mp4";
                $audio = '<video controls width="250" preload="metadata" title="CV7-focus.mp4" poster="/theme/eerc/images/CV7-focus.png">';
                $audio .= '<source src="' . $do_url . '">';
                $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                echo $audio;
            ?>
            &nbsp;
            <?php
                $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54268/CV7-salt.mp4";
                $audio = '<video controls width="250" preload="metadata" title="CV7-salt.mp4" poster="/theme/eerc/images/CV7-salt.png">';
                $audio .= '<source src="' . $do_url . '">';
                $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                echo $audio;
            ?>
            &nbsp;
            <?php
                $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54268/CV7-hum.mp4";
                $audio = '<video controls width="250" preload="metadata" title="CV7-hum.mp4" poster="/theme/eerc/images/CV7-hum.png">';
                $audio .= '<source src="' . $do_url . '">';
                $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                echo $audio;
            ?>
        </tr>
        <tr>
            <?php
                 $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54268/CV7-birds.mp4";
                 $audio = '<video controls width="250" preload="metadata" title="CV7-birds.mp4" poster="/theme/eerc/images/CV7-birds.png">';
                 $audio .= '<source src="' . $do_url . '">';
                 $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                 echo $audio;
            ?>
            &nbsp;
            <?php
                 $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54268/CV7-experience.mp4";
                 $audio = '<video controls width="250" preload="metadata" title="CV7-experience.mp4" poster="/theme/eerc/images/CV7-experience.png">';
                 $audio .= '<source src="' . $do_url . '">';
                 $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                 echo $audio;
            ?>
            &nbsp;
            <?php
                 $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54268/CV7-quiet.mp4";
                 $audio = '<video controls width="250" preload="metadata" title="CV7-quiet.mp4" poster="/theme/eerc/images/CV7-quiet.png">';
                 $audio .= '<source src="' . $do_url . '">';
                 $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                 echo $audio;
            ?>
        </tr>
    </table>
    -->
    <br>
    <blockquote>
    <h1 style="text-align: center">“Animal Encounters in the RESP Archive”</h1>
    </blockquote>
    <h3 style="text-align: center" >Exploring animal-human relationships across the Regional Ethnology of Scotland Project</h3>
    <br>
    <div style="text-align: center">
        <img src="<?php echo base_url()?>/theme/eerc/images/animal_encounters_resp.png" style="width: 80%"><br>
        <br>
        <a href='https://exhibitions.ed.ac.uk/exhibitions/animal-encounters' >https://exhibitions.ed.ac.uk/exhibitions/animal-encounters</a><br>
    </div>
    <br>
    <p>
        To explore RESP’s online exhibition Animal Encounters in the RESP Archive please click on the link above.  The exhibition,
        curated and illustrated by Rebekah Day, reveals the varied and complex relationships that can exist between people and animals.
        Through carefully selected audio recordings, images, and videos the exhibition highlights how connections between humans and
        animals have shifted in recent decades: reflecting wider culture and environmental concerns present in Scottish society today.
    </p>
    <br>
    <hr>
    <br>
    <blockquote>
    <h1 style="text-align: center">“This was a right industrial wee town!”</h1>
    </blockquote>
    <h3 style="text-align: center" >A film about life and work in the Musselburgh Mills</h3>
    <br>
    <p>
       The ‘Honest Toun’ is a place that, to some extent, sits on its own. Part of Midlothian until its governance transferred to East Lothian in 1975.
       The size of Musselburgh’s population and the scale and range of its economy has, for long, reflected its historic status as a burgh.
       Industry having been a key aspect of that large and diverse economy. Beginning in the nineteenth century through to the late twentieth century,
       three large industrial endeavours were based in the town: Stuarts Net Mill; Bruntons Wire Mill and Inveresk Paper Mill.
    </p>
    <p>
    This film tells the story of these mills through the words of those who worked and lived in the town and beyond. In partnership with the John Gray
    Centre and Musselburgh Museum, the EERC interviewed a number of folk about their experiences in the mills. This film provides an introduction into
    these very different workplaces which were such a significant part of the Town’s life for well over 100 years.<br>
    Mark Mulhern, 2024
    </p>
    <br>
    <div style="text-align: center">
        <?php
              $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/56448/MILLS-revised-720.mp4";
              $audio = '<video controls width="600" preload="auto" title="MILLS-revised" poster="/theme/eerc/images/MILLS-revised-720.png">';
              $audio .= '<source src="' . $do_url . '">';
              $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
              echo $audio;
        ?>
    </div>
    <br>
    <p>
    Editor: Colin Gateley <br>
    Music by: Enid Forsyth <br>
    Moving images: Courtesy of moving Image Archive, National Library of Scotland
    </p>
    <hr>


    <!--
    <h1>The Past is Still with Us</h1>
    <hr>
    <p>
       After interviewing Mr Charlie Horne a number of times about his life, fieldworker Martine
       Robertson reflected on the recordings and, in partnership with Colin Gatleley and David Frances,
       produced this film.
    </p>
    <div style="text-align: center">
        <?php
              $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54269/EL7_The_Past_is_Still_with_Us.mp4";
              $audio = '<video controls width="480" preload="auto" title="EL7_The_Past_is_Still_with_Us" poster="/theme/eerc/images/EL7_The_Past_is_Still_with_Us.png">';
              $audio .= '<source src="' . $do_url . '">';
              $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
              echo $audio;
        ?>
    </div>

    <br>
    <br>
    <h1>East Lothian Digest </h1>
    <hr>
    <p>
       This short film gives an insight into the range of speakers and subject spoken
       about in the RESP in East Lothian.
    </p>
    <div style="text-align: center">
    <?php
         $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/54272/EL6-East_Lothian_Digest.mp4";
         $audio = '<video controls width="480" preload="auto" title="EL6-East_Lothian_Digest" poster="/theme/eerc/images/EL6-East_Lothian_Digest.png">';
         $audio .= '<source src="' . $do_url . '">';
         $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
         echo $audio;
    ?>
    </div>
    -->

    <!--
      <div style="float: left; max-width: 490px;">
        <p>This is video page</p>
        <p> echo base_url is: <strong> <?php echo base_url(); ?> </strong> </p>
        <br>
        <p> echo uri_string(); <strong> <?php echo uri_string(); ?> </strong> </p>
        <br>
        <p> echo site_url(uri_string()) <strong> <?php echo site_url(uri_string()); ?> </strong> </p>
        <br>
        <?php echo ($title_field) ?>
      </div>
      -->
</div>


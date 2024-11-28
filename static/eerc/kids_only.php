<div>
    <meta charset="utf-8">
    <style>
        .sidebar-nav {
            display: none;
            margin: 0;
            padding: 0;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: none;
        }
        tr:nth-child(even){background-color: #f2f2f2}
        p {
            font-family: wfont_000751_dde043c9cc214f9bbc15a2e74a9d960b, wf_dde043c9cc214f9bbc15a2e74, orig_montserrat_regular;
            font-size:20px;
            display:inline;
        }
    </style>
    <body>
    <div style="overflow-x:auto;">
    <br>
        <table>
            <tr>
                <td>
                    <br>
                    <img src="<?php echo base_url()?>/theme/eerc/images/stars.gif" style="width: 90%"></td>
                <td>
                    <h1 class="itemtitle" style="text-align: center; font-family:'Comic Sans MS';font-size:3em;color:#0066FF;background-color:#CCFFFF;padding:em;">Kids Activity Zone</h1>
                    <br>
                    <p>
                        Use these fun activity sheets to introduce you to some interesting items from
                        the RESP collections of oral history interviews. There are lots of fun questions to answer
                        and tasks to do. If you like the worksheets there are some ideas that might help you to explore
                        the archive further and even suggestions for how to carry out your own Oral History Project.
                    </p>
                </td>
                <td>
                    <br>
                    <img src="<?php echo base_url()?>/theme/eerc/images/stars.gif" style="width: 90%">
                </td>
            </tr>
            </table>
            <br/>
            <br/>
            <p>
               <strong><em style="font-size: 20px">Click on the boxes below to open each worksheet and play the clips alongside when it tells you in the worksheet...</em> </strong>
            </p>
            <br/>
            <br/>
            <table>
                <tr>
                    <td style="vertical-align: middle"><p style="color: red; font-weight: bold;">FARMING</p> <p>Find out about Irene Brown and her memories of working on a farm.</p></td>
                    <td style="vertical-align: middle">
                        <a href="/theme/eerc/images/kids_only_pdfs/Farming.pdf" target="_blank">
                            <img src="<?php echo base_url()?>/theme/eerc/images/pdf_icon.png" style="width: 60px">
                        </a>
                    </td>
                    <td style="vertical-align: middle">
                        <?php
                             $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/57057/Farming_clip01_DG5-1-1-1.mp3";
                             $audio = '<audio controls width="300" preload="metadata" title="CV7-quiet.mp4" >';
                             $audio .= '<source src="' . $do_url . '">';
                             $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                             echo $audio;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle"><p style="color: blue; font-weight: bold;">SCHOOL DINNERS</p> <p> What was Ian’s favourite school dinner?</p></td>
                    <td style="vertical-align: middle">
                        <a href="/theme/eerc/images/kids_only_pdfs/School dinners.pdf" target="_blank">
                            <img src="<?php echo base_url()?>/theme/eerc/images/pdf_icon.png" style="width: 60px">
                        </a>
                    </td>
                    <td style="vertical-align: middle">
                        <?php
                             $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/57057/School%20dinners_EL21-1-1-1.mp3";
                             $audio = '<audio controls width="300" preload="metadata" title="CV7-quiet.mp4" >';
                             $audio .= '<source src="' . $do_url . '">';
                             $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                             echo $audio;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle"><p style="color: green; font-weight: bold;">TRAVEL AND TRANSPORT</p> <p> Listen to Grace talking about meeting the first man to land on the moon.</p></td>
                    <td style="vertical-align: middle">
                        <a href="/theme/eerc/images/kids_only_pdfs/Travel and Transport.pdf" target="_blank">
                            <img src="<?php echo base_url()?>/theme/eerc/images/pdf_icon.png" style="width: 60px">
                        </a>
                    </td>
                    <td style="vertical-align: middle">
                        <?php
                             $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/57057/Travel%20and%20Transport_DG17-1-1-1.mp3";
                             $audio = '<audio controls width="300" preload="metadata" title="CV7-quiet.mp4" >';
                             $audio .= '<source src="' . $do_url . '">';
                             $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                             echo $audio;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle"><p style="color: #de00d7; font-weight: bold;">SWEETS</p> <p> Listen to Betty and Suzanne Watson chatting about their memories of sweet shops. </p></td>
                    <td style="vertical-align: middle">
                        <a href="/theme/eerc/images/kids_only_pdfs/Sweets.pdf" target="_blank">
                            <img src="<?php echo base_url()?>/theme/eerc/images/pdf_icon.png" style="width: 60px">
                        </a>
                    </td>
                    <td style="vertical-align: middle">
                        <?php
                             $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/57057/Sweets_EL20-2-1-1.mp3";
                             $audio = '<audio controls width="300" preload="metadata" title="CV7-quiet.mp4" >';
                             $audio .= '<source src="' . $do_url . '">';
                             $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                             echo $audio;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle"><p style="color: #079692; font-weight: bold;">TOYS</p> <p> Find out which star wars character came to visit Cyril and Dorothy Wise.</p></td>
                    <td style="vertical-align: middle">
                        <a href="/theme/eerc/images/kids_only_pdfs/Toys.pdf" target="_blank">
                            <img src="<?php echo base_url()?>/theme/eerc/images/pdf_icon.png" style="width: 60px">
                        </a>
                    </td>
                    <td style="vertical-align: middle">
                        <?php
                             $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/57057/Toys_DG14-8-1-1.mp3";
                             $audio = '<audio controls width="300" preload="metadata" title="CV7-quiet.mp4" >';
                             $audio .= '<source src="' . $do_url . '">';
                             $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                             echo $audio;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle"><p style="color: #758c0f; font-weight: bold;">SHOPPING</p> <p>Marion Sunderland talks about shopping.See how much shopping habits have changed.</p></td>
                    <td style="vertical-align: middle">
                        <a href="/theme/eerc/images/kids_only_pdfs/Shopping.pdf" target="_blank">
                            <img src="<?php echo base_url()?>/theme/eerc/images/pdf_icon.png" style="width: 60px">
                        </a>
                    </td>
                    <td style="vertical-align: middle">
                        <?php
                             $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/57057/shopping_DG4-19-1-1.mp3";
                             $audio = '<audio controls width="300" preload="metadata" title="CV7-quiet.mp4" >';
                             $audio .= '<source src="' . $do_url . '">';
                             $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                             echo $audio;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle"><p style="color: #00678d; font-weight: bold;">PLAYGROUND GAMES</p> <p>Listen to Sophie and Derry, aged 8, talking about their favourite playground games.</p></td>
                    <td style="vertical-align: middle">
                        <a href="/theme/eerc/images/kids_only_pdfs/Playground Games.pdf" target="_blank">
                            <img src="<?php echo base_url()?>/theme/eerc/images/pdf_icon.png" style="width: 60px">
                        </a>
                    </td>
                    <td style="vertical-align: middle">
                        <?php
                             $do_url = "https://digitalpreservation.is.ed.ac.uk/bitstream/handle/20.500.12734/57057/Playground%20games_DG31-3-1-1.mp3";
                             $audio = '<audio controls width="300" preload="metadata" title="CV7-quiet.mp4" >';
                             $audio .= '<source src="' . $do_url . '">';
                             $audio .= 'Sorry, your browser doesn\'t support embedded videos.</video>';
                             echo $audio;
                        ?>
                    </td>
                </tr>
            </table>
        </table>

        <br>
        <br>
        <table>
            <tr>
                <td>
                    <img src="<?php echo base_url()?>/theme/eerc/images/kids_only_1.png" style="width: 90%">
                </td>
                <td style="vertical-align: middle">
                    <p style="font-family: wfont_000751_dde043c9cc214f9bbc15a2e74a9d960b, wf_dde043c9cc214f9bbc15a2e74, orig_montserrat_regular; font-size:20px; vertical-align: middle">
                        Pupils from St Ninians's school who were interviewed by Flora Burns. You can listen to Hannah Green and Kali Hunter if you click on the link
                        below. <br>
                        <br>
                        <a href='https://collections.ed.ac.uk/eerc/record/165204/archival_object' style='font-size:20px'>https://collections.ed.ac.uk/eerc/record/165204/archival_object</a><br>
                    </p>
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td><img src="<?php echo base_url()?>/theme/eerc/images/stars.gif" style="width: 23%"></td>

                <td style="text-align: right"><img src="<?php echo base_url()?>/theme/eerc/images/stars.gif" style="width: 23%"></td>
            </tr>
        </table>

    </div>
    </body>
    <br>
    <br>
    <br>
    <br>











</div>
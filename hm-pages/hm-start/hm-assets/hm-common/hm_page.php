<?php /*The main content area for our home page.*/ ?>
    <nav id="hm_navbar_top" class="navbar navbar-default navbar-fixed-top">

        <div id="hm_navbar_container" class="container-fluid">

            <div id="hm_navbar_header" class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

            </div>
            <!--/.hm_navbar_header-->

            <div id="hm_navbar_collapse" class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-left">

                    <li>
                        <button id="btn-sidebar-toggle" type="button" class="btn btn-default navbar-btn">
                            <span class="glyphicon glyphicon-arrow-left"></span> &nbsp;&nbsp;Close
                        </button>
                    </li>

                    <li>
                        <a href="https://www.heatery.io/login">Login<span class="sr-only">(login)</span></a>
                    </li>

                    <li>
                        <a href="http://localhost/github/heaterymap/">Heatery Map<span class="sr-only">(current)</span></a>
                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Connect

<span class="caret"></span>

</a>

                        <ul id="hm_navbar_dropdown_ul" class="dropdown-menu">

                            <li><a href="#">Facebook</a>

                            </li>
                            <li><a href="#">Twitter</a>

                            </li>
                            <li><a href="#">Instagram</a>

                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Data Analysis Portal</a>

                            </li>

                        </ul>

                    </li>

                    <li id="hm_navbar_dropdown" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Themes<span class="caret"></span></a>

                        <ul id="hm_navbar_dropdown_ul" class="dropdown-menu">

                            <li>

                                <button id="btn-belgium" class="btn btn-default btn-sm" type="button" onclick="" data-toggle="tooltip" title="Add the Selected Stylesheet">

                                    <span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Belgium

                                </button>

                                <li>

                                    <button id="btn-redee" class="btn btn-default btn-sm" type="button" onclick="" data-toggle="tooltip" title="Add the Selected Stylesheet">

                                        <span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;At the Redee

                                    </button>

                                </li>

                                <li>

                                    <button id="btn-pink" class="btn btn-default btn-sm" type="button" onclick="" data-toggle="tooltip" title="Add the Selected Stylesheet">

                                        <span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Soft Pink

                                    </button>

                                </li>

                                <li>

                                    <button id="btn-roots" class="btn btn-default btn-sm" type="button" onclick="" data-toggle="tooltip" title="Add the Selected Stylesheet">

                                        <span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Roots

                                    </button>

                                </li>

                                <li>


                                </li>


                        </ul>

                        </li>
                        <!--/.dropdown-->
                        <li>
                            <a href="#">Circle Squared Data Labs</a>
                        </li>

                        <a id="hm_navbar_brand" class="navbar-brand" href="https://www.heatery.io">

                            <img id="hm_navbar_brand_img" alt="heatery.io" src="https://www.heatery.io/hm-media/hm-img/hm_logo_csq_lg.jpg">

                        </a>

                </ul>

            </div>
            <!-- /.navbar-collapse -->

        </div>
        <!-- /.container-fluid -->

    </nav>
    <!-- /.navbar-default -->
    <div class="sticky-container">
        <ul class="sticky">
            <li>
                <a href='https://www.facebook.com/heateryApp'>
<img width="32" height="32" title="Heatery Facebook App" alt="" src="<?php echo $img_path . 'fb1.png';?>" /></a>
                <a href='https://www.facebook.com/heateryApp'>
                    <p>Facebook</p>
                </a>
            </li>
            <li>
                <a href='https://twitter.com/DelrayInfo'>
<img width="32" height="32" title="Hot Tweets, Hot Eats" alt="" src="<?php echo $img_path . 'tw1.png';?>" /></a>
                <a href='https://twitter.com/DelrayInfo'>
                    <p>Twitter</p>
                </a>
            </li>
            <li>
                <a href='https://github.com/Weer/hm_beta'>
<img width="32" height="32" title="Fork Our Repo" alt="" src="<?php echo $img_path . 'git.png';?>" /></a>
                <a href='https://github.com/heatery'>
                    <p>GitHub</p>
                </a>
            </li>
            <li>
                <a href='https://instagram.com/heatery/'>
<img width="32" height="32" title="Hot Pics" alt="" src="<?php echo $img_path . 'instagram-32.png';?>" /></a>
                <a href='https://instagram.com/heatery/'>
                    <p>Instagram</p>
                </a>
            </li>
            <li>
                <a href='#'>
<img width="32" height="32" title="" alt="" src="<?php echo $img_path . 'rss1.png';?>" /></a>
                <a href='#'>
                    <p>RSS</p>
                </a>
            </li>
            <li>
                <a href='https://www.pinterest.com/heateryio/'>
<img width="32" height="32" title="Hot Pins" alt="" src="<?php echo $img_path . 'pin1.png';?>" /></a>
                <a href='https://www.pinterest.com/heateryio/'>
                    <p>Pinterest</p>
                </a>
            </li>
        </ul>
    </div>
    <div id="wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12" style="position: inherit;">
                        <div id="sidebar-wrapper">
                            <ul class="sidebar-nav">
                                <li class="sidebar-brand">
                                    <a href="#">Find Your Hot Spot.</a>
                                </li>
                                <li>
                                    <a href="#"><span class="glyphicon glyphicon-search">&nbsp;&nbsp;</span>Search</a>
                                </li>
                                <li>
                                    <a href="#"><span class="glyphicon glyphicon-eye-open">&nbsp;&nbsp;</span>About</a>
                                </li>
                                <li>
                                    <a href="#"><span class="glyphicon glyphicon-envelope">&nbsp;&nbsp;</span>Contact</a>
                                </li>
                                <li>
                                    <a href="#"><span class="glyphicon glyphicon-pencil">&nbsp;&nbsp;</span>Content</a>
                                </li>
                                <li>
                                    <a href="#"><span class="glyphicon glyphicon-heart">&nbsp;&nbsp;</span>Contribute</a>
                                </li>
                                <li>
                                    <a href="#"><span class="glyphicon glyphicon-wrench">&nbsp;&nbsp;</span>Services</a>
                                </li>
                                <!--SOCIAL MEDIA BUTTONS-->
                                <hr style="margin-top: 20px;
margin-bottom: 20px;
border: 0;
border-top: 1px solid #989898;">
                                <li style="padding-bottom:15px;" class="fb-like" data-href="https://www.facebook.com/heateryApp/app_1452021355091002" data-width="90px" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></li>
                                <li>
                                    <a class="github-button" href="https://github.com/ntkme/github-buttons/fork" data-icon="octicon-git-branch" data-count-href="/ntkme/github-buttons/network" data-count-api="/repos/ntkme/github-buttons#forks_count" data-count-aria-label="# forks on GitHub" aria-label="Fork ntkme/github-buttons on GitHub">Fork</a>
                                </li>
                                <li>
                                    <a class="github-button" href="https://github.com/heatery" data-count-href="/heatery/followers" data-count-api="/users/heatery#followers" data-count-aria-label="# followers on GitHub" aria-label="Follow @heatery on GitHub">Follow @heatery</a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/DelrayInfo" class="twitter-follow-button" data-show-count="false">Follow @DelrayInfo</a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?button_hashtag=heatery" class="twitter-hashtag-button" data-related="DelrayInfo">Tweet #heatery</a>
                                </li>
                                <li>
                                    <a href="http://instagram.com/heatery?ref=badge" class="ig-b- ig-b-v-24"><img src="//badges.instagram.com/static/images/ig-badge-view-24.png" alt="Instagram" /></a>
                                </li>
                                <!--@end social media buttons-->
                                <li style="color:#989898;">
                                    <p id="hm_love">Crafted with<span style="margin-left:-15px; margin-right:-7px; color:#F2BDB9" class="glyphicon glyphicon-heart"></span>&nbsp;&nbsp; by heatery.io</p>
                                </li>
                            </ul>
                        </div>
                        <!-- /#sidebar-wrapper -->
                        <div id="map-canvas" style="top:0px;"></div>
                        <!--@end #map-canvas-->

                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <nav id="hm_navbar_bottom" class="navbar navbar-default navbar-fixed-bottom">

        <div id="hm_navbar_container" class="container-fluid">

            <div id="hm_navbar_header" class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

            </div>
            <!--/.hm_navbar_header-->

            <div id="hm_navbar_collapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav nabvar-left">
                    <li>

                        <a href="#">

                            <span class="glyphicon glyphicon-user">

</span>&nbsp;&nbsp;Client Portal

                        </a>
                    </li>

                    <li>
                        <a href="#">

                            <span class="glyphicon glyphicon-log-in">

</span>&nbsp;&nbsp;The Speak Easy&nbsp;&nbsp;&nbsp;&nbsp;</a>

                    </li>

                    
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    
                                        
                                       <li>
                        <a href="#">About</a>
                    </li>

                    <li id="hm_navbar_dropdown" class="dropup">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Developers

<span class="caret"></span>

</a>

                        <ul id="hm_dropup_dev" class="dropdown-menu">

                            <li><a href="#">Github Repos</a>

                            </li>

                            <li><a href="#">Contribute Data</a>

                            </li>
                            <li><a href="#">Create Art with Us</a>

                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">About our Company</a>

                            </li>

                        </ul>

                    </li>

                    <li id="hm_navbar_dropdown" class="dropup">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog<span class="caret"></span>
</a>

                        <ul id="hm_dropup_blog" class="dropdown-menu">

                            <li>
                                <a href="#">Articles</a>
                            </li>

                            <li>
                                <a href="#">Tutorials</a>
                            </li>

                            <li>
                                <a href="#">Raw Data Sets</a>
                            </li>

                        </ul>

                    </li>
                    <!--/.dropup-->

                </ul>

            </div>
            <!-- /.navbar-collapse -->

        </div>
        <!-- /.container-fluid -->

    </nav>
    <!-- /.navbar-default -->
<?php /*The main content area for our home page.*/ ?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <ul class="nav navbar-nav">
                    <li>
                        <img style="margin:5px 25px 5px 5px;" width="45" height="45" src="<?php echo $img_path . 'hm_logo_csq_lg.jpg';?>" />
                    </li>
                </ul>
                <a class="navbar-brand" href="https://www.heatery.io/wp-login.php">heatery.io</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="https://www.heatery.io/wp-login.php">Login</a>
                    </li>
                    <li>
                        <a href="https://www.heatery.io/wp-login.php?action=register">Register</a>
                    </li>
                    <li data-toggle="tooltip" title="Business partners gain access to rich data sets, custom reports, and personalized tools for analytics. All in addition to the this snazzy portal link!">
                        <a href="https://www.heatery.io/wp-login.php">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Client Portal
                        </a>
                    </li>
                    <li data-toggle="tooltip" title="A Blind Tiger is Coming Soon!">
                        <a href="https://www.heatery.io/wp-login.php">
                            <span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;The Speak Easy
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
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
                                    <p>Crafted with<span style="margin-left:-15px; margin-right:-7px; color:#F2BDB9" class="glyphicon glyphicon-heart"></span>&nbsp;&nbsp; by heatery.io</p>
                                </li>
                            </ul>
                        </div>
                        <!-- /#sidebar-wrapper -->
                        <div id="map-canvas"></div>
                        <!--@end #map-canvas-->
                        <a href="#menu-toggle" class="btn btn-default btn-xs" id="menu-toggle"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;&nbsp;Close</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
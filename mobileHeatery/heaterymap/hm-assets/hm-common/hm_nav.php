<nav id="hm_navbar_top" class="navbar navbar-default navbar-fixed-top">

    <div id="hm_navbar_container" class="container-fluid">



        <div id="hm_navbar_header" class="navbar-header">

            <h4 id="hm_location" class="navbar-text visible-xs-inline-block"><?php echo($city);?> Heatery</h4>

            <button id="nav_toggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hm_navbar_collapse" aria-expanded="false">

                <span class="sr-only">Toggle navigation</span>

                <span id="nav_toggle_bar" class="icon-bar"></span>

                <span id="nav_toggle_bar" class="icon-bar"></span>

                <span id="nav_toggle_bar" class="icon-bar"></span>

            </button>

        </div>

        <div id="hm_navbar_collapse" class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-left">

                <form id="gc-form" class="navbar-form navbar-left" role="search" method="post">

                    <button id="btn-find" type="submit" class="btn btn-default">Find</button>

                    <div id="gc-input" class="form-group">

                        <input id="gc-search-box" name="address" type="text" class="form-control" placeholder="Your Hot Spot.">

                    </div>

                </form>

            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li>

                    <a href="#">Heatery Map<span class="sr-only">(current)</span></a>

                </li>

                <li>
                    <a href="https://www.heatery.io/login">Login<span class="sr-only">(login)</span></a>
                </li>

            </ul>

        </div>

    </div>

</nav>

<div id="map-canvas"></div>

<div id="main" class="container">

    <div id="row_class" class="row">

        <div class="col-xs-12" id="left">

            <div id="info_panel" class="panel panel-default">

                <div id="info_card" class="panel-heading"></div>

                <div id="sb-title"></div>

                <p></p>

                <a id="sb_link" href="#"></a>

                <hr>

                <div id="sb-content">

                    <p></p>

                </div>

            </div>

        </div>

    </div>

</div>
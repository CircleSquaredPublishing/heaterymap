<nav id="hm_navbar_top" class="navbar navbar-default navbar-fixed-top">
    <div id="hm_navbar_container" class="container-fluid">
        <div id="hm_navbar_header" class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hm_navbar_collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
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
                <li class="active">
                    <a href="#">Heatery Map<span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a href="https://www.heatery.io/login">Login<span class="sr-only">(login)</span></a>
                </li>
                <li>
                    <a href="https://www.heatery.io">Home<span class="sr-only">(home)</span></a>
                </li>
                <li>
                    <a href="#">Circle Squared Data Labs</a>
                </li>
                <a id="hm_navbar_brand" class="navbar-brand" href="https://www.heatery.io">
                    <img id="hm_navbar_brand_img" alt="heatery.io" src="https://www.heatery.io/hm-media/hm-img/hm_logo_csq_lg.jpg">
                </a>
            </ul>
        </div>
    </div>
</nav>
<div id="map-canvas"></div>
<div class="container" id="main">
    <div class="row">
        <div class="col-xs-4" id="left">
            <div class="panel panel-default">
                <div id="info_head" class="panel-heading">
                    <h2><?php echo($city);?> Heatery</h2>
                    <div data-role="fieldcontain">
                        <label for="radiusSlider">Radius</label>
                        <input type="range" class="ui-slider ui-slider-handle" id="radiusSlider" onchange="changeRadius(radiusSlider.value)" min="1" max="150" step="0.5" value="30" />
                        <label for="opacitySlider">Transparency</label>
                        <input type="range" class="ui-slider ui-slider-handle" id="opacitySlider" onchange="changeOpacity(opacitySlider.value)" min="0" max="1" step=".01" value=".35" />
                    </div>
                </div>
            </div>
            <div id="info_panel" class="panel panel-default">
                <div id="info_card" class="panel-heading"></div>
            </div>
        </div>
        <div class="col-xs-8"></div>
    </div>
</div>
<nav id="hm_navbar_bottom" class="navbar navbar-default navbar-fixed-bottom">
    <div id="hm_navbar_container" class="container-fluid">
        <div id="hm_navbar_header" class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hm_navbar_collapse_btm" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="hm_navbar_collapse_btm" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
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
                <li>&nbsp;</li>
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
                        <li><a href="https://github.com/heatery/heaterymap">Github Repos</a>
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
            </ul>
        </div>
    </div>
</nav>
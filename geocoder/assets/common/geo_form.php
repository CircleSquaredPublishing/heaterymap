<?php /*The form for the geocoder.*/ ?>

    <!----------PHP GEOCODER FORM---------->
    <div id="geocoder" class="container">
        <div id="geo_header" class="row">
            <div class="col-12-md">
                <h2>heatery.io</h2>
                <br /><img id="geo_header_logo" src="/github/assets/media/favicon.ico/heatery/ms-icon-310x310.png" />
                <br />
            </div>
            <br />
            <div id="geo_input" class="col-12-md">
                <form action="" method="post">
                    <div id="gc-input" class="input-group">
                        <span class="input-group-btn">
<input class="btn btn-success btn-md" type="submit" value="Find" /><br /></span>
                        <!--@end Button for PHP Geocoder-->
                        <input id="search-box-tt" class="form-control" type="text" name="address" placeholder="Your Hot Spot." />
                    </div>
                    <br>
                    <!--@end Input field for PHP Geocoder-->
                </form>
                <!--@end form for PHP Geocoder-->
            </div>
<?php require 'hp_header.php';?><!--@end header-->

<!--BEGIN CONTENT-->
<?php require 'hp_navbar.php';?><!--@end .navbar-->

    <?php require 'hp_sidebar_right.php';?><!--@end .sticky-container-->

        <div id="wrapper">
            
            <div id="page-content-wrapper">
                
                <div class="container-fluid">
                    
                    <div class="row">
                        
                        <div class="col-lg-12" style="position: inherit;">
                            
                             <?php require 'hp_sidebar_left.php'; ?>
                            
                            <div id="map-canvas"></div><!--@end #map-canvas-->
                            
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;&nbsp;Close</a>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div><!-- /#page-content-wrapper -->
            
        </div><!-- /#wrapper -->
        
        <script src="js/hp_layer_minified.js"></script>

        <script src="js/hp_main.js"></script>

<?php require 'hp_footer.php'; ?><!--@end footer-->
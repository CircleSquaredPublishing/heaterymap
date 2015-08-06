$(document).ready(function(){
    
    $('[data-toggle1="tooltip1"]').tooltip();  
    
    });
            
$(document).ready(function(){
    
    $('[data-toggle2="tooltip2"]').tooltip();  
    
    });
            
$(document).ready(function(){
    
    $('[data-toggle3="tooltip3"]').tooltip();  
    
    });
            
            
            $(function() {

                $("#datepicker").datepicker();

                $("#format").change(function() {

                    $("#datepicker").datepicker("option", "dateFormat", $(this).val());

                });

            });

            //Browser Support Code
            function ajaxFunction() {
                var ajaxRequest; // The variable that makes Ajax possible!
                try {

                    // Opera 8.0+, Firefox, Safari
                    ajaxRequest = new XMLHttpRequest();
                } catch (e) {

                    // Internet Explorer Browsers
                    try {
                        ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {

                        try {
                            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e) {

                            // Something went wrong
                            alert("Your browser broke!");
                            return false;
                        }
                    }
                }

                // Create a function that will receive data
                // sent from the server and will update
                // div section in the same page.
                ajaxRequest.onreadystatechange = function() {

                    if (ajaxRequest.readyState == 4) {
                        var ajaxDisplay = document.getElementById('ajaxDiv');
                        ajaxDisplay.innerHTML = ajaxRequest.responseText;
                    }
                }

                // Now get the value from user and pass it to
                // server script.
                var likes = document.getElementById('likes').value;
                var tac = document.getElementById('tac').value;
                var zip = document.getElementById('zip').value;
                var datepicker = document.getElementById('datepicker').value;
                var queryString = "?likes=" + likes;

                queryString += "&tac=" + tac + "&zip=" + zip + "&datepicker=" + datepicker;
                ajaxRequest.open("GET", "query.php" + queryString, true);
                ajaxRequest.send(null);
            }
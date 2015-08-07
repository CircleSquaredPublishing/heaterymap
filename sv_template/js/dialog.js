$(function() {
    
    $('#dialog-sw-canvas').dialog({
        title: 'heatery.io',
        width: 300,
        height: 400,
        closed: true,
        cache: false,
        modal: true,
        onClose: function() {
            
            $('#dialog-sw-canvas').empty();
            
        }
        
    });
    
$('#dialog-sw-canvas').dialog('close');
    
});
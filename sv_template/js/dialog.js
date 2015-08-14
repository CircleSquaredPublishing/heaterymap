$(function() {
    
    $('#dialog-sw-canvas').dialog({
        title: 'heatery.io',
        width: 400,
        height: 300,
        closed: true,
        cache: false,
        modal: true,
        onClose: function() {
            
            $('#dialog-sw-canvas').empty();
            
        }
        
    });
    
$('#dialog-sw-canvas').dialog('close');
    
});
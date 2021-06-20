function fetchCustomers(){
    
    $('#customers tbody > tr').remove();
    $('#loadingmessage').show();
    $.ajax({
        type: 'POST',
        url: 'api.php',
        success: function(data) {
            var trHTML = '';
            $('#customers tbody > tr').remove();
            $.each(data, function (i, item) {
                trHTML += '<tr><td>' + item.companyname + '</td><td>' + item.contact + '</td><td>'+ item.country;
            });
            $('#customers').append(trHTML);
            $('#loadingmessage').hide();
            
        }
    });   
}

//when two keys pressed, call function for customers
$(document).ready(function() {
    $(document).bind('keydown',function(e){
       if(e.keyCode == 76 && e.ctrlKey) {
           fetchCustomers();
       }
    });
});




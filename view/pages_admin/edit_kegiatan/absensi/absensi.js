$(document).ready(function() {
   
    // ====================================
    // validation
    // ====================================

    var jwt = JSON.stringify( {jwt: getCookie('jwt')} );

    $.ajax({
        url: "http://localhost/immanuel-app/api/user/validate.php",
        type : "POST",
        contentType : 'application/json',
        data : jwt,
        success : function(result) {      
            // do nothing
              
        },
        error: function(xhr, resp, text){
            var url= "../login.php"; 
            window.location = url; 
        }
    });


    return false;
});


function getCookie(cname){
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' '){
            c = c.substring(1);
        }

        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function markAsAttend(id){
    $.ajax({
        url:  "http://localhost/immanuel-app/api/attendances/update.php",
        type : "POST",
        contentType: "application/json",
        data:JSON.stringify({"id": id }),
        dataType: 'json',
        success: function(result){
            alert('Berhasil menandai');
            location.reload(); 
        },
        error: function(xhr, resp, text){
            alert('Gagal menandai' + text);
        }
    });
}
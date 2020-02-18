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
            var url= "login.php"; 
            window.location = url; 
        }
    });
});

// ====================================
// submit form
// ====================================

$(document).on('submit', '#form_tambah_kegiatan', function(e){

    e.preventDefault();

    // get form data
    var sign_up_form=$(this);
    var form_data=JSON.stringify(sign_up_form.serializeObject());

    // submit form data to api
    $.ajax({
        url: "http://localhost/immanuel-app/api/activities/create.php",
        type : "POST",
        contentType : 'application/json',
        data : form_data,
        success : function(result) {
            M.toast({
                html: 'Kegiatan telah dibuat ', 
                outDuration: 1000
            });
            sign_up_form.find('input').val('');
            
        },
        error: function(xhr, resp, text){
            M.toast({html: 'Gagal, mohon hubungi admin.'});
        }
    });

    return false;
});

// function to make form values to json format
$.fn.serializeObject = function(){

    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

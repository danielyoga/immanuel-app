$(document).ready(function(){
    $('.sidenav').sidenav({
      edge: 'right',
      closeOnClick: true
    });
    $('.dropdown-trigger').dropdown();


    // ====================================
    // validation
    // ====================================

    var jwt = JSON.stringify( {jwt: getCookie('jwt')} );

    $.ajax({
        url: "https://immanuelkids-app.com/api-v1/user/validate.php",
        type : "POST",
        contentType : 'application/json',
        data : jwt,
        success : function(result) {          
            // $("#link-profile").attr("href", 'profile.php?id='+ getCookie('immanuel_child'));
            // $("#link-kegiatan").attr("href", 'kegiatan.php?id='+ getCookie('immanuel_child'));
            // $("#link-profile-m").attr("href", 'profile.php?id='+ getCookie('immanuel_child'));
            // $("#link-kegiatan-m").attr("href", 'kegiatan.php?id='+ getCookie('immanuel_child'));

            $("#container-parent").html(result.data.title + " " +result.data.name.split(" ")[0]);

            $('input[name=parent_id]').val(result.data.id);
        },
        error: function(xhr, resp, text){
            var url= "login.php"; 
            window.location = url; 
        }
    });

});

$(document).on('submit', '#form_register_pray', function(e){


    e.preventDefault();

    // get form data
    var sign_up_form=$(this);
    var form_data=JSON.stringify(sign_up_form.serializeObject());

    // submit form data to api
    $.ajax({
        url: "https://immanuelkids-app.com/api-v1/pray/create.php",
        type : "POST",
        contentType : 'application/json',
        data : form_data,
        success : function(result) {
            M.toast({
                html: 'Prayer has been submited.', 
                outDuration: 1000
            });
            sign_up_form.find('textarea').val('');
        },
        error: function(xhr, resp, text){
            M.toast({html: 'Something error with server. Please comeback later.'});
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
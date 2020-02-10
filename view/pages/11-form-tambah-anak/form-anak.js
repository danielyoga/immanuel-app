$(document).ready(function() {

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
        url: "http://localhost/immanuel-app/api/user/validate.php",
        type : "POST",
        contentType : 'application/json',
        data : jwt,
        success : function(result) {          
            $('input[name=parent_id]').val(result.data.id);
        },
        error: function(xhr, resp, text){
            var url= "login.php"; 
            window.location = url; 
        }
    });


    // ====================================
    // init class selection
    // ====================================

    $.ajax({
        url: "http://localhost/immanuel-app/api/class/getall.php" ,
        contentType: "application/json",
        dataType: 'json',
        success: function(result){

            
            var selection = `<select name="class_id">`;

            var classes = result.records;
            classes.forEach(item => {

                selection += '<option value="' + item.id + '">' + item.name+ '</option>';
                
            });
            
            selection += `</select><label>Pilih kelas</label>`;

            $("#select-class").html(selection);
            $('select').not('.disabled').formSelect();

        },
        error: function(xhr, resp, text){
            alert('error page, please call admin.');
        }
    })

});

// ====================================
// submit form
// ====================================

$(document).on('submit', '#form_register_children', function(e){

    e.preventDefault();

    // get form data
    var sign_up_form=$(this);
    var form_data=JSON.stringify(sign_up_form.serializeObject());

    // submit form data to api
    $.ajax({
        url: "http://localhost/immanuel-app/api/children/register.php",
        type : "POST",
        contentType : 'application/json',
        data : form_data,
        success : function(result) {
            M.toast({
                html: 'Child has been added. See <button class="btn-flat toast-action" onclick="window.location.href=`profile.php`">Profile</button>', 
                outDuration: 1000
            });
            sign_up_form.find('input').val('');

            var url= "home.php"; 
            window.location = url; 
        },
        error: function(xhr, resp, text){
            M.toast({html: 'Error, please call admin.'});
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

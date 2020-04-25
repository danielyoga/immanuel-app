$(document).ready(function() {

    $('.sidenav').sidenav({
        edge: 'right',
        closeOnClick: true
      });
    $('.dropdown-trigger').dropdown();


    // ====================================
    // init class selection
    // ====================================

    $.ajax({
        url: "https://immanuelkids-app.com/api-v1/class/getAll.php" ,
        type : "GET",
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
            // alert('something wrong, please call admin.');
            // var url= "home.php"; 
            // window.location = url; 
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
        url: "https://immanuelkids-app.com/api-v1/teachers/create.php",
        type : "POST",
        contentType : 'application/json',
        data : form_data,
        success : function(result) {
            M.toast({
                html: 'Guru berhasil didaftarkan, silahkan login di <button class="btn-flat toast-action" onclick="window.location.href=`login.php`">sini</button>', 
                outDuration: 1000
            });
            sign_up_form.find('input').val('');
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

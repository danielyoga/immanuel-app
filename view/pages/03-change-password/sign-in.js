$(document).ready(function() {
    M.updateTextFields();

    // trigger when login form is submitted
    $(document).on('submit', '#form_login', function(e){

        e.preventDefault();

        // get form data
        var sign_in_form=$(this);
        var form_data=JSON.stringify(sign_in_form.serializeObject());
    
        // submit form data to api
        $.ajax({
            url: "https://immanuelkids-app.com/api-v1/user/changepassword.php",
            type : "POST",
            contentType : 'application/json',
            data : form_data,
            success : function(result) {
                M.toast({ html: 'ganti password sukses, silahkan login kembali di <button class="btn-flat toast-action" onclick="window.location.href=`login.php`">sini</button>' });
                sign_in_form.find('input').val('');
            },
            error: function(xhr, resp, text){
                M.toast({html: 'Wrong phone number or password.'});
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
});
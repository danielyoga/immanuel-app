$(document).ready(function() {
    M.updateTextFields();

    // trigger when registration form is submitted
    $(document).on('submit', '#form_register_parent', function(e){

        e.preventDefault();

        // get form data
        var sign_up_form=$(this);
        var form_data=JSON.stringify(sign_up_form.serializeObject());
    
        // submit form data to api
        $.ajax({
            url: "https://immanuelkids-app.com/api-v1/user/register.php",
            type : "POST",
            contentType : 'application/json',
            data : form_data,
            success : function(result) {
                M.toast({
                    html: 'Account created <button class="btn-flat toast-action" onclick="window.location.href=`login.php`">Login</button>', 
                    outDuration: 1000
                });
                sign_up_form.find('input').val('');
            },
            error: function(xhr, resp, text){
                M.toast({html: 'Phone number has been registered.'});
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
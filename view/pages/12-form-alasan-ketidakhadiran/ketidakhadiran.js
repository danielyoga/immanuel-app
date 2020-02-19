$(document).ready(function() {
    M.updateTextFields();


    // access granted
    var url_string = window.location;
    var url = new URL(url_string);
    var id = url.searchParams.get("id");

    // submit form data to api
    $.ajax({
        url: "http://localhost/immanuel-app/api/attendances/getById.php?id="+id,
        type : "POST",
        contentType : 'application/json',
        success : function(result) {
            $('#keterangan').html("<p><b>" + result.records[0].child_name + "</b> tidak hadir pada kegiatan <b>" + result.records[0].activity_name + "</b> pada tanggal <b>" +  result.records[0].date) + "</b>.</p>";
        },
        error: function(xhr, resp, text){
            window.history.go(-1);
        }
    });

    $('input[name=id]').val(id);

    // trigger when registration form is submitted
    $(document).on('submit', '#form_register_parent', function(e){

        e.preventDefault();

        // get form data
        var sign_up_form=$(this);
        var form_data=JSON.stringify(sign_up_form.serializeObject());
        
        // submit form data to api
        $.ajax({
            url: "http://localhost/immanuel-app/api/attendances/submitReason.php",
            type : "POST",
            contentType : 'application/json',
            data : form_data,
            success : function(result) {
                M.toast({
                    html: 'alasan telah disubmit', 
                    outDuration: 1000
                });
                sign_up_form.find('input').val('');
            },
            error: function(xhr, resp, text){
                M.toast({html: 'alasan gagal untuk disubmit'});
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

$('#btn_decline').click(function(){

    var url_string = window.location;
    var url = new URL(url_string);
    var id = url.searchParams.get("id");

    var data_submit= JSON.stringify({"id":id,"keterangan":"tidak memberikan alasan."});

    // submit form data to api
    $.ajax({
        url: "http://localhost/immanuel-app/api/attendances/submitReason.php",
        type : "POST",
        contentType : 'application/json',
        data : data_submit,
        success : function(result) {

            var url= "login.php"; 
            window.location = url; 
        },
        error: function(xhr, resp, text){
            M.toast({html: 'alasan gagal untuk disubmit'});
        }
    });
}); 
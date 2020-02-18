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
            
                // access granted
                var url_string = window.location;
                var url = new URL(url_string);
                var class_id = url.searchParams.get("id");
              
                //safety handling
                if(class_id != result.data.class_id && result.data.class_id != "0"){
                  // not give an access for page
                  var url= window.history.go(-1); 
                  window.location = url;
                  return false;
                }
              
                $.ajax({
                    url:  "http://localhost/immanuel-app/api/children/getAllByClass.php?class_id="+ class_id,
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(result){

                        var row = "";
                        
                        var children = result.records;
                        children.forEach(item => {


                            row += `
                            <tr>
                                <td>`+item.name+`</td>
                                <td>`+item.parent_title+` `+item.parent_name+`</td>
                                <td><input type="text" id="nomor_telpon_`+item.id+`" value="`+item.parent_phone+`" readonly></td>
                                <td>
                                <button id="copybtn" class="btn-small" onclick="copybtn('nomor_telpon_`+item.id+`')">Copy text</button>
                                </td>
                            </tr>
                            `;
                            
                        });

                        $("#daftar-anak").html(row);

                        

                    },
                    error: function(xhr, resp, text){
                        $("#daftar-anak").html("<tr><td colspan='4'><br><h4 class='center'>Belum ada yang terdaftar</h4></td>");
                    }
                });

        },
        error: function(xhr, resp, text){
            var url= "../login.php"; 
            window.location = url; 
        }
    });


    return false;
});
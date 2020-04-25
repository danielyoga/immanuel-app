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
        url: "https://immanuelkids-app.com/api-v1/user/validate.php",
        type : "POST",
        contentType : 'application/json',
        data : jwt,
        success : function(result) {          
            $("#container-admin").html("Admin - " +result.data.name.split(" ")[0]);

                // ====================================
                // init class card
                // ====================================

                if(result.data.isAdmin != "1"){
                    var url= "kelas.php?id=" + result.data.class_id; 
                    window.location = url;
                    return false;
                }

                if(result.data.isAdmin == "1"){
                    url = "https://immanuelkids-app.com/api-v1/class/getAll.php" ;
                }

                $.ajax({
                    url:  url,
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(result){

                        var card = "";
                        
                        var children = result.records;
                        children.forEach(item => {

                            card += `
                            <a href="kelas.php?id=` + item.id +`">
                                <div class="container">
                                    <div class="card white">
                                    <div class="card-content black-text">
                                        <span class="card-title">` + item.name + `</span>
                                    </div>
                                    </div>
                                </div>
                            </a>
                            `;
                            
                        });

                        $("#class-container").html(card);

                        

                    },
                    error: function(xhr, resp, text){
                        $("#class-container").html("<br><br><br><h4 class='center'>Kelas tidak tersedia.</h4>");
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
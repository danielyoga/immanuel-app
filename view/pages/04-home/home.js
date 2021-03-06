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
            $("#container-parent").html(result.data.title + " " +result.data.name.split(" ")[0]);
            
            var parent_id = result.data.id;

            // ====================================
            // check notif for anak bolos
            // ====================================
            
            $.ajax({
                url: "https://immanuelkids-app.com/api-v1/attendances/getAllByParent.php?id=" + parent_id ,
                contentType: "application/json",
                dataType: 'json',
                success: function(result){
                    
                    var today = new Date;

                    var activity = result.records;
                    activity.forEach(item => {

                        var activity_date = new Date(item.date);
                        activity_date.setHours(11);

                        if(today >= activity_date){
                            var toastHTML = '<span><b><u>'+ item.child_name + "</u></b> tak hadir pada tgl " + item.date+'</span><button onclick="window.location.href=`form-alasan.php?id='+item.id+'`" class="btn-flat toast-action">Lihat Keterangan</button>';
                            M.toast({html: toastHTML,displayLength:60000});
                        }
                    
                    });

                },
                error: function(xhr, resp, text){
                    // do nothing
                }
            });

                // ====================================
                // init children card
                // ====================================

                $.ajax({
                    url: "https://immanuelkids-app.com/api-v1/children/getByParent.php?parent_id=" + parent_id ,
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(result){

                        var card = "";
                        
                        var children = result.records;
                        children.forEach(item => {

                            card += `
                            
                            <a href="./profile.php?id=`+ item.id +`">
                                <div class="row">
                                    <div class="col m3"></div>
                                    <div class="col s12 m6">
                                    <!-- card -->
                                    <div class="card">

                                        <div class="row">

                                            <!-- profile picture -->
                                            <div class="col s5">
                                                <div class="card-image">
                                                    <img src="`+ item.photo +`">
                                                </div>
                                            </div>

                                            <!-- nama anak, kelas -->
                                            <div class="col s7">
                                                <div class="card-content">
                                                <h6 class="black-text flow-text">` + item.name + `</h6>
                                                <h6 class="black-text flow-text">"` + item.class_name + `"</h6>
                                                </div>
                                            </div>

                                        </div>

                                    </div>  
                                    </a> 

                                    </div>
                                    <div class="col m3"></div>
                                </div>
                            </a>
                            
                            `;
                            
                        });

                        $("#children-container").html(card);
                        
                    },
                    error: function(xhr, resp, text){
                        $("#children-container").html("<br><br><br><h4 class='center'>No child available.</h4>");
                    }
                });

        },
        error: function(xhr, resp, text){
            var url= "login.php"; 
            window.location = url; 
        }
    });


    return false;
});
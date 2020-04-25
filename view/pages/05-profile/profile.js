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
            // access granted
            var url_string = window.location;
            var url = new URL(url_string);
            var id = url.searchParams.get("id");

            var parent_id = result.data.id ;

            // ====================================
            // get children profile
            // ====================================

            $.ajax({
                url: "https://immanuelkids-app.com/api-v1/children/getById.php?id=" + id ,
                contentType: "application/json",
                dataType: 'json',
                success: function(result){

                    //safety handling
                    if(parent_id != result[0].parent_id){
                        // not give an access for page
                        var url= "home.php"; 
                        window.location = url;
                        return false;
                    }
                    
                    //save current child
                    setCookie("immanuel_child", id, 1);
                    $("#link-profile").attr("href", 'profile.php?id='+ id);
                    $("#link-kegiatan").attr("href", 'kegiatan.php?id='+ id);
                    $("#link-profile-m").attr("href", 'profile.php?id='+ id);
                    $("#link-kegiatan-m").attr("href", 'kegiatan.php?id='+ id);


                    $('#nama_anak').html(result[0].name);
                    $('#img_anak').html('<img style="border: 1px solid black;" src="' + result[0].photo +'" alt="" class="circle responsive-img"/>');
                    $('#nama_kelas').html(result[0].class_name);



                    // ====================================
                    // get teacher list
                    // ====================================

                    $.ajax({
                        url: "https://immanuelkids-app.com/api-v1/teachers/getByClass.php?class_id=" + result[0].class_id ,
                        contentType: "application/json",
                        dataType: 'json',
                        success: function(result){

                            var card = '';

                            var teacher = result.records;
                            teacher.forEach(item => {

                                card += `
                                    <div class="col s12 m6">
                                    <div class="card horizontal">
                                        <div class="card-image">
                                            <img src="` + item.photo + `">
                                        </div>
                                        <div class="card-stacked">
                                        <div class="card-content">
                                            <span class="card-title">` + item.name + `</span>
                                        </div>
                                        <div class="card-action">
                                            <a target="__blank" href="https://api.whatsapp.com/send?phone=` + item.phone_number + `" class="waves-effect waves-light btn"><i class="material-icons">message</i></a>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    `;

                            });
                            
                            $('#teacher-list-container').html(card);
        
                        },
                        error: function(xhr, resp, text){
                            $('#teacher-list-container').html("<h4 class='center'>No teachers available.</h4>");
                        }
                    });

                    
                },
                error: function(xhr, resp, text){
                    alert('Child doesn\'t exist. Please call admin.');
                    var url= "home.php"; 
                    window.location = url; 
                }
            });

        },
        error: function(xhr, resp, text){
            var url= "login.php"; 
            window.location = url; 
        }
    });

});
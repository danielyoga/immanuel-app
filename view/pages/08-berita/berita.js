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

                // $("#link-profile").attr("href", 'profile.php?id='+ getCookie('immanuel_child'));
                // $("#link-kegiatan").attr("href", 'kegiatan.php?id='+ getCookie('immanuel_child'));
                // $("#link-profile-m").attr("href", 'profile.php?id='+ getCookie('immanuel_child'));
                // $("#link-kegiatan-m").attr("href", 'kegiatan.php?id='+ getCookie('immanuel_child'));

                
                $("#container-parent").html(result.data.title + " " +result.data.name.split(" ")[0]);

                // ====================================
                // init event images
                // ====================================

                $.ajax({
                    url: "http://localhost/immanuel-app/api/events/getEvents.php",
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(result){

                        var card = "";
                        
                        var event = result.records;
                        event.forEach(item => {

                            card += `
                            <a href="`+item.poster+`">
                            <div class="card col s12 m4">
                                <img class="materialboxed" src="` + item.poster + `" style="width:50%;"/>
                            </div>
                            </a>
                            `;
                            
                        });

                        $("#event-container").html(card);
                        
                    },
                    error: function(xhr, resp, text){
                        $("#event-container").html("<h4 class='center'>No events available.</h4>");
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
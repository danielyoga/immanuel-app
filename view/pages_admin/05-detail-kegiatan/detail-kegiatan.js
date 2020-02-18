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
                var activity_id = url.searchParams.get("id");

                //safety handling
                if(activity_id != getCookie('immanuel_admin_activity')){
                    // not give an access for page
                    var url= history.back(); 
                    window.location = url;
                    return false;
                }

                $.ajax({
                    url: "http://localhost/immanuel-app/api/activities/getById.php?id=" + activity_id,
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(result){
                      var nameOfDay = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];                     

                      // set date
                      var date = new Date(result[0].date);
                      var setupMonth = parseInt(date.getMonth()) + 1;
                      var dateStr = nameOfDay[date.getDay()] + ", " + date.getDate() + "-" + setupMonth + "-" + date.getFullYear();                           
                                  
                      $("#date-container").html(dateStr);
                      $("#title-container").html(result[0].title);
                      $("#reference-container").html(result[0].reference);
                      $("#presenter-container").html("Oleh: " + result[0].presenter);
                      $("#summary-container").html(result[0].summary);

                    },
                    error: function(xhr, resp, text){
                      var url = history.back(); 
                      window.location = url; 
                    }
                });



                // ====================================
                // init media images
                // ====================================

                $.ajax({
                  url: "http://localhost/immanuel-app/api/medias/getAllByActivity.php?id=" + activity_id,
                  contentType: "application/json",
                  dataType: 'json',
                  success: function(result){

                      var card = "";
                      
                      var event = result.records;
                      event.forEach(item => {

                          card += `
                          <a href="`+item.photo+`">
                          <div class="col s12 m4">
                              <img class="responsive-img" src="` + item.photo +`" >
                          </div>
                          </a>
                          `;
                          
                      });

                      $("#media-container").html(card);
                      
                  },
                  error: function(xhr, resp, text){
                      $("#media-container").html("<h4 class='center'>No media available.</h4>");
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
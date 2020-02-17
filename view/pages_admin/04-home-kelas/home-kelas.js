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

                var now = new Date();
                month= now.getMonth() + 1;

                $.ajax({
                    url:  "http://localhost/immanuel-app/api/activities/getByClass.php?id="+ class_id + "&month=" + month,
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(result){

                        var nameOfDay = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
                        var thresholdSummaryChar = 200;

                        var card = "";
                        
                        var activity = result.records;
                        activity.forEach(item => {

                            // set date
                            var date = new Date(item.date);
                            var setupMonth = parseInt(date.getMonth()) + 1;

                            // set neat summary
                            if(item.summary.length > thresholdSummaryChar){
                                item.summary = item.summary.substr(0, thresholdSummaryChar) + "... "; 
                            }

                            card += `
                            <div class="col s12 m6">
        
                            <div class="card">
                  
                              <!-- Card Date -->
                              <div class="card-action black-text">
                                  <i class="material-icons">date_range</i>
                                  ` + nameOfDay[date.getDay()] + ", " + date.getDate() + "-" + setupMonth + "-" + date.getFullYear() + `
                              </div>
                  
                              <div class="card-content black-text">
                  
                                <!-- Card Title -->
                                <span class="card-title">
                                    <img src="../view/icon-assets/bible-icon.png" style="width:8%;">
                                    ` + item.title + `
                                </span>
                  
                        <!-- !!! ukuran img dibuat lebih kecil !!! -->
                              
                                <!-- Card Ayat -->
                                <span class="card-action">
                                  <h5 class="left btn black white-text" style="border-radius:25px;">
                                  ` + item.reference + `
                                  </h5>
                                  <br>
                                  <br>
                                </span>
                  
                              </div>
                  
                              <!-- Card Description -->
                              <div class="card-action black-text">
                                <p>
                                ` + item.summary + `
                                </p>
                                <a href="detail-kegiatan.php?id=`+item.id+`" class="waves-effect waves-light btn">Detail</a>
                              </div>
                              
                  
                            </div> <!-- end | card -->
                          
                          </div> <!-- end | col -->
                            `;
                            
                        });

                        $("#activity-container").html(card);

                        

                    },
                    error: function(xhr, resp, text){
                        $("#activity-container").html("<br><br><br><h4 class='center'>Kegiatan tidak tersedia.</h4>");
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



// SELECT
function showActivityOnMonth(month){
    // access granted
    var url_string = window.location;
    var url = new URL(url_string);
    var class_id = url.searchParams.get("id");

    $.ajax({
        url:  "http://localhost/immanuel-app/api/activities/getByClass.php?id="+ class_id + "&month=" + month,
        contentType: "application/json",
        dataType: 'json',
        success: function(result){

            var nameOfDay = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            var thresholdSummaryChar = 200;

            var card = "";
            
            var activity = result.records;
            activity.forEach(item => {

                // set date
                var date = new Date(item.date);
                var setupMonth = parseInt(date.getMonth()) + 1;

                // set neat summary
                if(item.summary.length > thresholdSummaryChar){
                    item.summary = item.summary.substr(0, thresholdSummaryChar) + "... "; 
                }

                card += `
                <div class="col s12 m6">

                <div class="card">
      
                  <!-- Card Date -->
                  <div class="card-action black-text">
                      <i class="material-icons">date_range</i>
                      ` + nameOfDay[date.getDay()] + ", " + date.getDate() + "-" + setupMonth + "-" + date.getFullYear() + `
                  </div>
      
                  <div class="card-content black-text">
      
                    <!-- Card Title -->
                    <span class="card-title">
                        <img src="../view/icon-assets/bible-icon.png" style="width:8%;">
                        ` + item.title + `
                    </span>
      
            <!-- !!! ukuran img dibuat lebih kecil !!! -->
                  
                    <!-- Card Ayat -->
                    <span class="card-action">
                      <h5 class="left btn black white-text" style="border-radius:25px;">
                      ` + item.reference + `
                      </h5>
                      <br>
                      <br>
                    </span>
      
                  </div>
      
                  <!-- Card Description -->
                  <div class="card-action black-text">
                    <p>
                    ` + item.summary + `
                    </p>
                    <a href="../05-detail-kegiatan/05-detail-kegiatan.php" class="waves-effect waves-light btn">Detail</a>
                  </div>
                  
      
                </div> <!-- end | card -->
              
              </div> <!-- end | col -->
                `;
                
            });

            $("#activity-container").html(card);

            

        },
        error: function(xhr, resp, text){
            $("#activity-container").html("<br><br><br><h4 class='center'>Kegiatan tidak tersedia.</h4>");
        }
    });
}
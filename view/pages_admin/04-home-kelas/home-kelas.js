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
            
                // access granted
                var url_string = window.location;
                var url = new URL(url_string);
                var class_id = url.searchParams.get("id");
              
                //safety handling
                // if(class_id != result.data.class_id && result.data.class_id != "0"){
                //   // not give an access for page
                //   var url= window.history.go(-1); 
                //   window.location = url;
                //   return false;
                // }


                // install float button
                $('#button_add-container').html('<a class="btn-floating btn-large" href="form-tambah-kegiatan.php?id='+class_id+'"><i class="large material-icons light-blue darken-4">add</i></a>');

                var now = new Date();
                month= now.getMonth() + 1;

                $.ajax({
                    url:  "https://immanuelkids-app.com/api-v1/activities/getByClass.php?id="+ class_id + "&month=" + month,
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
                                <a href="javascript:goToDetail(`+item.id+`)" class="waves-effect waves-light btn">Detail</a>
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
        url:  "https://immanuelkids-app.com/api-v1/activities/getByClass.php?id="+ class_id + "&month=" + month,
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
                    <a href="javascript:goToDetail(`+ item.id +`)" class="waves-effect waves-light btn">Detail</a>
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

function goToDetail(id){
  var url= "detail-kegiatan.php?id="+id;
  setCookie("immanuel_admin_activity", id, 1);
  window.location = url;
}
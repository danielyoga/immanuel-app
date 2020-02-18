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
                var id = url.searchParams.get("id");

                // setup link            
                $("#link-profile").attr("href", 'profile.php?id='+ getCookie('immanuel_child'));
                $("#link-kegiatan").attr("href", 'kegiatan.php?id='+ getCookie('immanuel_child'));
                $("#link-profile-m").attr("href", 'profile.php?id='+ getCookie('immanuel_child'));
                $("#link-kegiatan-m").attr("href", 'kegiatan.php?id='+ getCookie('immanuel_child'));

                //safety handling
                if(id != getCookie('immanuel_child')){
                    // not give an access for page
                    var url= javascript:window.history.go(-1); 
                    window.location = url;
                    return false;
                }

                // ====================================
                // init activities card
                // ====================================

                $.ajax({
                    url: "http://localhost/immanuel-app/api/activities/getByChildren.php?id=" + id,
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(result){

                        var nameOfDay = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
                        var thresholdSummaryChar = 200;

                        var card = "";
                        
                        var activities = result.records;
                        activities.forEach(item => {

                            // set date
                            var date = new Date(item.date);
                            
                            var setupMonth = parseInt(date.getMonth()) + 1;

                            // set neat summary
                            if(item.summary.length > thresholdSummaryChar){
                                item.summary = item.summary.substr(0, thresholdSummaryChar) + "... "; 
                            }

                            card += `
                            
                            <div class="col s12 m6">
                                <a href="javascript:goToDetail(` + item.id + `)">
                                <div class="card">

                                    <!-- Card Date -->
                                    <div class="card-action black-text">
                                        <i class="material-icons">date_range</i>
                                        ` + nameOfDay[date.getDay()] + ", " + date.getDate() + "-" + setupMonth + "-" + date.getFullYear() + `
                                    </div>

                                    <div class="card-content black-text">

                                    <!-- Card Title -->
                                    <span class="card-title">
                                        <img src="./view/icon-assets/bible-icon.png" style="width:8%;">
                                        ` + item.title + `
                                    </span>
                                    
                                    <!-- Card Ayat -->
                                    <span class="card-action">
                                        <h5 class="left btn black white-text" style="border-radius:25px;">
                                        ` + item.reference + `
                                        </h5>
                                        <br>
                                    </span>

                                    </div>

                                    <!-- Card Description -->
                                    <div class="card-action black-text">
                                    <p>
                                        ` + item.summary + `
                                    </p>
                                    </div>

                                </div> <!-- end | card -->
                                </a>
                                </div> <!-- end | col -->
                            
                            `;
                            
                        });

                        $("#activities-container").html(card);
                              

                    },
                    error: function(xhr, resp, text){
                        $("#activities-container").html("<h4 class='center'>No activities available.</h4>");
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

function goToDetail(id){
    var url= "kegiatan-detail.php?id="+id;
    setCookie("immanuel_activity", id, 1);
    window.location = url;
}
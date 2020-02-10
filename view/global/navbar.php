<script>
function logout(){
    unSetCookie("jwt");
    var url= "login.php"; 
    window.location = url; 
}
</script>

<!-- top bar -->        
<div class="container-fluid">
    <div class="navbar-fixed">

        <nav>
        <div class="nav-wrapper" style="background-color: #001D39;">
            <!-- Home Button Trigger -->
            <a href="../04-home/04-home.php" class="sidenav-trigger"><i class="material-icons">home</i></a>

            <!-- Sidenav Trigger -->
            <a href="#" data-target="mobile-menu" class="sidenav-trigger right"><i class="material-icons">menu</i></a>

            <!-- Home Button Trigger -->
            <ul class="left hide-on-med-and-down">
            <li><a href="../04-home/04-home.php"><i class="material-icons">home</i></a></li>
            </ul>

            <ul class="right hide-on-med-and-down">
                <li><a href="../../pages/05-profile/05-profile.php">Profile</a></li>
                <li><a href="../../pages/06-kegiatan/06-kegiatan.php">Kegiatan</a></li>
                <li><a href="../../pages/08-berita/08-berita.php">Berita</a></li>
                <li><a class="white-text" href="../09-saran-kritik/09-saran-kritik.php">Saran & Kritik</a></li>
                <li><a class="white-text" href="../10-pray/10-pray.php">Pray</a></li>


            <li><a href="javascript:logout();">Log Out</a></li>
            </ul>

        </div>
        </nav>         
        

    </div>
</div>




<!-- sidenav mobile-->
<ul class="sidenav" id="mobile-menu">
    
    <a href="#" class="brand-logo">  
        <!-- TODO: clean code -->
        <!-- <img src="../../img/logo.png" style="width: 80%;margin: 0;"> -->
    </a>

    <!-- sidenav content -->
    <li><a href="../../pages/05-profile/05-profile.php">Profile</a></li>
    <li><a href="../../pages/06-kegiatan/06-kegiatan.php">Kegiatan</a></li>
    <li><a href="../../pages/08-berita/08-berita.php">Berita</a></li>
    <li><a href="../09-saran-kritik/09-saran-kritik.php">Saran & Kritik</a></li>
    <li><a href="../10-pray/10-pray.php">Pray</a></li>
    <li><a href="javascript:logout();"><i class="material-icons" style="color: white;">close</i>Log Out</a></li>
    
</ul>
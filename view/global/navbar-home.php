<script>
function logout(){
    unSetCookie("jwt");
    unSetCookie("immanuel_activity");
    unSetCookie("immanuel_child");
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
            <a href="home.php" class="sidenav-trigger"><i class="material-icons">home</i></a>

            <a href="#" class="brand-logo center" id="container-parent">Logo</a>

            <!-- Sidenav Trigger -->
            <a href="#" data-target="mobile-menu" class="sidenav-trigger right"><i class="material-icons">menu</i></a>

            <ul class="left hide-on-med-and-down">
                <li><a href="home.php"><i class="material-icons">home</i></a></li>
            </ul>
            
            <ul class="right hide-on-med-and-down">
                <li><a href="berita.php">Berita</a></li>
                <li><a href="saran-kritik.php">Saran & Kritik</a></li>
                <li><a href="pray.php">Pray</a></li>
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
    
    <li><a href="berita.php">Berita</a></li>
    <li><a href="saran-kritik.php">Saran & Kritik</a></li>
    <li><a href="pray.php">Pray</a></li>
    <li><a href="javascript:logout();"><i class="material-icons" style="color: white;">close</i>Log Out</a></li>
    
</ul>
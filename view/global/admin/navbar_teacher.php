<!-- top bar -->        
<div class="container-fluid">
    <!-- <div class="navbar-fixed"> -->

        <nav>
        <div class="nav-wrapper" style="background-color: #001D39;">
            <!-- Home Button Trigger -->
            <a href="../admin/home.php" class="sidenav-trigger"><i class="material-icons">home</i></a>

            <!-- Sidenav Trigger -->
            <a href="#" data-target="mobile-menu" class="sidenav-trigger right"><i class="material-icons">menu</i></a>

            <!-- Home Button Trigger -->
            <ul class="left hide-on-med-and-down">
            <li><a href="../admin/home.php"><i class="material-icons">home</i></a></li>
            </ul>

            <ul class="right hide-on-med-and-down">
                <!-- log out , cara 1 hapus cookie -->
                <li><a href="javascript:logout()">Log Out</a></li>
            </ul>

        </div>
        </nav>         

    </div>
</div>


<!-- sidenav mobile-->
<ul class="sidenav" id="mobile-menu">

    <!-- sidenav content -->
    <li><a href="javascript:logout()"><i class="material-icons" style="color: black;">close</i>Log Out</a></li>
    
</ul>

<!-- Compiled and minified JavaScript -->
<!-- JavaScript at end of body for optimized loading-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    
<script src="../view/script/cookies.js"></script>
<script>
    function logout(){
        unSetCookie("jwt");
        unSetCookie("immanuel_admin_activity");
        unSetCookie("immanuel_admin_class");
        unSetCookie("immanuel_admin_class_id");
        var url= "../login.php"; 
        window.location = url; 
    }
</script>
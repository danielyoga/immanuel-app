<!-- top bar -->        
<div class="container-fluid">
    <div class="navbar-fixed">

        <nav>
        <div class="nav-wrapper" style="background-color: #001D39;">
            <a href="#!" class="brand-logo"> <h5> Profile </h5> </a>
            <!-- Back Button Trigger -->
            <a href="#home" class="sidenav-trigger"><i class="material-icons">arrow_back</i></a>
            <!-- Sidenav Trigger -->
            <a href="#" data-target="mobile-menu" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
            
            <ul class="right hide-on-med-and-down">
            <li><a href="#">Home</a></li>

            <!-- Dropdown Children Trigger -->
            <li>
                <a class="dropdown-trigger" href="#!" data-target="menu-group-children">
                Children<i class="material-icons right">arrow_drop_down</i>
                </a>
            </li>
            <!-- Dropdown Events Trigger -->
            <li>
                <a class="dropdown-trigger" href="#!" data-target="menu-group-events">
                Events<i class="material-icons right">arrow_drop_down</i>
                </a>
            </li>
            <!-- Dropdown Misc Trigger -->
            <li>
                <a class="dropdown-trigger" href="#!" data-target="menu-group-misc">
                Misc<i class="material-icons right">arrow_drop_down</i>
                </a>
            </li>

            <!-- cara 1 hapus cookie -->
            <li><a href="javascript:unSetCookie('jwt')" id="logout">Logout</a></li>
            </ul>

        </div>
        </nav>         
        

    </div>
</div>

<!-- dropdown menu group children -->
<ul id='menu-group-children' class="dropdown-content">
    <li><a href="#">Profile</a></li>
    <li><a href="#">Kegiatan</a></li>
</ul>

<!-- dropdown menu group events -->
<ul id='menu-group-events' class="dropdown-content">
    <li><a href="#">Media</a></li>
    <li><a href="#">Berita</a></li>
</ul>

<!-- dropdown menu group misc -->
<ul id='menu-group-misc' class="dropdown-content">
    <li><a href="#">Saran & Kritik</a></li>
    <li><a href="#">Pray</a></li>
</ul>

<!-- sidenav bar -->
<ul class="sidenav" id="mobile-menu">
    
    <a href="#" class="brand-logo">  
        <!-- TODO: clean code -->
        <!-- <img src="../../img/logo.png" style="width: 80%;margin: 0;"> -->
    </a>

    <li><a href="#">Home</a></li>
    <li><a href="#">Profile</a></li>
    <li><a href="#">Kegiatan</a></li>
    <li><a href="#">Media</a></li>
    <li><a href="#">Berita</a></li>
    <li><a href="#">Saran & Kritik</a></li>
    <li><a href="#">Pray</a></li>
</ul>
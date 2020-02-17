<!-- top bar -->        
<div class="container-fluid">
    <!-- <div class="navbar-fixed"> -->

        <nav>
        <div class="nav-wrapper" style="background-color: #001D39;">
            <!-- Home Button Trigger -->
            <a href="../03-home/03-home.php" class="sidenav-trigger"><i class="material-icons">home</i></a>

            <!-- Sidenav Trigger -->
            <a href="#" data-target="mobile-menu" class="sidenav-trigger right"><i class="material-icons">menu</i></a>

            <!-- Home Button Trigger -->
            <ul class="left hide-on-med-and-down">
            <li><a href="../03-home/03-home.php"><i class="material-icons">home</i></a></li>
            </ul>

            <ul class="right hide-on-med-and-down">
                <li><a href="../07-saran-dan-kritik">Saran & Kritik</a></li>
                <li><a href="../08-alasan-ketidakhadiran">Alasan Ketidakhadiran</a></li>
                <li><a href="../09-bantuan-doa">Pray</a></li>
                <!-- log out , cara 1 hapus cookie -->
                <li><a href="javascript:unSetCookie('jwt')">Log Out</a></li>
            </ul>

        </div>
        </nav>         

    </div>
</div>


<!-- sidenav mobile-->
<ul class="sidenav" id="mobile-menu">

    <!-- sidenav content -->
    <li><a href="../07-saran-dan-kritik">Saran & Kritik</a></li>
    <li><a href="../08-alasan-ketidakhadiran">Alasan Ketidakhadiran</a></li>
    <li><a href="../09-bantuan-doa">Pray</a></li>
    <li><a href="javascript:unSetCookie('jwt')"><i class="material-icons" style="color: black;">close</i>Log Out</a></li>
    
</ul>

<!-- Compiled and minified JavaScript -->
    <!-- JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="../../script/cookies.js"></script>

    <script>
      $(document).ready(function(){
        // letakkan initialize object di dalam document ready
        // jika tidak maka javascript tidak akan menginitialize object tersebut,
        // ketika document/halaman sudah siap
        $('.sidenav').sidenav({
          edge: 'right', // Choose the horizontal origin
          closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
        });
        $('.dropdown-trigger').dropdown();

        // store jwt to cookie
        setCookie("jwt", "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLm9yZyIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUuY29tIiwiaWF0IjoxMzU2OTk5NTI0LCJuYmYiOjEzNTcwMDAwMDAsImRhdGEiOnsiaWQiOiIxIiwibGFzdG5hbWUiOiJwYXJlbnQxIiwiZW1haWwiOiJwYXJlbnQxQGVtYWlsLmNvbSJ9fQ.PeGa_mKzIwZRPIPkRy9jCtPtNJfeFob__1dkd2CPDaA", 1);
      });

      // cara 2 hapus cookie
      $('#logout').click(function(){
        unSetCookie("jwt");
      });

    </script>
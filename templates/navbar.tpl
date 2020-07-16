<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container">
                <ul class="navbar-nav">
                        <ul class="navbar-nav">
                                <span class="nav-link" href="">Benvenuto&nbsp{$Username}</span>
                                <a class="nav-link space" href=""> &nbsp;</a>
                                <a class="nav-link" href="/playadice"> &nbsp;Home</a>
                                <a class="nav-link" href="/playadice/evento/showAll"> &nbsp;Eventi</a>
                                <a class="nav-link" href="/playadice/catalogo/catalogocompleto"> &nbsp;Giochi</a>
                                <a class="nav-link" href="/playadice/ricerca/ShowPersonal">   &nbsp;AreaTWG</a>
                                {if $UtenteType != "ospite"}
                                        <a class="nav-link" href="/playadice/utente/openProfile">&nbsp;Profilo</a>
                                {/if}

                        </ul>
                </ul>
        </div>
        <div class="container">
        </div>
        {if $Username eq "Ospite"}
        <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/utente/login">Login/Sign Up</a>
        {else}
        <a class="btn navbar-btn ml-md-2 btn-light text-dark" href="/playadice/utente/logout">Logout</a>
        {/if}

        <a href="" class="nav-link space">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
        <ul class="navbar-nav flex-row justify-content-center mt-2 mt-md-0">
                <li class="nav-item mx-3 mx-md-1">
                        <a class="nav-link" href="https://www.facebook.com/Playadice/" target="_blank" data-placement="bottom" data-toggle="tooltip" title="Like us on Facebook">
                                <i class="fa fa-fw fa-facebook-official fa-2x"></i>
                        </a>
                </li>
                <li class="nav-item ml-1">
                        <a class="nav-link" href="https://www.instagram.com/playadiceofficial/" target="_blank" data-placement="bottom" data-toggle="tooltip" title="Follow us on Instagram">
                                <i class="fa fa-fw fa-instagram fa-2x"></i>
                        </a>
                </li>
        </ul>
</nav>

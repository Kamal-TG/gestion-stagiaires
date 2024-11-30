<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Gestion des Stagiaires</a>

    <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
        </li>
    </ul>
</header>

<div class="container-fluid" >
    <div class="row">
        <div id='MaxBar' class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary" style="min-height: 100vh;">
            <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="sidebarMenuLabel">Gestion des Stagiaires</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto" >
                <button class='IdClose' onclick='Event1("Close")'><i class="bi bi-box-arrow-left " style="font-size: 30px;"></i></button>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="/">
                                <i class="bi bi-person-fill-add"></i>
                                Ajouter un stagiaire
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 active" href="/show">
                                <i class="bi bi-trash3-fill"></i>
                                Consultation les données d'un stagiaire
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 active" href="/edit">
                                <i class="bi bi-pencil-square"></i>
                                Modifier les données d'un stagiaire
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="/list">
                                <i class="bi bi-search"></i>
                                Lister les stagiaires
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="/absents/create">
                                <i class="bi bi-calendar2-x"></i>
                                Gestion des absences
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Code add start here-->
        <div  id='MinBar' class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary" style="min-height: 100vh;width: 50px;">
            <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                <button class='IdDisplay' onclick='Event1("Display")'><i class="bi bi-house-fill " ></i></button>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="/">
                                <i class="bi bi-person-fill-add"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 active" href="/show">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 active" href="/edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="/list">
                                <i class="bi bi-search"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="/absence">
                                <i class="bi bi-patch-plus"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="/history">
                                <i class="bi bi-eye"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
         <!-- End Here -->

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <?php if (isset($heading)) : ?>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><?= $heading ?></h1>
                </div>
            <?php endif ?>
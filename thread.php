<?php
@include_once('app/templates/bovenstuk.php');
@include_once('app/database/db.php');

if(!isset($_GET['id'])) {
    header('Location: index.php');
    exit(0);
}

$thread_id = $_GET['id'];

if(dbConnect()) {
    $sql = "SELECT * FROM topics
            WHERE thread_id = :id";
    // We zijn nog niet klaar
   
}
?>

<!-- BEGIN PAGINA CONTAINER -->
<div class="container main-content">
    <div class="row first-row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
               <span class="card-title">
                  Threads
               </span>
                    <div class="collection">

                        <!-- BEGIN VAN EEN THREAD -->
                        <a href="thread.html" class="collection-item avatar collection-link">
                            <img src="img/icon-php.png" alt="" class="circle">
                            <div class="row">
                                <div class="col s9">
                                    <div class="row last-row">
                                        <div class="col s12">
                                            <span class="title">PHP</span>
                                            <p>Eerste paar regels van het nieuwste bericht en door wie en wanneer</p>
                                        </div>
                                    </div>
                                    <div class="row last-row">
                                        <div class="col s12 post-timestamp">Moderator: SMN</div>
                                    </div>
                                </div>
                                <div class="col s3">
                                    <h6 class="title center-align">Statistieken</h6>
                                    <p class="center-align">26 topics</p>
                                </div>
                            </div>
                        </a>
                        <!-- EINDE VAN EEN THREAD -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- EINDE PAGINA CONTAINER -->

<?php
@include_once('app/templates/onderstuk.php');
<?php
@include_once('app/templates/bovenstuk.php');

try {
    // Proberen we de code uit

   // Stap 1. Connectie met de database
   $db_connection = new PDO(
           'mysql:host=localhost;dbname=forum_klas1',
      'root',
      'root'
   );

   // Stap 2. SQL-opdracht samenstellen
   $sql = 'SELECT threads.*, users.username, COUNT(topics.id) AS AantalTopics
            FROM threads
            INNER JOIN users ON users.id = threads.user_id
            INNER JOIN topics ON topics.thread_id = threads.id
            GROUP BY threads.id';

   // Stap 3. SQL-opdracht naar de DB-server sturen
   $db_statement = $db_connection->prepare($sql);
   $db_statement->execute();

   // Stap 4. ResultSet opvragen bij de DB-server
   $threads = $db_statement->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $error) {
    // Fout is hier opgevangen en ik bepaal wat
    // we nu gaan doen met deze fout
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

               <?php foreach($threads as $thread): ?>
                  <!-- BEGIN VAN EEN THREAD -->
                  <a href="thread.html" class="collection-item avatar collection-link">
                     <img src="img/icon-php.png" alt="" class="circle">
                     <div class="row">
                        <div class="col s9">
                           <div class="row last-row">
                              <div class="col s12">
                                 <span class="title">
                                     <?php echo $thread['title']; ?>
                                 </span>
                                 <p>
                                     <?php echo substr($thread['content'],0,200) . '....' ?>
                                 </p>
                              </div>
                           </div>
                           <div class="row last-row">
                              <div class="col s12 post-timestamp">
                                 Moderator:
                                 <?php echo $thread['username']; ?>
                              </div>
                           </div>
                        </div>
                        <div class="col s3">
                           <h6 class="title center-align">Statistieken</h6>
                           <p class="center-align"> <?php echo $thread['AantalTopics']; ?> topics</p>
                        </div>
                     </div>
                  </a>
                  <!-- EINDE VAN EEN THREAD -->
                <?php endforeach; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- EINDE PAGINA CONTAINER -->

<?php
include_once('app/templates/onderstuk.php');

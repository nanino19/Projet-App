<?php include('../composant/header.php'); ?>
<?php include('../composant/menu.php'); ?>
<?php include('../back/fonction.php'); ?>
<?php
$id_film = $_GET['id'];
$film = getAllSeanceByFilm($id_film);

echo "<pre>";
    print_r($film);
    echo "</pre>";

    print_r($film['film']);
?>
<style>
    body { font-family: Arial, sans-serif; }
    .container { margin: 20px; }
    .video { width: 100%; height: auto; background-color: #ccc; }
    .info, .calendar, .sessions { margin-top: 20px; padding: 20px; }
    .info { background-color: #f8d7da; }
    .calendar { background-color: #d4edda; }
    .sessions { background-color: #fff3cd; }
</style>

<div class="container">
    <div class="affiche">
        <?php echo'<img src="../uploads/'.$film['film']['image'].'" height="300" />'; ?>
    </div>
    <div class="video">
        <!-- Placeholder for video/trailer -->
        <iframe width="560" height="315" src=<?php echo $film['film']['video'] ?> 
    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
    allowfullscreen></iframe>
        
    </div>
    <div class="info">
        <h2><?php echo $film['film']['titre'];?> </h2>
        <p><?php echo $film['film']['description'];?> </p>
        <p><?php echo $film['film']['duree'];?> </p>
        <p><?php echo $film['film']['note'];?></p>
        <p>Date de sortie: ...</p>
    </div>
    <div class="calendar">
        <!-- Placeholder for calendar -->
        Calendrier à faire
    </div>
    <div class="sessions">
        <!-- Loop through sessions -->
        <?php foreach ($film['seances'] as $session): ?>
        <button><?= $session['horaire'] ?></button>
        <?php endforeach; ?>
    </div>
</div>
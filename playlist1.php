<?php
//connexion à la base de données
try {
    $db = new PDO('mysql:host=localhost;dbname=playlist;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $exception) {
    die('Erreur : ' . $exception->getMessage());
}

if (isset($_GET['style_id'])) {
    $query_songs = $db->prepare('SELECT so.*, s.name as style_name
FROM song so JOIN style s
WHERE style_id = ?
ORDER BY add_date 
DESC');
    $query_songs->execute(array($_GET['style_id']));
} else {
    $query_songs = $db->query('SELECT so.*, GROUP_CONCAT( st.name )as style_name
FROM song so 
JOIN song_style ss
ON so.id = ss.song_id
JOIN style st
ON ss.style_id = st.id
GROUP BY so.id
ORDER BY so.add_date DESC');
}

$songs = $query_songs->fetchAll();



//"lecture" d'une chanson dont l'id est passé en paramètre URL (affiché en dessous de la boucle)
if (isset($_GET['song_id'])) {
//préparation de la requête
    $query_song = $db->prepare('SELECT title, artist FROM song WHERE id = ?');
    $query_song->execute(array($_GET['song_id']));

//selectionner un seul enregistrement avec fetch()
    $result_song = $query_song->fetch();
}

if (isset($_GET['style_id'])) {
    $query_style = $db->prepare('SELECT name FROM style WHERE id = ?');
    $query_style->execute(array($_GET['style_id']));
    $result_style = $query_style->fetch();
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="playlist.css">
    <title>Intégration playlist Spotify</title>
</head>
<body>

<?php if (isset($result_style) AND $result_style != false): ?> <!--ca veut dire s'il a été trouvé dans la bdd -->
    <h1>
        Style de la chanson :
        <?php echo $result_style['name']; ?>
    </h1>
<?php else : ?>
    <h1>Toutes les musiques</h1>
<?php endif; ?>


<div id="table">
    <div class="table-head">
        <div id="title">TITRE</div>
        <div id="artiste">ARTISTE</div>
        <div id="album">ALBUM</div>
        <div id="calendar"><i class="fa fa-calendar"></i></div>
        <div id="clock"><i class="fa fa-clock-o"></i></div>
        <div id="style">STYLE</
        >
    </div>
</div>
<!-- les de chansons -->
<!-- vérifier s'il y a des chansons avant de lancer la boucle pour éviter les erreurs -->
<?php if (count($songs) > 0): ?>
    <?php foreach ($songs as $key => $song) : ?>
        <div class='rowplaylist'>
            <div class='bloctitle'><?php echo $song['title']; ?></div>
            <div class='blocartist'><?php echo $song['artist']; ?></div>
            <div class='blocalbum'><?php echo $song['album']; ?></div>
            <div class='blocdate'><?php echo $song['add_date']; ?></div>
            <div class='blocduration'><?php echo $song['duration']; ?></div>
            <div class='blocstyle'><?php echo $song['style_name']; ?></div>
        </div>
    <?php endforeach; ?>
    <!-- si pas de chansons afficher un message -->
<?php else: ?>
    aucne chanson à afficher
<?php endif;?>


<!-- lecture d'une chanson -->
<!-- s'assurer que $result_song existe ET ne vaut pas false -->
<?php if (isset($result_song) AND $result_song): ?>
    Lecture de la chanson :
    <?php echo $result_song['title']; ?>
    par
    <?php echo $result_song['artist']; ?>
<?php endif; ?>
</div>
</body>
</html>
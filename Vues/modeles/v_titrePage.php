<div class="navabar-header">

<?php 
if(isset($_GET['titre'])){
    $titre = $_GET['titre'];
    echo '<h1>' . $titre .'</h1>';
}
?>
</div>
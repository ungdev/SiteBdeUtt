<?php
session_start();
session_unset();  
echo "<script type='text/javascript'>document.location.replace('location.php');</script>"; //redirection vers le menu principal
echo "<p>Si la redirection automatique n'a pas fonctionnée, veuillez cliquez sur le lien ci dessous pour revenir à l'acceuil</p>";
echo "<p><a href=\"location.php\">Acceuil</a></p>";
?>
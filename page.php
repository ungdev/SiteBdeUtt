<?php
session_start();

Class Page {

    private $conn;

    function __construct($db){
        $this->conn = $db;
    }

    function espaceLog($user){
        

        ?>
        <div id="logInfo" style="display:none;">
            
			<p>Nous avons un parc de matériel important vous permetant d'emprunter gratuitement
			des tentes / appareil à raclette / appareil à fondue et tant d'autres.</p>
			<p>
            Les possibilitées s'arrêtent là où vous les fixez : <br/>
            - Week-End camping entre amis ? Louez nos tente <br/>
            - Soirée raclette à la coloc ? Empruntez nos appareils <br/>
            - Une envie de bonnes frites maison ? Nos friteuses vous seront sûrement utiles </p>
            
            
            
            <p>
                Une question / suggestion / commentaire ? n'hesitez pas à le poster en dessous
            </p>
            <form method="post" action="commentaire.php">
			    <input type="hidden" name="type" value="sugg"/>
                <input type="hidden" name="user" value="<?php echo $user->getNumetu(); ?>"/>						
				<table style="padding-bottom:40px;">    
                    <tr>
                        <th>Commentaire:</th> 
                        <th><input type="text" name="commentaire"/></th>
                    </tr>
				</table>
				<input type="submit" style="margin-bottom:40px; margin-top:20px;" value="Envoyer"/>
			</form>	
		</div>
        <ul class='actions'>
            <li><a class="button" onclick="toggle('logInfo', 'resumeLog')">Details</a></li>
        </ul>
        <?php
    }

    function espaceCo($user){
        
        if(!empty($_SESSION['numetu'])){
            echo "<p>Connecté en temps que : ".$user->getPrenom()." ".$user->getNom()."</p>";
            echo "<ul class='actions'>";
            echo "<li><a href='disconnexion.php' class='button'>Disconnect</a></li></ul>";
        } else {

        }       
    
    }

    function listeMateriel(){
        
        $sql = "SELECT DISTINCT nomM FROM materiel WHERE ref NOT IN (SELECT refM FROM emprunt WHERE idE IN (SELECT idE FROM enCours))";
        $result = $this->conn->query($sql);
        
        echo "<center style='margin-bottom: 40px;'><table style='align:center'>"; 
        while($row = $result->fetch_assoc()) {
                                       
            echo "<tr><form method=\"post\" action=\"emprunt.php\">";
            $nom = $row['nomM'];
            echo "<td>".$nom."</td>";
            echo "<input type='hidden' name='nomM' value='$nom'/>";
            echo "<td><input type='submit' value='emprunter' title='Le pret démarre maintenant et s'arretera au moment de son retour'/></td>";      
            echo "</form></tr>";
                                    
        }
        echo "</table></center>";    
    }

    function emprunt($user){

        echo "<table>";
        $emprunt = $user->getEmprunt();
        foreach($emprunt as $key => $value){
            $sql = "SELECT m.nomM, e.dateDebut FROM emprunt e, materiel m WHERE e.refM = m.ref AND e.idE = $value";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            $nomM = $row["nomM"];
            $date = $row["dateDebut"];
            
            echo "<tr><td>Emprunt n°".($key+1)." : </td>";
            echo "<td>$nomM</td>";      
            echo "</form></tr>";
        }
        echo "</table>";
    }
}
?>    
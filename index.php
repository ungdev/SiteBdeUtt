<?php
session_start();
include("connexionDB.php");
include("user.php");
include("page.php");

$page = new Page($conn);
?>
<!DOCTYPE HTML>
<!--
	Epilogue by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>bde utt</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<script>
			function show(id) {
				var div = document.getElementById(id);
				if (div.style.display === "none") {
					div.style.display = "block";
				} else {
					div.style.display = "none";
				}
			}
            function hide(id) {
				var div = document.getElementById(id);
				div.style.display = "none";
			}
			function toggle(idPlus,idRes) {
				var pPlus = document.getElementById(idPlus);
				var pRes = document.getElementById(idRes);
				
				if (pPlus.style.display === "none") {
					pPlus.style.display = "block";
					pRes.style.display = "none";
				} else {
					pPlus.style.display = "none";
					pRes.style.display = "block";
				}
			}
            function soit(id1,id2) {
				var divAff = document.getElementById(id1);
				var divSupp = document.getElementById(id2);
				
				divAff.style.display = "block";
				divSupp.style.display = "none";

			}		
		</script>
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<div class="inner">
					<h1>bde utt</h1>
					<p>Le site officiel du BDE de l'UTT.</p>
				</div>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Banner -->
					<section id="intro" class="main">
						<img src="images/logo.png" class="icon"/>
						<h2>Qu'est ce que BDE UTT ?</h2>
						<p>Qu'est ce que le BDE ? Qui sommes nous ? 
							Très bonne question mon ptit père...
							Nous sommes l'association étudiante de l'UTT et 
							nous avons pour but de fédérer les étudiants de cette 
							belle école. Nous te proposerons donc de nombreux 
							événements et avantages que ca soit par des partenariats 
							ou encore des locations de matériel gratuits.
							Par ailleurs, nous avons la chance d'être dans une école où les associations sont actives et nous sommes là pour vous les faire découvrir afin que tu puisses trouver celle qui te convient le mieux.
						</p>
						<p style="text-align:center">
							Si vous n'êtes pas encore cotisants n'attendez plus, rejoignez nous !
						</p>
						<ul class="actions">
							<li><a href="https://bde.utt.fr" class="button big">Cotisez</a></li>
						</ul>
					</section>

				<!-- Items -->
					<section class="main items">
						<article id="connexion" class="item">
							<header>
								<a href="images/connexion.jpg"><img src="images/connexion.jpg" alt="" /></a>
								<h3>Espace connexion.</h3>
							</header>
																
							<div id="formUser" style="display: none;">
									
								<form method="post" action="newUser.php">
											
									<table>    
										<tr>
											<th>Numéro etudiant :</th> 
											<th><input type="number" name="numetu"/></th>
										<tr>
										<tr>
											<th>Mot de passe :</th> 
											<th><input type="password" name="mdp"/><th>
										</tr>
										<tr>
											<th>Nom :</th>
											<th><input type="text" name="nom"/></th>
										</tr>
										<tr>
											<th>Prenom :</th> 
											<th><input type="text" name="prenom"/></th>
										</tr>
										<tr>
											<th>Email :</th> 
											<th><input type="text" name="email"/></th>
										</tr>
									</table>    
									<input type="submit" style="margin-bottom:40px; margin-top:20px;" value="creation"/>                  
								</form>
							</div>

							<div id="connect" style="display : none;">
								<form method="post" action="connexion.php">
											
									<table style="padding-bottom:40px;">    
										<tr>
											<th>Numéro etudiant :</th> 
											<th><input type="number" name="numetu"/></th>
										</tr>
										<tr>
											<th>Mot de passe :</th> 
											<th><input type="password" name="mdp"/><th>
										</tr>
									</table>
									<input type="submit" style="margin-bottom:40px; margin-top:20px;" value="Connect"/>
								</form>			
									
							</div>	
							<?php
										
								if(!empty($_SESSION["numetu"])){

									$user = new User($_SESSION["numetu"],$conn);
									$page->espaceCo($user);
										
								} else { // pas connecté

							?>
							<ul class="actions">
								<li><a class="button" onclick="soit('connect','formUser')">Sign up</a></li>
								<li><a class="button" onclick="soit('formUser','connect')">Sign in</a></li>
								<li><a class="button" onclick="hide('connect');hide('formUser')">-</a></li>
							</ul>
							<?php } ?>
						</article>
						<article id="equipe" class="item">
							<header>
								<a href="images/equipe.jpg"><img src="images/equipe.jpg" alt="" /></a>
								<h3>Notre équipe ce semestre.</h3>
							</header>
							<p id="resumeequipe">
								Découvrez nos membres et leur rôle au sein de notre BDE.
							</p>
							<p id="txtEquipe" style="display:none;">
								Ce semestre notre éuipe est composée de : <br/>
								- Maud Cadoret : Présidente <br/>
								- Arthur Marceau : Vice-Président <br/>
								- Guilem Ouali : Vice-Président <br/>
								- Lucas Galliot : President <br/>
								- Laura Haegel : secrétaire <br/>
								- Adrien Rabian : Trésorier <br/>
								- Quentin Laluc : Vice-Trésorier <br/>
								- Arthur Pace : Respo Com <br/>
								- Mathilde Dorfseman : Respo Logistique <br/>
							</p>
							<ul class="actions">
								<li><a class="button" onclick="toggle('txtEquipe', 'resumeequipe')">Plus</a></li>
							</ul>
						</article>



						<article id="echo" class="item">
							<header>
								<a href="images/troyes.jpg"><img src="images/troyes.jpg" alt="" /></a>
								<h3>Comme un echo dans l'air.</h3>
							</header>
							<p id="resumeEcho">
								Apprenez-en plus sur la démarche "echo" et nos partenaires.
							</p>
							<div id="txtEcho" style="display:none;">
								<p class="justify" style="font-size:12pt;">
									La démarche echo vise à professionnaliser notre branche partenariat. Elle se veut
									être un book de partenaires actualisé régulièrement afin de garantir une meilleure
									visibilité aux yeux des étudiants de l'UTT. Echo se veut être une démarche qui à terme
									a pour objectif de rendre la ville de Troyes plus accessible financièrement aux étudiants
									de l'UTT. <br/>La démarche echo se divise en deux sous démarches : echo etu et echo event.
									Le premier visant à garantir des avantages en nature / des réductions aux élèves de l'UTT, 
									le second ayant pour but le mécénat / la sponsorisation de nos événements.
								</p>	  
								<p>
									Ils nous ont déjà rejoint : <br/>
									- DayByDay : enseigne de vente en vrac vous offrant 10% sur vos courses<br/>
									- Chez Sari : kebab se situant au centre ville vous propose ses formules à -10%<br/>
									- MegaCGR : le cinéma de Troyes vous propose une place à un tarrif avantageux de 6€50<br/>
									- Burger King : 6€ le menu maxi peut importe le burger, cumulable avec offre étudiante usuelle<br/>
									- Quick : offre identique à Burger King (même groupe)<br/>
									- Auto-Ecole Popeye : frais d'inscription réduit de 50€<br/>
								</p>
							</div>
							
							<ul class="actions">
								<li><a class="button" onclick="toggle('txtEcho', 'resumeEcho')">Plus</a></li>
							</ul>
						</article>

						<article id="recrutement" class="item">
							<header>
								<a href="images/contrat.jpg"><img src="images/contrat.jpg" alt="" /></a>
								<h3>Nous recrutons.</h3>
							</header>
							<p id="resumeRecrue">
								En savoir plus sur les postes à pourvoir.
							</p>
							<div id="txtRecrue" style="display:none;">							
								<p>
									- Membre commission logistique : gérer le stock de matériel disponnibles en prêt. 
									Le donner aux étudiants répondre à commandes et remplir les fiches de locations.<br/>	
									- Agent de mise en relation Buckless : aider les différentes 
									associations à faire des demandes correctes et optimisées afin de gagner du temps 
									sur ces dernières. Il s'agit de gérer tout l'aspect relationnel lié à Buckless. <br/>
									- Passation Buckless. Buckless est un système complexe de gestion et de flux d'argent. 
									Si tu te sens capable de gérer un tel projet informatique d'ici 1 à 2 semestres.
									Des connaissances en node.js, git, Linux et docker, sont un gros plus.<br/>
								</p>
								<p>Si tu es interessé n'hesite pas à nous contacter.</p>
							</div>
							<ul class="actions">
								<li><a class="button" onclick="toggle('txtRecrue', 'resumeRecrue')">Plus</a></li>
							</ul>
						</article>
						
					</section>
					<?php
					if(!empty($_SESSION["numetu"])){

					?>
					<section id="onlyCo" class="main">
						<center>
							<img src="images/logo.png" class="icon"/>
							<h2>Espace logistique</h2>
						</center>
						<div id="logistique">
							<article id="dispo" class="item">
								<header>
									<a href="images/log.jpg"><img src="images/log.jpg" alt="" /></a>
									<h3>Emprunt.</h3>
								</header>
								<p id="resumeLog">
									Liste du matériel dispo à emprunter.
								</p>

								<div id="txtLog" style="display:none;">
									
									<?php
										$page->listeMateriel();
									?>

								</div>
								
								<ul class="actions">
									<li><a class="button" onclick="toggle('txtLog', 'resumeLog')">Plus</a></li>
								</ul>
							</article>

							<article id="emprunt" class="item">
								<header>
									<a href="images/camping.jpg"><img src="images/camping.jpg" alt="" /></a>
									<h3>Vos emprunts en cours.</h3>
								</header>
								<p id="resumeEmprunt">
									Trouvez vos emprunts en cours en cliquant sur plus.
								</p>
								<div id="txtEmprunt" style="display:none;">							
									
								<?php
									$page->emprunt($user);
								?>

								</div>
								<ul class="actions">
									<li><a class="button" onclick="toggle('txtEmprunt', 'resumeEmprunt')">Plus</a></li>
								</ul>
							</article>
						</div>
					</section>
					<?php } ?>

					<!-- PARTIE LOGISTIQUE -->


				<!-- Main -->
				<!--
					<section id="main" class="main">
						<header>
							<h2>Lorem ipsum dolor</h2>
						</header>
						<p>Fusce malesuada efficitur venenatis. Pellentesque tempor leo sed massa hendrerit hendrerit. In sed feugiat est, eu congue elit. Ut porta magna vel felis sodales vulputate. Donec faucibus dapibus lacus non ornare. Etiam eget neque id metus gravida tristique ac quis erat. Aenean quis aliquet sem. Ut ut elementum sem. Suspendisse eleifend ut est non dapibus. Nulla porta, neque quis pretium sagittis, tortor lacus elementum metus, in imperdiet ante lorem vitae ipsum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam eget neque id metus gravida tristique ac quis erat. Aenean quis aliquet sem. Ut ut elementum sem. Suspendisse eleifend ut est non dapibus. Nulla porta, neque quis pretium sagittis, tortor lacus elementum metus, in imperdiet ante lorem vitae ipsum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
					</section>
				-->

				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="https://twitter.com/bdeutt" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com/bde.utt/" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.instagram.com/bdeutt/" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						</ul>
						<ul class="icons">
							<li>email : bde@utt.fr</li>
							<li>tel : 03 25 71 76 74</li>
						</ul>
						
						<p class="copyright">&copy; Untitled. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com">Unsplash</a>.</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
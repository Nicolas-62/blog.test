<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html><!-- Page réalisé par Nicolas Lourdel !-->
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="<?= css_url('cv') ?>">
		<link rel="stylesheet" media="screen and (max-width: 800px)" href="<?= css_url('cv_mini') ?>">
		<meta name="viewport" content="width=400" />
		<link rel="stylesheet" media="screen and (max-device-width: 400px)" href="<?= css_url('cv_mini') ?>">
	 	<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">  
	 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<title>CV de Nicolas Lourdel</title>
	</head>
	<body>
		<div id="bloc_page">
			<aside>
				<img id="ma_photo" src="./assets/images/cv_images/photo_CV_essai.jpg"  
				onmouseover="changeImage(1)" onmouseout="changeImage(0)" 
				></img>
				<p>Nicolas Lourdel - 32 ans</p>
				<section id="aside_sans_photo">
					<div id="contact">
						<h3>CONTACT</h3>
						<table>
							<tr>
								<td class="first_cell"><img src="./assets/images/cv_images/maison.png" alt="icone_maison"></td>
								<td>8 rue de Luxembourg<br>62000 ARRAS</td>
							</tr>
							<tr>
								<td class="first_cell"><img src="./assets/images/cv_images/phone.png" alt="icone_phone"></td>
								<td>06.83.79.78.93</td>
							</tr>
							<tr>
								<td class="first_cell"><img src="./assets/images/cv_images/mail.png" alt="icone_mail"></td>
								<td><a class="lien_mail" href="mailto:nicolas.lourdel@laposte.net" title="envoyez moi un mail !">nicolas.lourdel@laposte.net</a></td>
							</tr>
						</table>
					</div>
					<div id="web">
						<h3>SUR LE WEB</h3>
							<li><a href="https://www.locationsvoiture.fr" target="_blank">  Mon projet de site web  </a></li>
							<li><a href="https://github.com/Nicolas-62/cnam_car_dev" target="_blank">  Le dépôt du projet  </a></li>			
					</div>
					<div id="environnement">
						<h3>ENVIRONNEMENT</h3>
						<table id="tableau_environnement">
							<tr>
								<td class="first_cell">SYSTEME</td>
								<td>Linux, Windows</td>
							</tr>
							<tr>
								<td class="first_cell">WEB</td>
								<td>Bootstrap</td>
							</tr>
							<tr>
								<td class="first_cell">PHP</td>
								<td>Silex</td>
							</tr>
							<tr>
								<td class="first_cell">JAVA</td>
								<td>Eclipse</td>
							</tr>
							<tr>
								<td class="first_cell">BDD</td>
								<td>MySQL, Jmerise</td>
							</tr>
							<tr>
								<td class="first_cell">GRAPHISME</td>
								<td>Gimp, Inkscape</td>
							</tr>						
						</table>
					</div>
					<div id="interet">
						<h3>CENTRES D'INTERET</h3>
						<table id="tableau_interets">
							<tr>
								<td><img src="./assets/images/cv_images/velo.png" alt="icone"></td>
								<td><img src="./assets/images/cv_images/guitare.png" alt="icone"></td>
								<td><a href="http://www.razmotte.org" title="le site de mon club" target="_blank"><img src="./assets/images/cv_images/parapente.png"></a></td>
							</tr>
							<tr>
								<td>Cyclisme</td>
								<td>Guitare</td>
								<td>Parapente</td>
							</tr>
						</table>
					</div>
				</section>
			</aside>
			<div id="CV">
				<header>
					<div id="entete">
						
						<h1>WEB Concepteur<br><span class="h1_suite">en formation au CNAM de Lille</span></h1>
						
						<div id="img_responsive">
							<img id= "ma_photo" src="./assets/images/cv_images/photo_CV_essai.jpg" alt="ma photo">Nicolas Lourdel</img>	
						</div>
					</div>
				</header>
				<section>
					<div id="competences">
						<h2>Compétences</h2>
						<img src="./assets/images/cv_images/share.png" alt="" class="ico_CV">
							<table id="tableau_competences">
							<tr>
								<td class="languages">PHP</td>
								<td>Réaliser from scratch, coté serveur, un site de location de voiture.</td>

							</tr>
							<tr>
								<td  class="languages">MySQL</td>
								<td>Concevoir et utiliser une base de donnée pour un site de location de voiture.</td>
							</tr>
							<tr>
								<td  class="languages">Javascript, JQuery</td>
								<td>Vérifier des formulaires, animer des pages.</td>
							</tr>
<!-- 							<tr>
								<td  class="languages">HTML, CSS</td>
								<td>Réaliser un CV from scratch</td>
							</tr> -->
							<tr>
								<td  class="languages">JAVA</td>
								<td>Manipuler des tableaux, écrire des programmes simples.</td>
							</tr>
						</table>
					</div>
					<div id="experience">
						<h2>Expériences</h2>
						<img src="./assets/images/cv_images/settings.png" alt="" class="ico_CV">
							<table id="tableau_experience">
								<tr>
									<td>
										<p class="titre_experience"><img src="./assets/images/cv_images/puce_carre.png" alt="">Laborantin, contrôleur qualité</p>
										<p>Mission intérimaire chez Desmazières</p>
										<p>09/2016&rarr;03/2017</p>
									</td>
									<td><a href="http://www.desmazieres.fr" target="_blank"><img src="./assets/images/cv_images/logo-desmazieres.png" alt="logo_desmazières" title="lien vers le site de l'entreprise"></a></td>
								</tr>
								<tr>
									<td>
										<p class="titre_experience"><img src="./assets/images/cv_images/puce_carre.png" alt="">Laborantin, Agent de fabrication</p>
										<p>chez Haghebaert &amp; Fremaux</p>
										<p>01/2013&rarr;09/2016</p>
									</td>
									<td><a href="http://www.haghebaert-fremaux.com" target="_blank"><img src="./assets/images/cv_images/logoHF.gif" alt="logo Haghebaert" title="lien vers le site de l'entreprise"></a></td>
								</tr>
								<tr>
									<td>
										<p class="titre_experience"><img src="./assets/images/cv_images/puce_carre.png" alt="">Laborantin, Ouvrier</p>
										<p>Activités intérimaires</p>
										<p>06/2012&rarr;12/2012</p>
									</td>
									<td></td>
								</tr>
								<tr>
									<td>
										<p class="titre_experience"><img src="./assets/images/cv_images/puce_carre.png" alt="">Employé polyvalent de la restauration</p>
										<p>CDI chez Quick</p>
										<p>2011</p>
									</td>
									<td></td>
								</tr>
								<tr>
									<td>
										<p class="titre_experience"><img src="./assets/images/cv_images/puce_carre.png" alt="">Ouvrier</p>
										<p>Mission intérimaire chez Daniel Dessaint</p>
										<p>2009&rarr;2010</p>
									</td>
									<td></td>
								</tr>
								<tr>
									<td>
										<p class="titre_experience"><img src="./assets/images/cv_images/puce_carre.png" alt="">Coordinateur Hygiène et sécurité</p>
										<p>Stage à la CWGC</p>
										<p>2008</p>
									</td>
									<td><a href="http://www.cwgc.org" target="_blank"><img src="./assets/images/cv_images/logo_CWGC.png" alt="logo CWGC" title="lien vers le site de la société"></a></td>
								</tr>
							</table>
					</div>
					<div id="formation">
						<h2>Formations</h2>
						<img src="./assets/images/cv_images/mortarboard.png" alt="" class="ico_CV">
						<table id="tableau_formation">
							<tr>
								<td class="annee_formation">Nov.17&rarr;Mar.18</td>
								<td>Formation webmaster au CNAM de Lille</td>
							</tr>
							<tr>
								<td  class="annee_formation">2017</td>
								<td>Théorie du brevet de pilote en parapente</td>
							</tr>
							<tr>
								<td  class="annee_formation">Janv.16&rarr;Mai.16</td>
								<td>Perfectionnement en parapente à Ténérife</td>
							</tr>
							<tr>
								<td  class="annee_formation">2008</td>
								<td>Licence de Chimie parcours HSQE</td>
							</tr>
							<tr>
								<td  class="annee_formation">2007</td>
								<td>DUT Génie Biologique option environnement</td>
							</tr>
						</table>
					</div>
				</section>
			</div>
		</div>
	<script src="./assets/javascript/cv.js"></script>
	</body>
</html>
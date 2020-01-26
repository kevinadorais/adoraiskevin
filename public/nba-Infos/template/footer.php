<footer>
		<hr>
		<nav>
			<ul>
				<li><a href="index.php">Accueil</a></li>
				<li><a href="classementSelect">Classement</a></li>
				<li><a href="news.php">Dernières Infos</a></li>
				<li><a href="moments.php">Moments Forts</a></li>
				<li><a href="quizz.php">Quizz</a><li>
			</ul>
		</nav>
		<hr>
		<div class="copyright">
		 	<img src="img/copyright.png">
            <cite>Ce signe signifie "Copyright" ("Droit d'auteur" ou "Droit de Copie" en langue Anglaise) et indique la présence d'une création déposée ou non mais bénéficiant d'une protection au titre de la Propriété Intellectuelle et plus précisément du droit d'auteur. L'insertion de ce sigle ou symbole est facultative dans la majorité des pays du monde mais indispensable dans les pays (notamment les Etats-Unis d'Amérique) imposant l'enregistrement d'un "copyright" pour prétendre percevoir des droits d'auteur aux USA.</cite>
        </div>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
	<script type="text/javascript" >
		let animation = anime({
			targets: '.transition',
			keyframes: [
				{translateX: -2000},
				{translateX: 0},
			],
  			delay: anime.stagger(50, {direction: 'reverse'})
		});
	</script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
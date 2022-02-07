<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Primes</title>
</head>
<body>
	<?php
		$prime = (isset($_GET['prime'])) ? $_GET['prime'] : 2;
		$primes = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103, 107, 109, 113, 127, 131, 137, 139, 149, 151, 157, 163, 167, 173, 179, 181, 191, 193, 197, 199, 211, 223, 227, 229, 233, 239, 241, 251, 257, 263, 269, 271, 277, 281, 283, 293, 307, 311, 313, 317, 331, 337, 347, 349, 353, 359, 367, 373, 379, 383, 389, 397, 401, 409, 419, 421, 431, 433, 439, 443, 449, 457, 461, 463, 467, 479, 487, 491, 499, 503, 509, 521, 523, 541, 547, 557, 563, 569, 571, 577, 587, 593, 599, 601, 607, 613, 617, 619, 631, 641, 643, 647, 653, 659, 661, 673, 677, 683, 691, 701, 709, 719, 727, 733, 739, 743, 751, 757, 761, 769, 773, 787, 797, 809, 811, 821, 823, 827, 829, 839, 853, 857, 859, 863, 877, 881, 883, 887, 907, 911, 919, 929, 937, 941, 947, 953, 967, 971, 977, 983, 991, 997, 1009, 1013, 1019, 1021, 1031, 1033, 1039, 1049, 1051, 1061, 1063, 1069, 1087, 1091, 1093, 1097, 1103, 1109, 1117, 1123, 1129, 1151, 1153, 1163, 1171, 1181, 1187, 1193, 1201, 1213, 1217, 1223);

		$index = array_search($prime, $primes);
		$next = ($index < count($primes) - 1) ? $index + 1 : null;
		$prev = ($index != 0) ? $index - 1 : null;
	?>

	<nav>
		<?php if(!is_null($prev)): ?>
			<a class="prev" href="?prime=<?= $primes[$prev] ?>">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
					<path id="XMLID_224_" d="M325.606,229.393l-150.004-150C172.79,76.58,168.974,75,164.996,75c-3.979,0-7.794,1.581-10.607,4.394  l-149.996,150c-5.858,5.858-5.858,15.355,0,21.213c5.857,5.857,15.355,5.858,21.213,0l139.39-139.393l139.397,139.393  C307.322,253.536,311.161,255,315,255c3.839,0,7.678-1.464,10.607-4.394C331.464,244.748,331.464,235.251,325.606,229.393z"/>
				</svg>
			</a>
		<?php endif ?>

		<span><?= $prime ?></span>

		<?php if(!is_null($next)): ?>
			<a class="next" href="?prime=<?= $primes[$next] ?>">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
					<path id="XMLID_224_" d="M325.606,229.393l-150.004-150C172.79,76.58,168.974,75,164.996,75c-3.979,0-7.794,1.581-10.607,4.394  l-149.996,150c-5.858,5.858-5.858,15.355,0,21.213c5.857,5.857,15.355,5.858,21.213,0l139.39-139.393l139.397,139.393  C307.322,253.536,311.161,255,315,255c3.839,0,7.678-1.464,10.607-4.394C331.464,244.748,331.464,235.251,325.606,229.393z"/>
				</svg>
			</a>
		<?php endif ?>
	</nav>

	<div class="prime">
		<?= file_get_contents('primes/' . $prime . '.svg'); ?>
	</div>
	
	<style>
		html, body {
			box-sizing: border-box;
			height: 100%;
			width: 100%;
			margin: 0;
		}

		body {
			background-color: black;
			color: white;
			font-family: monospace;

			display: flex;
			justify-content: center;
			align-items: center;
		}

		.prime {
			color: white;
			height: 80%;
			width: auto;
		}

		.prime svg {
			max-width: 100%;
			max-height: 100%;
		}

		.prime svg * {
			stroke: currentColor;
			stroke-width: .1%;
		}

		a {
			text-decoration: none;
		}

		nav {
			position: absolute;
			right: 30px;
			bottom: 30px;

			display: flex;
			align-items: center;
			justify-content: center;
			gap: 5px;
		}

		nav span {
			/* padding-bottom: 5px; */
		}

		nav svg {
			fill: white;
			width: 15px;
		}

		nav a {
			display: inline-block;
		}

		.prev {
			transform: rotate(-90deg);
		}

		.next {
			transform: rotate(90deg);
		}
	</style>

	<script>
		var svg = document.querySelector(".prime svg"),
			bbox = svg.getBBox(),
			viewBox = [bbox.x, bbox.y, bbox.width, bbox.height].join(" ");
		svg.setAttribute("viewBox", viewBox);

		var prev = document.querySelector(".prev"),
			next = document.querySelector(".next");

		document.onkeydown = (e) => {
			e = e || window.event;

			if (e.keyCode == "37" && prev) {
				prev.click();
			} else if (e.keyCode == "39" && next) {
				next.click();
			}
		};
	</script>
</body>
</html>

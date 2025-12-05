(function() {
	const MIN_PARTICLE_SIZE = 1;
	const MAX_PARTICLE_SIZE = 7;
	const MAX_PARTICLES = 100;
	const MIN_VELOCITY = 0.2;
	const MAX_VELOCITY = 1.5;
	const TICK_RATE = 10;
	const DRIFT = 1;
	const SNOWBANK_WIDTH = 50;
	const SNOWBANK_MAX_HEIGHT = 50;
	const SNOW_COLOR = "#fffafa";
	const BACKGROUND_COLOR = "#969dff";

	let canvas_element, particles, snow_banks, context;

	addEventListener("resize", (event) => { 
		if (canvas_element) {
			canvas_element.width = window.innerWidth;
			canvas_element.height = window.innerHeight;
		}
	});

	const setup = () => {
		document.getElementsByTagName("body")[0].style.backgroundColor = BACKGROUND_COLOR;
		canvas_element = document.createElement('canvas');
		canvas_element.width = window.innerWidth;
		canvas_element.id = "snow-canvas";
		canvas_element.height = window.innerHeight;
		canvas_element.style = "pointer-events:none;position: fixed;top: 0;left: 0;z-index: 1000;";

		document.getElementsByTagName("body")[0].appendChild(canvas_element);

		context = canvas_element.getContext("2d");

		particles = [];
		snow_banks = [];
	}

	const loop = () => {
		context.clearRect(0, 0, canvas_element.width, canvas_element.height);

		if (particles.length < MAX_PARTICLES) {
			const new_particle = {
				x: Math.random() * (canvas_element.width - MAX_PARTICLE_SIZE),
				y: -MAX_PARTICLE_SIZE * 5,
				velocity: MAX_VELOCITY * Math.random() + MIN_VELOCITY,
				size: MAX_PARTICLE_SIZE * Math.random() + MIN_PARTICLE_SIZE,
				drifting: 0,
			}

			particles.push(new_particle);
		}

		for (var i = particles.length - 1; i >= 0; i--) {
			particles[i].y += particles[i].velocity;

			if (particles[i].drifting == 0 && Math.random() < 0.3) {
				particles[i].drifting = Math.random() < 0.5 ? -1 : 1;
			} else if (particles[i].drifting !== 0) {
				if (particles[i].drifting < 0) particles[i].drifiting += 0.1;
				else particles[i].drifiting -= 0.1;				
			}

			if (Math.abs(particles[i].drifting) > 1) {
				particles[i].drifiting = 0;
			}

			particles[i].x += Math.random() * DRIFT * particles[i].drifting;


			if (particles[i].y > canvas_element.height + particles[i].size) {
				const x = Math.ceil(particles[i].x / SNOWBANK_WIDTH);
				const size = Math.ceil(particles[i].size / 2);
				snow_banks[x] = snow_banks[x] ? Math.min(snow_banks[x] + size, SNOWBANK_MAX_HEIGHT) : size;
				particles.splice(i, 1);
			}

			context.beginPath();
			context.arc(particles[i].x, particles[i].y, particles[i].size, 0, 2 * Math.PI, false);
			context.fillStyle = SNOW_COLOR;
			context.fill();

			// Draw snow banks
			context.beginPath();
			context.rect(0, canvas_element.height - 10, canvas_element.width, 10);
			context.fill();

			context.beginPath();
			context.moveTo(0, canvas_element.height - 10);
			for (var si = 0; si <= Math.ceil(canvas_element.width / SNOWBANK_WIDTH); si++) {
			 	context.lineTo(si * SNOWBANK_WIDTH + 1, canvas_element.height - 10 - (snow_banks[si] ?? 0));
			 	context.lineTo(si * SNOWBANK_WIDTH + (SNOWBANK_WIDTH/2), canvas_element.height - 10 - (snow_banks[si] ?? 0));
			}
			context.lineTo(canvas_element.width, canvas_element.height);
			context.lineTo(0, canvas_element.height);
			context.fill();
		}

		draw_snowman(context, SNOWBANK_WIDTH + (SNOWBANK_WIDTH / 2) - 20, canvas_element.height - (snow_banks[1] ?? 0));
	}

	const draw_snowman = (context, x, y) => {
		context.fillStyle = SNOW_COLOR;
		context.beginPath();
		context.arc(x, y - 20, 20, 0, 2 * Math.PI, false);
		context.fill();

		context.beginPath();
		context.arc(x, y - 46, 14, 0, 2 * Math.PI, false);
		context.fill();

		context.beginPath();
		context.arc(x, y - 66, 10, 0, 2 * Math.PI, false);
		context.fill()


		context.fillStyle = 'black';
		context.beginPath();
		context.arc(x - 4, y - 70, 2, 0, 2 * Math.PI, false);
		context.fill();

		context.beginPath();
		context.arc(x + 4, y - 70, 2, 0, 2 * Math.PI, false);
		context.fill();

		context.fillStyle = 'orange';
		context.beginPath();
		context.arc(x, y - 64, 2, 0, 2 * Math.PI, false);
		context.fill();

	}

	let loop_interval;

	document.getElementById("toggle-snow").addEventListener("click", () => {
		if (!loop_interval) {
			setup();
			loop_interval = setInterval(loop, TICK_RATE);
		}
		else {
			document.getElementsByTagName("body")[0].style.backgroundColor = 'white';
			clearInterval(loop_interval);
			document.getElementById("snow-canvas").remove();
			snow_banks = [];
			particles = [];
			loop_interval = null;
		}
	});
})()
<script lang="ts">
let varijabla = $state();



async function getActors(): Promise<App.SakilaActors[]> {
		const res = await fetch("http://localhost:5000/WeatherForecast");
		return await res.json();
	}

const kliknaf = () => {getActors()};


</script>
<h1>ABOUT SvelteKit</h1>
<p>Visit <a href="https://svelte.dev/docs/kit">svelte.dev/docs/kit</a> to read the documentation</p>

<button onclick={kliknaf} >Klikajjj</button>

<script lang="ts">
  import { onMount } from "svelte";
  import client from "$lib/api/index.js";
  
  let data: Awaited<ReturnType<typeof getActor>> | undefined;

  async function getActor() {
    return client.GET("/records/film", {
      params: {
        query: { 
          join:["language"],
          size: "5" },
      },
    });
  }

  onMount(() => {
    getActor().then((res) => (data = res));
  });


</script>

<h1>ABOUT SvelteKit</h1>
<p>Visit <a href="https://svelte.dev/docs/kit">svelte.dev/docs/kit</a> to read the documentation</p>

{#if data}
    {#if data.error}
      <div>There was an error: {data as string}</div>
    {:else}
      <pre><code>{JSON.stringify(data.data, undefined, 2)}</code></pre>
    {/if}
  <!-- {@debug data} -->
  {/if}



  <button type="button" onclick={() => getActor().then((res) => (data = res))}>Another fact!</button>

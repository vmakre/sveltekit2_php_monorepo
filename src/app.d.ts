// See https://svelte.dev/docs/kit/types#app.d.ts
// for information about these interfaces
declare global {
	namespace App {
		// interface Error {}
		// interface Locals {}
		// interface PageData {}
		// interface PageState {}
		// interface Platform {}
		interface SakilaActors {
			"actor_id": Number,
            "first_name": String,
            "last_name": String,
            "last_update": Date
		}
	}
}

export {};

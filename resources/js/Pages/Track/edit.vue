<template>
	<MusicLayout>
		<template #content>
			<div class="flex flex-row justify-between mb-5">
				<h1 class="text-4xl font-extrabold">Modifier une musique</h1>

				<Link
					:href="route('tracks.index')"
					class="bg-blue-500 hover:bg-blue-700 rounded py-2 px-4 font-bold text-white"
				>
					Retour
				</Link>
			</div>

			<form @submit.prevent="submit">
				<!-- title -->
				<div class="mb-3">
					<label for="title" class="block">Titre</label>
					<input
						v-model="form.title"
						id="title"
						placeholder="Titre"
						type="text"
						:class="{ 'border-red-500': form.errors.title }"
					/>
					<p class="text-red-500 text-xs italic">{{ form.errors.title }}</p>
				</div>

				<!-- artist -->
				<div class="mb-3">
					<label for="artist" class="block">Artiste</label>
					<input
						v-model="form.artist"
						id="artist"
						placeholder="Artiste"
						type="text"
						:class="{ 'border-red-500': form.errors.artist }"
					/>
					<p class="text-red-500 text-xs italic">{{ form.errors.artist }}</p>
				</div>

				<!-- display -->
				<div class="mb-3">
					<label for="title" class="block">Afficher</label>
					<select
						name="display"
						id="display"
						v-model="form.display"
						:class="{ 'border-red-500': form.errors.display }"
					>
						<option :value="true">oui</option>
						<option :value="false">non</option>
					</select>
					<p class="text-red-500 text-xs italic">{{ form.errors.display }}</p>
				</div>

				<input
					type="submit"
					value="Modifier la musique"
					class="rounded py-2 px-4 font-bold text-white mt-5"
					:class="[
						form.processing ? 'bg-gray-500' : 'bg-blue-500 hover:bg-blue-700',
					]"
					:disabled="form.processing"
				/>
			</form>
			{{ form }}
		</template>
	</MusicLayout>
</template>

<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";

export default {
	name: "Create",
	data() {
		return {
			form: this.$inertia.form({
				title: this.track.title,
				artist: this.track.artist,
				display: this.track.display ? true : false,
			}),
		};
	},
	props: { track: Object },
	components: {
		MusicLayout,
	},
	methods: {
		submit() {
			this.form.put(route("tracks.update", { track: this.track }));

			// this.$inertia.post(route('tracks.store',{
			//     ...
			// }))
		},
	},
};
</script>

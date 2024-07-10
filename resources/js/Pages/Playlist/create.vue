<template>
	<MusicLayout>
		<template #content>
			<div class="flex flex-row justify-between mb-5">
				<h1 class="text-4xl font-extrabold">Créer une playlist</h1>
				<Link
					:href="route('playlists.index')"
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
				<input
					type="submit"
					value="Créer la playlist"
					class="rounded py-2 px-4 font-bold text-white mt-5"
					:class="[
						form.processing ? 'bg-gray-500' : 'bg-blue-500 hover:bg-blue-700',
					]"
					:disabled="form.processing"
				/>
			</form>

			<div v-for="track in tracks" :key="track.uuid">
				<input
					type="checkbox"
					name="tracks"
					:id="track.uuid"
					:value="track.uuid"
					v-model="form.tracks"
				/>
				<label :for="track.uuid">{{ track.title }}</label>
				<p class="text-red-500 text-xs italic">{{ form.errors.tracks }}</p>
			</div>
		</template>
	</MusicLayout>
</template>

<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
import Track from "@/Components/Track.vue";

export default {
	name: "Create",
	components: {
		MusicLayout,
		Track,
	},
	data() {
		return {
			form: this.$inertia.form({
				title: "",
				tracks: [],
			}),
		};
	},
	props: { tracks: Array },
	methods: {
		submit() {
			this.form.post(route("playlists.store"));
		},
	},
};
</script>

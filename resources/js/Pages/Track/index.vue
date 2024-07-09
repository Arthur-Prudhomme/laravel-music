<template>
	<MusicLayout>
		<template #content>
			<div class="flex flex-row justify-between">
				<h1 class="text-4xl font-extrabold">Liste de mes tracks</h1>
				<Link :href="route('tracks.create')" class="hover:text-blue-500">
					Ajouter une musique
				</Link>
			</div>
			<input
				v-model="filter"
				type="search"
				class="shadow border rounded w-full"
			/>
			<br />
			<div class="grid grid-cols-4 gap-4">
				<Track
					v-for="track in filteredTracks"
					:key="track.uuid"
					:track="track"
					@played="play"
				/>
			</div>
		</template>
	</MusicLayout>
</template>

<script>
import Track from "@/Components/Track.vue";
import MusicLayout from "@/Layouts/MusicLayout.vue";
import { Link } from "@inertiajs/vue3";

export default {
	name: "Index",
	components: {
		MusicLayout,
		Track,
		Link,
	},
	props: { tracks: Array },
	data() {
		return {
			audio: null,
			currentTrack: null,
			filter: "",
		};
	},
	computed: {
		filteredTracks() {
			return this.tracks.filter(
				(track) =>
					track.title.toLowerCase().includes(this.filter.toLowerCase()) ||
					track.artist.toLowerCase().includes(this.filter.toLowerCase())
			);
		},
	},
	methods: {
		play(track) {
			const url = "storage/" + track.music;

			if (!this.currentTrack) {
				this.audio = new Audio(url);
				this.audio.play();
			} else if (this.currentTrack != track.uuid) {
				this.audio.pause();
				this.audio.src = url;
				this.audio.play();
			} else {
				this.audio.paused ? this.audio.play() : this.audio.pause();
			}

			this.currentTrack = track.uuid;
			this.audio.addEventListener("ended", () => (this.currentTrack = null));
		},
	},
};
</script>

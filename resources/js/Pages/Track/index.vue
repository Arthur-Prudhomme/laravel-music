<template>
	<MusicLayout>
		<template #content>
			<h1>Liste de mes tracks</h1>
			<br />
			<div class="grid grid-cols-4 gap-4">
				<Track
					v-for="track in tracks"
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
export default {
	name: "Index",
	components: {
		MusicLayout,
		Track,
	},
	props: { tracks: Array },
	data() {
		return {
			audio: null,
			currentTrack: null,
		};
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

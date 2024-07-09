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
	methods: {
		play(track) {
			const url = "storage/" + track.music;

			let audio = new Audio(url);
			audio.play();
		},
	},
};
</script>

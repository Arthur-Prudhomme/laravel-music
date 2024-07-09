<template>
	<MusicLayout>
		<template #content>
			<div>
				<h1>Liste de mes tracks</h1>
				<br />
				<Track
					v-for="track in tracks"
					:key="track.uuid"
					:title="track.title"
					:artist="track.artist"
					:image="track.image"
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
};
</script>

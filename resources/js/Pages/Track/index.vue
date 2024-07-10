<template>
	<MusicLayout>
		<template #content>
			<div class="flex flex-row justify-between mb-5">
				<h1 class="text-4xl font-extrabold">Liste de mes tracks</h1>
				<Link
					v-if="$page.props.isAdmin"
					:href="route('tracks.create')"
					class="bg-blue-500 hover:bg-blue-700 rounded py-2 px-4 font-bold text-white"
				>
					Ajouter une musique
				</Link>
			</div>

			<TrackList :tracks="tracks" />
		</template>
	</MusicLayout>
</template>

<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
import TrackList from "@/Components/TrackList.vue";

export default {
	name: "Index",
	components: {
		MusicLayout,
		TrackList,
	},
	props: { tracks: Array },
};
</script>

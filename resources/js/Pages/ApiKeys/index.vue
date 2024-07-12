<template>
	<MusicLayout>
		<template #content>
			<div class="flex flex-row justify-between mb-5">
				<h1 class="text-4xl font-extrabold">API</h1>
				<Link
					:href="route('apikeys.create')"
					class="bg-blue-500 hover:bg-blue-700 rounded py-2 px-4 font-bold text-white"
				>
					Ajouter une clé API
				</Link>
			</div>
			<!-- <div class="grid grid-cols-4 gap-4">
				<div v-for="playlist in playlists" :key="playlist.title">
					{{ playlist.title }}
				</div>
			</div> -->
		</template>
	</MusicLayout>
</template>

<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";

export default {
	name: "Index",
	components: {
		MusicLayout,
	},
	props: {},
};
</script>

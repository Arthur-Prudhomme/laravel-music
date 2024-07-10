<template>
	<MusicLayout>
		<template #content>
			<div class="flex flex-row justify-between mb-5">
				<h1 class="text-4xl font-extrabold">Liste de mes playlists</h1>
				<Link
					:href="route('playlists.create')"
					class="bg-blue-500 hover:bg-blue-700 rounded py-2 px-4 font-bold text-white"
				>
					Ajouter une playlist
				</Link>
			</div>

			<table
				class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
			>
				<thead
					class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
				>
					<tr>
						<th scope="col" class="px-6 py-3">#</th>
						<th scope="col" class="px-6 py-3">Titre</th>
						<th scope="col" class="px-6 py-3">Nb musiques</th>
						<th scope="col" class="px-6 py-3">Créée le</th>
						<th scope="col" class="px-6 py-3">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr
						class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
						v-for="(playlist, i) in playlists"
						:key="playlist.uuid"
					>
						<th
							scope="row"
							class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
						>
							{{ i + 1 }}
						</th>
						<td class="px-6 py-4">{{ playlist.title }}</td>
						<td class="px-6 py-4">{{ playlist.tracks_count }}</td>
						<td class="px-6 py-4">
							{{ $moment(playlist.created_at).format("DD/MM/YYYY hh:mm:ss") }}
						</td>
						<td class="px-6 py-4">?</td>
					</tr>
				</tbody>
			</table>
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
	props: { playlists: Array },
};
</script>

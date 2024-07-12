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

			<table
				class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
			>
				<thead
					class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
				>
					<tr>
						<th scope="col" class="px-6 py-3">#</th>
						<th scope="col" class="px-6 py-3">Nom</th>
						<th scope="col" class="px-6 py-3">Clé</th>
						<th scope="col" class="px-6 py-3">Créée le</th>
						<th scope="col" class="px-6 py-3">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr
						class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
						v-for="(apikey, i) in apiKeys"
						:key="apikey.uuid"
					>
						<th
							scope="row"
							class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
						>
							{{ i + 1 }}
						</th>
						<td class="px-6 py-4">{{ apikey.name }}</td>
						<td class="px-6 py-4">{{ apikey.key }}</td>
						<td class="px-6 py-4">
							{{ $moment(apikey.created_at).format("DD/MM/YYYY hh:mm:ss") }}
						</td>
						<td class="px-6 py-4">
							<Link
								:href="route('apikeys.destroy', { apiKey: apikey })"
								class="bg-red-500 hover:bg-red-700 rounded py-2 px-4 font-bold text-white"
								as="button"
								method="delete"
							>
								Supprimer
							</Link>
						</td>
					</tr>
				</tbody>
			</table>
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
	props: { apiKeys: Array },
};
</script>

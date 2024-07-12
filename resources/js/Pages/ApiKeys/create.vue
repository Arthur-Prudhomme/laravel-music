<template>
	<MusicLayout>
		<template #content>
			<div class="flex flex-row justify-between mb-5">
				<h1 class="text-4xl font-extrabold">Créer une clé API</h1>
				<Link
					:href="route('apikeys.index')"
					class="bg-blue-500 hover:bg-blue-700 rounded py-2 px-4 font-bold text-white"
				>
					Retour
				</Link>
			</div>

			<form @submit.prevent="submit">
				<!-- title -->
				<div class="mb-3">
					<label for="name" class="block">Nom</label>
					<input
						v-model="form.name"
						id="name"
						placeholder="Nom"
						type="text"
						:class="{ 'border-red-500': form.errors.name }"
					/>
					<p class="text-red-500 text-xs italic">{{ form.errors.name }}</p>
				</div>
				<input
					type="submit"
					value="Créer"
					class="rounded py-2 px-4 font-bold text-white mt-5"
					:class="[
						form.processing ? 'bg-gray-500' : 'bg-blue-500 hover:bg-blue-700',
					]"
					:disabled="form.processing"
				/>
			</form>
		</template>
	</MusicLayout>
</template>

<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";

export default {
	name: "Create",
	components: {
		MusicLayout,
	},
	props: {},
	data() {
		return {
			form: this.$inertia.form({
				name: "",
			}),
		};
	},
	methods: {
		submit() {
			this.form.post(route("apikeys.store"));
		},
	},
};
</script>

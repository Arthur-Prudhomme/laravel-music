<template>
	<MusicLayout>
		<template #content>
			<div class="flex-1 flex-row justify-between">
				<h1 class="text-4xl font-extrabold">Créer une musique</h1>
			</div>
		</template>
	</MusicLayout>
</template>

<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
import { Link } from "@inertiajs/vue3";

export default {
	name: "Create",
	components: {
		MusicLayout,
		Link,
	},
};
</script>

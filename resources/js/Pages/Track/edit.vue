<template>
	<MusicLayout>
		<template #content>
			<p>edit</p>
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
	data() {},
	methods: {},
};
</script>

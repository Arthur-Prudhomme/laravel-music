<template>
	<div class="bg-slate-500 w-fit p-2 m-1 rounded-lg">
		<img :src="image" alt="track img" />
		<p>
			<b>{{ title }}</b> - ({{ artist }})
		</p>
	</div>
</template>

<script>
export default {
	name: "Track",
	props: ["title", "artist", "image"],
};
</script>

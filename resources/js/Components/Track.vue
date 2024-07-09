<template>
	<div class="bg-slate-500 w-fit p-2 m-1 rounded-lg">
		<img :src="'storage/' + track.image" alt="track img" />
		<p>
			<b>{{ track.title }}</b> - ({{ track.artist }})
		</p>
		<button
			@click="handleClick()"
			class="bg-slate-300 p-2 hover:bg-blue-200 w-full rounded-xl"
		>
			Play
		</button>
	</div>
</template>

<script>
export default {
	name: "Track",
	emits: ["played"],
	props: ["track"],
	methods: {
		handleClick() {
			this.$emit("played", this.track);
			// const url = "storage/" + this.track.music;
			// let audio = new Audio(url);
			// console.log(url);
			// audio.play();
		},
	},
};
</script>

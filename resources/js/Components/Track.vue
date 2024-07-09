<template>
	<div class="bg-slate-300 w-fit p-2 m-1 rounded-lg">
		<img :src="'storage/' + track.image" alt="track img" />
		<p>
			<b>{{ track.title }}</b> - ({{ track.artist }})
		</p>
		<button
			@click="handleClick()"
			class="bg-slate-500 p-2 hover:bg-blue-500 w-full rounded-xl"
		>
			Play
		</button>

		<div class="flex w-full justify-between">
			<Link
				:href="route('tracks.edit', { track: track })"
				class="bg-lime-600 hover:bg-lime-400 rounded py-2 px-4 font-bold text-white"
			>
				Modifier
			</Link>
		</div>
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

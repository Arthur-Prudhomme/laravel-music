<template>
	<div
		:class="{ 'border border-blue-500': active }"
		class="bg-slate-300 w-fit p-2 m-1 rounded-lg flex flex-col justify-between"
	>
		<img :src="'/storage/' + track.image" alt="track img" />
		<p>
			<b>{{ track.title }}</b> - ({{ track.artist }})
		</p>
		<button
			@click="handleClick()"
			class="bg-blue-500 p-2 hover:bg-blue-400 w-full rounded-xl mt-2"
		>
			Play
		</button>

		<div class="flex w-full justify-between mt-2">
			<Link
				v-if="$page.props.isAdmin"
				:href="route('tracks.edit', { track: track })"
				class="bg-lime-600 hover:bg-lime-800 rounded py-2 px-4 font-bold text-white"
			>
				Modifier
			</Link>

			<Link
				v-if="$page.props.isAdmin"
				:href="route('tracks.destroy', { track: track })"
				as="button"
				method="delete"
				class="bg-red-500 hover:bg-red-700 rounded py-2 px-4 font-bold text-white"
			>
				Supprimer
			</Link>
		</div>
	</div>
</template>

<script>
export default {
	name: "Track",
	emits: ["played"],
	props: {
		active: {
			type: Boolean,
			default: false,
		},
		track: Object,
	},
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

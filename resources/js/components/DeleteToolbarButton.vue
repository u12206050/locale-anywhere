<template>
	<div>
		<button
			data-testid="open-delete-modal"
			dusk="open-delete-modal-button"
			@click="openDeleteModal"
			class="btn btn-default btn-icon btn-white text-80"
			:title="__('Delete')"
		>
			<icon type="delete" class="text-80 mr-3" />
			Delete translation
		</button>

		<portal to="modals">
			<transition name="fade">
				<delete-resource-modal
					v-if="deleteModalOpen"
					@confirm="confirmDelete"
					@close="closeDeleteModal"
					mode="delete"
				/>
			</transition>
		</portal>
	</div>
</template>
<script>
export default {
	props: ["resourceName", "resourceId", "resource"],

	data: () => ({
		deleteModalOpen: false
	}),

	methods: {
		/**
		 * Open the delete modal
		 */
		openDeleteModal() {
			this.deleteModalOpen = true;
		},

		/**
		 * Close the delete modal
		 */
		closeDeleteModal() {
			this.deleteModalOpen = false;
		},

		confirmDelete() {
			Nova.request()
				.post(
					`/nova-vendor/switch-locale/delete?resourceId=${
						this.resourceId
					}&resourceName=${this.resourceName}`,
					{
						_method: "DELETE"
					}
				)
				.then(response => {
					console.log(response)
					if (response.data.status) {
						this.$toasted.show(
							this.__("The translation was deleted!"),
							{ type: "success" }
						);

						this.$router.push({
							name: "index",
							params: { resourceName: this.resourceName }
						});
						return;
					} else {
						this.$toasted.show(
							this.__(response.data.message),
							{ type: "warning" }
						);

						this.closeDeleteModal();
						this.getResource();
					}
				});
		}
	}
};
</script>

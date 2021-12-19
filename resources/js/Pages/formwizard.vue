<template>
	<form-wizard >
		<tab-content title="name" :selected="true">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" placeholder="enter name" v-model="name">
			</div>
		</tab-content>
		<tab-content title="address">
			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" class="form-control" placeholder="enter address" v-model="address">
			</div>
		</tab-content>
		<tab-content title="city">
			<div class="form-group">
				<label for="city">City</label>
				<input type="text" class="form-control" placeholder="enter city" v-model="city">
			</div>
		</tab-content>
	</form-wizard>

</template>
<script>
	import {FormWizard,TabContent} from 'vue-step-wizard'
	import "vue-step-wizard/dist/vue-step-wizard.css";

	export default{
		name: 'BasicStepperForm',
		components:{
			FormWizard ,TabContent
		},
		data()
		{
			return{
				name:'',
				address:'',
				city:'',
			}
		},
	}
</script>
<template>
	<center><h1>View Details</h1></center>
	<a v-bind:href="'form/create'" class="btn btn-primary mx-5">Add</a>
	<div class="container">
	<table class="table">
	<thead>	
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Email</th>
			<th>Course</th>
			<th>Gender</th>
		</tr>
	</thead>
	<tbody >
		<tr class="py-2" v-for="form in forms">
			<th scope="row">{{form.id}}</th>
			<td>{{form.name}}</td>
			<td>{{form.email}}</td>
			<td>{{form.course}}</td>
			<td>{{form.gender}}</td>
		</tr>
	</tbody>
	</table>
</div>
</template>

<script>
	
    export default {
            props:['forms'],
    }
</script> 
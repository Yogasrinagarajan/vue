<template>
	<center><h1>View Details</h1></center>
	<inertia-link type="button" class="btn btn-primary ms-5" href="/form/create">Add</inertia-link>
	<div class="container">
		<div v-if='this.msg' class="alert-success text-center mx-5 my-5">{{this.msg}}</div>
	<table class="table table-bordered" id="example">
	<thead>	
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Email</th>
			<th>Course</th>
			<th>Gender</th>
			<th>Action</th>
			
		</tr>
	</thead>
	<tbody >
		<tr class="py-2" v-for="form in forms">
			<th>{{form.id}}</th>
			<td>{{form.name}}</td>
			<td>{{form.email}}</td>
			<td>{{form.course}}</td>
			<td>{{form.gender}}</td>
			<td><inertia-link :href="route('form.edit',{id: form.id})" class="btn btn-primary me-3">Edit</inertia-link>
				
					<button @click="del(form.id)" class="btn btn-primary">Delete</button>
			
			</td>
			<!-- <td><inertia-link href='form/id:form.id/edit'>Edit</inertia-link></td> -->
		</tr>
	</tbody>
	</table>
</div>
</template>

<script>
	import 'bootstrap/dist/css/bootstrap.min.css';
	import 'jquery/dist/jquery.min.js';
//Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
import $ from 'jquery'; 
import axios from 'axios'
    export default {
            props:['forms','msg'],
            methods:{
      del($form){
      	this.$inertia.delete(this.route('form.destroy',$form))
      }
  },
            mounted(){
    //API Call
    axios
    .get("/form")
    .then((res)=>
    {
      this.forms = res.data;
      $('#example').DataTable();
    })
  },
  
  data: function() {
        return {
            forms:[]
        }
    },
   
  }  
</script> 
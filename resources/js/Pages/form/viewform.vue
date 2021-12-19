<template>
	<center><h1>View Details</h1></center>
	<button @click="add()" class="btn btn-primary">Add</button>
	<div class="container">
	<div class="card-body">
         <datatable :columns="columns" :data="rows"></datatable>
         <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
   
    </div>
</div>
</template>

<script>
 
import axios from 'axios'
    export default {

        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                columns: [
                        {label: 'name', field: 'name' }, 
                        {label: 'email', field: 'email'},
                        {label: 'course', field: 'course'},
                        
                    ],
                rows: [],
                page: 1,
                per_page: 10,
            }
        },
     methods:{
            getPosts: function() {
                axios.get('/form').then(function(response){
                    this.rows = response.data;
                }.bind(this));
            }
        },
        created: function(){
            this.getPosts()
        }
  }  
</script> 
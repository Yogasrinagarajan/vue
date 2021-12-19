<template>
    <div class="container mx-5">
       <center><h2 class="my-5">Edit Form</h2></center>
        <p id="text" style="color:green; margin-left:100px;"></p>
        <inertia-link type="button" class="btn btn-primary" href="/form">Back</inertia-link>
        <center>
        <div v-if="this.msg" class="alert-success container mx-5 my-5 text-center">{{this.msg}}</div>
        <form  class="form"  method="POST" name="myform" id="form" @submit.prevent='edit'>
       	   <table class="mx-5">
       	   <tr>
       	   	<td>
       	   	<label>Name</label>
       	   	<input type="text" v-model="form.name" id="name" class="form-control mx-5 my-2">
           

       	   </td>
       	   </tr>
       	     <tr>
       	   	<td>
       	   	<label>Email</label>
       	   	<input type="email" v-model="form.email" class="form-control mx-5 my-2" >
          
       	   </td>
       	   </tr>
       	   <tr>
       	   	<td>
       	   	<label>Course</label>
       	   	<select v-model="form.course" class="form-select mx-5 my-2" >
       	   		<option value='ug'>ug</option>
       	   		<option value='pg'>pg</option>
       	   	</select>
             
       	   </td>
       	   </tr>
       	   <tr>
       	   	<td>
       	   	<label>Gender</label><br>
       	   	<input type="radio" v-model="form.gender" class="form-check-input mx-3" value="male" >Male
       	   	<input type="radio" v-model="form.gender" class="form-check-input mx-3" value='female'>Female 
       	   </td>
       	   </tr>
       	   <tr>
       	   <td><button class="btn btn-primary my-5 w-75 mx-5" type="submit">Update Data</button></td>
       	   </tr>
          </table>
     
          
    
        </form>
      </center>
    </div>

</template>

<script>
	import axios from 'axios'
  //import { Form} from 'vform'
    export default {
            props: ['data','msg'],
    		data(){
    			return{
    			form: this.$inertia.form({
    				name:this.data.name,
    				email:this.data.email,
    				course:this.data.course,
    				gender:this.data.gender,
    			})
    		}
    	},
   
    		methods : {
            edit() {
                    this.$inertia.put(this.route('form.update',{id:this.data.id}),this.form);

                    
            }
        }

    }
</script> 
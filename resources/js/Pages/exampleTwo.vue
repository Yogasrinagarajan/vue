<template>
    <div class="container mx-5">
       <center><h2 class="my-5">Form2</h2></center>
        <p id="text" style="color:green; margin-left:100px;"></p>
        <inertia-link type="button" class="btn btn-primary" href="/form">Back</inertia-link>
        <center>
        <form  class="form"  method="POST" name="myform" id="form" @submit.prevent='add'>
          <div v-if="this.msg" class="alert-success container text-center mx-5 my-5">{{this.msg}}</div>
       	   <table class="mx-5">
       	   <tr>
       	   	<td>
       	   	<label>Name</label>
       	   	<input type="text" v-model="form.name" id="name" class="form-control mx-5 my-2">
            <div v-if="$page.props.errors.name" class=" text-danger">{{$page.props.errors.name}}</div>

       	   </td>
       	   </tr>
       	     <tr>
       	   	<td>
       	   	<label>Email</label>
       	   	<input type="email" v-model="form.email" class="form-control mx-5 my-2" >
            <div v-if="this.errors.email" class="bg-light text-danger">{{this.errors.email}}</div>
       	   </td>
       	   </tr>
       	   <tr>
       	   	<td>
       	   	<label>Course</label>
       	   	<select v-model="form.course" class="form-select mx-5 my-2" >
       	   		<option value='ug'>ug</option>
       	   		<option value='pg'>pg</option>
       	   	</select>
             <div v-if="this.errors.course" class="bg-light text-danger">{{this.errors.course}}</div>
       	   </td>
       	   </tr>
       	   <tr>
       	   	<td>
       	   	<label>Gender</label><br>
       	   	<input type="radio" v-model="form.gender" class="form-check-input mx-3" value="male" >Male
       	   	<input type="radio" v-model="form.gender" class="form-check-input mx-3" value='female'>Female 
             <div v-if="this.errors.gender" class="bg-light text-danger">{{this.errors.gender}}</div>
       	   </td>
       	   </tr>
       	   <tr>
       	   <td><button class="btn btn-primary my-5 w-75 mx-5" type="submit">Add Data</button></td>
       	   </tr>
          </table>
     
          
    
        </form>
      </center>
    </div>

</template>

<script>
	//import axios from 'axios'
  //import { Form} from 'vform'
    export default {
            props:{
            	errors: Object,
              'msg': '',
            },
    		data(){
    			return{
    			form: this.$inertia.form({
    				name:'',
    				email:'',
    				course:'',
    				gender:'',
    			})
    		}
    	},
   
    		methods : {
            add() {
                    let data=new FormData();
                    data.append('name',this.form.name);
                    data.append('email',this.form.email);
                    data.append('course',this.form.course);
                    data.append('gender',this.form.gender);
                    this.$inertia.post(this.route('form.store'),data);

                    
            }
        }

    }
</script> 
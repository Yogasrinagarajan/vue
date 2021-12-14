<template>
    <div class="container mx-5">
       <center><h2 class="my-5">Form2</h2></center>
        <p id="text" style="color:green; margin-left:100px;"></p>
          <a v-bind:href="'/form'" class="btn btn-primary">Back</a>
        <center>

        <form  class="form"  method="POST" name="myform" id="myform" @submit.prevent='add'>
       	   <table class="mx-5">
       	   <tr>
       	   	<td>
       	   	<label>Name</label>
       	   	<input type="text" v-model="form.name" class="form-control mx-5 my-2" :class="{ 'is-invalid': form.errors.has('name') }">
            <has-error :form="form" field="name"></has-error>
       	   </td>
       	   </tr>
       	     <tr>
       	   	<td>
       	   	<label>Email</label>
       	   	<input type="email" v-model="form.email" class="form-control mx-5 my-2" :class="{ 'is-invalid': form.errors.has('email') }">
             <has-error :form="form" field="email"></has-error>
       	   </td>
       	   </tr>
       	   <tr>
       	   	<td>
       	   	<label>Course</label>
       	   	<select v-model="form.course" class="form-select mx-5 my-2" :class="{ 'is-invalid': form.errors.has('course') }">
       	   		<option value='ug'>ug</option>
       	   		<option value='pg'>pg</option>
       	   	</select>
            <has-error :form="form" field="course"></has-error>
       	   </td>
       	   </tr>
       	   <tr>
       	   	<td>
       	   	<label>Gender</label><br>
       	   	<input type="radio" v-model="form.gender" class="form-check-input mx-3" value="male" :class="{ 'is-invalid': form.errors.has('gender') }">Male
       	   	<input type="radio" v-model="form.gender" class="form-check-input mx-3" value='female' :class="{ 'is-invalid': form.errors.has('gender') }">Female 
             <has-error :form="form" field="gender">required</has-error>
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
	import axios from 'axios'
  import { Form} from 'vform'
    export default {

    		data:() =>({
    			form: new Form({
    				name:null,
    				email:null,
    				course:null,
    				gender:null,
    			}),
    		}),

    		methods : {
            add() {
                
                axios.post('/form', this.$data.form)
                    .then((response)=> {
                        alert('success')
                        console.log(response);
                        
                    }).catch(err=>{
                      console.log("error",err.response)
                    })
                    this.form.post('/form')
        .then(({ data }) => { console.log(data) })
            }
        }

    }
</script> 
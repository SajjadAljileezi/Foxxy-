<template>
  <div class="row justify-content-center">
    <div class="container">
      <div class="col-md-12">
        <div class="card">

          <table class="table table-hover">
            <thead v-on:click="cancelEdit">
              <tr class="">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Company Name</th>
                <th scope="col"> Phone</th>
                <th scope="col"> Address</th>
                <th scope="col"> Email</th>
              </tr>
            </thead>
            <tbody>
              <tr class="show">
                <td v-on:dblclick="editClient()">

                  <span >{{clients.id}}</span>


                </td>
                <td v-on:dblclick="editClient()">
                  <input
                    v-model="editForm.name"
                    type="text"
                    class="form-control"
                    v-if="edit"

                  >
                  <span v-else>{{clients.name}}</span>
                </td>
                <td v-on:dblclick="editClient()">
                  <input
                    v-model="editForm.company"
                    type="text"
                    class="form-control"
                    v-if="edit"

                  >
                  <span v-else>{{clients.company}}</span>
                </td>
                <td v-on:dblclick="editClient()">
                  <input
                    v-model="editForm.phone"
                    type="text"
                    class="form-control"
                    v-if="edit"

                  >
                  <span v-else>{{clients.phone}}</span>
                </td>
                <td v-on:dblclick="editClient()">
                  <input
                    v-model="editForm.address"
                    type="text"
                    class="form-control"
                    v-if="edit"

                  >
                  <span v-else>{{clients.address}}</span>
                </td>
                <td v-on:dblclick="editClient()">
                  <input
                    v-model="editForm.email"
                    type="text"
                    class="form-control"
                    v-if="edit"

                  >
                  <span v-else>{{clients.email}}</span>
                </td>
              </tr>
            </tbody>
          </table>


<div class="container">
    <div class="row">
        <div class="col-md-4">
     <table class="table table-hover">
       <thead v-on:click="cancelEdit">
              <tr class="">
                <th scope="col"> Appointment </th>

              </tr>
            </thead>
            <tbody>
              <tr class="show">
                <td v-on:dblclick="editClient()">
                 <select  v-if="edit" v-model="editForm.appointment"  class="custom-select" id="inputGroupSelect01">

    <option value="Phone">Phone</option>
    <option value="Person">In Person</option>

  </select>
                  <span v-else>{{clients.appointment}}</span>



                </td>

              </tr>
            </tbody>


          </table>
</div>
        <div class="col-md-4">
     <table class="table table-hover">
       <thead v-on:click="cancelEdit">
              <tr class="">
                <th scope="col"> Website</th>

              </tr>
            </thead>
            <tbody>
              <tr class="show">
                <td v-on:dblclick="editClient()">
                   <input
                    v-model="editForm.website"
                    type="text"
                    class="form-control"
                    v-if="edit"

                  >
                  <span v-else>{{clients.website}}</span>


                </td>

              </tr>
            </tbody>


          </table>
</div>
 <div class="col-md-4">
     <table class="table table-hover">
       <thead v-on:click="cancelEdit">
              <tr class="">
                <th scope="col">Call Back Time</th>

              </tr>
            </thead>
            <tbody>
              <tr class="show">
                <td v-on:dblclick="editClient()">
                  <VueCtkDateTimePicker v-if="edit" format='YYYY-MM-DD HH:mm' v-model="editForm.time" />
                  <span v-else>{{clients.time}}</span>


                </td>

              </tr>
            </tbody>


          </table>
</div>
</div>
</div>


  <table class="table table-hover">
            <thead v-on:click="cancelEdit">
              <tr class="">
                <th scope="col">Notes</th>
              </tr>
            </thead>
            <tbody>
              <tr class="show">
                <td v-on:dblclick="editClient()">
                  <textarea
                    class="form-control"
                    v-model="editForm.notes"
                    v-if="edit"

                    rows="6"
                  ></textarea>
                  <span v-else>{{clients.notes}}</span>
                </td>
              </tr>
            </tbody>
          </table>
          <button
            type="button"
            v-if="edit"
            class="btn btn-secondary"
            v-on:click="cancelEdit"
            data-dismiss="modal"
          >Cancel Edit</button>
          <button
            type="button"
            v-else
            class="btn btn-secondary"
            @click="editClient()"
            data-dismiss="modal"
          >Edit</button>
          <button v-if="edit" type="button" class="btn btn-primary" @click="updatedCostumer()">Save</button>
          <button v-else type="submit" class="btn btn-danger" @click="deletClient()">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data: function() {
    return {
      clients: [],
      edit: false,
      editForm: {
        name: "",
        company: "",
        phone: "",
        address: "",
        website: "",
        emai: "",
         time: "",
        notes: "",
         appointment: "",
      }
    };
  },

  created() {
    axios
      .get("/api/showleads/" + this.$route.params.id)
      .then(response => {
        this.clients = response.data;
      })
      .catch(e => {
        console.error(e);
      });
  },
  methods: {
    editClient: function() {
      this.edit = !false;
      this.editForm.name = this.clients.name;
      this.editForm.company = this.clients.company;
      this.editForm.phone = this.clients.phone;
      this.editForm.address = this.clients.address;
      this.editForm.website = this.clients.website;
      this.editForm.email = this.clients.email;
      this.editForm.time = this.clients.time;
      this.editForm.notes = this.clients.notes;
      this.editForm.appointment = this.clients.appointment;


    },
    cancelEdit: function() {
      this.edit = !true;
      (this.editForm.name = ""), (this.editForm.company = "");
      this.editForm.phone = "";
      this.editForm.address = "";
      this.editForm.website = "";
      this.editForm.email = "";
      this.editForm.appointment = "";
      this.editForm.time = "";
      this.editForm.notes = "";

    },
    updatedCostumer() {
      axios
        .patch("/showlead/" + this.$route.params.id, {
          name: this.editForm.name,
          company: this.editForm.company,
          phone: this.editForm.phone,
          address: this.editForm.address,
          website: this.editForm.website,
          email: this.editForm.email,
          time: this.editForm.time,
           appointment: this.editForm.appointment,
          notes: this.editForm.notes
        })
        .catch(e => {
          console.error(e);
        });
       location.reload();
    },
deletClient(){
    alert('Only Admin Can Delete')
      //  axios.delete("/delete/" + this.$route.params.id,)
      //           .then(response => {

      //           });
                this.$router.push('/home')



  },



  },


};
</script>

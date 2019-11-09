<template>
  <div class="row justify-content-center">
    <div class="container">
      <div class="col-md-12 mb-3">
        <div class="card">

          <table class="table table-hover">
            <thead v-on:click="cancelEdit">
              <tr class="">
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col"> Commissions</th>
                <th scope="col"> Commisssion</th>

              </tr>
            </thead>
            <tbody>
              <tr class="show">
                <td

                  >
                  <span>{{clients.id}}</span>


                </td>
                <td v-on:dblclick="editClient()">
                  <input
                    v-model="editForm.closer_name"
                    type="text"
                    class="form-control"
                    v-if="edit"

                  >
                  <span v-else>{{clients.closer_name}}</span>
                </td>
                <td v-on:dblclick="editClient()">
                  <input
                    v-model="editForm.commissions"
                    type="text"
                    class="form-control"
                    v-if="edit"

                  >
                  <span v-else>{{clients.commissions}}</span>
                </td>
                <td v-on:dblclick="editClient()">
                  <input
                    v-model="editForm.commission"
                    type="text"
                    class="form-control"
                    v-if="edit"

                  >
                  <span v-else>{{clients.commission}}</span>
                </td>


              </tr>
            </tbody>
          </table>




</div>
</div>



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
        closer_name: "",
        commissions: "",
        commission: "",

      }
    };
  },

  created() {
    axios
      .get("/api/closernames/" + this.$route.params.id)
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
      this.editForm.closer_name = this.clients.closer_name;
      this.editForm.commissions = this.clients.commissions;
      this.editForm.commission = this.clients.commission;


    },
    cancelEdit: function() {
      this.edit = !true;
      this.editForm.closer_name = "",
      this.editForm.commissions = "";
      this.editForm.commission = "";


    },
    updatedCostumer() {
      axios
        .patch("/showclosers/" + this.$route.params.id, {
          closer_name: this.editForm.closer_name,
          commissions: this.editForm.commissions,
          commission: this.editForm.commission,

        })
        .catch(e => {
          console.error(e);
        });
       this.$router.push('/cname')
    },
deletClient(){
  axios.delete("/deletclosers/" + this.$route.params.id,)
                .then(response => {

                });
                alert('Closer Deleted Successfully ')
                this.$router.push('/cname')



  },



  },


};
</script>

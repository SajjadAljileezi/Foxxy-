<template>
  <div>


      <div class="col-md-12">
        <div class="card">
          <div class="card-header col-md-12 d-flex">
            <div class="col-md-4 p-2">Leads List</div>
            <div class="col-md-4 p-2">
              <form class="form-inline">
                <input
                  class="form-control mr-sm-2"
                  type="text"
                  placeholder="Search Company "
                  v-model="search"
                >
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
            <div class="col-md-4 ml-auto p-2">
              <button
                type="button"
                class="btn btn-primary"
                data-toggle="modal"
                data-target=".bd-example-modal-lg"
                data-whatever="@getbootstrap"
              >Add Client</button>
            </div>
          </div>
        </div>
      </div>


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name </th>
      <th scope="col">Company</th>
      <th scope="col">Phone</th>
      <th scope="col">Appointment</th>
      <th  scope="col">Schuldule Time </th>
      <th scope="col">Address </th>
      <th scope="col">Website </th>
      <th scope="col">Email </th>
    </tr>
  </thead>
  <tbody  v-for="client of filteredleads" v-bind:key="client.id" >
    <tr data-toggle="tooltip" v-bind:title=" client.notes" data-placement="top">
       <router-link v-bind:to="'showlead/' + client.id">
              <th scope="row">{{ client.id }}</th>
            </router-link>
      <td  >{{ client.name}}</td>
      <td>{{ client.company}}</td>
      <td>{{client.phone}}</td>
      <td>{{client.appointment}}</td>
      <td>{{client.time}}</td>
      <td>{{client.address}}</td>
      <td>{{client.website}}</td>
      <td>{{client.email}}</td>
    </tr>
  </tbody>
</table>
  </div>
</template>

<script>
  export default {
    data() {
      return {
          clients:[],
            search:'',


      }
    },
    created() {
    axios
      .get("./api/leadss")
      .then(response => {
        this.clients = response.data;
      })
      .catch(e => {
        console.error(e);
      });
  },
  computed:{
      filteredleads:function(){

          return this.clients.filter((client)=>{
              return client.company.toLowerCase().match(this.search.toLowerCase());
          });
      }
  }
  }
</script>








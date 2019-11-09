<template>
  <div class="m-3">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header col-md-12 d-flex">
            <div class="col-md-4 p-2">Today's Lead List</div>
            <div class="col-md-4 p-2">

            </div>
            <div class="col-md-4 ml-auto p-2">
            </div>
          </div>
        </div>
      </div>

        <!-- Table -->
      <table class="table table-hover my-5">
        <thead>
          <tr class="">
            <th scope="col">ID</th>
            <th scope="col">Company</th>
            <th scope="col">Name</th>
            <th scope="col">Call Time</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody v-for="call of calls" v-bind:key="call.id">
          <tr class="">
            <router-link v-bind:to="'showlead/' + call.id">
              <th scope="row">{{ call.id }}</th>
            </router-link>
            <td>{{ call.company }}</td>
            <td>{{ call.name }}</td>
            <td>{{ call.time }}</td>
            <td>{{ call.phone }}</td>
            <td>{{ call.email }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>


<script>
export default {
  data: function() {
    return {
        calls:[]
}},

created() {
    axios
      .get("./api/today")
      .then(response => {
        this.calls = response.data;
      })
      .catch(e => {
        console.error(e);
      });
  }
};
</script>

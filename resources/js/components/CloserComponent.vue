<template >
<div id="app">
    <!-- Active -->
    <h1 class="text-center">Active</h1>
    <div class="row">
        <div class="col-lg-12">
<table class="table table-hover table-info">
  <thead>
    <tr class="show font">
      <th scope="col">#</th>
      <th scope="col">Closer</th>
      <th scope="col">Packages</th>
      <th scope="col">Active Clients </th>

    </tr>
  </thead>
  <tbody class="table table-hover table-info" v-for="all of alls" v-bind:key="all.id" >
    <tr>

              <th scope="row">{{ all.id }}</th>

      <td>{{all.closer_name}}</td>
      <td>{{all.packages}}</td>
      <td>{{all.company}}</td>

    </tr>
  </tbody>
</table>
</div>
</div>

<!-- Canceled -->

    <div  v-for="unactive of unactives" v-bind:key="unactive.id" class="row">
       <div class='col-lg-12 text-center'> <h1 v-if="unactive.id >=0">Canceled</h1> </div>
        <div class="col-lg-12">
<table class="table table-hover  table-danger">
  <thead>
    <tr class="show font">
      <th scope="col">#</th>
      <th scope="col">Closer</th>
      <th scope="col">Canceled Date</th>
      <th scope="col">Canceled Clients </th>

    </tr>
  </thead>
  <tbody class="table table-hover table-danger " v-for="unactive of unactives" v-bind:key="unactive.id" >
    <tr>
       <router-link v-bind:to="'show/' + unactive.id">
              <th scope="row">{{ unactive.id }}</th>
            </router-link>
      <td>{{unactive.closer_name}}</td>
      <td>{{unactive.canceled_date}}</td>
      <td>{{unactive.company}}</td>

    </tr>
  </tbody>
</table>
</div>
</div>
<!-- Total -->
<h1 class="text-center"> Monthly Residual Total</h1>
<div class="row">
        <div class="col-lg-12">
<table class="table table-hover table-success">
  <thead>
    <tr >
        <th scope="col">Name</th>
      <th scope="col">Total</th>

    </tr>
  </thead>
   <tbody v-for="closer of closers" v-bind:key="closer.id" class="table table-hover table-success " >
    <tr>
      <td>{{closer.closer_name}}</td>
       <td>{{ closer.commission}}</td>
    </tr>

    </tbody>
</table>
</div>
</div>
</div>
</template>
<script>
export default {
  data: function() {
    return {
      closers: [],
      alls: [],
      counts: [],
      unactives: [],

      }
  },


  created() {
    axios
      .get("/closerss")
      .then(response => {
        this.closers = response.data;
      })
      .catch(e => {
        console.error(e);
      });
   axios
      .get("/api/all")
      .then(response => {
        this.alls = response.data;
      })
      .catch(e => {
        console.error(e);
      });
    axios
      .get("api/closers")
      .then(response => {
        this.counts = response.data
      })
      .catch(e => {
        console.error(e);
      });

       axios
      .get("api/unactive")
      .then(response => {
        this.unactives = response.data
      })
      .catch(e => {
        console.error(e);
      });
  },


 }
</script>

<template>
  <div class="m-3">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header col-md-12 d-flex">
            <div class="col-md-4 p-2">Clients List</div>
            <div class="col-md-4 p-2">
              <form class="form-inline">
                <input
                  class="form-control mr-sm-2"
                  type="search"
                  placeholder="Search"
                  aria-label="Search"
                >
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
              </form>
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
            <th scope="col">Website</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody v-for="social of socials" v-bind:key="social.id">
          <tr class="">
            <router-link v-bind:to="'show/' + social.id">
              <th scope="row">{{ social.id }}</th>
            </router-link>
            <td>{{ social.company }}</td>
            <td>{{ social.name }}</td>
            <td>{{ social.website }}</td>
            <td>{{ social.phone }}</td>
            <td>{{ social.email }}</td>
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
        socials:[]
}},

created() {
    axios
      .get("./api/socialmedia")
      .then(response => {
        this.socials = response.data;
      })
      .catch(e => {
        console.error(e);
      });
  }
};
</script>

<template>
	<div>
 <div class="col-md-12">
        <div class="card">
          <div class="card-header col-md-12 d-flex">
            <div class="col-md-4 p-2">Closers List</div>
            <div class="col-md-4 p-2">
              <form class="form-inline">
                <input
                  class="form-control mr-sm-2"
                  type="text"
                  placeholder="Search Closer Name "
                  v-model="search"
                >
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
            <div class="col-md-4 ml-auto p-2">
              <button
              data-toggle="modal" data-target="#exampleModalCenter"
                type="button"
                class="btn btn-primary"
              >Add Closer</button>
            </div>
          </div>
        </div>
      </div>


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name </th>
      <th scope="col">Commissions</th>
      <th scope="col">Commission</th>

    </tr>
  </thead>
  <tbody  v-for="(closername , index ) of filteredleads" :key="index">
 <tr >
       <router-link v-bind:to="'showcloser/' + closername.id">
              <th scope="row">{{ closername.id }}</th>
            </router-link>
      <td>

                 <span >{{closername.closer_name}}</span>
         </td>
      <td>{{ closername.commissions}}</td>
      <td>{{closername.commission}}</td>

    </tr>
  </tbody>
</table>

		<div class="container">
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
				<div class="form-row m-2" v-for="(account, index) in accounts" :key="account.id">
					<div class="form-group col-md-5">
						<label for="Name">Add Closer Name ( {{ index+1 }})</label>
						<input
							v-model="account.closer_name"
							type="name"
							class="form-control"
							id="name"
							placeholder="Closer Name "
						/>
					</div>
                        <div class="form-group col-md-5">
						<label for="Name"> $ Commisions( {{ index+1 }})</label>
						<input
							v-model="account.commissions"
							type="name"
							class="form-control"
							id="name"
							placeholder="Comissions "
						/>
					</div>
					<button v-if="index>0" class="btn btn-outline-danger m-3 p-3" @click="deleteRow(index)">*</button>
					<a
						@click="openSeaseme "
						v-else
						class="btn btn-outline-info m-3 p-3"
						data-toggle="collapse"
						href="#collapseExample"
						role="button"
						aria-expanded="false"
						aria-controls="collapseExample"
					>+</a>
				</div>
				<button type="button" @click="addClient()" class="m-3 p-3 btn btn-outline-info">Add</button>
			</form>
      </div>

    </div>
  </div>
</div>

		</div>
	</div>
</template>

<script>
	export default {
		data: function() {
			return {
search:'',
                closernames:[],
				accounts: [
					{
                        closer_name: "",
                        commissions:"",
                        }
				],

			};
		},
		methods: {

			//  indexx () {
			//   if (this.accounts[1]) {
			//    indexx=!indexx
			//   }
			// },
			deleteRow(index) {
				this.accounts.splice(index);
			},

			openSeaseme() {
				this.accounts.push({
                    closer_name: "",
                    commissions:"",
				});
			},

			addClient() {
				axios
					.post("/addcname", {
						accounts: this.accounts
					})

					.then(function(response) {
						const status = response.status;

						//redirect logic
						if (response.status == 200) {
							    window.location = "/script"
						}
                    })
                    .catch(e => {
        console.error(e);
      });
			}
        },
        created() {
      axios
      .get("/api/closernames")
      .then(response => {
        this.closernames = response.data;
      })
      .catch(e => {
        console.error(e);
      });
  },

	computed:{
      filteredleads:function(){

          return this.closernames.filter((closername)=>{
              return closername.closer_name.toLowerCase().match(this.search.toLowerCase());
          });
      }
  }
	};
</script>








<template>
  <div>
    <div class="row justify-content-center">

      <div class="col-md-12 pr-4 pl-4">
        <div class="card">
          <div class="card-header col-md-12 d-flex">
            <div class="col-md-4 p-2">Clients List</div>
            <div class="col-md-4 p-2">
              <form class="form-inline">
                <input
                  class="form-control mr-sm-2"
                  type="text"
                  placeholder="Search"
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

      <div
        class="modal fade bd-example-modal-lg"
        id="exampleModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Client Sign Up Form</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="needs-validation">
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationTooltip01">Name</label>
                    <input v-model="name"
                      type="text"
                      class="form-control"
                      id="validationTooltip01"
                      placeholder="Name"
                      value="Mark"
                      required
                    >
                    <div class="valid-tooltip">Looks good!</div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationTooltip02">Company Name</label>
                    <input v-model="company"
                      type="text"
                      class="form-control"
                      id="validationTooltip02"
                      placeholder="Company Name"
                      value="Otto"
                      required
                    >
                    <div class="valid-tooltip">Looks good!</div>
                  </div>



                  <div class="col-md-4 mb-3">

                      <label for="validationTooltipUsername">Closer Name</label>
                        <select  v-model="closer_name" class="custom-select" id="inputGroupSelect04" >
    <!-- <option  value="1"  v-for="(scripted, index) in scripteds"  :key="scripted.id"  >{{scripted.name}}</option> -->

         <option v-for="(closername, index) in closernames" :key="closername.id"
        :selected="closername.closer_name == closer_name ? 'selected' : ''"
        :value="closername.closer_name">
       {{ closername.closer_name }}
    </option>

  </select>


                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-3 mb-3">
                    <label for="validationTooltip03">Address</label>
                    <input v-model="address"
                      type="text"
                      class="form-control"
                      id="validationTooltip03"
                      placeholder="Address"
                      required
                    >
                    <div class="invalid-tooltip">Please provide a valid city.</div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="validationTooltip04">City Campaign</label>
                    <input v-model="city_campaign"
                      type="text"
                      class="form-control"
                      id="validationTooltip04"
                      placeholder="City Campaign"
                      required
                    >
                    <div class="invalid-tooltip">Please provide a valid state.</div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="validationTooltip05">Phone</label>
                    <input v-model="phone"
                      type="text"
                      class="form-control"
                      id="validationTooltip05"
                      placeholder="Phone"
                      required
                    >
                    <div class="invalid-tooltip">Please provide a valid zip.</div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="validationTooltip03">Price</label>
                    <input
                      type="text" v-model="price"
                      class="form-control"
                      id="validationTooltip03"
                      placeholder="price"
                      required
                    >
                    <div class="invalid-tooltip">Please provide a valid city.</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationTooltip03">Keywords</label>
                    <input v-model="keywords"
                      type="text"
                      class="form-control"
                      id="validationTooltip03"
                      placeholder="Keywords"
                      required
                    >
                    <div class="invalid-tooltip">Please provide a valid city.</div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="validationTooltip04">Website</label>
                    <input v-model="website"
                      type="text"
                      class="form-control"
                      id="validationTooltip04"
                      placeholder="Website"
                      required
                    >
                    <div class="invalid-tooltip">Please provide a valid state.</div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="validationTooltip05">Email</label>
                    <input v-model="email"
                      type="text"
                      class="form-control"
                      id="validationTooltip05"
                      placeholder="Email"
                      required
                    >
                    <div class="invalid-tooltip">Please provide a valid zip.</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-check col-md-1 ml-3 mr-4">
                    <input type="checkbox" v-model="facebook" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Facebook</label>
                  </div>
                  <div class="form-check ml-3 col-md-2">
                    <input type="checkbox"  v-model="twitter" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Twitter</label>
                  </div>
                  <div class="form-check col-md-2">
                    <input type="checkbox"  v-model="adword" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Adword</label>
                  </div>
                  <div class="form-check col-md-2">
                    <input type="checkbox" v-model="active" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Active</label>
                  </div>
                  <div class="form-check col-md-2">
                    <input type="checkbox" v-model="is_call_back" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Call Back</label>
                  </div>
                  <div class="form-check col-md-2 ml-3">
                    <input type="checkbox" v-model="ourwebsite" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Our Website</label>
                  </div>
                  <div class="form-check col-md-4 ml-3 mr-4">
                    <input type="checkbox"  v-model="review_managment" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Review Managment</label>
                  </div>
                </div>
                <div class="form-row mt-3">
                  <div class="col-md-6 mb-3">
                    <label for="validationTooltip03">Adword Phrases</label>
                    <input v-model="adword_phrases"
                      type="text"
                      class="form-control"
                      id="validationTooltip03"
                      placeholder="Adword Phrases"
                      required
                    >
                    <div class="invalid-tooltip">Please provide a valid city.</div>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="validationTooltip04">Adword Start</label>
                    <VueCtkDateTimePicker format='YYYY-MM-DD HH:mm' v-model="adword_start" />
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="validationTooltip05">Adword Ends</label>
                 <VueCtkDateTimePicker format='YYYY-MM-DD HH:mm' v-model="adword_end" />
                  </div>
                </div>
                <div class="form-row mt-3">
                  <div class="col-md-6 mb-3">
                    <label for="validationTooltip03">Call Back Time</label>
                  <VueCtkDateTimePicker format='YYYY-MM-DD HH:mm' v-model="call_back" />
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="validationTooltip04">Package</label>
                    <input
                      type="text" v-model="packages"
                      class="form-control"
                      id="validationTooltip04"
                      placeholder="Package"
                      required
                    >
                    <div class="invalid-tooltip">Please provide a valid state.</div>
                  </div>

                </div>
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label for="validationTooltip03">Notes (Add Newest at the Top)</label>
                    <textarea class="form-control" v-model="notes" id="exampleFormControlTextarea1"></textarea>
                    <div class="invalid-tooltip">Please provide a valid city.</div>
                  </div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="addClient()">Add Now</button>
              </form>
            </div>
          </div>
        </div>
      </div>
       </div>
      <!-- Table -->

      <table class="table table-hover ">
        <thead>
          <tr  >
            <th scope="col">ID</th>
            <th scope="col">Company</th>
            <th scope="col">Name</th>
            <th scope="col">Website</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody v-for="client of filteredClients" v-bind:key="client.id">
          <tr data-toggle="tooltip" v-bind:title=" client.notes" data-placement="top">
            <router-link v-bind:to="'show/' + client.id">
              <th scope="row">{{ client.id }}</th>
            </router-link>
            <td>{{ client.company }}</td>
            <td>{{ client.name }}</td>
            <td>{{ client.website }}</td>
            <td>{{ client.phone }}</td>
            <td>{{ client.email }}</td>
          </tr>
        </tbody>
      </table>

  </div>
</template>


<script>
export default {
  data: function() {
    return {
        closernames:[],
      name: "",
      company: "",
      address: "",
      phone: "",
      email: "",
      website: "",
      keywords: "",
      city_campaign: "",
      closer_name: "",
      adword_phrases: "",
      adword_start: "",
      adword_end: "",
      packages: "",
      adword: false,
      ourwebsite: false,
      active: false,
      facebook: false,
      twitter: false,
      review_managment:false,
      call_back: "",
      is_call_back: false,
      price: "",
      notes: "",
      clients: [],
      search:'',
    };
  },
  methods: {
    addClient() {
      axios
        .post("./add", {
          name: this.name,
          company: this.company,
          address: this.address,
          phone: this.phone,
          email: this.email,
          website: this.website,
          keywords: this.keywords,
          ourwebsite: this.ourwebsite,
          active: this.active,
          facebook: this.facebook,
          twitter: this.twitter,
          call_back: this.call_back,
           review_managment: this.review_managment,
          is_call_back: this.is_call_back,
          price: this.price,
          notes: this.notes,
          closer_name: this.closer_name,
          city_campaign: this.city_campaign,
          adword: this.adword,
          packages: this.packages,
          adword_start: this.adword_start,
          adword_phrases: this.adword_phrases,
          adword_end: this.adword_end
        })
       .then(function(response){
      const status =
       (response.status);

      //redirect logic
      if (response.status == 200) {
         window.location = "/home"
      }
    });

    //   this.closeModal();
    // },

    //  closeModal() {
    //    $("#exampleModal").modal("hide");
    //    location.reload();
     }

  },

  created() {
    axios
      .get("./api/add")
      .then(response => {
        this.clients = response.data;
      })
      .catch(e => {
        console.error(e);
      });

        axios
      .get("/closernames")
      .then(response => {
        this.closernames = response.data;
      })
      .catch(e => {
        console.error(e);
      });
  },

  computed:{
      filteredClients:function(){

          return this.clients.filter((client)=>{
              return client.company.toLowerCase().match(this.search.toLowerCase());
          });
      }
  }
};
</script>

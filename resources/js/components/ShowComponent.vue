<template>
  <div class="row justify-content-center p-2 ">

      <div class="col-md-12">
        <div class="card">
          <table class="table table-hover">
            <thead v-on:click="cancelEdit">
              <tr >
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Company Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
              </tr>
            </thead>
            <tbody>
              <tr class="show">
                <td>{{clients.id}}</td>

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
              </tr>
            </tbody>
          </table>
          <table class="table table-hover">
            <thead v-on:click="cancelEdit">
              <tr >
                <th scope="col">Website</th>
                <th scope="col">Email</th>
                <th scope="col">Closer Name</th>
                <th scope="col">Keywords</th>
                <th scope="col">Package</th>
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
                <td v-on:dblclick="editClient()">
                  <input
                    v-model="editForm.email"
                    type="text"
                    class="form-control"
                    v-if="edit"

                  >
                  <span v-else>{{clients.email}}</span>
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
                    v-model="editForm.keywords"
                    type="text"
                    class="form-control"
                    v-if="edit"

                  >
                  <span v-else>{{clients.keywords}}</span>
                </td>
                <td v-on:dblclick="editClient()">
                  <input
                    v-model="editForm.packages"
                    type="text"
                    class="form-control"
                    v-if="edit"

                  >
                  <span v-else>{{clients.packages}}</span>
                </td>
              </tr>
            </tbody>
          </table>
          <table class="table table-hover">
            <thead v-on:click="cancelEdit">
              <tr >
                <th scope="col">City Campaign</th>
                <th scope="col">Adword Phrases</th>
                <th scope="col">Adword Start</th>
                <th scope="col">Adword End</th>
                <th scope="col">Adword</th>
              </tr>
            </thead>
            <tbody>
              <tr class="show">
                <td v-on:dblclick="editClient()">
                  <input
                    v-model="editForm.city_campaign"
                    type="text"
                    class="form-control"
                    v-if="edit"

                  >
                  <span v-else>{{clients.city_campaign}}</span>
                </td>
                <td v-on:dblclick="editClient()">
                  <input
                    v-model="editForm.adword_phrases"
                    type="text"
                    class="form-control"
                    v-if="edit"

                  >
                  <span v-else>{{clients.adword_phrases}}</span>
                </td>
                <td v-on:dblclick="editClient()">
                <VueCtkDateTimePicker v-if="edit" format='YYYY-MM-DD HH:mm' v-model="editForm.adword_start" />
                  <span v-else>{{clients.adword_start}}</span>
                </td>
                <td v-on:dblclick="editClient()">
                <VueCtkDateTimePicker v-if="edit" format='YYYY-MM-DD HH:mm' v-model="editForm.adword_end" />
                  <span v-else>{{clients.adword_end}}</span>
                </td>
            <td v-on:dblclick="editClient()">
                   <select  v-if="edit" v-model="editForm.adword"  class="custom-select" id="inputGroupSelect01">

    <option value="1">Yes</option>
    <option value="0">NO</option>

  </select>
                  <span v-else> {{clients.adword ? "Yes" : "No" }}</span>


                </td>
              </tr>
            </tbody>
          </table>
          <table class="table table-hover">
            <thead v-on:click="cancelEdit">
              <tr >
                <th scope="col">Active</th>
                <th scope="col">Facebook</th>
                <th scope="col">Twitter</th>
                <th scope="col">Our Website</th>
                <th scope="col">Call Back</th>
                <th scope="col">Review Managment</th>
              </tr>
            </thead>
            <tbody>
              <tr class="show">
                <td v-on:dblclick="editClient()">
                   <select  v-if="edit" v-model="editForm.active"  class="custom-select" id="inputGroupSelect01">

    <option value="1">Yes</option>
    <option value="0">NO</option>

  </select>
                  <span v-else> {{clients.active ? "Yes" : "No" }}</span>


                </td>
               <td v-on:dblclick="editClient()">
                   <select  v-if="edit" v-model="editForm.facebook"  class="custom-select" id="inputGroupSelect01">

    <option value="1">Yes</option>
    <option value="0">NO</option>

  </select>
                  <span v-else> {{clients.facebook ? "Yes" : "No" }}</span>


                </td>
                <td v-on:dblclick="editClient()">
                   <select  v-if="edit" v-model="editForm.twitter"  class="custom-select" id="inputGroupSelect01">

    <option value="1">Yes</option>
    <option value="0">NO</option>

  </select>
                  <span v-else> {{clients.twitter ? "Yes" : "No" }}</span>


                </td>
                <td v-on:dblclick="editClient()">
                   <select  v-if="edit" v-model="editForm.ourwebsite"  class="custom-select" id="inputGroupSelect01">

    <option value="1">Yes</option>
    <option value="0">NO</option>

  </select>
                  <span v-else> {{clients.ourwebsite ? "Yes" : "No" }}</span>


             <td v-on:dblclick="editClient()">
                   <select  v-if="edit" v-model="editForm.is_call_back"  class="custom-select" id="inputGroupSelect01">

    <option value="1">Yes</option>
    <option value="0">NO</option>

  </select>
                  <span v-else> {{clients.is_call_back ? "Yes" : "No" }}</span>


                </td>
             <td v-on:dblclick="editClient()">
                   <select  v-if="edit" v-model="editForm.review_managment"  class="custom-select" id="inputGroupSelect01">

    <option value="1">Yes</option>
    <option value="0">NO</option>

  </select>
                  <span v-else> {{clients.review_managment ? "Yes" : "No" }}</span>


                </td>
              </tr>
            </tbody>
          </table>



    <div class="row">
      <div class="col-md-6">
<table class="table table-hover">
            <thead v-on:click="cancelEdit">
              <tr >
                <th scope="col">Canceled Date</th>

              </tr>
            </thead>
            <tbody>
              <tr class="show">
                <td v-on:dblclick="editClient()">
                  <VueCtkDateTimePicker v-if="edit" format='YYYY-MM-DD HH:mm' v-model="editForm.canceled_date" />
                  <span v-else>{{clients.canceled_date}}</span>


                </td>

              </tr>
            </tbody>
            </table>
            </div>
 <div class="col-md-6">
     <table class="table table-hover">
       <thead v-on:click="cancelEdit">
              <tr >
                <th scope="col">Call Back Time</th>

              </tr>
            </thead>
            <tbody>
              <tr class="show">
                <td v-on:dblclick="editClient()">
                  <VueCtkDateTimePicker v-if="edit" format='YYYY-MM-DD HH:mm' v-model="editForm.call_back" />
                  <span v-else>{{clients.call_back}}</span>


                </td>

              </tr>
            </tbody>


          </table>

</div>

<div class="col-md-12">
        <div class="card">
  <table class="table table-hover">
            <thead v-on:click="cancelEdit">
              <tr >
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
          <button v-if="edit" type="submit" class="btn btn-primary" @click="updatedCostumer()">Save</button>
          <button v-else type="submit" class="btn btn-danger" @click="deletClient()">Delete</button>
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
      clients: [],
      edit: false,
      editForm: {
        name: "",
        company: "",
        phone: "",
        address: "",
        website: "",
        emai: "",
        closer_name: "",
        keywords: "",
        packages: "",
        city_campaign: "",
        adword_phrases: "",
        adword_start: "",
        adword_end: "",
        adword: "",
        active: "",
        facebook: "",
        twitter: "",
        ourwebsite: "",
        is_call_back: "",
        review_managment: "",
        canceled_date:"",
         call_back:"",
        notes: ""
      }
    };
  },

  created() {
    axios
      .get("/api/show/" + this.$route.params.id)
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
      this.editForm.closer_name = this.clients.closer_name;
      this.editForm.keywords = this.clients.keywords;
      this.editForm.packages = this.clients.packages;
      this.editForm.city_campaign = this.clients.city_campaign;
      this.editForm.adword_phrases = this.clients.adword_phrases;
      this.editForm.adword_start = this.clients.adword_start;
      this.editForm.adword_end = this.clients.adword_end;
      this.editForm.adword = this.clients.adword;
      this.editForm.active = this.clients.active;
      this.editForm.facebook = this.clients.facebook;
      this.editForm.twitter = this.clients.twitter;
      this.editForm.ourwebsite = this.clients.ourwebsite;
      this.editForm.is_call_back = this.clients.is_call_back;
      this.editForm.review_managment = this.clients.review_managment;
      this.editForm.canceled_date = this.clients.canceled_date;
      this.editForm.call_back = this.clients.call_back;
      this.editForm.notes = this.clients.notes;
    },
    cancelEdit: function() {
      this.edit = !true;
      (this.editForm.name = ""), (this.editForm.company = "");
      this.editForm.phone = "";
      this.editForm.address = "";
      this.editForm.website = "";
      this.editForm.email = "";
      this.editForm.closer_name = "";
      this.editForm.keywords = "";
      this.editForm.packages = "";
      this.editForm.city_campaign = "";
      this.editForm.adword_phrases = "";
      this.editForm.adword_start = "";
      this.editForm.adword_end = "";
      this.editForm.adword = "";
      this.editForm.active = "";
      this.editForm.facebook = "";
      this.editForm.twitter = "";
      this.editForm.ourwebsite = "";
      this.editForm.is_call_back = "";
      this.editForm.notes = "";
       this.editForm.canceled_date = "";
       this.editForm.call_back = "";
      this.editForm.review_managment = "";
    },
    updatedCostumer() {
      axios
        .patch("/add/" + this.$route.params.id, {
          name: this.editForm.name,
          company: this.editForm.company,
          phone: this.editForm.phone,
          address: this.editForm.address,
          website: this.editForm.website,
          email: this.editForm.email,
          closer_name: this.editForm.closer_name,
          keywords: this.editForm.keywords,
          packages: this.editForm.packages,
          city_campaign: this.editForm.city_campaign,
          adword_phrases: this.editForm.adword_phrases,
          adword_start: this.editForm.adword_start,
          adword_end: this.editForm.adword_end,
          adword: this.editForm.adword,
          active: this.editForm.active,
          facebook: this.editForm.facebook,
          twitter: this.editForm.twitter,
          ourwebsite: this.editForm.ourwebsite,
          is_call_back: this.editForm.is_call_back,
          review_managment: this.editForm.review_managment,
          canceled_date: this.editForm.canceled_date,
           call_back: this.editForm.call_back,
          notes: this.editForm.notes
        })
        .catch(e => {
          console.error(e);
        });
      location.reload();
    },
deletClient(){

       axios.delete("/delete/" + this.$route.params.id,)
                .then(response => {

                });
                  alert('Client DEleted Successfully ')
                this.$router.push('/home')



  },



  },


};
</script>

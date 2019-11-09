<template>
	<div id="app"  >
		<div class="container">
			<form class="form-inline justify-content-center">
				<div class="form-group mx-sm-3 mb-2">
					<label for class="sr-only">Phone Number</label>
					<input class="form-control" type="text" placeholder="Search" v-model="search" />
				</div>
				<button  v-on:click="searches= true"  type="button" class="btn btn-danger ">Check Client</button>
				<button type="button" class="btn btn-success ml-5" data-toggle="modal" data-target="#exampleModal">
 Add Lead
</button>


<!-- Modal  -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add Client </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01"> POC Name </label>
      <input type="text" v-model="lead.name" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02"> Coompany Name</label>
      <input type="text" v-model="lead.company" class="form-control" id="validationDefault02" placeholder="Last name" value="Company" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefaultUsername">Address</label>
      <div class="input-group">

        <input type="text" v-model="lead.address" class="form-control" id="validationDefaultUsername" placeholder="Address" aria-describedby="inputGroupPrepend2" required>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="validationDefault03"> Phone </label>
      <input type="text" v-model="lead.phone" class="form-control" id="validationDefault03" placeholder="Phone" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">Email</label>
      <input type="text" v-model="lead.email" class="form-control" id="validationDefault04" placeholder="Email" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault05"> Website </label>
      <input type="text" v-model="lead.website" class="form-control" id="validationDefault05" placeholder="Website" required>
    </div>
  </div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01"> Second Appointment </label>
  </div>
  <select v-model="lead.appointment"  class="custom-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="Phone">Phone</option>
    <option value="Person">In Person</option>

  </select>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01"> Select Time </label>
  </div>
<VueCtkDateTimePicker format='YYYY-MM-DD HH:mm' v-model="lead.time" />
</div>


<div class="row">
    <div class="col-md-12">
  <div class="form-group">
    <label for=""> Closer Notes</label>
    <textarea v-model="lead.notes" class="form-control" id="exampleFormControlTextarea1" rrows="29" cols="90" ></textarea>
  </div>
  </div>
</div>
</form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" @click="addLead()" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal  -->

			</form>
			<table v-if="searches" class="table table-hover table-dark">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Company Name</th>
						<th scope="col">Client Name</th>
						<th scope="col">Phone</th>
					</tr>
				</thead>
				<tbody v-for="client of filteredClients" v-bind:key="client.id">
					<tr>
						<router-link v-bind:to="'show/' + client.id">
							<th scope="row">{{ client.id }}</th>
						</router-link>
						<td>{{ client.company }}</td>
						<td>{{ client.name }}</td>
						<td>{{ client.phone }}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="container mt-5">
			<div class="row">
				<div class="col-3">
					<div
						class="nav flex-column nav-pills"
						id="v-pills-tab"
						role="tablist"
						aria-orientation="vertical"
					>
						<a
							class="nav-link active"
							id="v-pills-home-tab"
							data-toggle="pill"
							href="#v-pills-home"
							role="tab"
							aria-controls="v-pills-home"
							aria-selected="true"
						>INTRO</a>
						<a
							class="nav-link"
							id="v-pills-profile-tab"
							data-toggle="pill"
							href="#v-pills-profile"
							role="tab"
							aria-controls="v-pills-profile"
							aria-selected="false"
						>LOCAL</a>
						<a
							class="nav-link"
							id="v-pills-messages-tab"
							data-toggle="pill"
							href="#v-pills-messages"
							role="tab"
							aria-controls="v-pills-messages"
							aria-selected="false"
						> GOOGLE MAP</a>
						<a
							class="nav-link"
							id="v-pills-settings-tab"
							data-toggle="pill"
							href="#v-pills-settings"
							role="tab"
							aria-controls="v-pills-settings"
							aria-selected="false"
						>ORGANIC</a>

                            		<a
							class="nav-link"
							id="v-pills-website-tab"
							data-toggle="pill"
							href="#v-pills-website"
							role="tab"
							aria-controls="v-pills-website"
							aria-selected="false"
						>WEBSITE</a>

                          		<a
							class="nav-link"
							id="v-pills-review-tab"
							data-toggle="pill"
							href="#v-pills-review"
							role="tab"
							aria-controls="v-pills-review"
							aria-selected="false"
						>REVIEW MANAGMENT</a>


								<a
							class="nav-link"
							id="v-pills-social-tab"
							data-toggle="pill"
							href="#v-pills-social"
							role="tab"
							aria-controls="v-pills-social"
							aria-selected="false"
						>BUSINESS SOCIAL MEDIA</a>

							<a
							class="nav-link"
							id="v-pills-content-tab"
							data-toggle="pill"
							href="#v-pills-content"
							role="tab"
							aria-controls="v-pills-content"
							aria-selected="false"
						>CONTENT</a>

								<a
							class="nav-link"
							id="v-pills-bing-tab"
							data-toggle="pill"
							href="#v-pills-bing"
							role="tab"
							aria-controls="v-pills-bing"
							aria-selected="false"
						>BING</a>


							<a
							class="nav-link"
							id="v-pills-yelp-tab"
							data-toggle="pill"
							href="#v-pills-yelp"
							role="tab"
							aria-controls="v-pills-yelp"
							aria-selected="false"
						>YELP</a>

							<a
							class="nav-link"
							id="v-pills-apple-tab"
							data-toggle="pill"
							href="#v-pills-apple"
							role="tab"
							aria-controls="v-pills-apple"
							aria-selected="false"
						>APPLE MAP</a>

								<a
							class="nav-link"
							id="v-pills-adword-tab"
							data-toggle="pill"
							href="#v-pills-adword"
							role="tab"
							aria-controls="v-pills-adword"
							aria-selected="false"
						> ADWORD PPC</a>
							<a
							class="nav-link"
							id="v-pills-loop1-tab"
							data-toggle="pill"
							href="#v-pills-loop1"
							role="tab"
							aria-controls="v-pills-loop1"
							aria-selected="false"
						> LOOP1</a>

						<a
							class="nav-link"
							id="v-pills-notes-tab"
							data-toggle="pill"
							href="#v-pills-notes"
							role="tab"
							aria-controls="v-pills-notes"
							aria-selected="false"
						> NOTES</a>

					</div>
				</div>
				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
						<div
							class="tab-pane fade show active"
							id="v-pills-home"
							role="tabpanel"
							aria-labelledby="v-pills-home-tab"
						>

    <vue-ckeditor
      v-model="editForm.intro"
      v-if="editintro"
      :config="config"
      @blur="onBlur($event)"
      @focus="onFocus($event)"
      @contentDom="onContentDom($event)"
      @dialogDefinition="onDialogDefinition($event)"
      @fileUploadRequest="onFileUploadRequest($event)"
      @fileUploadResponse="onFileUploadResponse($event)" />
                        <div  v-else v-html="scripts.intro"></div>

							<button
								v-if="editintro"
								type="button"
								@click="saveIntro()"
								class="btn btn-primary d-flex flex-row-reverse mt-5"
							>Save </button>
							<button
								type="button"
								v-else
								@click="editIntro(index) "
								class="btn btn-danger d-flex flex-row-reverse mt-5"
							>Edit </button>
						</div>
						<div
							class="tab-pane fade"
							id="v-pills-profile"
							role="tabpanel"
							aria-labelledby="v-pills-profile-tab"
						>	 <vue-ckeditor
      v-model="editForm.local"
      v-if="editlocal"
      :config="config"
      @blur="onBlur($event)"
      @focus="onFocus($event)"
      @contentDom="onContentDom($event)"
      @dialogDefinition="onDialogDefinition($event)"
      @fileUploadRequest="onFileUploadRequest($event)"
      @fileUploadResponse="onFileUploadResponse($event)" />
							<div  v-else v-html="scripts.local"></div>
							<button
								v-if="editintro"
								type="button"
								@click="saveIntro(index)"
								class="btn btn-primary d-flex flex-row-reverse mt-5"
							>Save </button>
							<button
								type="button"
								v-else
								@click="editIntro(index) "
								class="btn btn-danger d-flex flex-row-reverse mt-5"
							>Edit </button></div>
						<div
							class="tab-pane fade"
							id="v-pills-messages"
							role="tabpanel"
							aria-labelledby="v-pills-messages-tab"
						><vue-ckeditor
      v-model="editForm.google_map"
      v-if="editgoogle_map"
      :config="config"
      @blur="onBlur($event)"
      @focus="onFocus($event)"
      @contentDom="onContentDom($event)"
      @dialogDefinition="onDialogDefinition($event)"
      @fileUploadRequest="onFileUploadRequest($event)"
      @fileUploadResponse="onFileUploadResponse($event)" />
							<div  v-else v-html="scripts.google_map"></div>
							<button
								v-if="editintro"
								type="button"
								@click="saveIntro(index)"
								class="btn btn-primary d-flex flex-row-reverse mt-5"
							>Save </button>
							<button
								type="button"
								v-else
								@click="editIntro(index) "
								class="btn btn-danger d-flex flex-row-reverse mt-5"
							>Edit </button></div>
						<div
							class="tab-pane fade"
							id="v-pills-settings"
							role="tabpanel"
							aria-labelledby="v-pills-settings-tab"
						><vue-ckeditor
      v-model="editForm.organic"
      v-if="editorganic"
      :config="config"
      @blur="onBlur($event)"
      @focus="onFocus($event)"
      @contentDom="onContentDom($event)"
      @dialogDefinition="onDialogDefinition($event)"
      @fileUploadRequest="onFileUploadRequest($event)"
      @fileUploadResponse="onFileUploadResponse($event)" />
							<div  v-else v-html="scripts.organic"></div>
							<button
								v-if="editintro"
								type="button"
								@click="saveIntro(index)"
								class="btn btn-primary d-flex flex-row-reverse mt-5"
							>Save </button>
							<button
								type="button"
								v-else
								@click="editIntro(index) "
								class="btn btn-danger d-flex flex-row-reverse mt-5"
							>Edit </button></div>
                            	<div
							class="tab-pane fade"
							id="v-pills-website"
							role="tabpanel"
							aria-labelledby="v-pills-website-tab"
						><vue-ckeditor
      v-model="editForm.powerfull_website"
      v-if="editpowerfull_website"
      :config="config"
      @blur="onBlur($event)"
      @focus="onFocus($event)"
      @contentDom="onContentDom($event)"
      @dialogDefinition="onDialogDefinition($event)"
      @fileUploadRequest="onFileUploadRequest($event)"
      @fileUploadResponse="onFileUploadResponse($event)" />
							<div  v-else v-html="scripts.powerfull_website"></div>
							<button
								v-if="editintro"
								type="button"
								@click="saveIntro(index)"
								class="btn btn-primary d-flex flex-row-reverse mt-5"
							>Save </button>
							<button
								type="button"
								v-else
								@click="editIntro(index) "
								class="btn btn-danger d-flex flex-row-reverse mt-5"
							>Edit </button></div>


                            <div
							class="tab-pane fade"
							id="v-pills-review"
							role="tabpanel"
							aria-labelledby="v-pills-review-tab"
						><vue-ckeditor
      v-model="editForm.review_managment"
      v-if="editreview_managment"
      :config="config"
      @blur="onBlur($event)"
      @focus="onFocus($event)"
      @contentDom="onContentDom($event)"
      @dialogDefinition="onDialogDefinition($event)"
      @fileUploadRequest="onFileUploadRequest($event)"
      @fileUploadResponse="onFileUploadResponse($event)" />
							<div  v-else v-html="scripts.review_managment"></div>
							<button
								v-if="editintro"
								type="button"
								@click="saveIntro(index)"
								class="btn btn-primary d-flex flex-row-reverse mt-5"
							>Save </button>
							<button
								type="button"
								v-else
								@click="editIntro(index) "
								class="btn btn-danger d-flex flex-row-reverse mt-5"
							>Edit </button></div>

							 <div
							class="tab-pane fade"
							id="v-pills-social"
							role="tabpanel"
							aria-labelledby="v-pills-social-tab"
						><vue-ckeditor
      v-model="editForm.business_social_media"
      v-if="editbusiness_social_media"
      :config="config"
      @blur="onBlur($event)"
      @focus="onFocus($event)"
      @contentDom="onContentDom($event)"
      @dialogDefinition="onDialogDefinition($event)"
      @fileUploadRequest="onFileUploadRequest($event)"
      @fileUploadResponse="onFileUploadResponse($event)" />
							<div  v-else v-html="scripts.business_social_media"></div>
							<button
								v-if="editintro"
								type="button"
								@click="saveIntro(index)"
								class="btn btn-primary d-flex flex-row-reverse mt-5"
							>Save </button>
							<button
								type="button"
								v-else
								@click="editIntro(index) "
								class="btn btn-danger d-flex flex-row-reverse mt-5"
							>Edit </button></div>

							 <div
							class="tab-pane fade"
							id="v-pills-content"
							role="tabpanel"
							aria-labelledby="v-pills-content-tab"
						><vue-ckeditor
      v-model="editForm.content"
      v-if="editcontent"
      :config="config"
      @blur="onBlur($event)"
      @focus="onFocus($event)"
      @contentDom="onContentDom($event)"
      @dialogDefinition="onDialogDefinition($event)"
      @fileUploadRequest="onFileUploadRequest($event)"
      @fileUploadResponse="onFileUploadResponse($event)" />
							<div  v-else v-html="scripts.content"></div>
							<button
								v-if="editintro"
								type="button"
								@click="saveIntro(index)"
								class="btn btn-primary d-flex flex-row-reverse mt-5"
							>Save </button>
							<button
								type="button"
								v-else
								@click="editIntro(index) "
								class="btn btn-danger d-flex flex-row-reverse mt-5"
							>Edit </button></div>

							<div
							class="tab-pane fade"
							id="v-pills-bing"
							role="tabpanel"
							aria-labelledby="v-pills-bing-tab"
						><vue-ckeditor
      v-model="editForm.bing"
      v-if="editbing"
      :config="config"
      @blur="onBlur($event)"
      @focus="onFocus($event)"
      @contentDom="onContentDom($event)"
      @dialogDefinition="onDialogDefinition($event)"
      @fileUploadRequest="onFileUploadRequest($event)"
      @fileUploadResponse="onFileUploadResponse($event)" />
							<div  v-else v-html="scripts.bing"></div>
							<button
								v-if="editintro"
								type="button"
								@click="saveIntro(index)"
								class="btn btn-primary d-flex flex-row-reverse mt-5"
							>Save </button>
							<button
								type="button"
								v-else
								@click="editIntro(index) "
								class="btn btn-danger d-flex flex-row-reverse mt-5"
							>Edit </button></div>

							<div
							class="tab-pane fade"
							id="v-pills-yelp"
							role="tabpanel"
							aria-labelledby="v-pills-yelp-tab"
						><vue-ckeditor
      v-model="editForm.yelp"
      v-if="edityelp"
      :config="config"
      @blur="onBlur($event)"
      @focus="onFocus($event)"
      @contentDom="onContentDom($event)"
      @dialogDefinition="onDialogDefinition($event)"
      @fileUploadRequest="onFileUploadRequest($event)"
      @fileUploadResponse="onFileUploadResponse($event)" />
							<div  v-else v-html="scripts.yelp"></div>
							<button
								v-if="editintro"
								type="button"
								@click="saveIntro(index)"
								class="btn btn-primary d-flex flex-row-reverse mt-5"
							>Save </button>
							<button
								type="button"
								v-else
								@click="editIntro(index) "
								class="btn btn-danger d-flex flex-row-reverse mt-5"
							>Edit </button></div>

							<div
							class="tab-pane fade"
							id="v-pills-apple"
							role="tabpanel"
							aria-labelledby="v-pills-apple-tab"
						><vue-ckeditor
      v-model="editForm.apple_maps"
      v-if="editapple_maps"
      :config="config"
      @blur="onBlur($event)"
      @focus="onFocus($event)"
      @contentDom="onContentDom($event)"
      @dialogDefinition="onDialogDefinition($event)"
      @fileUploadRequest="onFileUploadRequest($event)"
      @fileUploadResponse="onFileUploadResponse($event)" />
							<div  v-else v-html="scripts.apple_maps"></div>
							<button
								v-if="editintro"
								type="button"
								@click="saveIntro(index)"
								class="btn btn-primary d-flex flex-row-reverse mt-5"
							>Save </button>
							<button
								type="button"
								v-else
								@click="editIntro(index) "
								class="btn btn-danger d-flex flex-row-reverse mt-5"
							>Edit </button></div>

						<div
							class="tab-pane fade"
							id="v-pills-adword"
							role="tabpanel"
							aria-labelledby="v-pills-adword-tab"
						><vue-ckeditor
      v-model="editForm.adword"
      v-if="editadword"
      :config="config"
      @blur="onBlur($event)"
      @focus="onFocus($event)"
      @contentDom="onContentDom($event)"
      @dialogDefinition="onDialogDefinition($event)"
      @fileUploadRequest="onFileUploadRequest($event)"
      @fileUploadResponse="onFileUploadResponse($event)" />
							<div  v-else v-html="scripts.adword"></div>
							<button
								v-if="editintro"
								type="button"
								@click="saveIntro(index)"
								class="btn btn-primary d-flex flex-row-reverse mt-5"
							>Save </button>
							<button
								type="button"
								v-else
								@click="editIntro(index) "
								class="btn btn-danger d-flex flex-row-reverse mt-5"
							>Edit </button></div>

							<div
							class="tab-pane fade"
							id="v-pills-loop1"
							role="tabpanel"
							aria-labelledby="v-pills-loop1-tab"
						><vue-ckeditor
      v-model="editForm.loop1"
      v-if="editloop1"
      :config="config"
      @blur="onBlur($event)"
      @focus="onFocus($event)"
      @contentDom="onContentDom($event)"
      @dialogDefinition="onDialogDefinition($event)"
      @fileUploadRequest="onFileUploadRequest($event)"
      @fileUploadResponse="onFileUploadResponse($event)" />
							<div  v-else v-html="scripts.loop1"></div>
							<button
								v-if="editintro"
								type="button"
								@click="saveIntro(index)"
								class="btn btn-primary d-flex flex-row-reverse mt-5"
							>Save </button>
							<button
								type="button"
								v-else
								@click="editIntro(index) "
								class="btn btn-danger d-flex flex-row-reverse mt-5"
							>Edit </button></div>


								<div
							class="tab-pane fade"
							id="v-pills-notes"
							role="tabpanel"
							aria-labelledby="v-pills-notes-tab"
						><vue-ckeditor
      v-model="editForm.notes"
      v-if="editnotes"
      :config="config"
      @blur="onBlur($event)"
      @focus="onFocus($event)"
      @contentDom="onContentDom($event)"
      @dialogDefinition="onDialogDefinition($event)"
      @fileUploadRequest="onFileUploadRequest($event)"
      @fileUploadResponse="onFileUploadResponse($event)" />
							<div  v-else v-html="scripts.notes"></div>
							<button
								v-if="editintro"
								type="button"
								@click="saveIntro(index)"
								class="btn btn-primary d-flex flex-row-reverse mt-5"
							>Save </button>
							<button
								type="button"
								v-else
								@click="editIntro(index) "
								class="btn btn-danger d-flex flex-row-reverse mt-5"
							>Edit </button></div>

					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import VueCkeditor from 'vue-ckeditor2';
	export default {
components: { VueCkeditor },
		data: function() {
			return {
 content: '',
      config: {
        toolbar: [
          ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript']
        ],
        height: 300
      },
                   lead :{
                       metting:'',
                       name:'',
                       company:'',
                       address:'',
                       phone:'',
                       email:'',
                       website:'',
                       time:'',
                       notes:'',
                       appointment:''
                   },

				editForm: {
                    intro: "",
                    local:'',
                    organic:'',
                    google_map:'',
					review_managment:'',
					business_social_media:'',
					content:'',
					bing:'',
					yelp: '',
					apple_maps: '',
					adword: '',
					loop1: '',
					notes: '',
				},
                editintro: false,
                editlocal: false,
                editgoogle_map: false,
                 editorganic: false,
                 editreview_managment: false,
				 editpowerfull_website: false,
				  editbusiness_social_media: false,
				   editcontent: false,
				   editbing: false,
				   edityelp: false,
					editapple_maps: false,
					editadword: false,
					editloop1: false,
					editnotes: false,
				clients: [],
				scripts: [],
				search: "",
				searches: false
			};
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
				.get("./api/script")
				.then(response => {
					this.scripts = response.data;
				})
				.catch(e => {
					console.error(e);
				});
		},
		computed: {
			filteredClients: function() {

				return this.clients.filter(client => {

                        this.searches= true
					return client.phone
						.replace(/[- )(]/g,"")
                        .match(this.search.replace(/[- )(]/g,""));



                })
                // if (this.client.phone=1){
                //     this.search=!this.search
                // }


		}},
		methods: {
 onBlur(evt) {
      console.log(evt);
    },
    onFocus(evt) {
      console.log(evt);
    },
    onContentDom(evt) {
      console.log(evt);
    },
    onDialogDefinition(evt) {
      console.log(evt);
    },
    onFileUploadRequest(evt) {
      console.log(evt);
    },
    onFileUploadResponse(evt) {
      console.log(evt);
    },
 addLead() {

      axios
        .post("./addlead", {

          name: this.lead.name,
           company: this.lead.company,
            address: this.lead.address,
             phone: this.lead.phone,
              email: this.lead.email,
               website: this.lead.website,
               appointment: this.lead.appointment,
                time: this.lead.time,
                 notes: this.lead.notes,
        })
       .then(function(response){
      const status =
       (response.status);

      //redirect logic
      if (response.status == 200) {
        window.location = "/leads"
      }
    })},

			editIntro(index) {
				this.editintro = !this.editintro;
                this.editForm.intro = this.scripts.intro;
                	this.editlocal = !this.editlocal;
                this.editForm.local = this.scripts.local;
                	this.editgoogle_map = !this.editgoogle_map;
                this.editForm.google_map = this.scripts.google_map;
                   	this.editorganic = !this.editorganic;
                this.editForm.organic = this.scripts.organic;
                	this.editpowerfull_website = !this.editpowerfull_website;
                this.editForm.powerfull_website = this.scripts.powerfull_website;
                    	this.editreview_managment = !this.editreview_managment;
				this.editForm.review_managment = this.scripts.review_managment;
				this.editbusiness_social_media = !this.editbusiness_social_media;
				this.editForm.business_social_media = this.scripts.business_social_media;
					this.editcontent = !this.editcontent;
				this.editForm.content = this.scripts.content;
					this.editbing = !this.editbing;
				this.editForm.bing = this.scripts.bing;
					this.edityelp = !this.edityelp;
				this.editForm.yelp = this.scripts.yelp;
					this.editapple_maps = !this.editapple_maps;
				this.editForm.apple_maps = this.scripts.apple_maps;
				this.editadword = !this.editadword;
				this.editForm.adword = this.scripts.adword;
				this.editloop1 = !this.editloop1;
				this.editForm.loop1 = this.scripts.loop1;
				this.editnotes = !this.editnotes;
				this.editForm.notes = this.scripts.notes;
			},

			saveIntro() {
				axios
					.patch("/script/" + 1, {
                        intro: this.editForm.intro,
                        local: this.editForm.local,
                         google_map: this.editForm.google_map,
                         organic: this.editForm.organic,
                         powerfull_website: this.editForm.powerfull_website,
						 review_managment: this.editForm.review_managment,
						 business_social_media: this.editForm.business_social_media,
						 content: this.editForm.content,
						 bing: this.editForm.bing,
						 yelp: this.editForm.yelp,
						  apple_maps: this.editForm.apple_maps,
						  adword: this.editForm.adword,
						   loop1: this.editForm.loop1,
						   notes: this.editForm.notes,
                    })

					.catch(e => {
						console.error(e);
					});
				location.reload();
            }

        },


	};
</script>

<template>
  <div>
    <div class="modal fade text-left show" id="primary" tabindex="-1" aria-labelledby="myModalLabel160" style="display: block; padding-right: 0px" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title white" id="myModalLabel160">ADD USER</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <i data-feather="x"></i>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="basicInput">Full Name</label>
                      <input type="text" class="form-control" v-model="fullname" placeholder="Enter FullName" />
                    </div>
                    <div class="col-md-6">
                      <label for="basicInput">Full Name</label>
                      <input type="text" class="form-control" v-model="fullname" placeholder="Enter FullName" />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="basicInput">Email</label>
                  <input type="text" class="form-control" v-model="email" placeholder="Enter Email" />
                </div>
                <div class="form-group">
                  <label for="basicInput">Password</label>
                  <input type="password" class="form-control" v-model="password" placeholder="Enter Password" />
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
              <i class="bx bx-x d-block d-sm-none"></i>
              <span class="d-none d-sm-block" @click="toggleModal()">Close</span>
            </button>
            <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
              <i class="bx bx-check d-block d-sm-none"></i>
              <span class="d-none d-sm-block" @click="addUser()">Add</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import httpAxios from '@/utils/http-axios';

export default {
  data() {
    return {
      fname: '',
      lname: '',
      email: '',
      password: '',
    };
  },

  components: {},
  mounted() {},
  methods: {
    search() {
      this.gridOptions.api.setQuickFilter(this.searchText);
    },
    toggleModal() {
      this.$emit('toggleModal');
    },
    addUser() {
      const self = this;
      httpAxios({
        url: '/users',
        method: 'POST',
        data: { first_name: self.fname, last_name: self.lname, email: self.email, password: self.password },
      }).then(async () => {
        self.$router.go({ name: 'admin.dashboard' });
      });
    },
  },
};
</script>

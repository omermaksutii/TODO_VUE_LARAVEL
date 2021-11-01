<template>
  <div>
    <div class="modal fade text-left show" id="primary" tabindex="-1" aria-labelledby="myModalLabel160" style="display: block; padding-right: 0px" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title white" id="myModalLabel160">ADD TASK</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <i data-feather="x"></i>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="basicInput">Title</label>
                  <input type="text" class="form-control" v-model="title" placeholder="Enter Title" />
                </div>
                <div class="form-group mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                  <textarea class="form-control" v-model="description" rows="3"></textarea>
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
              <span class="d-none d-sm-block" @click="addTask()">Add</span>
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
        title: '',
        description: '',
        status: 0,
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
    addTask() {
    //   const formData = new FormData();
    //    formData.append(title, this.title);
    //    formData.append(description, this.description);
        const self = this;

      httpAxios({
        url: '/tasks',
        method: 'POST',
        data: { title: self.title, description: self.description, status: self.status },
      }).then(async () => {
        self.$router.go({ name: 'admin.dashboard' });
      });
    },
  },
};
</script>

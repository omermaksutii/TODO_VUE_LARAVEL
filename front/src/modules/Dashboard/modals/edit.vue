<template>
  <div>
    <div class="modal fade text-left show" id="primary" tabindex="-1" aria-labelledby="myModalLabel160" style="display: block; padding-right: 0px" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title white" id="myModalLabel160">Edit TASK</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <i data-feather="x"></i>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="basicInput">Title</label>
                  <input type="text" class="form-control" v-model="tasks.title" placeholder="Enter Title" />
                </div>
                <div class="form-group mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                  <textarea class="form-control" v-model="tasks.description" rows="3"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
              <i class="bx bx-x d-block d-sm-none"></i>
              <span class="d-none d-sm-block" @click="toggleModal()">Close</span>
            </button>
            <button type="button" class="btn btn-success ml-1" data-bs-dismiss="modal">
              <i class="bx bx-check d-block d-sm-none"></i>
              <span class="d-none d-sm-block" @click="update(1)">Mark DONE</span>
            </button>
            <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
              <i class="bx bx-check d-block d-sm-none"></i>
              <span class="d-none d-sm-block" @click="update(0)">Update</span>
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
  props: {
    oneRowData: {
      required: true,
    },
  },
  data() {
    return {
      title: '',
      status: 0,
      tasks: [],
    };
  },

  components: {},
  mounted() {
    const self = this;
    self.id = this.oneRowData;
    httpAxios({
      url: '/tasks/' + self.id,
      method: 'GET',
    }).then(async (response) => {
      self.tasks = response.data.task;
    });
  },
  methods: {
    toggleModal() {
      this.$emit('toggleModal');
    },
    update(e) {
      const self = this;
      httpAxios({
        url: '/tasks/' + this.tasks.id + '?title=' + this.tasks.title + '&description=' + this.tasks.description + '&status=' + e,
        method: 'PUT',
      }).then(async () => {
        self.$router.go({ name: 'admin.dashboard' });
      });
    },
  },
};
</script>

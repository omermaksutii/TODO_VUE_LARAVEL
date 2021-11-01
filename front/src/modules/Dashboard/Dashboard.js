import adminLayout from '@/layouts/Admin';
import httpAxios from '@/utils/http-axios';
import modalAddTask from '/src/modules/Dashboard/modals/add';
import modalEditTask from '/src/modules/Dashboard/modals/edit';

export default {
  name: 'Dashboard',
  components: {
    adminLayout,
    modalAddTask,
    modalEditTask,
  },
  data() {
    return {
      tasks: [],
      showModalAdd: false,
      showModalEdit: false,
      oneRowData: 0,
      search: '',
    };
  },
  mounted() {
    this.getTasks();
    // console.log(this.tasks)
  },
  methods: {
    getTasks() {
      const self = this;
      httpAxios({
        url: '/tasks',
        method: 'GET',
      }).then(async (response) => {
        self.tasks = response.data.rows;
      });
    },
    delete(e) {
      alert(e);
    },
    modalEdit(e) {
      let self = this;
      self.oneRowData = e;
      this.showModalEdit = !this.showModalEdit;
    },
    toggleModalAdd() {
      this.showModalAdd = !this.showModalAdd;
    },
    toggleModalEdit() {
      this.showModalEdit = !this.showModalEdit;
    },
  },
};

import adminLayout from '@/layouts/Admin';
import httpAxios from '@/utils/http-axios';
import modalAddUser from '/src/modules/Users/modals/add';

export default {
  name: 'Users',
  components: {
    adminLayout,
    modalAddUser,
  },
  data() {
    return {
      users: [],
      oneRowData: 0,
      search: '',
      showModalAdd: false,
    };
  },
  mounted() {
    this.getUsers();
  },
  methods: {
    getUsers() {
      const self = this;
      httpAxios({
        url: '/users',
        method: 'GET',
      }).then(async (response) => {
        self.users = response.data.rows;
      });
    },
    delete(e) {
      alert(e);
    },
    toggleModalAdd() {
      this.showModalAdd = !this.showModalAdd;
    },
  },
};

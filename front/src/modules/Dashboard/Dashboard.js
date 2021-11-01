import adminLayout from '@/layouts/Admin';
import httpAxios from '@/utils/http-axios';
import modalAddTask from '/src/modules/Dashboard/modals/add'



export default {
  name: 'Dashboard',
  components: {
    adminLayout,
    modalAddTask
  },
  data() {
    return {
      tasks: [],
      showModalAdd: false,

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
    delete(e){
      alert(e);
    },
    toggleModalAdd(){
      this.showModalAdd = !this.showModalAdd;
  },
  },
  
};

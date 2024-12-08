import { createApp } from 'vue';  // Import Vue from CDN or package

// Import components
import UserList from './components/UserList.vue';
import AddUser from './components/AddUser.vue';

// Initialize Vue app
const app = createApp({
  components: {
    UserList,
    AddUser
  },
  data() {
    return {
      users: []
    };
  },
  methods: {
    addNewUser(name) {
      this.users.push({ id: this.users.length + 1, name });
    }
  }
});

// Mount the app
app.mount('#vue-app');
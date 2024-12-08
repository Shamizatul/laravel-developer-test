<template>
    <div>
      <h2>Add New User</h2>
      <form @submit.prevent="addUser">
        <input type="text" v-model="newUser" placeholder="Enter user name" required />
        <button type="submit">Add User</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        newUser: ''
      };
    },
    methods: {
      addUser() {
        if (this.newUser) {
          this.$emit('user-added', this.newUser);
          this.newUser = ''; // Reset the input after adding the user
        }
      }
    }
  };
  </script>  
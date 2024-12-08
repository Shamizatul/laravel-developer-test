<template>
    <div>
      <h2>User List</h2>
      <input type="text" v-model="searchQuery" placeholder="Search by name..." />
  
      <ul>
        <li v-for="user in filteredUsers" :key="user.id">{{ user.name }}</li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        searchQuery: '',
        users: [
          { id: 1, name: 'Alice' },
          { id: 2, name: 'Bob' },
          { id: 3, name: 'Charlie' },
          { id: 4, name: 'David' }
        ]
      };
    },
    computed: {
      filteredUsers() {
        return this.users.filter(user =>
          user.name.toLowerCase().includes(this.searchQuery.toLowerCase())
        );
      }
    }
  };
</script>
  
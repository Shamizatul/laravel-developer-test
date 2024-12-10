<template>
    <div id="app" class="container">
        <h1>User Maintenance Application</h1>
        <div class="components-container">
            <AddUser @add-user="addUser" />
            <UserList :users="users" @filter="setFilter" />
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import api from "@/utils/axios";
import AddUser from "./components/AddUser.vue";
import UserList from "./components/UserList.vue";

// Define the users ref to hold the list of users
const users = ref([]);

// Function to fetch all users from the API
const getApiAllUsers = async () => {
    try {
        const response = await api.get('/users/all');
        users.value = response.data;
    } 
    catch (error) {
        console.error("Error fetching users:", error);
    }
};

// Fetch users when the component is mounted
onMounted(() => {
    getApiAllUsers();
});
</script>

<style>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 20px;
}

h1 {
    font-size: 28px;
    margin-bottom: 40px;
    color: #333;
}

.container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
}

.components-container {
    display: flex;
    justify-content: space-between;
    gap: 20px; /* Space between the components */
    flex-wrap: wrap; /* Allow components to wrap on smaller screens */
}
</style>

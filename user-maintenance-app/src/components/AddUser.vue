<template>
    <div class="add-user">
        <h2>Add New User</h2>
        <input v-model="name" type="text" placeholder="Enter user name" />
        <input v-model="email" type="email" placeholder="Enter email" />
        <input v-model="phone" type="text" placeholder="Enter phone number" @keyup="validatePhone" />
        <input v-model="password" type="password" placeholder="Enter password" />
        <button @click="submitUser">Add User</button>
    </div>
</template>

<script setup>
import { ref } from "vue";
import api from "@/utils/axios";
import { defineEmits } from "vue";

// Define the event to emit
const emit = defineEmits(["refresh-user-list"]); 

// Define reactive data
const name = ref("");
const email = ref("");
const phone = ref("");
const password = ref("");

function validatePhone() {
    // Remove leading and trailing whitespace and check if it's numeric
    const trimmedPhone = phone.value.trim();
    if (!(/^[\d-]+$/.test(trimmedPhone))) {        
        alert("Invalid phone number. Please try again. (eg: 012-1111111)");
        phone.value = "";
    }
}

// Function to submit user data
async function submitUser() {
    if (name.value.trim() && email.value.trim() && phone.value.trim() && password.value.trim()) {
        // Validating an email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!(emailRegex.test(email.value.trim()))) {    
            alert("Invalid email address. Please try again. (eg: xxx@xxx.com)");
            return; // Stop the function if validation fails
        }

        const userData = {
            name: name.value,
            email: email.value,
            phone: phone.value,
            password: password.value,
        };

        try {
            // Send POST request to backend with Content-Type: application/json header
            const response = await api.post("/users/add", userData, {
                headers: {
                    'Content-Type': 'application/json',
                },
            });
            console.log(response)
            if (response.status === 201) {
                // Clear the form after successful submission
                name.value = "";
                email.value = "";
                phone.value = "";
                password.value = "";
                alert("User added successfully!");

                // Emit event to refresh user list
                emit("refresh-user-list");
            }
        } catch (error) {
            console.error("There was an error adding the user:", error);
            if (error.response && error.response.data.errors) {
                // Loop through each error and show them in an alert
                const errors = error.response.data.errors;
                let errorMessage = "";
                for (const field in errors) {
                    errorMessage += `${field}: ${errors[field].join(", ")}\n`;
                }

                alert("Validation errors:\n" + errorMessage);
            } 
            else {
                alert("Error adding user!");
            }
        }
    } else {
        alert("Please fill out all fields.");
    }
}
</script>

<style scoped>
.add-user {
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    box-sizing: border-box;
}

input:focus {
    border-color: #66afe9;
    outline: none;
}

button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #45a049;
}

button:active {
    background-color: #388e3c;
}
</style>
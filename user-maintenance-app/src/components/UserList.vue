<template>
    <div class="user-list">
        <h2>User List</h2>
        <input v-model="filter" type="text" placeholder="Filter by name" @input="applyFilter" />
        <ol>
            <li v-for="user in filteredUsers" :key="user.id">
                {{ user.name }} |
                {{ user.email }} |
                {{ user.phone }}
            </li>
        </ol>
    </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue';

// eslint-disable-next-line
const props = defineProps({
    users: {
        type: Array,
        required: true,
    },
});

const emit = defineEmits(['filter']);

const filter = ref('');
const filteredUsers = computed(() => {
    return props.users.filter(user => user.name.toLowerCase().includes(filter.value.toLowerCase()));
});

function applyFilter() {
    emit('filter', filter.value);
}

watch(() => filter.value, () => {
    applyFilter();
});
</script>

<style scoped>
.user-list {
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
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

ol {
    margin: 5px 0;
}

li {
    margin: 5px 0;
    text-align: left;
}
</style>
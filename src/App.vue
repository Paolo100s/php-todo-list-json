<script>
import axios from 'axios';

export default {
  data() {

    return {

      tasks: [],
      newTask: {

        text: ''
      }
    };
  },
  methods: {

    onSubmit() {

      const url = "http://localhost/php-todo-list-json/php/newTask.php";
      const data = this.newTask;
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };

      axios.post(url, data, headers)
        .then(response => {

          const data = response.data;
          this.tasks = data;

          this.newTask.text = '';
        })
        .catch(error => console.error("error", error));
    },
    deleteTask(ind) {

      const url = "http://localhost/php-todo-list-json/php/deleteTask.php";
      const data = { index: ind };
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };

      axios.post(url, data, headers)
        .then(response => {

          const data = response.data;
          this.tasks = data;
        })
        .catch(error => console.error("error", error));
    },
    toggleTask(ind) {

      const url = "http://localhost/php-todo-list-json/php/toggleTask.php";
      const data = { index: ind };
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };

      axios.post(url, data, headers)
        .then(response => {

          const data = response.data;
          this.tasks = data;
        })
        .catch(error => console.error("error", error));
    }
  },
  mounted() {
    axios.get("http://localhost/php-todo-list-json/php/tasks.php")
      .then(response => {

        const data = response.data;
        this.tasks = data;
      })
      .catch(error => console.error("error", error));
  }
}
</script>

<template>
  <h1>Todo list</h1>
  <ul>
    <li v-for="(task, ind) in tasks" :key="ind">
      <span @click="toggleTask(ind)" :class="task.completed ? 'stroke' : ''">
        {{ task.text }}
      </span>
      <input @click="deleteTask(ind)" type="button" value="X">
    </li>
  </ul>
  <form @submit.prevent="onSubmit">
    <input type="text" name="text" id="text" v-model="newTask.text">
    <input type="submit" value="CREATE">
  </form>
</template>

<style scoped>
.stroke {
  text-decoration: line-through;
}
</style>
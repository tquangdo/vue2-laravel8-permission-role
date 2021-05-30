<template>
  <div>
    <div class="error" v-if="v_error.message.length">
      <div class="alert alert-danger" role="alert">
        {{ v_error.message }}
      </div>
    </div>
    <div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">User name</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item_user, index) in v_users" :key="'user-' + index">
            <th scope="row">{{ item_user.id }}</th>
            <td>{{ item_user.name }}</td>
            <td>{{ item_user.email }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      v_users: [],
      v_error: {
        message: "",
      },
    };
  },
  created() {
    this.getUsers();
  },
  methods: {
    getUsers() {
      axios
        .get("/users")
        .then((response) => {
          if (response.data.status === false) {
            this.v_error.message = response.data.message;
          } else {
            this.v_users = response.data;
          }
        })
        .catch((error) => {
          alert("Get users ERR!!! " + error);
        });
    },
  },
};
</script>

<style>
</style>
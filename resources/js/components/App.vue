<<template>
    <div class="container">
        <div class="user-login">
            <div class="username">
                <!-- $root la biến global mặc định của VueJS -->
                User: {{ $root.user.name }}
            </div>
            <div class="logout">
                <a href="#" @click.prevent="onLogout">Logout</a>
            </div>
        </div>
        <div>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <router-link exact class="nav-link" to="/">Tasks</router-link>
                </li>
                <li class="nav-item">
                    <router-link exact class="nav-link" to="/user">Users</router-link>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
export default {
  methods: {
    onLogout: function () {
      axios
        .post("logout") // auto hiu vi da install "php artisan ui vue --auth"
        .then(() => {
          document.location.href = "/login";
        })
        .catch((error) => {
          alert("logout ERR!!! " + error);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.container {
  margin-top: 50px;
  .user-login {
    text-align: right;
  }
  .main-content {
    margin-top: 50px;
  }
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vue App</title>
  <!-- Vue.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/vue@3.2.0/dist/vue.global.js"></script>
</head>
<body>
  <div id="vue-app">
    <!-- Add User Component -->
    <add-user @user-added="addNewUser"></add-user>

    <!-- User List Component -->
    <user-list :users="users"></user-list>
  </div>

  <!-- Include app.js -->
  <script type="module" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
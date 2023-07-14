<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>
<body>
  
  @auth
  <h2>You r logged in</h2>
  <form action="/logout" method="POST" >
    @csrf
    <button>Logout</button>
  </form>
  @else
  <div style="border: 3px solid black;">
    <h2>Register</h2>
    <form action="/register" method="POST">
      @csrf
      <input name="name" type="text" placeholder="name">
      <input name="email" type="text" placeholder="email">
      <input name="password" type="password" placeholder="password">
      <button>Register</button>
    </form>
  </div>
  <div style="border: 3px solid black;">
    <h2>Login</h2>
    <form action="/login" method="POST">
      @csrf
      <input name="email" type="text" placeholder="email">
      <input name="password" type="password" placeholder="password">
      <button>Login</button>
    </form>
  </div>
  @endauth

</body>
</html>
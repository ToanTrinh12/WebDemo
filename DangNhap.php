<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dangnhap</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700;800&display=swap" rel="stylesheet" />
  <style>
    <?php require_once "./style.css" ?>
  </style>
</head>

<body>
  <div class="container1">
    <div class="form">
      <div class="login-form">
        <h2>Đăng nhập</h2>
        <div class="inputBox">
          <input type="text" id="username" required="required" />
          <i></i>
          <span>Tên tài khoản</span>
        </div>
        <div class="inputBox">
          <input type="password" id="password" required="required" />
          <i></i>
          <span>Mật khẩu</span>
        </div>
        <div class="links">
          <a href="#">Quên mật khẩu</a>
          <a href="#">Đăng ký</a>
        </div>
        <div class="noti"></div>
        <button class="btnLogin" type="submit" id="submit" onclick="ApiDN()">Submit</button>
      </div>
    </div>
  </div>
  <script>
    let tk = document.getElementById('username');
    let mk = document.getElementById('password');
    function ApiDN() {
      let a = '';
      let tb = '';
      let username = tk.value;
      let password = mk.value;
      const data = {username,password};
      console.log(JSON.stringify(data));

      async function login() {
        const response = await fetch('http://localhost/api/Dangnhap.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
        });
        console.log(response);
        const a = await response.text();
        console.log(a);
        if( a == '{"message":"LOGIN SUCCESS"}'){
        alert("thanhcong");
      }
      }
      login().then(a =>{
        return a;
      });
    } 
  </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link
      rel="icon"
      type="image/x-icon"
      href="https://phimmoichillc.net/favicon.ico"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <title>Phimmoi</title>
  </head>
  <body style="background: black">
    <div class="effect"></div>
    <div class="detail-movie">
      <i class="fa fa-close" style="font-size:40px ;float:right;color:white;cursor:pointer" onclick="closeImg()"></i>
      <div class="picture">
        <img src="" alt="" id="movie">
      </div>
      <div class="picture-post">
        <img src="" alt="" id="movie_post">
      </div>
    </div>
    <div id="header">
      <div class="container">
        <div class="logo">
          <img src="https://phimmoichilla.net/dev/images/logo.png" alt="" />
        </div>
        <ul id="main-menu">
          <li><a href="">phim mới</a></li>
          <li><a href="">phim lẻ</a></li>
          <li><a href="">phim bộ</a></li>
          <li>
            <a href="">thể loại</a>
            <ul class="sub-menu">
              <li><a href="">kinh dị</a></li>
              <li><a href="">tình cảm</a></li>
              <li><a href="">hành động</a></li>
              <li><a href="">hoạt hình</a></li>
              <li><a href="">chiến tranh</a></li>
              <li><a href="">tâm lí</a></li>
            </ul>
          </li>
          <li><a href="">năm phát hành</a></li>
          <li><a href="">quốc gia</a></li>
          <li><a href="">trailer</a></li>
        </ul>
        <div class="search">
          <input
            placeholder="Tìm tên phim, diễn viên..."
            value=""
            type="text"
            name="keyword"
          />
          <i id="searchsubmit" class="fa fa-search" value=" " type="submit"></i>
        </div>
        <div class="sign-in">
          <a class="acc" href="./DangNhap.php">ĐĂNG NHẬP</a>
        </div>
        <div class="sign-up">
          <a class="acc" href="">ĐĂNG KÍ</a>
        </div>
      </div>
    </div>
    <div id="ads">
      <img
        style="width: 100%"
        src="http://www.sbbanner.com/newmedia/vi/promo/viSbnG_1330x90.gif"
        alt=""
      />
    </div>
    <div class="title">phim đề cử</div>
    <div class="swiper-container">
      <div class="swiper-wrapper"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
    <div class="title">phim lẻ mới cập nhật</div>
    <div class="movie-new-update">
    </div>
    <script src="scr.js"></script>
  </body>
</html>

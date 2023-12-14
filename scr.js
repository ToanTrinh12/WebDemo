var requestOptions = {
  method: "GET",
  redirect: "follow",
};
var a = "";
var temp = "";
for (let j = 1; j <= 1; j++) {
  fetch(
    `https://api.themoviedb.org/3/trending/all/day?api_key=26ba5e77849587dbd7df199727859189&page=${j}`,
    requestOptions
  )
    .then((response) => response.json())
    .then((result) => {
      let dem = 0;
      let a=[];
      result.results.forEach((i) => {
        dem++;
        if (dem < 15) {
            if(i.name === undefined){
                a += `<div class="swiper-slide" onclick="clickMovie('${i.backdrop_path}')"><img class="item" src="https://image.tmdb.org/t/p/w300${i.poster_path}"\><i class="fa fa-play-circle-o"></i>
                  <div class="name-movie">${i.title}</div>
                </div>`;
            }else{
                a += `<div class="swiper-slide" onclick="clickMovie('${i.backdrop_path}')"><img class="item" src="https://image.tmdb.org/t/p/w300${i.poster_path}"\><i class="fa fa-play-circle-o"></i>
                <div class="name-movie">${i.name}</div>
            </div>`;
            }
        }
      });
      document.getElementsByClassName("swiper-wrapper")[0].innerHTML += a;
    })
    .catch((error) => console.log("error", error));
}
var swiper = new Swiper(".swiper-container", {
  loop: false,
  spaceBetween: 20,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  slidesPerView: "5",
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
var b = "";
for (let j = 2; j <= 2; j++) {
  fetch(
    `https://api.themoviedb.org/3/trending/all/day?api_key=26ba5e77849587dbd7df199727859189&page=${j}`,
    requestOptions
  )
    .then((response) => response.json())
    .then((result) => {
      let dem = 0;
      result.results.forEach((i) => {
        dem++;
        if (dem < 13) {
            if(i.name === undefined){
                b += `<div class="movie-new${dem} new" onclick="clickMovie('${i.backdrop_path}')"><img class="item1" src="https://image.tmdb.org/t/p/w300${i.poster_path}"\><i class="fa fa-play-circle-o"></i>
                  <div class="name-movie">${i.title}</div></div>`;
            }else{
                b += `<div class="movie-new${dem} new" onclick="clickMovie('${i.backdrop_path}')"><img class="item1" src="https://image.tmdb.org/t/p/w300${i.poster_path}"\><i class="fa fa-play-circle-o"></i>
                  <div class="name-movie">${i.name}</div></div>`;
            }
        }
      });
      document.getElementsByClassName("movie-new-update")[0].innerHTML += b;
    })
    .catch((error) => console.log("error", error));
}
clickMovie = (a) => {
    document.getElementsByClassName("detail-movie")[0].style.display = "block";
    document.getElementsByClassName("detail-movie")[0].style.position = "fixed";
    document.getElementById("movie").src=`https://image.tmdb.org/t/p/w500${a}`;
    document.getElementsByClassName("effect")[0].style.display="block";
}
clickMovie = (b) => {
  document.getElementsByClassName("detail-movie")[0].style.display = "block";
  document.getElementsByClassName("detail-movie")[0].style.position = "fixed";
  document.getElementById("movie").src=`https://image.tmdb.org/t/p/w500${b}`;
  document.getElementsByClassName("effect")[0].style.display="block";
}
closeImg = () => {
  console.log("dhs");
  document.getElementsByClassName("detail-movie")[0].style.display = "none";
  document.getElementsByClassName("effect")[0].style.display="none";
}
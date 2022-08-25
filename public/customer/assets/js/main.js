function collectionSliders() {
  document.querySelectorAll(".collection-slider").forEach((slider) => {
    new Splide(slider, {
      type: "loop",
      perPage: 3,
      gap: 30,
      perMove: 1,
      rewind: true,
      arrows: false,
      autoplay: true,
      interval: 2000,
      pagination: false,
      breakpoints: {
        1440: {
          perPage: 2,
        },
        1024: {
          perPage: 2,
        },
        768: {
          perPage: 2,
        },
        600: {
          perPage: 1,
        },
      },
    }).mount();


  });
}

function postSlider() {
  new Splide(".posts-slider", {
    type: "loop",
    start: 1,
    perPage: 3,
    perMove: 1,
    pagination: false,
    gap: 0,
    padding: {
      left: 50,
      right: 50,
    },
    breakpoints: {
      1024: {
        perPage: 3,
        padding: {
          left: 20,
          right: 20,
        },
      },
      768: {
        perPage: 2,
        padding: {
          left: 10,
          right: 10,
        },
      },
      600: {
        perPage: 1,
        padding: {
          left: 0,
          right: 0,
        },
      },
    },
  }).mount();
}

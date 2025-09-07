let slider = document.getElementById("slider");
let index = 0;

function slideCards() {
  let cards = slider.children.length;
  index++;
  if (index >= cards) {
    index = 0;
  }
  slider.style.transform = `translateX(-${index * 270}px)`;
  // 270px = min-width card (250) + margin (20)
}

setInterval(slideCards, 3000); // geser tiap 1 detik

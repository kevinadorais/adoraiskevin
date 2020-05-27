anime({
    targets: '.grid',
    scale: [
      {value: .1, easing: 'easeOutSine', duration: 0},
      {value: 1, easing: 'easeInOutQuad', duration: 1000}
    ],
    delay: anime.stagger(100, {grid: [5, 0], from: 'center'})
  });
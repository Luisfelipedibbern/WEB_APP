// Simple Carousel logic
document.querySelectorAll('.carousel').forEach((carousel) => {
  const track = carousel.querySelector('.carousel-track');
  const slides = Array.from(track.children);
  const prevBtn = carousel.querySelector('.carousel-btn.prev');
  const nextBtn = carousel.querySelector('.carousel-btn.next');
  const dotsWrap = carousel.querySelector('.carousel-dots');
  let index = 0;

  const update = () => {
    track.style.transform = `translateX(-${index * 100}%)`;
    dotsWrap.querySelectorAll('button').forEach((b, i) => {
      b.classList.toggle('active', i === index);
    });
  };

  // Create dots
  slides.forEach((_, i) => {
    const b = document.createElement('button');
    if (i === 0) b.classList.add('active');
    b.addEventListener('click', () => { index = i; update(); });
    dotsWrap.appendChild(b);
  });

  prevBtn.addEventListener('click', () => {
    index = (index - 1 + slides.length) % slides.length;
    update();
  });
  nextBtn.addEventListener('click', () => {
    index = (index + 1) % slides.length;
    update();
  });

  // autoplay
  setInterval(() => {
    index = (index + 1) % slides.length;
    update();
  }, 5000);
});
document.addEventListener("DOMContentLoaded", function () {
  const videoSlides = document.querySelectorAll(".video-slide");
  const contentSlides = document.querySelectorAll(".content-slide");
  const navButtons = document.querySelectorAll(".nav-btn");
  let currentSlide = 0;
  let isSliding = false;

  // Inisialisasi posisi awal
  videoSlides.forEach((v, i) => {
    v.style.transition = "transform 1s cubic-bezier(.77,0,.18,1)";
    v.style.position = "absolute";
    v.style.top = 0;
    v.style.left = 0;
    v.style.width = "100%";
    v.style.height = "100%";
    v.style.objectFit = "cover";
    v.style.zIndex = 1;
    v.style.transform = i === 0 ? "translateX(0)" : "translateX(100%)";
    v.style.opacity = "1";
  });
  contentSlides.forEach((c, i) => {
    c.style.transition = "opacity 0.8s cubic-bezier(.77,0,.18,1), transform 0.8s cubic-bezier(.77,0,.18,1)";
    c.style.opacity = i === 0 ? "1" : "0";
    c.style.transform = i === 0 ? "translateX(0)" : "translateX(40px)";
    c.style.position = "absolute";
    c.style.top = "20%";
    c.style.left = "10%";
    c.style.zIndex = 2;
    c.style.color = "#fff";
    c.style.display = "block";
    c.style.pointerEvents = i === 0 ? "auto" : "none";
  });

  function showSlide(next, direction = 1) {
    if (isSliding || next === currentSlide) return;
    isSliding = true;

    // Slide out current video
    videoSlides[currentSlide].style.transform = `translateX(${-100 * direction}%)`;
    videoSlides[currentSlide].style.opacity = "0.7";
    contentSlides[currentSlide].style.opacity = 0;
    contentSlides[currentSlide].style.transform = `translateX(${-40 * direction}px)`;
    contentSlides[currentSlide].style.pointerEvents = "none";
    navButtons[currentSlide].classList.remove("active");

    // Prepare next video
    videoSlides[next].style.transition = "none";
    videoSlides[next].style.transform = `translateX(${100 * direction}%)`;
    videoSlides[next].style.opacity = "1";
    videoSlides[next].offsetHeight; // force reflow
    videoSlides[next].style.transition = "transform 1s cubic-bezier(.77,0,.18,1)";
    setTimeout(() => {
      videoSlides[next].style.transform = "translateX(0)";
    }, 20);

    // Prepare next content
    contentSlides[next].style.transition = "none";
    contentSlides[next].style.opacity = "0";
    contentSlides[next].style.transform = `translateX(${40 * direction}px)`;
    contentSlides[next].offsetHeight;
    contentSlides[next].style.transition = "opacity 0.8s cubic-bezier(.77,0,.18,1), transform 0.8s cubic-bezier(.77,0,.18,1)";
    setTimeout(() => {
      contentSlides[next].style.opacity = "1";
      contentSlides[next].style.transform = "translateX(0)";
      contentSlides[next].style.pointerEvents = "auto";
      navButtons[next].classList.add("active");
    }, 20);

    setTimeout(() => {
      currentSlide = next;
      isSliding = false;
    }, 1000);
  }

  function nextSlide() {
    let next = (currentSlide + 1) % videoSlides.length;
    showSlide(next, 1);
  }

  navButtons.forEach((button, idx) => {
    button.addEventListener("click", () => {
      if (idx !== currentSlide) showSlide(idx, idx > currentSlide ? 1 : -1);
    });
  });

  setInterval(nextSlide, 5000);
});

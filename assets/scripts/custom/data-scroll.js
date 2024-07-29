const scrollByOne = document.querySelectorAll('[data-scroll="one"]');

if (scrollByOne.length > 0) {
  scrollByOne.forEach(scroller => {

    const images = gsap.utils.toArray(".e-child > .elementor-widget-image", scroller);
    const details = gsap.utils.toArray(".e-child > .e-child:has(.elementor-widget-heading)", scroller);

    let timeline = gsap.timeline({
      scrollTrigger: {
        trigger: scroller,
        toggleActions: "restart pause reverse pause",
        start: "center center",
        end: `+=${(images.length - 1) * 100}%`,
        pin: true,
        scrub: true,
        // markers: true
      }
    });

    images.forEach((img, i) => {
      if (images[i + 1]) {
        timeline.to(img, { opacity: 0 }, "+=0.5")
          .to(images[i + 1], { opacity: 1 }, "<")
          .to(details, { yPercent: -(100 * (i + 1)), ease: "none" }, "<");
      }
    });
    timeline.to({}, {}, "+=0.5");
  })
}

const scrollByPoint = document.querySelectorAll('[data-scroll="all"]');

if (scrollByPoint.length > 0) {
  scrollByPoint.forEach(scroller => {

    const images = gsap.utils.toArray(".e-child > .elementor-widget-image", scroller);
    const videos = gsap.utils.toArray(".e-child > .elementor-widget-video", scroller);
    const details = gsap.utils.toArray(".e-child > .e-child:has(.elementor-widget-heading)", scroller);

    const media = images.length ? images : videos

    let timeline = gsap.timeline({
      scrollTrigger: {
        trigger: scroller,
        toggleActions: "restart pause reverse pause",
        start: "center center",
        end: `+=${(media.length) * 100}%`,
        pin: true,
        scrub: true,
        markers: true
      }
    });

    media.forEach((img, i) => {
      if (media[i + 1]) {
        timeline.to(img, { opacity: 0 }, "+=0.5")
          .to(media[i + 1], { opacity: 1 }, "<")
        // timeline.scrollTrigger

      }
      timeline.to(details[i], { onStart: () => details[i].classList.add('active') })
    });
    timeline.to({}, {}, "+=0.5");
  })
}


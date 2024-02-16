//Revealing Animation when the user scrolls/open/refresh
ScrollReveal({ reset: true });


ScrollReveal().reveal(".fade-in", {
    duration: 2500,
    move: 0
});

ScrollReveal().reveal(".show-once", {
    reset: false
});
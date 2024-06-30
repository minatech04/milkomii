// Initialize the Lottie animation
lottie.loadAnimation({
    container: document.getElementById('lottie-container'), // the dom element that will contain the animation
    renderer: 'svg', // render type: svg/canvas/html
    loop: true, // whether the animation should loop
    autoplay: true, // whether the animation should start automatically
    path: 'Pic.json' // the path to the animation json file
});

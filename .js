document.addEventListener('DOMContentLoaded', function () {
    const imageGrid = document.querySelector('.image-grid');
    let isMouseDown = false;
    let startX;
    let scrollLeft;

    imageGrid.addEventListener('mousedown', (e) => {
        isMouseDown = true;
        startX = e.pageX - imageGrid.offsetLeft;
        scrollLeft = imageGrid.scrollLeft;
    });

    imageGrid.addEventListener('mouseleave', () => {
        isMouseDown = false;
    });

    imageGrid.addEventListener('mouseup', () => {
        isMouseDown = false;
    });

    imageGrid.addEventListener('mousemove', (e) => {
        if (!isMouseDown) return;
        e.preventDefault();
        const x = e.pageX - imageGrid.offsetLeft;
        const walk = (x - startX) * 2; // Scroll-fast multiplier
        imageGrid.scrollLeft = scrollLeft - walk;
    });
});

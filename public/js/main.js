const videoAll = document.getElementById('video-all');
const video = document.getElementById('video');
const progress = document.getElementById('progress');
const btnPlay = document.getElementById('btn-play');
const volume = document.getElementById('volume');
const btnScreen = document.getElementById('btn-screen');

video.addEventListener('timeupdate', e => {

    const duration = Math.round(e.target.duration);
    const current = Math.round(e.target.currentTime);

    progress.max = duration;
    progress.value = current;

});

video.controls = false;

video.addEventListener('click', () => {
    if (video.paused) {

        video.play();
        btnPlay.classList.replace('fa-play', 'fa-pause');

    } else {

        video.pause();
        btnPlay.classList.replace('fa-pause', 'fa-play');

    }
});

btnPlay.addEventListener('click', () => {
    if (video.paused) {

        video.play();
        btnPlay.classList.replace('fa-play', 'fa-pause');

    } else {

        video.pause();
        btnPlay.classList.replace('fa-pause', 'fa-play');

    }
});

btnScreen.addEventListener('click', () => {
    videoAll.requestFullscreen({ navigationUI: "hide" }).then(() => {}).catch(err => {
        alert(`Ha ocurrido un error al tratar de inicial el modo pantalla completa: ${err.message} (${err.name})`);
    });
});
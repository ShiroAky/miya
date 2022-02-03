const videoAll = document.getElementById('video-all');
const video = document.getElementById('video');
const progress = document.getElementById('progress');
const btnPlay = document.getElementById('btn-play');
const btnVolume = document.getElementById('btn-volume');
const volume = document.getElementById('volume');
const btnScreen = document.getElementById('btn-screen');

video.addEventListener('timeupdate', e => {

    const duration = Math.round(e.target.duration);
    const current = Math.round(e.target.currentTime);

    progress.max = duration;
    progress.value = current;

    if (duration === current) {
        btnPlay.classList.replace('fa-pause', 'fa-play');
    }

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

volume.addEventListener('change', () => {
   
    function setVolume() {
        setInterval(
            video.volume = volume.value / 100, 1000
        );
    }

    if (volume.value <= 50) {
        btnVolume.classList.replace('fa-volume-up', 'fa-volume-down');
    } else {
        btnVolume.classList.replace('fa-volume-down', 'fa-volume-up');
        btnVolume.classList.replace('fa-volume-mute', 'fa-volume-up');
    }

    if (volume.value == 0) {
        btnVolume.classList.replace('fa-volume-down', 'fa-volume-mute');
    }

    setVolume();

});

btnVolume.addEventListener('click', () => {
    if (volume.value == 100) {
        volume.value = 0;
        video.volume = volume.value / 100;
    } else {
        if (volume.value == 0) {
            volume.value = 100;
            video.volume = volume.value / 100;
            btnVolume.classList.replace('fa-volume-down', 'fa-volume-mute');
        }
    }
});

btnScreen.addEventListener('click', () => {
    videoAll.requestFullscreen({ navigationUI: "hide" }).then(() => {}).catch(err => {
        alert(`Ha ocurrido un error al tratar de inicial el modo pantalla completa: ${err.message} (${err.name})`);
    });
});
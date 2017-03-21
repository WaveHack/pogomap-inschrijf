'use strict';

class Weedle {

    constructor() {
        this.el = null;

        this.SPRITE_HEIGHT = 28;
        this.SPRITE_WIDTH = 61;

        this.x = window.innerWidth;
        this.y = (window.innerHeight - this.SPRITE_HEIGHT);
    }

    run() {
        this.createWeedle();
        this.createStyles();

        this.playMusic();

        setInterval(this.tick.bind(this), 1000 / 30);
    }

    tick() {
        if (this.x < -this.SPRITE_WIDTH) {
            let el = document.getElementById('weedle');
            el.parentNode.removeChild(el);

            el = document.getElementById('weedleMusic');
            el.parentNode.removeChild(el);

            el = document.getElementById('weedleStyle');
            el.parentNode.removeChild(el);

            return;
        }

        this.x--;

        const scrollTop = ((window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop);
        this.y = (window.innerHeight + scrollTop - this.SPRITE_HEIGHT);

        this.el.style.left = (this.x + 'px');
        this.el.style.top = (this.y + 'px');
    }

    createWeedle() {
        let el = document.createElement('div');

        el.id = 'weedle';

        el.style.width = (this.SPRITE_WIDTH + 'px');
        el.style.height = (this.SPRITE_HEIGHT + 'px');

        // Sprite made by JoshR691 at http://adamantditto.blogspot.nl/p/sprites.html
        el.style.backgroundImage = 'url(\'assets/app/images/weedle.png\')';

        const animation = 'play 1s steps(6) infinite';
        el.style.webkitAnimation = animation;
        el.style.mozAnimation = animation;
        el.style.msoTextAnimation = animation;
        el.style.animation = animation;

        el.style.position = 'absolute';
        el.style.zIndex = '10000';
        el.style.left = (this.x + 'px');
        el.style.top = (this.y + 'px');

        document.body.appendChild(el);
        this.el = el;
    }

    createStyles() {
        let el = document.createElement('style');
        el.type = 'text/css';
        el.id = 'weedleStyle';

        const css = '{ from { background-position: 0px; } to { background-position: 366px; } }';

        el.innerHTML =
            '@-webkit-keyframes play ' + css +
            '@-moz-keyframes play ' + css +
            '@-ms-keyframes play ' + css +
            '@-o-keyframes play ' + css +
            '@keyframes play ' + css;

        document.head.appendChild(el);
    }

    playMusic() {
        const youtubeId = 'LeTedTFtMVA'; // Weedle Weedle Weedle
        const start = 26;
        const html = '<object id="weedleMusic" type="application/x-shockwave-flash" width="1" height="1" data="https://www.youtube.com/v/' + youtubeId + '?version=2&autoplay=1&loop=1&hd=1&theme=dark&start=' + start + '" style="visibility:hidden;display:inline;position:absolute;top:0;left:0;"><param name="movie" value="https://www.youtube.com/v/' + youtubeId + '?version=2&autoplay=1&loop=1&hd=1&theme=dark&start=' + start + '"/><param name="wmode" value="transparent"/></object>';
        document.body.insertAdjacentHTML('beforeend', html);
    }

}

export default Weedle;

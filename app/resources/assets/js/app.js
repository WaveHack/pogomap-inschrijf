'use strict';

require('./bootstrap');

import Weedle from './weedle';

cheet('w e e d l e', () => {
    cheet.disable('w e e d l e');

    let weedle = new Weedle;
    weedle.run();
});

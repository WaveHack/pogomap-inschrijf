'use strict';

require('./bootstrap');

import Weedle from './weedle';

cheet('w e e d l e', () => {
    if (document.activeElement.tagName === 'INPUT') {
        return;
    }

    cheet.disable('w e e d l e');

    (new Weedle).run();
});

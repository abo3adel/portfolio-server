require('./bootstrap');

import Alpine from 'alpinejs'
import persist from '@alpinejs/persist';

Alpine.plugin(persist);

// @ts-ignore
window.Alpine = Alpine;

// lastly run alpine
Alpine.start();
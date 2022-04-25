require('./bootstrap');

import lozad from 'lozad'
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist';

Alpine.plugin(persist);

// @ts-ignore
window.Alpine = Alpine;

const observer = lozad(); // lazy loads elements with default selector as '.lozad'
observer.observe();

// lastly run alpine
Alpine.start();
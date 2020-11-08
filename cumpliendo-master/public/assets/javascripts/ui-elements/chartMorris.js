(function( $ ) {

	'use strict';
/*
    Morris: Bar
*/
Morris.Bar({
    resize: true,
    element: 'morrisBar',
    data: morrisBarData,
    xkey: 'y',
    ykeys: ['a', 'b', 'c'],
    labels: ['Curso A', 'Curso B', 'Curso C'],
    hideHover: true,
    barColors: ['#0088cc', '#2baab1', '#D35400']
});
}).apply( this, [ jQuery ]);
$('document').ready(function () {
    "use strict";
    $.ajax({
        url: 'http://localhost/Enyopay/api/chart',
        method: 'get',
        dataType: 'json',
        success: function (data) {
            let name = [];
            let amount = [];
            for(var i in data){
                data.push(data[i] + '2007');
                data.push(data[i].amount);

            }
            alert(data);
            chart_one(data);
        },
        onerror: function (err) {
            console.log(err);
        }
    });
    // chart_one();
    chart_two();
});


function chart_one(name, amount) {
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: data,
      //  [
      //   {y: '2012', a: 10, b: 90, c: 90},
      //   {y: '2013', a: 75, b: 65, c: 90},
      //   {y: '2014', a: 50, b: 40, c: 90},
      //   {y: '2015', a: 75, b: 65, c: 90},
      //   {y: '2016', a: 50, b: 40, c: 90},
      //   {y: '2017', a: 75, b: 65, c: 90},
      //   {y: '2018', a: 100, b: 90, c: 90}
      // ],
      barColors: ['#00a65a', '#f56954', '#f31445'],
      xkey: 'y',
      ykeys: ['a', 'b', 'c'],
      labels: ['Petrol', 'Gas', 'Diesel'],
      hideHover: 'auto'
    });
}

function chart_two() {
 var bar = new Morris.Bar({
    element: 'bar-chart1',
    resize: true,
    data: [
      {y: '2006', a: 10, b: 90, c: 90},
      {y: '2007', a: 75, b: 65, c: 90},
      {y: '2008', a: 50, b: 40, c: 90},
      {y: '2009', a: 75, b: 65, c: 90},
      {y: '2010', a: 50, b: 40, c: 90},
      {y: '2011', a: 75, b: 65, c: 90},
      {y: '2012', a: 100, b: 90, c: 90}
    ],
    barColors: ['#00a65a', '#f56954'],
    xkey: 'y',
    ykeys: ['a', 'b', 'c'],
    labels: ['CPU', 'DISK'],
    hideHover: 'auto'
  });
 }

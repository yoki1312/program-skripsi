$(document).ready(function () {
    data_barang();
    penjualan_perjenis();
    penjualan_kategori();
});

function penjualan_perjenis() {
    $.ajax({
        url: 'https://www.google.com/jsapi?callback',
        cache: true,
        dataType: 'script',
        success: function () {
            google.load('visualization', '1', {
                packages: ['corechart'],
                'callback': function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                .attr('content')
                        }
                    });
                    $.ajax({
                        type: 'post',
                        dataType: 'json',
                        url: 'laporan/penjualan/penjualan_perjenis',
                        success: function (jsondata) {
                            var data = google.visualization
                                .arrayToDataTable(jsondata);

                            var options = {
                                is3D: true,
                                legend: {
                                    position: 'top',
                                    maxLines: 3
                                },
                                slices: {
                                    0: {
                                        color: 'green'
                                    },
                                    1: {
                                        color: 'orange'
                                    },
                                }

                            };

                            var chart = new google.visualization.PieChart(
                                document.getElementById('penjualan_perjenis'));
                            chart.draw(data, options);
                        }
                    })
                }
            })
            return true;
        }
    })
}

function data_barang() {
    $.ajax({
        url: 'https://www.google.com/jsapi?callback',
        cache: true,
        dataType: 'script',
        success: function () {
            google.load('visualization', '1', {
                packages: ['corechart'],
                'callback': function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                .attr('content')
                        }
                    });
                    $.ajax({
                        type: 'post',
                        dataType: 'json',
                        url: 'laporan/stok/grafik',
                        success: function (jsondata) {
                            var data = google.visualization
                                .arrayToDataTable(jsondata);

                            var options = {
                                is3D: true,
                                legend: {
                                    position: 'top',
                                    maxLines: 3
                                },
                                slices: {
                                    0: {
                                        color: 'green'
                                    },
                                    1: {
                                        color: 'red'
                                    },
                                }

                            };

                            var chart = new google.visualization.PieChart(
                                document.getElementById('piechart_3d'));
                            chart.draw(data, options);
                        }
                    })
                }
            })
            return true;
        }
    })
}
get_bar();

function get_bar() {
    $.ajax({
        url: 'https://www.google.com/jsapi?callback',
        cache: true,
        dataType: 'script',
        success: function () {
            google.load('visualization', '1', {
                packages: ['corechart'],
                'callback': function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                .attr('content')
                        }
                    });
                    $.ajax({
                        type: 'post',
                        dataType: 'json',
                        data: {
                            tgl_awal: $('.tgl-awall').val(),
                            tgl_akhir: $('.tgl-akhirr').val()
                        },
                        url: 'laporan/penjualan/perbulan',
                        success: function (jsondata) {
                            var data = google.visualization
                                .arrayToDataTable(jsondata);
                            var view = new google.visualization.DataView(data);
                            view.setColumns([
                                0, // <-- x-axis column index
                                1, // <-- first y-axis column index
                                { // annotation column for first y-axis column
                                    calc: function (dt, row) {
                                        return dt.getFormattedValue(
                                            row, 1
                                        ); // get formatted value from first y-axis column
                                    },
                                    role: 'annotation',
                                    type: 'string'
                                },
                            ]);
                            var options = {
                                    is3D: true,
                                    legend: {
                                        position: 'top',
                                        maxLines: 3
                                    },

                            };

                            var chart = new google.visualization.PieChart(
                                document.getElementById('laporan_perbulan'));
                            chart.draw(data, options);
                        }
                    })
                }
            })
            return true;
        }
    })
}
function penjualan_kategori() {
    $.ajax({
        url: 'https://www.google.com/jsapi?callback',
        cache: true,
        dataType: 'script',
        success: function () {
            google.load('visualization', '1', {
                packages: ['corechart'],
                'callback': function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                .attr('content')
                        }
                    });
                    $.ajax({
                        type: 'post',
                        dataType: 'json',
                        url: 'laporan/penjualan/penjualan_kategori',
                        success: function (jsondata) {
                            var data = google.visualization
                                .arrayToDataTable(jsondata);

                            var options = {
                                pieHole: 0.4,
                                legend: {
                                    position: 'top',
                                    maxLines: 3
                                },
                                slices: {
                                    0: {
                                        color: 'green'
                                    },
                                    1: {
                                        color: 'red'
                                    },
                                }

                            };

                            var chart = new google.visualization.PieChart(
                                document.getElementById('penjualan_kategori'));
                            chart.draw(data, options);
                        }
                    })
                }
            })
            return true;
        }
    })
}


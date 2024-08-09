<div class="w-full mt-12 bg-white rounded-md p-6 shadow-lg">
    <!-- Form Pemilihan Tahun -->
    <div class="flex flex-wrap justify-between items-center mb-4">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-chart-bar mr-3"></i>Laporan
        </p>
        <form action="{{ route('grafik.index') }}" method="GET" class="flex items-center">
            <label for="tahun" class="block mb-0 mr-2">Pilih Tahun:</label>
            <select name="tahun" id="tahun" class="border rounded p-2">
                @foreach($tahunList as $year)
                    <option value="{{ $year }}" {{ $year == $tahun ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
            </select>
            <button type="submit" class="ml-2 bg-blue-500 text-white p-2 rounded">Tampilkan</button>
        </form>
    </div>

    <!-- Grafik dengan Flexbox -->
    <div class="flex flex-col xl:flex-row gap-4">
        <!-- Grafik Laporan Bulanan -->
        <div class="w-full xl:w-1/2">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-chart-bar mr-3"></i> Grafik Laporan Bulanan ({{ $tahun }})
            </p>
            <div class="p-6 bg-white">
                <canvas id="grafikChartBulanan" class="w-full"></canvas>
            </div>
        </div>

        <!-- Grafik Laporan Tahunan -->
        <div class="w-full xl:w-1/2">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-chart-line mr-3"></i> Grafik Laporan Tahunan
            </p>
            <div class="p-6 bg-white">
                <canvas id="grafikChartTahunan" class="w-full"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

<script>
    // Grafik Laporan Bulanan
    var ctxBulanan = document.getElementById('grafikChartBulanan').getContext('2d');
    var myChartBulanan = new Chart(ctxBulanan, {
        type: 'bar',
        data: {
            labels: @json($labelsBulanan),
            datasets: [{
                label: 'Jumlah Laporan Bulanan',
                data: @json($valuesBulanan),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    ticks: {
                        callback: function(value) {
                            const bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                            return bulan[value - 1]; // Menampilkan nama bulan
                        }
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Grafik Laporan Tahunan
    var ctxTahunan = document.getElementById('grafikChartTahunan').getContext('2d');
    var myChartTahunan = new Chart(ctxTahunan, {
        type: 'line',
        data: {
            labels: @json($labelsTahunan),
            datasets: [{
                label: 'Jumlah Laporan Tahunan',
                data: @json($valuesTahunan),
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

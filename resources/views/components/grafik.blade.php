<div class="w-full mt-12 bg-white rounded-md p-6 shadow-lg">
    <!-- Form Pemilihan Tahun -->
    <div class="flex flex-wrap justify-between items-center mb-4">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-chart-bar mr-3"></i>Laporan
        </p>
        <form action="" method="GET" class="flex items-center">
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
        <div class="w-full">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-chart-bar mr-3"></i> Grafik Laporan Bulanan ({{ $tahun }})
            </p>
            <div class="p-6 bg-white" style="height: 400px;">
                <canvas id="grafikChartBulanan" class="w-full"></canvas>
            </div>
        </div>

        <!-- Grafik Laporan Penyakit Tahunan -->
        <div class="w-full">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-chart-bar mr-3"></i> Grafik Laporan Penyakit Tahunan ({{ $tahun }})
            </p>
            <div class="p-6 bg-white" style="height: 400px;">
                <canvas id="grafikChartPenyakitTahunan" class="w-full"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

<script>
    // Fungsi untuk menentukan nilai maksimum y-axis
    function getMaxValue(data) {
        if (!data || data.length === 0) {
            return 1;
        }
        const max = Math.max(...data);
        return max < 1 ? 1 : Math.ceil(max);
    }

    // Grafik Laporan Bulanan
    var bulananData = @json($valuesBulanan);
    var maxBulanan = getMaxValue(bulananData);
    if (bulananData.length === 0) {
        bulananData = [0];
    }
    var ctxBulanan = document.getElementById('grafikChartBulanan').getContext('2d');
    var myChartBulanan = new Chart(ctxBulanan, {
        type: 'bar',
        data: {
            labels: @json($labelsBulanan),
            datasets: [{
                label: 'Jumlah Laporan Bulanan',
                data: bulananData,
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
                            return bulan[value - 1] || value; // Menampilkan nama bulan atau nilai asli jika indeks tidak valid
                        }
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1,
                        max: maxBulanan,
                        callback: function(value) {
                            if (Number.isInteger(value)) {
                                return value;
                            }
                            return null; // Tidak menampilkan angka non-integer
                        }
                    }
                }]
            }
        }
    });

    // Grafik Laporan Penyakit Tahunan
    var penyakitData = @json($valuesPenyakitTahunan);
    var ctxPenyakit = document.getElementById('grafikChartPenyakitTahunan').getContext('2d');
    var myChartPenyakit = new Chart(ctxPenyakit, {
        type: 'bar',
        data: {
            labels: @json($labelsPenyakitTahunan),
            datasets: [{
                label: 'Jumlah Diagnosis per Penyakit',
                data: penyakitData,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    ticks: {
                        autoSkip: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
        }
    });
</script>

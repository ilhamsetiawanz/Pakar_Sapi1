<div>
    <div class="w-full mt-12">
        <!-- Dropdown untuk memilih tahun -->
        <form action="{{ route('grafik.index') }}" method="GET" class="mb-4">
            <label for="tahun" class="block mb-2">Pilih Tahun:</label>
            <select name="tahun" id="tahun" class="border rounded p-2">
                @foreach($tahunList as $year)
                    <option value="{{ $year }}" {{ $year == $tahun ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
            </select>
            <button type="submit" class="ml-2 bg-blue-500 text-white p-2 rounded">Tampilkan</button>
        </form>

        <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-chart-bar mr-3"></i> Grafik Laporan Bulanan ({{ $tahun }})
            </p>
            <div class="p-6 bg-white">
                <canvas id="grafikChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

<script>
    var ctx = document.getElementById('grafikChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Jumlah Laporan',
                data: @json($values),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
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
</script>
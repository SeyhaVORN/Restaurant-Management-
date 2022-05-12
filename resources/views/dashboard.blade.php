<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- header --}}

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                List Restaurant
                            </div>
                            <div class="card-body" style="color: rgb(220, 135, 49)">
                                <canvas id="myChart" width="50" height="20"></canvas>
                                {{-- @foreach ($provinces as $province)
                                    {{ $province->restaurants_count }}
                                @endforeach --}}
                            </div>
                        </div>
                    </div>

                    {{-- end header --}}
                </div>
            </div>
        </div>

        @push('scripts')
            <script>
                const ctx = document.getElementById('myChart').getContext('2d');
                let province = <?php echo json_encode($provinces); ?>;
                let provinceName = [];
                let restaurantCount = [];

                for (var i = 0; i < province.length; i++) {
                    provinceName.push(province[i].province);
                    restaurantCount.push(province[i].restaurants_count);
                }

                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: provinceName,
                        datasets: [{
                            label: '# Restaurant',
                            data: restaurantCount,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgb(220, 15, 49,0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgb(220, 15, 49,1)'

                            ],

                            borderWidth: 1,
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                type: 'linear',
                                min: 0,
                                max: 15
                            },

                        }
                    }
                });
            </script>
        @endpush
</x-app-layout>

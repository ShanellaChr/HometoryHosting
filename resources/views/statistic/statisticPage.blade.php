@section('title', 'Hometory - My Statistic')
<x-master>
    {{-- START OF SECTION JUDUL PAGE --}}
    {{-- Judul My Statistic --}}
    <div class="d-flex justify-content-center align-items-center pt-7 montserrat-bold text-5xl">My<span class="ms-3 text-orenyedija">Statistic</span></div>

    {{-- Slogan My Statistic --}}
    <div class="d-flex justify-content-center align-items-center mt-1 mb-5 nunito-regular text-lg">Track your storage, plan smarter!</div>
    {{-- END OF SECTION JUDUL PAGE --}}

    {{-- Tabel Statistik --}}
    <div class = "container mt-0">
        {{-- Header Tabel --}}
        <div class="d-flex justify-content-between align-items-center text-white p-4 rounded-4 position-relative" style="background-color: #364156; z-index: 2;">
            {{-- Previous Month Button --}}
            @if($hasPrev)
                <a href="{{ route('statistic.page', ['month' => $prevMonth->format('Y-m')]) }}"
                class="btn btn-sm montserrat-semibold fs-5 text-white">
                    &lt; {{ $prevMonth->format('F') }}
                </a>
            @else
                <span class="btn btn-sm montserrat-semibold fs-5 text-white-50 disabled border-0">
                    &lt; {{ $prevMonth->format('F') }}
                </span>
            @endif

            {{-- Current Month Title --}}
            <h4 class="m-0 montserrat-bold fs-2">{{ $currentMonth->format('F Y') }}</h4>

            {{-- Next Month Button --}}
            @if($hasNext)
                <a href="{{ route('statistic.page', ['month' => $nextMonth->format('Y-m')]) }}"
                class="btn btn-sm montserrat-semibold fs-5 text-white">
                    {{ $nextMonth->format('F') }} &gt;
                </a>
            @else
                <span class="btn btn-sm montserrat-semibold fs-5 text-white-50 disabled border-0">
                    {{ $nextMonth->format('F') }} &gt;
                </span>
            @endif
        </div>
        {{-- End Header Tabel --}}

        {{-- Main Content --}}
        <div class="rounded-bottom-4 shadow-lg p-3 pt-5 mb-5" style="background: linear-gradient(to bottom, #FFCE93, #EEA144); margin-top: -0.85vw;">
            <div class="row m-4">
                {{-- PIE CHART --}}
                <div class="col-md-5 d-flex justify-content-center align-items-center">
                    @php
                        $allZero = $cards->pluck('value')->every(fn($v) => $v == 0);
                    @endphp
                    @if ($cards->isEmpty() || $allZero)
                        <div class="w-100 text-center text-muted d-flex flex-column align-items-center justify-content-center" style="min-height:200px;">
                            <img src="{{ asset('img/doughnut_nodata.svg') }}" class="img-fluid mt-0 mb-0" style="width: 32vw;">
                            <p class="mt-0 fs-4 nunito-semibold">No data available for this month.</p>
                        </div>
                    @else
                        <canvas id="inventoryPieChart" style="width:100%; max-width:38vw"></canvas>
                    @endif
                </div>

                {{-- DESKRIPSI --}}
                <div class="col-md-7 d-flex flex-wrap justify-content-center gap-4">
                    @if ($cards->isEmpty())
                        <p class="text-center text-muted">No data available for this month.</p>
                    @else
                        @foreach ($cards as $card)
                            <div class="bg-putihpalette rounded-5 shadow-lg text-center p-3" style="flex: 1 1 14.5vw; max-width: 100%; max-height: 12vw;">
                                <strong class="montserrat-bold text-2xl text-birupalette">{{ $card['title'] }}</strong>
                                <div class="{{ $card['color'] }} text-4xl flex-bold nunito-extrabold text-ijopalette">
                                    {{-- Display item count instead of percentage --}}
                                    {{ $card['items'] }} items
                                </div>
                                <p class="nunito-reguler text-xs ps-0 mt-0 mb-0 text-abupalette" style="width: 100%">{{ $card['desc'] }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
                {{-- END OF DESKRIPSI --}}

                {{-- Note --}}
                <div class="mt-4 text-black text-lg nunito-semibold m-4">
                    <strong>Note:</strong><br>
                    • Statistics are based only on data recorded by users this month<br>
                    • Please make sure that used or discarded items are updated for accurate results.
                </div>
            </div>
        </div>
        {{-- End Main Content --}}

    {{-- Script Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Load images
        const segmentImages = [
            { src: '/img/Personal_Care.svg', img: new Image() },
            { src: '/img/Foods.svg', img: new Image() },
            { src: '/img/Beverages.svg', img: new Image() },
            { src: '/img/Kitchen_Needs.svg', img: new Image() },
            { src: '/img/Household_Essentials.svg', img: new Image() },
            { src: '/img/Health_Supplies.svg', img: new Image() }
        ];

        segmentImages.forEach(item => item.img.src = item.src);

        const segmentImagePlugin = {
            id: 'segmentImagePlugin',
            afterDatasetDraw(chart, args) {
                const { ctx } = chart;
                const dataset = args.meta.data;
                const dataValues = chart.data.datasets[0].data;

                dataset.forEach((arc, index) => {
                    // Hanya tampilkan gambar jika persentase > 6%
                    if (!dataValues[index] || dataValues[index] < 6) return;
                    const angle = (arc.startAngle + arc.endAngle) / 2;
                    const radius = (arc.outerRadius + arc.innerRadius) / 2;
                    const x = arc.x + Math.cos(angle) * radius;
                    const y = arc.y + Math.sin(angle) * radius;

                    const img = segmentImages[index]?.img;
                    if (img && img.complete) {
                        ctx.save();
                        ctx.drawImage(img, x - 40, y - 40, 80, 80);
                        ctx.restore();
                    }
                });
            }
        };

        // Inisialisasi Chart
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('inventoryPieChart').getContext('2d');
            function getCssColor(variable) {
                return getComputedStyle(document.documentElement).getPropertyValue(variable).trim();
            }
            new Chart(ctx, {
                type: "doughnut",
                data: {
                   labels: {!! json_encode($cards->pluck('title')->toArray()) !!},
                    datasets: [{
                        data: {!! json_encode($cards->pluck('value')->toArray()) !!},
                        backgroundColor: [
                            getCssColor('--pinkcategory'),
                            getCssColor('--merahtuacategory'),
                            getCssColor('--birucategory'),
                            getCssColor('--orenpalette'),
                            getCssColor('--ijocategory'),
                            getCssColor('--merahcategory')
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    cutout: '30%',
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.raw !== undefined ? context.raw : '';
                                    return `${label}: ${value}%`;
                                }
                            }
                        }
                    },
                    elements: {
                        arc: { borderWidth: 0 }
                    }
                },
                plugins: [segmentImagePlugin]
            });
        });
    </script>
    {{-- END OF SCRIPT CHART --}}

</x-master>

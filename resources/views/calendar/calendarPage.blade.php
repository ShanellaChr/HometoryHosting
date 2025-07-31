@section('title', 'Hometory - My Calendar')
<x-master>
    {{-- START OF SECTION JUDUL PAGE --}}
    {{-- Judul My Calendar --}}
    <div class="d-flex justify-content-center align-items-center pt-7 montserrat-bold text-5xl">My<span class="ms-3 text-orenyedija">Calendar</span></div>

    {{-- Slogan My Calendar --}}
    <div class="d-flex justify-content-center align-items-center mt-1 mb-3 nunito-regular text-lg">Track your expires, track smarter!</div>
    {{-- END OF SECTION JUDUL PAGE --}}

    {{-- Div ini untuk nampung semuanya; calendar, items to expire, edit item expiration date button --}}
    <div class="d-flex mb-5">
        {{-- Div ini untuk nampung bagian kiri dari container, isinya Kalender dan Button --}}
        <div class="col-6 d-flex flex-column justify-content-center align-items-center">
            {{-- Kalender --}}
            <div class="container rounded-3 bg-orenpalette mb-4 col-10 p-4 calendar-shadow overflow-hidden">
                {{-- Ini khusus untuk header kalendernya --}}
                {{-- Header Kalender --}}
                <div class="row align-items-center justify-content-center mb-3 mt-3 calendar-line" style="min-height: 60px;">
                    {{-- Bulan sebelumnya --}}
                    <div class="col-2 d-flex justify-content-end align-items-center pb-3" style="max-width:60px;">
                        <a href="{{ route('calendar.show', ['month' => $prevMonth, 'year' => $prevYear]) }}" class="d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                            <img src="{{ asset('img/White Back Button.svg') }}" alt="Previous Month" style="width: 64px; height: 64px; object-fit: contain;" />
                        </a>
                    </div>
                    {{-- Bulan dan Tahun --}}
                    <div class="col-8 d-flex justify-content-center align-items-center pb-3">
                        <div class="montserrat-bold text-3xl text-white text-center w-100">
                            <a href="{{ route('calendar.show', ['month' => $date->format('m'), 'year' => $date->format('Y')]) }}" class="text-white text-decoration-none" style="cursor:pointer;">
                                {{ $date->format('F Y') }}
                            </a>
                        </div>
                    </div>
                    {{-- Bulan setelahnya --}}
                    <div class="col-2 d-flex justify-content-start align-items-center pb-3" style="max-width:60px;">
                        <a href="{{ route('calendar.show', ['month' => $nextMonth, 'year' => $nextYear]) }}" class="d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                            <img src="{{ asset('img/White Back Button.svg') }}" alt="Next Month" class="rotate-180" style="width: 64px; height: 64px; object-fit: contain;" />
                        </a>
                    </div>
                </div>
                {{-- Ini khusus untuk penamaan hari harinya --}}
                <div class="d-flex justify-content-between w-100 mb-2 px-4">
                    <div class="nunito-bold text-white">Su</div>
                    <div class="nunito-bold text-white">Mo</div>
                    <div class="nunito-bold text-white">Tu</div>
                    <div class="nunito-bold text-white">We</div>
                    <div class="nunito-bold text-white">Th</div>
                    <div class="nunito-bold text-white">Fr</div>
                    <div class="nunito-bold text-white">Sa</div>
                </div>
                {{-- Tanggal dari kalender--}}
                <table class="w-100 calendar-table">
                    <tbody>
                        <?php
                        // variable yang bakal bertambah utk print tanggal sesuai bulan tahun tsb
                        $day = 1;
                        $position = 0;
                        // sama seperti di Controller, bikin variable DateTime utk bulan lalu.
                        $prevMonthDays = (new DateTime("$prevYear-$prevMonth-01"))->format('t');
                        // utk tgl stlh bulan ini selesai
                        $nextMonthDay = 1;

                        // Calculate current date for selected date comparison
                        $currentYear = $date->format('Y');
                        $currentMonth = $date->format('m');
                        ?>
                        {{-- ngeloop baris, di kalender ini max 6 baris (sama kyk kalender bawaan windows di bawah kanan) --}}
                        @for ($i = 0; $i < 6; $i++)
                            <tr>
                                {{-- loop kolom, utk tanggalnya --}}
                                @for ($j = 0; $j < 7; $j++)
                                    {{-- kondisi tanggal sblm tanggal 1 nya bulan tahun disaat user buka kalender --}}
                                    @if ($position < $firstDay)
                                        <?php
                                            $prevMonthDay = $prevMonthDays - ($firstDay - $position - 1);
                                        ?>
                                        <td class="prev-month bg-transparent text-center text-xl align-middle poppins-bold text-birupalette mb-2 py-3">{{ $prevMonthDay }}</td>
                                    {{-- kondisi udah masuk dalam tanggal dari bulan tahun disaat user buka kalender --}}
                                    @elseif ($day <= $daysInMonth)
                                        <?php
                                            $currentDate = sprintf('%04d-%02d-%02d', $currentYear, $currentMonth, $day);
                                        ?>
                                        <td class="calendar-day bg-transparent text-center text-xl align-middle poppins-bold text-putihpalette py-3 position-relative" style="cursor:pointer;">
                                            <a href="{{ url('/calendar', ['month' => $currentMonth, 'year' => $currentYear, 'selected_date' => $currentDate]) }}" class="text-decoration-none text-putihpalette d-block w-100 h-100" style="position:relative;">
                                                @if ($selectedDate == $currentDate)
                                                    <span class="selected-date position-relative">
                                                        {{ $day }}
                                                        @if (isset($expirations) && in_array($currentDate, $expirations))
                                                            <span class="calendar-dot"></span>
                                                        @endif
                                                    </span>
                                                @else
                                                    <span>
                                                        {{ $day }}
                                                        @if (isset($expirations) && in_array($currentDate, $expirations))
                                                            <span class="calendar-dot-else"></span>
                                                        @endif
                                                    </span>
                                                @endif
                                            </a>
                                        </td>
                                        <?php $day++; ?>
                                    {{-- kondisi tanggal utk bulan setelahnya --}}
                                    @else
                                        <td class="next-month bg-transparent text-center text-xl align-middle poppins-bold text-birupalette py-3">{{ $nextMonthDay }}</td>
                                        <?php $nextMonthDay++; ?>
                                    @endif
                                    <?php $position++; ?>
                                @endfor
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            {{-- Edit Item Expiration Date Button --}}
            <div class="mt-3 edit-button-shadow">
                <a href="{{ url('myInventory') }}" class="nunito-bold btn-dark-blue text-xl text-center rounded-3">
                    Edit Item's Expiration Date
                    <img src="{{ asset('img/editButton.svg') }}" alt="Edit Button" class="pencil-icon mb-1 ms-0 pe-3">
                </a>
            </div>
        </div>
        {{-- Items to Expire --}}
        <div class="col-6 d-flex flex-column">
            <div class="container rounded-3 border shadow-lg col-10 pt-5 right-box">
                <div class="text-2xl montserrat-bold ms-4 mb-2">
                    @if ($selectedDate && \Carbon\Carbon::parse($selectedDate)->isPast())
                        Expired Items
                    @else
                        Items to Expire
                    @endif
                    <span style="float:right" class="me-5">
                        @if ($selectedDate)
                            <span class="text-xl ms-2">{{ \Carbon\Carbon::parse($selectedDate)->format('j F Y') }}</span>
                        @endif
                    </span>
                </div>
                @if (!$selectedDate || $selectedItems->isEmpty())
                    <div class="text-center">
                        <img src="{{ asset('img/Calendar for No Items.svg') }}" alt="Calendar Icon" class="bg-transparent">
                        <p class="mt-5 nunito-semibold text-3xl">No Item Expired Today</p>
                    </div>
                @else
                    <div style="max-height: 66.7vh; overflow-y: auto;">
                        @foreach ($selectedItems as $item)
                            @foreach ($item->expirationDates as $expiration)
                                <a href="{{ route('item.detail', ['slug' => $item->slug]) }}" class="text-decoration-none">
                                    <div class="d-flex flex-row bg-putihpalette rounded-3 mt-3 ms-4 pe-4 shadow border" style="width: 35vw; cursor:pointer;">
                                        <img src="{{ asset($item->subcategory->img) }}" alt="{{ $item->name }}" class="p-0 m-0 rounded-start-3" style="width: 6vw">
                                        <h1 class="nunito-bold text-black text-2xl ms-4 w-50 me-auto pb-1 pt-3">{{ $item->name }}</h1>
                                        <p class="poppins-medium text-black text-base pt-3 ms-auto me-0">{{ $expiration->qty }} item{{ $expiration->qty != 1 ? 's' : '' }}</p>
                                    </div>
                                </a>
                            @endforeach
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

</x-master>

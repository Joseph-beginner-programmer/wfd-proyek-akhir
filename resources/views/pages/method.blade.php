@extends('layouts.payment')
@section('content')

<body class="bg-gray-100 font-sans">

    <div class="container mx-auto p-4 md:p-8">
        <div class="mb-8">
            <img src="{{ asset('logo/logo payment.png') }}" alt="RESERVEIN logo" class="h-16">
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-8" x-data="{
        isOpen: false,
        price: {{ $price }},
        methods: [
            { id: 'va', name: 'BCA', icon: 'https://zonalogo.com/wp-content/uploads/2024/06/Logo-Bank-Central-Asia-BCA-HD-PNG-SVG-WebP.webp', logos: [], fee: 5000 },
            { id: 'cc', name: 'Go-Pay', icon: 'https://coinfolks.id/wp-content/uploads/2023/08/GoPay-Logo-2016-1024x768.png', logos: [], fee: 3000 },
            { id: 'qris', name: 'Dana', icon: 'https://i.pinimg.com/736x/f5/8c/a3/f58ca3528b238877e9855fcac1daa328.jpg', logos: [], fee: 2500 }
        ],
        selectedMethod: { id: 'va', name: 'BCA', icon: 'https://zonalogo.com/wp-content/uploads/2024/06/Logo-Bank-Central-Asia-BCA-HD-PNG-SVG-WebP.webp', logos: [], fee: 5000 }
    }">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-5 flex items-center">
                        <span class="text-red-600 mr-2">▶</span> Data Penyewa
                    </h2>

                    <div class="space-y-4">
                        <div>
                            <label class="text-sm font-medium text-gray-500">Nama Lengkap <span
                                    class="text-red-500">*</span></label>
                            <div class="mt-1 p-3 bg-gray-100 rounded-lg text-gray-800 font-semibold">
                                {{$user->name}}
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-sm font-medium text-gray-500">Email <span
                                        class="text-red-500">*</span></label>
                                <div class="mt-1 p-3 bg-gray-100 rounded-lg text-gray-800 font-semibold">
                                    {{$user->email}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-5 flex items-center">
                        <span class="text-blue-600 mr-2">▶</span> Metode Pembayaran
                    </h2>

                    <div class="relative" @click.away="isOpen = false">

                        <div @click="isOpen = !isOpen"
                            class="border rounded-lg p-3 flex justify-between items-center cursor-pointer hover:bg-gray-50">
                            <div class="flex items-center">
                                <img :src="selectedMethod.icon" alt="Payment Icon" class="h-8 w-8 mr-4">
                                <div>
                                    <p class="font-bold text-gray-800" x-text="selectedMethod.name"></p>
                                    <p class="text-sm text-gray-500" x-text="'Fee: Rp' + selectedMethod.fee.toLocaleString('id-ID')"></p>
                                </div>
                                <div>

                                    <template x-if="selectedMethod.logos.length > 0">
                                        <div class="flex items-center space-x-2 mt-1">
                                            <template x-for="logo in selectedMethod.logos">
                                                <img :src="logo" alt="Bank Logo" class="h-4">
                                            </template>
                                        </div>
                                    </template>
                                </div>
                            </div>
                            <svg class="w-6 h-6 text-gray-600 transition-transform" :class="{ 'rotate-180': isOpen }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>

                        <div x-show="isOpen" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            class="absolute z-10 w-full mt-2 bg-white border rounded-lg shadow-xl"
                            style="display: none;">

                            <template x-for="method in methods" :key="method.id">
                                <div @click="selectedMethod = method; isOpen = false"
                                    class="p-3 flex items-center cursor-pointer hover:bg-gray-100">
                                    <div>
                                        <img :src="method.icon" alt="Payment Icon" class="h-8 w-8 mr-4">
                                        <span class="font-semibold text-gray-700" x-text="method.name"></span>
                                    </div>
                                    <span class="text-sm text-gray-500 ml-4" x-text="'+Rp' + method.fee.toLocaleString('id-ID')"></span>
                                </div>

                            </template>
                        </div>
                    </div>
                </div>

            </div>
            <div class="lg:col-span-1 mt-8 lg:mt-0">
                <div class="bg-white rounded-xl shadow-md p-6 sticky top-8">
                    <h2 class="text-lg font-bold text-gray-800 mb-5 flex items-center">
                        <span class="text-red-600 mr-2">▶</span> Rincian Biaya
                    </h2>
                    <div class="space-y-3 text-gray-600 text-sm">
                        <div class="flex justify-between">
                            <span>Biaya Sewa</span>
                            <span class="font-medium text-gray-800">{{number_format($price, 0, ',', '.')}}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Convenience Fee</span>
                            <span class="font-medium text-gray-800" x-text="'Rp' + selectedMethod.fee.toLocaleString('id-ID')"></span>
                        </div>
                        <hr class="my-3 border-t-2">
                        <div class="flex justify-between font-bold text-gray-800 text-base">
                            <span>Total Bayar</span>
                            <span x-text="'Rp' + (price + selectedMethod.fee).toLocaleString('id-ID')"></span>
                        </div>
                    </div>

                    <p class="text-xs text-gray-500 mt-6">
                        Dengan mengklik tombol berikut, Anda menyetujui <a href="#"
                            class="text-blue-700 font-semibold">Syarat dan Ketentuan</a> serta <a href="#"
                            class="text-blue-700 font-semibold">Kebijakan privasi</a>.
                    </p>

                    <form method="POST" action="{{ route('payment.process') }}" x-ref="paymentForm">
                        
                        @csrf
                        <input type="hidden" name="booking_id" value="{{ $bookingId }}">
                        <input type="hidden" name="payment_method" :value="selectedMethod.name">
                        <input type="hidden" name="total_price" :value="(price + selectedMethod.fee).toFixed(2)">

                        <button type="submit"
                            class="w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-lg mt-4 hover:bg-blue-700 transition">
                            Lakukan Pembayaran
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection
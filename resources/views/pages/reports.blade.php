@extends('layouts.layout')

@section('content')
    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">Admin Report</h1>

        <div class="mb-4 border-b border-gray-200">
            {{-- PERBAIKAN: Hapus tag <a> di sini agar JS bisa handle klik --}}
            <nav class="-mb-px flex space-x-4 md:space-x-8" aria-label="Tabs" id="report-tabs">
                <button data-tab-target="#users-report" class="tab-button active-tab">
                    <i class="fas fa-users mr-2"></i>
                    Users Reports
                </button>
                <button data-tab-target="#bookings-report" class="tab-button">
                    <i class="fas fa-book-bookmark mr-2"></i>
                    Booking Reports
                </button>
                <button data-tab-target="#financial-report" class="tab-button">
                    <i class="fas fa-sack-dollar mr-2"></i>
                    Financial Reports
                </button>
            </nav>
        </div>

        {{-- Konten untuk setiap Tab --}}
        <div id="report-tab-content">
            {{-- 1. Panel Users Report --}}
            <div id="users-report" class="tab-content">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-5 border-b border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-700">Data Pengguna Terdaftar</h3>
                    </div>
                    <div class="p-5">
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama User</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="users-report-table-body" class="divide-y divide-gray-200">
                                    <tr>
                                        <td colspan="5" class="text-center py-10 text-gray-500">Memuat data...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2. Panel Booking --}}
            <div id="bookings-report" class="tab-content hidden">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-5 border-b border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-700">Data Semua Booking</h3>
                    </div>
                    <div class="p-5">
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="th-cell">Booking ID</th>
                                        <th class="th-cell">Customer</th>
                                        <th class="th-cell">Venue</th>
                                        <th class="th-cell">Mulai</th>
                                        <th class="th-cell">Selesai</th>
                                        <th class="th-cell">Status Booking</th>
                                        <th class="th-cell">Total Harga</th>
                                        <th class="th-cell">Status Bayar</th>
                                        <th class="th-cell">Tgl. Dibuat</th>
                                    </tr>
                                </thead>
                                <tbody id="bookings-report-table-body" class="divide-y divide-gray-200">
                                    <tr>
                                        <td colspan="9" class="text-center py-10 text-gray-500">Memuat data...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3. Panel Keuangan --}}
            <div id="financial-report" class="tab-content hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                    <div class="bg-green-500 text-white rounded-lg shadow-lg p-6">
                        <h5 class="text-lg font-semibold">Total Pendapatan</h5>
                        <h3 id="total-revenue" class="text-3xl font-bold mt-2">Rp 0</h3>
                    </div>
                    <div class="bg-blue-500 text-white rounded-lg shadow-lg p-6">
                        <h5 class="text-lg font-semibold">Booking Selesai</h5>
                        <h3 id="completed-bookings" class="text-3xl font-bold mt-2">0</h3>
                    </div>
                    <div class="bg-yellow-500 text-white rounded-lg shadow-lg p-6">
                        <h5 class="text-lg font-semibold">Transaksi Pending</h5>
                        <h3 id="pending-transactions" class="text-3xl font-bold mt-2">0</h3>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-5 border-b border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-700">Detail Transaksi (Lunas)</h3>
                    </div>
                    <div class="p-5">
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="th-cell">Transaksi ID</th>
                                        <th class="th-cell">Booking ID</th>
                                        <th class="th-cell">Customer</th>
                                        <th class="th-cell">Jumlah Bayar</th>
                                        <th class="th-cell">Metode Bayar</th>
                                        <th class="th-cell">Tanggal Bayar</th>
                                    </tr>
                                </thead>
                                <tbody id="financial-transactions-table-body" class="divide-y divide-gray-200">
                                    <tr>
                                        <td colspan="6" class="text-center py-10 text-gray-500">Memuat data...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Untuk FontAwesome Icons (opsional) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- Tambahkan style untuk Tab dan Table cell agar lebih rapi --}}
    <style>
        .th-cell {
            @apply px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider;
        }

        .td-cell {
            @apply px-6 py-4 whitespace-nowrap text-sm text-gray-700;
        }

        .tab-button {
            @apply whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-gray-500 hover:text-indigo-600 hover:border-indigo-300 focus:outline-none;
        }

        .tab-button.active-tab {
            @apply border-indigo-500 text-indigo-600;
        }
    </style>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // URL endpoint API Anda.
            const API_URL = {
                users: '{{ route('reports.users') }}',
                bookings: '{{ route('reports.bookings') }}',
                financial: '{{ route('reports.financial') }}'
            };

            const loadedData = {
                users: null,
                bookings: null,
                financial: null
            };

            async function loadUsersReport() {
                if (loadedData.users) return renderUsersReport(loadedData.users);
                try {
                    const response = await fetch(API_URL.users);
                    if (!response.ok) throw new Error('Gagal mengambil data pengguna.');
                    const data = await response.json();
                    loadedData.users = data;
                    renderUsersReport(data);
                } catch (error) {
                    console.error('Error Users Report:', error);
                    document.getElementById('users-report-table-body').innerHTML =
                        `<tr><td colspan="5" class="text-center py-10 text-red-500">Gagal memuat data.</td></tr>`;
                }
            }

            function renderUsersReport(data) {
                const tableBody = document.getElementById('users-report-table-body');
                tableBody.innerHTML = '';
                if (data.length === 0) {
                    tableBody.innerHTML =
                        '<tr><td colspan="5" class="text-center py-10 text-gray-500">Tidak ada data pengguna.</td></tr>';
                    return;
                }
                data.forEach((user, index) => {
                    const row = `
                <tr class="${index % 2 === 0 ? 'bg-white' : 'bg-gray-50'}">
                    <td class="td-cell">${index + 1}</td>
                    <td class="td-cell font-medium text-gray-900">${user.name}</td>
                    <td class="td-cell">${user.email}</td>
                    <td class="td-cell">
                        <select class="block w-full rounded-md border-gray-300 shadow-sm text-sm" data-user-id="${user.user_id}">
                            <option value="user" ${user.role.toLowerCase() === 'user' ? 'selected' : ''}>User</option>
                            <option value="admin" ${user.role.toLowerCase() === 'admin' ? 'selected' : ''}>Admin</option>
                        </select>
                    </td>
                    <td class="td-cell">
                        {{-- PERBAIKAN: gunakan user.user_id agar konsisten dengan <select> --}}
                        <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-1 px-3 rounded text-xs btn-save-role" data-user-id="${user.user_id}">Simpan</button>
                    </td>
                </tr>
            `;
                    tableBody.insertAdjacentHTML('beforeend', row);
                });
            }

            async function loadBookingsReport() {
                if (loadedData.bookings) return renderBookingsReport(loadedData.bookings);
                try {
                    const response = await fetch(API_URL.bookings);
                    if (!response.ok) throw new Error('Gagal mengambil data booking.');
                    const data = await response.json();
                    loadedData.bookings = data;
                    renderBookingsReport(data);
                } catch (error) {
                    console.error('Error Bookings Report:', error);
                    document.getElementById('bookings-report-table-body').innerHTML =
                        `<tr><td colspan="9" class="text-center py-10 text-red-500">Gagal memuat data.</td></tr>`;
                }
            }

            function renderBookingsReport(data) {
                const tableBody = document.getElementById('bookings-report-table-body');
                tableBody.innerHTML = '';
                if (data.length === 0) {
                    tableBody.innerHTML =
                        '<tr><td colspan="9" class="text-center py-10 text-gray-500">Tidak ada data booking.</td></tr>';
                    return;
                }
                data.forEach((booking, index) => {
                    const row = `
                <tr class="${index % 2 === 0 ? 'bg-white' : 'bg-gray-50'}">
                    <td class="td-cell text-gray-900 font-mono">${booking.booking_id}</td>
                    <td class="td-cell">${booking.customer_name}</td>
                    <td class="td-cell">${booking.venue_name}</td>
                    <td class="td-cell">${new Date(booking.start_date).toLocaleDateString('id-ID')}</td>
                    <td class="td-cell">${new Date(booking.end_date).toLocaleDateString('id-ID')}</td>
                    <td class="td-cell"><span class="${getBookingStatusClass(booking.booking_status)}">${booking.booking_status}</span></td>
                    <td class="td-cell">${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(booking.total_price)}</td>
                    <td class="td-cell"><span class="${getPaymentStatusClass(booking.payment_status)}">${booking.payment_status}</span></td>
                    <td class="td-cell">${new Date(booking.created_at).toLocaleString('id-ID')}</td>
                </tr>
            `;
                    tableBody.insertAdjacentHTML('beforeend', row);
                });
            }

            async function loadFinancialReport() {
                if (loadedData.financial) return renderFinancialReport(loadedData.financial);
                try {
                    const response = await fetch(API_URL.financial);
                    if (!response.ok) throw new Error('Gagal mengambil data keuangan.');
                    const data = await response.json();
                    loadedData.financial = data;
                    renderFinancialReport(data);
                } catch (error) {
                    console.error('Error Financial Report:', error);
                    document.getElementById('financial-transactions-table-body').innerHTML =
                        `<tr><td colspan="6" class="text-center py-10 text-red-500">Gagal memuat data.</td></tr>`;
                }
            }

            function renderFinancialReport(data) {
                document.getElementById('total-revenue').innerText = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(data.summary.total_revenue);
                document.getElementById('completed-bookings').innerText = data.summary.completed_bookings;
                document.getElementById('pending-transactions').innerText = data.summary.pending_transactions;
                const tableBody = document.getElementById('financial-transactions-table-body');
                tableBody.innerHTML = '';
                if (data.transactions.length === 0) {
                    tableBody.innerHTML =
                        '<tr><td colspan="6" class="text-center py-10 text-gray-500">Tidak ada data transaksi lunas.</td></tr>';
                    return;
                }
                data.transactions.forEach((trx, index) => {
                    const row = `
                <tr class="${index % 2 === 0 ? 'bg-white' : 'bg-gray-50'}">
                    <td class="td-cell font-mono">${trx.transaction_id}</td>
                    <td class="td-cell font-mono">${trx.booking_id}</td>
                    <td class="td-cell">${trx.customer_name}</td>
                    <td class="td-cell">${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(trx.amount)}</td>
                    <td class="td-cell">${trx.payment_method}</td>
                    <td class="td-cell">${new Date(trx.paid_at).toLocaleString('id-ID')}</td>
                </tr>
            `;
                    tableBody.insertAdjacentHTML('beforeend', row);
                });
            }

            function getBadgeBaseClass() {
                return 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full';
            }

            function getBookingStatusClass(status) {
                const base = getBadgeBaseClass();
                switch (status.toLowerCase()) {
                    case 'confirmed':
                        return `${base} bg-blue-100 text-blue-800`;
                    case 'completed':
                        return `${base} bg-green-100 text-green-800`;
                    case 'pending':
                        return `${base} bg-yellow-100 text-yellow-800`;
                    case 'cancelled':
                        return `${base} bg-red-100 text-red-800`;
                    default:
                        return `${base} bg-gray-100 text-gray-800`;
                }
            }

            function getPaymentStatusClass(status) {
                const base = getBadgeBaseClass();
                switch (status.toLowerCase()) {
                    case 'paid':
                        return `${base} bg-green-100 text-green-800`;
                    case 'unpaid':
                        return `${base} bg-yellow-100 text-yellow-800`;
                    case 'failed':
                        return `${base} bg-red-100 text-red-800`;
                    default:
                        return `${base} bg-gray-100 text-gray-800`;
                }
            }

            const tabs = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', (e) => {
                    e.preventDefault(); 
                    tabs.forEach(item => item.classList.remove('active-tab'));
                    tabContents.forEach(content => content.classList.add('hidden'));

                    tab.classList.add('active-tab');
                    const target = document.querySelector(tab.dataset.tabTarget);
                    target.classList.remove('hidden');

                    switch (tab.dataset.tabTarget) {
                        case '#users-report':
                            loadUsersReport();
                            break;
                        case '#bookings-report':
                            loadBookingsReport();
                            break;
                        case '#financial-report':
                            loadFinancialReport();
                            break;
                    }
                });
            });

            document.getElementById('users-report-table-body').addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('btn-save-role')) {
                    const button = e.target;
                    const userId = button.dataset.userId;
                    const newRole = document.querySelector(`select[data-user-id="${userId}"]`).value;
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    // Tampilkan status loading pada tombol
                    button.textContent = 'Menyimpan...';
                    button.disabled = true;

                    fetch("{{ route('reports.updateRole') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken 
                            },
                            body: JSON.stringify({
                                user_id: userId,
                                role: newRole.toLowerCase()
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Gagal memperbarui. Status: ' + response.status);
                            }
                            return response.json();
                        })
                        .then(data => {
                            alert(data.message);
                            // Refresh data pengguna setelah berhasil update
                            loadedData.users = null;
                            loadUsersReport();
                        })
                        .catch(error => {
                            console.error('Update error:', error);
                            alert('Gagal memperbarui role.');
                            button.textContent = 'Simpan';
                            button.disabled = false;
                        });
                }
            });

            // Muat data untuk tab pertama saat halaman dibuka
            loadUsersReport();
        });
    </script>
@endpush
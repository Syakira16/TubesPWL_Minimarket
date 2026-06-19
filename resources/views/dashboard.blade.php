<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <h3 class="text-lg font-bold mb-4">
                        Selamat Datang, {{ auth()->user()->name }}
                    </h3>

                    {{-- <p class="mb-4">
                        Role :
                        <strong>
                            {{ auth()->user()->roles->pluck('name')->first() }}
                        </strong>
                    </p> --}}
                    <form method="POST" action="{{ route('logout') }}" class="mt-4">
                        @csrf

                        <button
                            type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                            Logout
                        </button>
                    </form>

                    @if(auth()->user()->hasRole('Owner'))

                    <h1 class="text-2xl font-bold text-blue-600 mb-4">
                        Dashboard Owner
                    </h1>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                            <div class="bg-blue-500 text-white rounded-xl p-6 shadow">
                                <h3>Total Cabang</h3>
                                <p class="text-4xl font-bold mt-2">
                                    {{ $totalCabang }}
                                </p>
                            </div>

                            <div class="bg-green-500 text-white rounded-xl p-6 shadow">
                                <h3>Total Produk</h3>
                                <p class="text-4xl font-bold mt-2">
                                    {{ $totalProduk }}
                                </p>
                            </div>

                            <div class="bg-yellow-500 text-white rounded-xl p-6 shadow">
                                <h3>Total Kategori</h3>
                                <p class="text-4xl font-bold mt-2">
                                    {{ $totalKategori }}
                                </p>
                            </div>

                            <div class="bg-purple-500 text-white rounded-xl p-6 shadow">
                                <h3>Total Pegawai</h3>
                                <p class="text-4xl font-bold mt-2">
                                    {{ $totalPegawai }}
                                </p>
                            </div>

                            <div class="bg-red-500 text-white rounded-xl p-6 shadow">
                                <h3>Total Transaksi</h3>
                                <p class="text-4xl font-bold mt-2">
                                    {{ $totalTransaksi }}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if(auth()->user()->hasRole('Manager'))
                        <h1 class="text-2xl font-bold text-green-600">
                            Dashboard Manager
                        </h1>
                    @endif

                    @if(auth()->user()->hasRole('Supervisor'))
                        <h1 class="text-2xl font-bold text-yellow-600">
                            Dashboard Supervisor
                        </h1>
                    @endif

                    @if(auth()->user()->hasRole('Cashier'))
                        <h1 class="text-2xl font-bold text-purple-600">
                            Dashboard Cashier
                        </h1>
                    @endif

                    @if(auth()->user()->hasRole('Warehouse Staff'))
                        <h1 class="text-2xl font-bold text-red-600">
                            Dashboard Warehouse
                        </h1>
                    @endif

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
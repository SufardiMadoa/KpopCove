@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <section class="relative">
        <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
            <div class="w-full justify-start items-center xl:gap-12 gap-10 grid lg:grid-cols-2 grid-cols-1">
                <div class="w-full flex-col justify-center lg:items-start items-center gap-10 inline-flex">
                    <div class="w-full flex-col justify-center items-start gap-8 flex">
                        <div class="flex-col justify-start lg:items-start items-center gap-4 flex">
                            <div class="w-full flex-col justify-start lg:items-start ite    ms-center gap-3 flex">
                                <h2 class="text-4xl font-bold font-manrope leading-normal lg:text-start text-center">
                                    Temukan Kemudahan Berbelanja di Terra Shop
                                </h2>
                                <p class="text-gray-500 text-base font-normal leading-relaxed lg:text-start text-center">
                                    Terra Shop adalah solusi belanja online terpercaya yang menyediakan berbagai produk
                                    berkualitas
                                    dengan harga terbaik. Kami berkomitmen untuk memberikan pengalaman berbelanja yang
                                    mudah, aman,
                                    dan nyaman bagi pelanggan di seluruh Indonesia.
                                </p>
                            </div>
                        </div>
                        <div class="w-full flex-col justify-center items-start gap-6 flex">
                            <div class="w-full justify-start items-center gap-8 grid md:grid-cols-2 grid-cols-1">
                                <div
                                    class="w-full h-full p-3.5 rounded-xl border border-gray-200 hover:border-gray-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex bg-linen">
                                    <h4 class="text-2xl font-bold font-manrope leading-9">1000+ Produk</h4>
                                    <p class="text-gray-500 text-base font-normal leading-relaxed">Pilihan terbaik untuk
                                        semua kebutuhanmu</p>
                                </div>
                                <div
                                    class="w-full h-full p-3.5 rounded-xl border border-gray-200 hover:border-gray-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex bg-linen">
                                    <h4 class="text-2xl font-bold font-manrope leading-9">Fast Delivery</h4>
                                    <p class="text-gray-500 text-base font-normal leading-relaxed">Pengiriman cepat dan aman
                                        ke seluruh Indonesia</p>
                                </div>
                            </div>
                            <div class="w-full h-full justify-start items-center gap-8 grid md:grid-cols-2 grid-cols-1">
                                <div
                                    class="w-full p-3.5 rounded-xl border border-gray-200 hover:border-gray-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex bg-linen">
                                    <h4 class="text-2xl font-bold font-manrope leading-9">10.000+ Pelanggan</h4>
                                    <p class="text-gray-500 text-base font-normal leading-relaxed">Dipercaya oleh ribuan
                                        pelanggan setiap hari</p>
                                </div>
                                <div
                                    class="w-full h-full p-3.5 rounded-xl border border-gray-200 hover:border-gray-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex bg-linen">
                                    <h4 class="text-2xl font-bold font-manrope leading-9">99% Kepuasan</h4>
                                    <p class="text-gray-500 text-base font-normal leading-relaxed">Pelayanan terbaik untuk
                                        kenyamanan belanja Anda</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="w-full lg:justify-start justify-center items-start flex">
                    <div class="sm:w-[564px] w-full sm:h-[646px] h-full sm:bg-gray-400  sm:border border-gray-200 relative">
                        <img class=" w-full h-full  object-cover"
                            src="https://img.freepik.com/free-photo/high-angle-young-girl-with-skateboard_23-2148478675.jpg?t=st=1742905878~exp=1742909478~hmac=3adfcecc935e87c6925f65549060d59e851a978e4c1b575743c2e92337ecffdf&w=740"
                            alt="Toko Online image" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title', 'Tentang Kami')




<section class="relative bg-blue-50 py-12 mt-9">
  <div class="w-full max-w-7xl px-4 mx-auto grid grid-cols-1 lg:grid-cols-2 gap-3 items-stretch">
    
    <!-- Text Section -->
    <div class="flex flex-col justify-between h-full gap-8 bg-white rounded-xl p-5">
      <div class="flex flex-col gap-3">
        <span class="text-orange-500 font-semibold">How It Started</span>
        <h2 class="text-[50px] lg:text-5xl font-bold leading-tight text-gray-900">
          Our Dream is <br />
          Global Learning <br />
          Transformation
        </h2>
      </div>
      <p class="text-gray-600 text-xl leading-relaxed">
        Kawruh was founded by Robert Anderson, a passionate lifelong learner, and Maria Sanchez, a visionary educator.
        Their shared dream was to create a digital haven of knowledge accessible to all. United by their belief in the
        transformational power of education, they embarked on a journey to build ‘Kawruh’. With relentless dedication,
        they gathered a team of experts and launched this innovative platform, creating a global community of eager
        learners, all connected by the desire to explore, learn, and grow.
      </p>
    </div>

    <!-- Image & Stats Section -->
    <div class="flex flex-col  h-full">
      <!-- Image -->
      <div class="w-full h-[500px]">
        <img src="https://img.freepik.com/free-photo/high-angle-young-girl-with-skateboard_23-2148478675.jpg?t=st=1742905878~exp=1742909478~hmac=3adfcecc935e87c6925f65549060d59e851a978e4c1b575743c2e92337ecffdf&w=740"
             alt="Learning Image"
             class="rounded-xl w-full h-[480px] object-cover" />
      </div>

      <!-- Stats -->
    <div class="bg-white rounded-xl p-5">

    <div class="grid grid-cols-2 gap-4" id="stats">
  <div class="bg-gray-100 rounded-xl p-4">
    <h4 class="text-2xl font-bold text-gray-900 counter" data-target="3.5">0</h4>
    <p class="text-sm text-gray-600">Years Experience</p>
  </div>
  <div class="bg-gray-100 rounded-xl p-4">
    <h4 class="text-2xl font-bold text-gray-900 counter" data-target="23">0</h4>
    <p class="text-sm text-gray-600">Project Challenge</p>
  </div>
  <div class="bg-gray-100 rounded-xl p-4">
    <h4 class="text-2xl font-bold text-gray-900 counter" data-target="830">0</h4>
    <p class="text-sm text-gray-600">Positive Reviews</p>
  </div>
  <div class="bg-gray-100 rounded-xl p-4">
    <h4 class="text-2xl font-bold text-gray-900 counter" data-target="100000">0</h4>
    <p class="text-sm text-gray-600">Trusted Students</p>
  </div>
</div>
    </div>
    </div>
  </div>
</section>

<script>
  function animateCounter(el) {
    const target = +el.getAttribute('data-target');
    const isFloat = target % 1 !== 0;
    const increment = target / 100;
    let count = 0;

    const update = () => {
      count += increment;
      if (count < target) {
        el.textContent = isFloat ? count.toFixed(1) : Math.floor(count);
        requestAnimationFrame(update);
      } else {
        el.textContent = isFloat ? target.toFixed(1) : target.toLocaleString();
      }
    };

    update();
  }

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => animateCounter(counter));
        obs.disconnect(); // jalan sekali aja
      }
    });
  });

  observer.observe(document.getElementById('stats'));
</script>


    <!-- <section class="relative">
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
    </section> -->


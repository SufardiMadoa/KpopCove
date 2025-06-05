@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')


<section class="bg-gradient-to-b from-pink-100 via-purple-100 to-blue-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-2xl mx-auto text-center">
    <h2 class="text-4xl font-extrabold text-pink-600">Let's Connect!</h2>
    <p class="mt-4 text-lg text-purple-700">Got a question or just want to say hi? Drop your message like your favorite K-Pop idol drops their comeback!</p>
  </div>

  <form action="#" method="POST" class="mt-10 max-w-xl mx-auto bg-white rounded-3xl shadow-xl p-8 space-y-6">
    <div>
      <label for="name" class="block text-sm font-semibold text-purple-700">Name</label>
      <input type="text" name="name" id="name" required placeholder="Your K-Pop name ✨"
        class="mt-1 block w-full rounded-xl border border-purple-200 shadow-sm p-3 focus:ring-2 focus:ring-pink-300 focus:outline-none" />
    </div>

    <div>
      <label for="email" class="block text-sm font-semibold text-purple-700">Email</label>
      <input type="email" name="email" id="email" required placeholder="your@email.com"
        class="mt-1 block w-full rounded-xl border border-purple-200 shadow-sm p-3 focus:ring-2 focus:ring-pink-300 focus:outline-none" />
    </div>

    <div>
      <label for="message" class="block text-sm font-semibold text-purple-700">Message</label>
      <textarea name="message" id="message" rows="4" placeholder="Say something sweet... 💖"
        class="mt-1 block w-full rounded-xl border border-purple-200 shadow-sm p-3 focus:ring-2 focus:ring-pink-300 focus:outline-none resize-none"></textarea>
    </div>

    <div class="text-center">
      <button type="submit"
        class="inline-flex items-center px-6 py-3 bg-pink-500 text-white font-semibold rounded-xl shadow-md hover:bg-pink-600 transition duration-300">
        Send with 💌
      </button>
    </div>
  </form>

  <p class="mt-6 text-center text-sm text-purple-600">You’re daebak! We’ll get back to you soon 💜</p>
</section>


    <!-- <section class="relative py-6 pt-2 ">
        <div class="w-full max-w-7xl   mx-auto mt-10">
            <div class="w-full flex flex-col items-center gap-10">
                <div class="text-center">
                    <h6 class="text-gray-400 text-xl font-normal leading-relaxed">Hubungi Kami</h6>
                    <h2 class="text-4xl font-bold font-manrope leading-normal text-slate-950">Layanan Pelanggan Terra Shop
                    </h2>

                    <p class="text-gray-500 text-base font-normal leading-relaxed mt-4">
                        Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi kami melalui
                        informasi di bawah ini.
                    </p>
                </div>

                <div class="w-full grid lg:grid-cols-2 grid-cols-1 gap-12">
                    <div class="flex flex-col gap-8">
                        <div class="bg-linen p-6  flex items-center gap-6 hover:shadow-lg transition">
                            <a href="https://wa.me/6285242271149" target="_blank" class="flex items-center gap-6">
                                <div class="p-4 bg-blue-100 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-950" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10l1.503 1.503A4.978 4.978 0 0111 15v0a4.978 4.978 0 016.497-3.497L19 10m-7-7h0a3 3 0 013 3v0a3 3 0 01-3 3v0a3 3 0 01-3-3v0a3 3 0 013-3v0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-gray-900 text-xl font-bold">WhatsApp</h4>
                                    <p class="text-gray-500 text-base">+62 852-4227-1149</p>
                                </div>
                            </a>
                        </div>
                        <div class="bg-linen p-6  flex items-center gap-6 hover:shadow-lg transition">
                            <a href="mailto:support@fashionstore.com" class="flex items-center gap-6">
                                <div class="p-4 bg-blue-100 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-950" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 12.79A8.962 8.962 0 0116.94 21a9.003 9.003 0 01-7.88-4.21A9.002 9.002 0 0112 3.94a8.962 8.962 0 018.21 8.85z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-gray-900 text-xl font-bold">Email</h4>
                                    <p class="text-gray-500 text-base">support@fashionstore.com</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="bg-linen p-6  flex flex-col gap-8 hover:shadow-lg transition">
                        <div class="flex items-center gap-6">
                            <div class="p-4 bg-blue-100 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-950" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 13.657a8 8 0 00-11.314 0m2.828 2.829a4 4 0 005.657 0m2.828-2.829a8 8 0 0111.314 0" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-gray-900 text-xl font-bold">Alamat</h4>
                                <p class="text-gray-500 text-base">Jl. Boulevard No.21, Makassar</p>
                            </div>
                        </div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63795.61766204884!2d119.42021056484375!3d-5.135399453926954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf1c1747078b35%3A0x3a2e8f2569dded95!2sJl.%20Boulevard%20No.21!5e0!3m2!1sen!2sid!4v1674672741298!5m2!1sen!2sid"
                            width="100%" height="300" class="border border-gray-300" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
@endsection

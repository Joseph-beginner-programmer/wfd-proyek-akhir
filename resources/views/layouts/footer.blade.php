<style>
  .footer-bg-pattern {
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%233b82f6' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    position: relative;
    overflow: hidden;
  }

  /* PERBAIKAN: Memastikan Material Icons dirender dengan benar */
  .material-icons {
    font-family: 'Material Icons';
    font-weight: normal;
    font-style: normal;
    font-size: 24px;
    /* Ukuran ikon default */
    display: inline-block;
    line-height: 1;
    text-transform: none;
    letter-spacing: normal;
    word-wrap: normal;
    white-space: nowrap;
    direction: ltr;

    /* Dukungan untuk WebKit (Chrome, Safari, dll) */
    -webkit-font-smoothing: antialiased;
    /* Dukungan untuk Firefox */
    text-rendering: optimizeLegibility;
    /* Dukungan untuk IE */
    -moz-osx-font-smoothing: grayscale;
    /* Aktifkan fitur ligatur standar di browser */
    font-feature-settings: 'liga';
  }
</style>

<footer role="contentinfo" aria-label="Footer" class="bg-blue-900 text-blue-200 font-inter footer-bg-pattern">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-10 gap-x-8">

      <!-- Tentang Kami -->
      <section aria-labelledby="footer-about" class="flex flex-col">
        <h3 id="footer-about" class="text-lg font-semibold text-white tracking-wider uppercase mb-5 pb-2 border-b-2 border-blue-700">Tentang Kami</h3>
        <p class="text-sm text-blue-200 leading-relaxed mb-6">
          Platform all-in-one untuk menemukan dan memesan venue terbaik untuk setiap momen berharga Anda. Ciptakan kenangan tak terlupakan bersama kami.
        </p>
        <!-- PERBAIKAN: Mengembalikan ke desain ikon sosial media yang konsisten -->
        <div class="flex items-center gap-4 mt-auto" role="list">
          <a href="#" aria-label="Facebook" role="listitem" title="Facebook" class="w-10 h-10 rounded-full bg-blue-700 hover:bg-white hover:text-blue-700 transition-all duration-300 ease-in-out transform hover:scale-110 flex items-center justify-center text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
            </svg>
          </a>
          <a href="#" aria-label="Instagram" role="listitem" title="Instagram" class="w-10 h-10 rounded-full bg-blue-700 hover:bg-white hover:text-blue-700 transition-all duration-300 ease-in-out transform hover:scale-110 flex items-center justify-center text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zM12 16c-2.209 0-4-1.791-4-4s1.791-4 4-4 4 1.791 4 4-1.791 4-4 4zm4.965-10.405c0 .795.645 1.44 1.44 1.44s1.44-.645 1.44-1.44-.645-1.44-1.44-1.44-1.44.645-1.44 1.44z" />
            </svg>
          </a>
          <a href="#" aria-label="Twitter" role="listitem" title="Twitter" class="w-10 h-10 rounded-full bg-blue-700 hover:bg-white hover:text-blue-700 transition-all duration-300 ease-in-out transform hover:scale-110 flex items-center justify-center text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616v.064c0 2.298 1.634 4.214 3.791 4.649-.469.127-.962.194-1.464.194-1.07 0-1.85-.12-2.31-.223.632 1.995 2.449 3.397 4.604 3.437-1.728 1.353-3.869 2.059-6.143 2.059-.442 0-.877-.026-1.307-.077 2.199 1.408 4.823 2.223 7.646 2.223 9.337 0 14.337-7.617 14.014-14.646.992-.714 1.838-1.603 2.527-2.624z" />
            </svg>
          </a>
          <a href="#" aria-label="YouTube" role="listitem" title="YouTube" class="w-10 h-10 rounded-full bg-blue-700 hover:bg-white hover:text-blue-700 transition-all duration-300 ease-in-out transform hover:scale-110 flex items-center justify-center text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
              <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
            </svg>
          </a>
        </div>
      </section>

      <!-- Kategori -->
      <section aria-labelledby="footer-categories">
        <h3 id="footer-categories" class="text-lg font-semibold text-white tracking-wider uppercase mb-5 pb-2 border-b-2 border-blue-700">Kategori</h3>
        <ul class="text-sm space-y-3">
          <li><a href="#" class="text-blue-200 hover:text-white hover:pl-2 transition-all duration-300 ease-in-out block">Reservasi Venue</a></li>
          <li><a href="#" class="text-blue-200 hover:text-white hover:pl-2 transition-all duration-300 ease-in-out block">Main Bareng</a></li>
          <li><a href="#" class="text-blue-200 hover:text-white hover:pl-2 transition-all duration-300 ease-in-out block">Paket Promo</a></li>
          <li><a href="#" class="text-blue-200 hover:text-white hover:pl-2 transition-all duration-300 ease-in-out block">Layanan Event</a></li>
          <li><a href="#" class="text-blue-200 hover:text-white hover:pl-2 transition-all duration-300 ease-in-out block">Voucher & Diskon</a></li>
        </ul>
      </section>

      <!-- Dukungan -->
      <section aria-labelledby="footer-support">
        <h3 id="footer-support" class="text-lg font-semibold text-white tracking-wider uppercase mb-5 pb-2 border-b-2 border-blue-700">Dukungan</h3>
        <ul class="text-sm space-y-3">
          <li><a href="#" class="text-blue-200 hover:text-white hover:pl-2 transition-all duration-300 ease-in-out block">Bantuan & FAQ</a></li>
          <li><a href="#" class="text-blue-200 hover:text-white hover:pl-2 transition-all duration-300 ease-in-out block">Pembayaran</a></li>
          <li><a href="#" class="text-blue-200 hover:text-white hover:pl-2 transition-all duration-300 ease-in-out block">Kebijakan Pengembalian</a></li>
          <li><a href="#" class="text-blue-200 hover:text-white hover:pl-2 transition-all duration-300 ease-in-out block">Hubungi Kami</a></li>
        </ul>
      </section>

      <!-- Newsletter -->
      <section aria-labelledby="footer-newsletter">
        <h3 id="footer-newsletter" class="text-lg font-semibold text-white tracking-wider uppercase mb-5 pb-2 border-b-2 border-blue-700">Newsletter</h3>
        <p class="text-sm text-blue-200 leading-relaxed mb-4">
          Dapatkan info promo & venue terbaru langsung di email Anda.
        </p>
        <form class="flex flex-col space-y-3" action="#" method="POST" novalidate>
          <input
            type="email"
            name="email"
            placeholder="Email Anda"
            aria-label="Email untuk berlangganan newsletter"
            class="py-2 px-4 rounded-md border-2 border-blue-700 bg-blue-800 text-white placeholder-blue-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-blue-700 transition-colors"
            required />
          <button type="submit" class="bg-blue-600 hover:bg-blue-500 transition-all duration-300 ease-in-out text-white font-bold py-2 px-4 rounded-md cursor-pointer transform hover:scale-105">Berlangganan</button>
        </form>

        <!-- PERBAIKAN: Mengembalikan ke desain ikon pembayaran yang konsisten -->
        <div class="mt-6">
          <h4 class="text-base font-semibold text-blue-300 mb-3">Metode Pembayaran</h4>
          <!-- PERBAIKAN: Mengganti tombol menjadi bulatan -->
          <div class="flex items-center flex-wrap gap-2" aria-label="Metode Pembayaran">
            <button type="button" title="Mastercard" class="h-10 w-10 flex items-center justify-center bg-gray-800 rounded-full p-2 transform transition hover:scale-110">
              <svg role="img" viewBox="0 0 32 20" xmlns="http://www.w3.org/2000/svg" class="h-full w-auto"><defs><linearGradient id="a" x1="0%" x2="100%" y1="50%" y2="50%"><stop offset="0%" stop-color="#FF5F00"/><stop offset="100%" stop-color="#FF9F00"/></linearGradient></defs><circle cx="10" cy="10" r="10" fill="#EA001B"/><circle cx="22" cy="10" r="10" fill="url(#a)"/></svg>
            </button>
            <button type="button" title="Visa" class="h-10 w-10 flex items-center justify-center bg-blue-600 rounded-full p-2.5 transform transition hover:scale-110">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 660 203" class="h-full w-auto" fill="none"><path d="M233.003 199.762L266.362 4.002H319.72L286.336 199.762H233.003V199.762ZM479.113 8.222C468.544 4.256 451.978 0 431.292 0C378.566 0 341.429 26.551 341.111 64.604C340.814 92.733 367.626 108.426 387.865 117.789C408.636 127.387 415.617 133.505 415.517 142.072C415.384 155.195 398.931 161.187 383.593 161.187C362.238 161.187 350.892 158.22 333.368 150.914L326.49 147.803L319.003 191.625C331.466 197.092 354.511 201.824 378.441 202.07C434.531 202.07 470.943 175.822 471.357 135.185C471.556 112.915 457.341 95.97 426.556 81.997C407.906 72.941 396.484 66.898 396.605 57.728C396.605 49.591 406.273 40.89 427.165 40.89C444.611 40.619 457.253 44.424 467.101 48.39L471.882 50.649L479.113 8.222V8.222ZM616.423 3.99899H575.193C562.421 3.99899 552.861 7.485 547.253 20.233L468.008 199.633H524.039C524.039 199.633 533.198 175.512 535.27 170.215C541.393 170.215 595.825 170.299 603.606 170.299C605.202 177.153 610.098 199.633 610.098 199.633H659.61L616.423 3.993V3.99899ZM551.006 130.409C555.42 119.13 572.266 75.685 572.266 75.685C571.952 76.206 576.647 64.351 579.34 57.001L582.946 73.879C582.946 73.879 593.163 120.608 595.299 130.406H551.006V130.409V130.409ZM187.706 3.99899L135.467 137.499L129.902 110.37C120.176 79.096 89.8774 45.213 56.0044 28.25L103.771 199.45L160.226 199.387L244.23 3.99699L187.706 3.996" fill="#0E4595"></path><path d="M86.723 3.99219H0.682003L0 8.06519C66.939 24.2692 111.23 63.4282 129.62 110.485L110.911 20.5252C107.682 8.12918 98.314 4.42918 86.725 3.99718" fill="#F2AE14"></path></svg>
            </button>
            <button type="button" title="PayPal" class="h-10 w-10 flex items-center justify-center bg-yellow-400 rounded-full p-2.5 transform transition hover:scale-110">
              <svg role="img" viewBox="0 0 384 512" class="h-full w-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M111.4 295.9c-3.5 19.2-17.4 108.7-21.5 134-.3 1.8-1 2.5-3 2.5H12.3c-7.6 0-13.1-6.6-12.1-13.9L58.8 46.6c1.5-9.6 10.1-16.9 20-16.9 152.3 0 165.1-3.7 204 11.4 60.1 23.3 65.6 79.5 44 140.3-21.5 62.6-72.5 89.5-140.1 90.3-43.4 .7-69.5-7-75.3 24.2zM357.1 152c-1.8-1.3-2.5-1.8-3 1.3-2 11.4-5.1 22.5-8.8 33.6-39.9 113.8-150.5 103.9-204.5 103.9-6.1 0-10.1 3.3-10.9 9.4-22.6 140.4-27.1 169.7-27.1 169.7-1 7.1 3.5 12.9 10.6 12.9h63.5c8.6 0 15.7-6.3 17.4-14.9 .7-5.4-1.1 6.1 14.4-91.3 4.6-22 14.3-19.7 29.3-19.7 71 0 126.4-28.8 142.9-112.3 6.5-34.8 4.6-71.4-23.8-92.6z"></path></svg>
            </button>
            <button type="button" title="Apple Pay" class="h-10 w-10 flex items-center justify-center bg-black rounded-full p-2.5 transform transition hover:scale-110">
              <svg role="img" viewBox="0 0 384 512" class="h-full w-auto" fill="white" xmlns="http://www.w3.org/2000/svg"><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path></svg>
            </button>
            <button type="button" title="Bitcoin" class="h-10 w-10 flex items-center justify-center bg-orange-500 rounded-full p-2.5 transform transition hover:scale-110">
              <svg role="img" viewBox="0 0 512 512" class="h-full w-auto" fill="white" xmlns="http://www.w3.org/2000/svg"><path d="M504 256c0 136.1-111 248-248 248S8 392.1 8 256 119 8 256 8s248 111 248 248zm-141.7-35.33c4.937-32.1-20.19-50.74-54.55-62.57l11.15-44.7-27.21-6.781-10.85 43.52c-7.154-1.783-14.5-3.464-21.8-5.13l10.93-43.81-27.2-6.781-11.15 44.69c-5.922-1.349-11.73-2.682-17.38-4.084l.031-.14-37.53-9.37-7.239 29.06s20.19 4.627 19.76 4.913c11.02 2.751 13.01 10.04 12.68 15.82l-12.7 50.92c.76 .194 1.744 .473 2.829 .907-.907-.225-1.876-.473-2.876-.713l-17.8 71.34c-1.349 3.348-4.767 8.37-12.47 6.464 .271 .395-19.78-4.937-19.78-4.937l-13.51 31.15 35.41 8.827c6.588 1.651 13.05 3.379 19.4 5.006l-11.26 45.21 27.18 6.781 11.15-44.73a1038 1038 0 0 0 21.69 5.627l-11.11 44.52 27.21 6.781 11.26-45.13c46.4 8.781 81.3 5.239 95.99-36.73 11.84-33.79-.589-53.28-25-65.99 17.78-4.098 31.17-15.79 34.75-39.95zm-62.18 87.18c-8.41 33.79-65.31 15.52-83.75 10.94l14.94-59.9c18.45 4.603 77.6 13.72 68.81 48.96zm8.417-87.67c-7.673 30.74-55.03 15.12-70.39 11.29l13.55-54.33c15.36 3.828 64.84 10.97 56.85 43.03z"></path></svg>
            </button>
          </div>
        </div>
        </div>
      </section>

    </div>
  </div>

  <!-- Footer Bottom -->
  <div class="bg-blue-900/50">
    <div class="max-w-7xl mx-auto mt-12 py-6 px-4 sm:px-6 lg:px-8 border-t border-blue-800 text-center text-sm text-blue-300">
      &copy; {{ date('Y') }} ReserveIn. Semua hak cipta dilindungi.
    </div>
  </div>
</footer>
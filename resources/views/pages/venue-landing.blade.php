<div x-data="{ activeTab: 'pemilik' }" class="max-w-3xl md:max-w-4xl lg:max-w-xl mx-auto p-4">
  <!-- Tab Buttons -->
  <div class="flex border-b border-gray-200 mt-20">
    <button
      @click="activeTab = 'pemilik'"
      :class="{
        'border-blue-500 text-blue-600': activeTab === 'pemilik',
        'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'pemilik'
      }"
      class="whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm monteserrat-heading"
    >
      Pemilik Venue
    </button>
    
    <button
      @click="activeTab = 'penyewa'"
      :class="{
        'border-blue-500 text-blue-600': activeTab === 'penyewa',
        'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'penyewa'
      }"
      class="whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm monteserrat-heading"
    >
      Penyewa Venue
    </button>
  </div>

  <!-- Tab Contents -->
  <div class="mt-4">
    <!-- Pemilik Content -->
    <div x-show="activeTab === 'pemilik'" x-transition>
      <div class="p-6 bg-white rounded-lg shadow">
        <h3 class="text-2xl monteserrat-title  mb-4">Kelola venue lebih praktis dan menguntungkan.</h3>
        <!-- Your pemilik venue content here -->
        <p class="text-xl monteserrat-body text-justify">Waktunya buat venue anda lebih dari sekadar venue. Semuanya dimulai dengan pengelolaan yang simpel, fleksibel, dan profitable lewat ReserveIn Venue Management.</p>

        <p class="mt-5 underline text-blue-600 monteserrat-body hover:text-blue-800 ">Lihat selengkapnya -></p>
      </div>
    </div>
    
    <!-- Penyewa Content -->
    <div x-show="activeTab === 'penyewa'" x-transition x-cloak>
      <div class="p-6 bg-white rounded-lg shadow">
        <h3 class="text-2xl monteserrat-title mb-4">Sewa lapangan dengan mudah dan cepat.</h3>
        <!-- Your penyewa venue content here -->
        <p class="text-xl monteserrat-body text-justify">Butuh venue untuk pernikahan? olahraga? acara keluarga? gunakan ReserveIn untuk menemukan venue yang paling cocok untuk Anda!</p>
        <p class="mt-5 underline text-blue-600 monteserrat-body hover:text-blue-800">Lihat selengkapnya -></p>
      </div>
    </div>
  </div>
</div>
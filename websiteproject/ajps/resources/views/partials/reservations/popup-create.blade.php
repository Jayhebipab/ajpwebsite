<div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex justify-center items-center">
  <div class="bg-white w-full max-w-2xl p-6 rounded-xl shadow-lg relative border border-gray-300">
    <a href="{{ route('dashboard', ['page' => 'reservation']) }}" class="absolute top-2 right-3 text-2xl text-gray-500 hover:text-red-500">×</a>

    <h1 class="text-2xl font-bold mb-6">New Reservation</h1>

    <form action="{{ route('reservations.store') }}" method="POST" class="space-y-5">
      @csrf

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm mb-1">First Name</label>
          <input type="text" name="first_name" class="w-full border px-4 py-2 rounded" />
        </div>
        <div>
          <label class="block text-sm mb-1">Last Name</label>
          <input type="text" name="last_name" class="w-full border px-4 py-2 rounded" />
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm mb-1">Email <span class="text-red-500">*</span></label>
          <input type="email" name="email" required class="w-full border px-4 py-2 rounded" />
        </div>
        <div>
          <label class="block text-sm mb-1">Phone <span class="text-red-500">*</span></label>
          <input type="text" name="phone" required class="w-full border px-4 py-2 rounded" />
        </div>
      </div>

      <div>
        <label class="block text-sm mb-1">Preferred Date</label>
        <input type="date" name="preferred_date" class="w-full border px-4 py-2 rounded" />
      </div>

      <div>
        <label class="block text-sm mb-1">Location <span class="text-red-500">*</span></label>
        <select name="location" required class="w-full border px-4 py-2 rounded">
          <option value="" disabled selected>Select location</option>
          <option value="branch1">Branch 1</option>
          <option value="branch2">Branch 2</option>
        </select>
      </div>

      <div>
        <label class="block text-sm mb-1">Tattoo Info <span class="text-red-500">*</span></label>
        <textarea name="tattoo_info" rows="4" required class="w-full border px-4 py-2 rounded"></textarea>
      </div>

      <div class="text-right">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded">
          Submit
        </button>
      </div>
    </form>
  </div>
</div>

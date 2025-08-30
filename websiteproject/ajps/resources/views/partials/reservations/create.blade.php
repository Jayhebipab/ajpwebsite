<div class="bg-gray-100 min-h-screen">
  <h1 class="text-2xl font-semibold flex items-center gap-2 mb-4">
    📅 Reservation Management
  </h1>

  {{-- Add Reservation Button --}}
  <div class="mb-4">
    <button 
      onclick="openModal()" 
      class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
      ➕ Add Reservation
    </button>
  </div>

  {{-- Reservation List --}}
  <div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-lg font-semibold mb-4">Reservation List</h2>
    <table class="min-w-full text-sm">
      <thead class="bg-gray-200 text-gray-600">
        <tr>
          <th class="px-4 py-2">ID</th>
          <th class="px-4 py-2">Name</th>
          <th class="px-4 py-2">Phone</th>
          <th class="px-4 py-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($reservations as $reservation)
          <tr class="border-b">
            <td class="px-4 py-2">{{ $reservation->id }}</td>
            <td class="px-4 py-2">{{ $reservation->first_name }} {{ $reservation->last_name }}</td>
            <td class="px-4 py-2">{{ $reservation->phone }}</td>
            <td class="px-4 py-2">
              <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
                @csrf
                @method('DELETE')
                <button class="text-red-600 hover:underline">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- Modal for Add Reservation --}}
  <div id="reservationModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden justify-center items-center">
    <div class="bg-gray-800 w-full max-w-2xl p-6 rounded-xl shadow-lg relative border border-gray-700">
      <button onclick="closeModal()" class="absolute top-2 right-3 text-2xl text-gray-300 hover:text-red-500">×</button>

      <h1 class="text-2xl font-bold text-white mb-6">New Reservation</h1>

      <form action="{{ route('reservations.store') }}" method="POST" class="space-y-5">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm text-gray-300 mb-1">First Name</label>
            <input type="text" name="first_name" class="w-full bg-gray-900 text-white border border-gray-600 px-4 py-2 rounded focus:outline-none focus:ring focus:ring-blue-400" />
          </div>
          <div>
            <label class="block text-sm text-gray-300 mb-1">Last Name</label>
            <input type="text" name="last_name" class="w-full bg-gray-900 text-white border border-gray-600 px-4 py-2 rounded focus:outline-none focus:ring focus:ring-blue-400" />
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm text-gray-300 mb-1">Email <span class="text-red-500">*</span></label>
            <input type="email" name="email" required class="w-full bg-gray-900 text-white border border-gray-600 px-4 py-2 rounded focus:outline-none focus:ring focus:ring-blue-400" />
          </div>
          <div>
            <label class="block text-sm text-gray-300 mb-1">Phone <span class="text-red-500">*</span></label>
            <input type="text" name="phone" required class="w-full bg-gray-900 text-white border border-gray-600 px-4 py-2 rounded focus:outline-none focus:ring focus:ring-blue-400" />
          </div>
        </div>

        <div>
          <label class="block text-sm text-gray-300 mb-1">Preferred Date</label>
          <input type="date" name="preferred_date" class="w-full bg-gray-900 text-white border border-gray-600 px-4 py-2 rounded focus:outline-none focus:ring focus:ring-blue-400" />
        </div>

        <div>
          <label class="block text-sm text-gray-300 mb-1">Preferred Location <span class="text-red-500">*</span></label>
          <select name="location" required class="w-full bg-gray-900 text-white border border-gray-600 px-4 py-2 rounded focus:outline-none focus:ring focus:ring-blue-400">
            <option value="" disabled selected>Select location</option>
            <option value="branch1">Branch 1</option>
            <option value="branch2">Branch 2</option>
          </select>
        </div>

        <div>
          <label class="block text-sm text-gray-300 mb-1">Tattoo Info <span class="text-red-500">*</span></label>
          <textarea name="tattoo_info" rows="4" required class="w-full bg-gray-900 text-white border border-gray-600 px-4 py-2 rounded focus:outline-none focus:ring focus:ring-blue-400"></textarea>
        </div>

        <div class="text-right">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded">
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- JS to toggle modal --}}
<script>
  function openModal() {
    document.getElementById('reservationModal').classList.remove('hidden');
    document.getElementById('reservationModal').classList.add('flex');
  }

  function closeModal() {
    document.getElementById('reservationModal').classList.add('hidden');
    document.getElementById('reservationModal').classList.remove('flex');
  }

  document.addEventListener('keydown', function (e) {
    if (e.key === "Escape") closeModal();
  });
</script>

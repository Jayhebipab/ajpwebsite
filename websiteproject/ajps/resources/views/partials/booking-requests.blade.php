<div class="p-6 bg-gray-100 min-h-screen">
  <h1 class="text-2xl font-semibold flex items-center gap-2 mb-4">
    {{-- Icon placeholder --}}
    📅 Booking Request Management
  </h1>

  {{-- Search Bar --}}
  <div class="bg-white p-4 rounded-lg shadow mb-6 flex items-center gap-2">
    <input
      type="text"
      placeholder="Search by phone number"
      class="flex-1 border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
    />
    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded flex items-center gap-1">
      🔍 Search
    </button>
    <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded flex items-center gap-1">
      ❌ Reset
    </button>
  </div>

  {{-- Table --}}
  <div class="bg-white rounded-lg shadow overflow-x-auto">
    <div class="flex justify-between items-center px-4 py-3 bg-gray-800 text-white font-semibold rounded-t-lg">
      <span>Booking Requests</span>
      <span class="bg-blue-500 text-white px-3 py-1 text-sm rounded-full">
        5 Requests Found
      </span>
    </div>
    <table class="w-full text-sm text-left">
      <thead class="text-xs uppercase bg-gray-200">
        <tr>
          <th class="px-4 py-2">#ID</th>
          <th class="px-4 py-2">Guest Information</th>
          <th class="px-4 py-2">Reservation Details</th>
          <th class="px-4 py-2">Special Requirements</th>
          <th class="px-4 py-2">Status</th>
          <th class="px-4 py-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 1; $i <= 5; $i++)
        <tr class="border-b hover:bg-gray-50">
          <td class="px-4 py-3">#{{ $i }}</td>
          <td class="px-4 py-3">
            <div class="font-semibold">John Doe</div>
            <div class="flex items-center gap-1 text-gray-600 text-xs">
              📧 john@example.com
            </div>
            <div class="flex items-center gap-1 text-gray-600 text-xs">
              📞 09123456789
            </div>
          </td>
          <td class="px-4 py-3 text-sm">
            <div class="flex items-center gap-1">
              📅 <strong>Check-in:</strong> May 21, 2025
            </div>
            <div class="flex items-center gap-1">
              📅 <strong>Check-out:</strong> May 30, 2025
            </div>
            <div class="flex items-center gap-1">
              🛏️ Guests: 3 | Stay: 9 nights
            </div>
          </td>
          <td class="px-4 py-3 text-sm italic text-gray-500">
            No special requirements
          </td>
          <td class="px-4 py-3">
            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-medium">
              ● Pending
            </span>
            <div class="text-xs text-gray-500 mt-1">May 26, 2025</div>
          </td>
          <td class="px-4 py-3 space-x-2">
            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">
              Approve
            </button>
            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
              Cancel
            </button>
          </td>
        </tr>
        @endfor
      </tbody>
    </table>
  </div>
</div>

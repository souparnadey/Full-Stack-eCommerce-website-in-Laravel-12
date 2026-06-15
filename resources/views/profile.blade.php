<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-indigo-100 to-purple-100">
        <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-3">
                👋 Hello, {{ Auth::user()->name }}!
            </h1>

            <p class="text-gray-600 mb-6">
                Here’s your profile overview.
            </p>

            <div class="bg-gray-100 rounded-lg p-4 text-left mb-6">
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
                <p><strong>Gender:</strong> {{ ucfirst(Auth::user()->gender) }}</p>
                <p><strong>Date of Birth:</strong> {{ Auth::user()->dob }}</p>
            </div>

            <div class="flex justify-center space-x-4">
                <a href="{{ route('dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition">
                    Back to Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>

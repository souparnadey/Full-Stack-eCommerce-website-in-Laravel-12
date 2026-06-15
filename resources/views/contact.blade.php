{{-- resources/views/contact.blade.php --}}
<x-layouts.app title="Contact">
  <div class="max-w-6xl mx-auto py-10 px-6">
    <h1 class="text-4xl font-bold text-center mb-10">📬 Contact Us</h1>

    <div class="grid md:grid-cols-2 gap-8">
      <!-- Contact Form -->
      <div class="bg-white/60 backdrop-blur-md shadow-lg rounded-xl p-8 border border-gray-200">
        <h2 class="text-2xl font-semibold mb-6">Send us a message</h2>

        <form method="POST" action="#" onsubmit="alert('Form not wired yet'); return false;" class="space-y-5">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Your name</label>
            <input type="text" placeholder="John Doe"
              class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" placeholder="johndoe@example.com"
              class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
            <textarea rows="5" placeholder="How can we help?"
              class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
          </div>

          <button
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg shadow transition">
            Send Message
          </button>
        </form>
      </div>

      <!-- Contact Info -->
      <div class="bg-white/60 backdrop-blur-md shadow-lg rounded-xl p-8 border border-gray-200">
        <h2 class="text-2xl font-semibold mb-6">📞 Contact Information</h2>
        <p class="text-gray-700 mb-4">
          <strong>Email:</strong> eComm@example.com<br>
          <strong>Phone:</strong> +91 00000 00000
        </p>
        <p class="text-gray-700 mb-6">
          <strong>Address:</strong><br>
          123 Main Street<br>
          Kolkata, West Bengal, India
        </p>
        <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow">
          <iframe
            class="w-full h-64 rounded-lg"
            src="https://maps.google.com/maps?q=kolkata&t=&z=13&ie=UTF8&iwloc=&output=embed"
            frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
  {{-- Footer --}}
  <footer class="text-center bg-blue-700 text-white py-6 mt-0">
    <p class="text-sm">&copy; 2025  eComm Solutions | Developed by <a href="https://github.com/souparnadey" target="_blank" class="hover:underline">Souparna Dey</a> | All Rights Reserved.</p>
  </footer>
</x-layouts.app>

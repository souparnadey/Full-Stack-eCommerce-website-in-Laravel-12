{{-- resources/views/livewire/login-form.blade.php --}}

<div class="auth-card mx-auto">
  <h2 class="h4 text-center mb-3 fw-bold">
    Welcome back! 👋
  </h2>
  
  @if (session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger text-center">{{ session('error') }}</div>
  @endif

  <hr>
  <br>

  <form wire:submit.prevent="login">
    <!-- Email -->
    <div class="mb-3">
      <input type="email" wire:model.defer="email" placeholder="Email Address" class="form-control" />
      @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <!-- Password -->
    <div class="mb-3 position-relative">
      <input 
        type="{{ $showPassword ? 'text' : 'password' }}" 
        wire:model.defer="password" 
        placeholder="Password" 
        class="form-control pe-5"
      />
      <button 
        type="button" 
        wire:click="$toggle('showPassword')" 
        class="btn position-absolute end-0 top-0 mt-1 me-2 p-0 text-secondary bg-transparent border-0"
        style="z-index: 5;"
      >
        <i class="bi {{ $showPassword ? 'bi-eye-slash' : 'bi-eye' }}"></i>
      </button>
      @error('password') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <!-- Remember Me -->
    <div class="form-check mb-3">
      <input type="checkbox" wire:model.defer="remember" class="form-check-input" id="remember">
      <label for="remember" class="form-check-label">Remember me</label>
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary w-100 py-2 rounded-pill">
      Login
    </button>
  </form>

  <p class="text-center text-light mt-3 mb-0">
    Don’t have an account?
    <a href="{{ route('register') }}" class="fw-semibold text-white"> Register</a>
  </p>
</div>

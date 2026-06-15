{{-- resources/views/livewire/register-form.blade.php --}}
<div class="auth-card mx-auto">
  <h2 class="h4 text-center mb-3 fw-bold">
    Create your account now! 🚀
  </h2>
  <hr>
  <br>

  <form wire:submit.prevent="register" class="mt-3">
    <!-- Full Name -->
    <div class="mb-3">
      <input type="text" wire:model.defer="name" placeholder="Full Name" class="form-control" />
      @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <!-- Email -->
    <div class="mb-3">
      <input type="email" wire:model.defer="email" placeholder="Email Address" class="form-control" />
      @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <!-- Mobile -->
    <div class="mb-3">
      <input type="text" wire:model.defer="phone" placeholder="Contact Number" class="form-control" />
      @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <!-- Gender -->
    <div class="mb-3">
      <select wire:model.defer="gender" class="form-select">
        <option value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
      @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <!-- Date of Birth -->
    <div class="mb-3">
      <input type="date" wire:model.defer="dob" class="form-control" />
      @error('dob') <small class="text-danger">{{ $message }}</small> @enderror
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

    <!-- Confirm Password -->
    <div class="mb-3 position-relative">
      <input 
        type="{{ $showConfirmPassword ? 'text' : 'password' }}" 
        wire:model.defer="password_confirmation" 
        placeholder="Confirm Password" 
        class="form-control pe-5"
      />
      <button 
        type="button" 
        wire:click="$toggle('showConfirmPassword')" 
        class="btn position-absolute end-0 top-0 mt-1 me-2 p-0 text-secondary bg-transparent border-0"
        style="z-index: 5;"
      >
        <i class="bi {{ $showConfirmPassword ? 'bi-eye-slash' : 'bi-eye' }}"></i>
      </button>
      @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary w-100 py-2 rounded-pill">
      Register
    </button>
  </form>

  <p class="text-center text-light mt-3 mb-0">
    Already have an account?
    <a href="{{ route('login') }}" class="fw-semibold text-white"> Login</a>
  </p>
</div>

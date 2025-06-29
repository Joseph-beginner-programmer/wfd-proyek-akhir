@extends('layout.layout')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-2">Login</h2>
        <p class="text-center text-gray-500 mb-6">Welcome back! please log in to access your account.</p>

        <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-purple-500 focus:border-purple-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-purple-500 focus:border-purple-500 pr-10">
                    <span class="absolute inset-y-0 right-3 flex items-center cursor-pointer text-gray-400" id="togglePassword">
                        <i class="fas fa-eye" id="eyeIcon"></i>
                    </span>
                </div>
            </div>

            <div class="flex items-start">
                <input type="checkbox" id="terms" class="mt-1">
                <label for="terms" class="ml-2 text-sm text-gray-600">
                    I agree with <a href="#" class="text-purple-600 underline">Terms of Use</a> and <a href="#" class="text-purple-600 underline">Privacy Policy</a>
                </label>
            </div>

            <button type="submit" class="w-full bg-purple-600 text-white py-2 rounded-md hover:bg-purple-700 transition">Login</button>
        </form>

        <div class="my-5 flex items-center">
            <hr class="flex-grow border-gray-300">
            <span class="px-2 text-gray-500 text-sm">OR</span>
            <hr class="flex-grow border-gray-300">
        </div>

        <button class="w-full border py-2 rounded-md flex items-center justify-center gap-3 hover:bg-gray-100 transition">
            <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
            <span class="text-sm text-gray-700">Sign Up with Google</span>
        </button>

        <p class="text-center text-sm text-gray-600 mt-4">
            Dont have an account? 
        <a  class="text-purple-600 hover:underline font-medium">Register</a>
            <i class="fas fa-arrow-right ml-1 text-xs"></i>
        </p>
    </div>
</div>

<script>
    console.log("Test script injected");

    document.addEventListener("DOMContentLoaded", function () {
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (togglePassword && passwordInput && eyeIcon) {
            console.log("Elements found, script aktif 🔥");

            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                eyeIcon.classList.toggle('fa-eye');
                eyeIcon.classList.toggle('fa-eye-slash');
            });
        }
    });
</script>
@endsection
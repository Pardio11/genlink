<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <div class="w-[25rem]">
            <x-authentication-card-logo/>

            </div>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="w-[100%] flex justify-center h-[3rem] mt-10 ">
                <x-button class="">
                    {{ __('Log in') }}
                </x-button>
            </div>
            

            <div class="flex items-center justify-end mt-4">
                
                <div class="w-[50%]  left-0 ">
                    <div class="block">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                </div>
                <div class="w-[50%] flex justify-center ">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-[#b7b7b7] hover:text-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                </div>

                
                

               

                
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<x-guest-layout>
    <div class="bg-logo fixed inset-0 p-6">
        
        <div class="min-h-screen flex items-center justify-center">
            <div class="bg-white p-10 rounded max-w-sm w-full relative shadow-lg">
                <img src="{{asset('image/logo.svg')}}" class="absolute" style="left:calc(50% - 100px); top:-100px;" width="200px" alt="">

                <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                

                <form method="POST" style="margin-top:4rem" action="{{ route('login') }}">
                    @csrf

                    <div class="mt-10">
                        <x-label for="dni" value="DNI" />
                        <x-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="CLAVE" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">Recordar clave</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                    

                        <x-button-red class="ml-4">
                            Entrar 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                        </x-button-red>
                    </div>
                </form>

            </div>
        </div>
    </div>
        
</x-guest-layout>

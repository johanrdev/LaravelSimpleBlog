<x-app-layout>
    <x-containers.site-container>
        <x-containers.site-inner-container>
            <x-containers.container>
                <x-containers.inner-container>
                    <x-page-header>
                        <x-page-title>
                                {{ __('Edit User') }}
                        </x-page-title>
                    </x-page-header>

                    <x-validation-feedback />
                    
                    <form method="POST" action="{{ route('users.update', $user) }}">
                        @method('PUT')
                        @csrf
                    
                        <x-inputs.input-container>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block w-full" type="text" name="name" value="{{ $user->name }}" required />
                        </x-inputs.input-container>
                        <x-inputs.input-container>
                            <x-input-label for="blog_name" :value="__('Blog name')" />
                            <x-text-input id="blog_name" class="block w-full" type="text" name="blog_name" value="{{ $user->blog_name }}" required />
                        </x-inputs.input-container>
                        <x-inputs.input-container>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block w-full" type="email" name="email" value="{{ $user->email }}" required />
                        </x-inputs.input-container>
                        <x-inputs.input-container>
                            <x-input-label for="new_password" :value="__('New password')" />
                            <x-text-input id="new_password" class="block w-full" type="password" name="new_password" value="" />
                        </x-inputs.input-container>
                        <x-inputs.input-container>
                            <x-input-label for="new_password_confirmation" :value="__('Confirm new password')" />
                            <x-text-input id="new_password_confirmation" class="block w-full" type="password" name="new_password_confirmation" value="" />
                        </x-inputs.input-container>
                        <x-inputs.input-container>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full resize-none" name="description" rows="7" required>{{ $user->description }}</textarea>
                        </x-inputs.input-container>
                        
                        <hr class="my-6">
                        
                        <x-inputs.input-container>
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block w-full" type="password" name="password" value="" required />
                        </x-inputs.input-container>
                        
                        <x-inputs.button-container>
                            <x-primary-button class="rounded-sm bg-teal-500">Update</x-primary-button>
                        </x-inputs.button-container>
                    </form>
                </x-containers.inner-container>
            </x-containers.container>
        </x-containers.site-inner-container>
    </x-containers.site-container>
</x-app-layout>

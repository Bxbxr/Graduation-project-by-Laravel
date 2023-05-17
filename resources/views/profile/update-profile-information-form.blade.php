<x-jet-form-section submit="updateProfileInformation">
    @php
        $levels = \App\Models\Level::all();
    @endphp
    <x-slot name="title">
        {{ __('site.profile_information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('site.profile_information_note') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden" wire:model="photo" x-ref="photo"
                    x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('site.profile_information_image') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('site.profile_image_set') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('site.profile_image_delete') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('site.profile_name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- bio -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="bio" value="{{ __('site.bio') }}" />
            <x-jet-input id="bio" type="text" class="mt-1 block w-full" wire:model.defer="state.bio"
                autocomplete="bio" />
            <x-jet-input-error for="bio" class="mt-2" />
        </div>

        <!-- url -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="url" value="{{ __('site.url') }}" />
            <x-jet-input id="url" type="text" class="mt-1 block w-full" wire:model.defer="state.url"
                autocomplete="url" />
            <x-jet-input-error for="url" class="mt-2" />
        </div>

        <!-- choose the level -->
        @if (Auth::user()->type === 'student')
            <div class="col-span-6 sm:col-span-4" id="level">
                <x-jet-label for="level" value="{{ __('site.levels') }}" />
                <select name="level_id"
                    class="mt-1 block w-full form-input rounded-md shadow-sm border pr-8 border-gray-300">
                    <option selected disabled> اختر المستوى </option>
                    @foreach ($levels as $level)
                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="level" class="mt-2" />
            </div>
        @endif

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('site.profile_email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('site.profile_email') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('site.profile_email') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('site.profile_saved') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('site.profile_save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>

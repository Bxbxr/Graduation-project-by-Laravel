<x-guest-layout>
    @php
        $universities = \App\Models\User::where('type', 'university')->get();
    @endphp
    @php
        $users = \App\Models\User::with('majors')->get();
    @endphp
    @php
        $levels = \App\Models\Level::get();
    @endphp
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" dir="rtl">
            @csrf

            <div class="mb-3">
                <x-jet-label for="name" value="{{ __('site.name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    autofocus autocomplete="name" />
            </div>

            <!-- type -->
            <div class="col-span-6 sm:col-span-4 mb-3">
                <x-jet-label for="type" value="{{ __('site.type') }}" />
                <select name="type" id="type"
                    class="mt-1 block w-full form-input rounded-md shadow-sm border border-gray-300 pr-8"
                    wire:model.defer="state.type">
                    <option selected disabled> اختر النوع </option>
                    <option value="university">{{ __('site.University') }}</option>
                    <option value="student">{{ __('site.Student') }}</option>
                </select>
                <x-jet-input-error for="type" class="mt-2" />
            </div>
            <!-- choose the university -->
            <div class="col-span-6 sm:col-span-4" id="university-list">
                <x-jet-label for="type" value="{{ __('site.selectUni') }}" />
                <select name="university_id"
                    class="mt-1 block w-full form-input rounded-md shadow-sm border border-gray-300 pr-8"
                    wire:model.defer="state.status">
                    <option selected disabled> اختر جامعة </option>
                    @foreach ($universities as $university)
                        <option value="{{ $university->id }}" id="university-list-{{ $university->id }}">
                            {{ $university->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="type" class="mt-2" />
            </div>

            <!-- choose the major -->
            <div class="col-span-6 sm:col-span-4" id="major">
                <x-jet-label for="major" value="{{ __('site.major') }}" />
                <select name="major" class="mt-1 block w-full form-input rounded-md shadow-sm border border-gray-300"
                    wire:model.defer="state.status">
                    <option selected disabled> اختر تخصصك </option>
                    @foreach ($users as $user)
                        @foreach ($user->majors as $major)
                            <option value="{{ $major->id }}" id="major">{{ $major->name }}</option>
                        @endforeach
                    @endforeach
                </select>
                <x-jet-input-error for="type" class="mt-2" />
            </div>

            <!-- choose the level -->
            <div class="col-span-6 sm:col-span-4" id="level">
                <x-jet-label for="level" value="{{ __('site.levels') }}" />
                <select name="level" class="mt-1 block w-full form-input rounded-md shadow-sm border border-gray-300"
                    wire:model.defer="state.status">
                    <option selected disabled> اختر المستوى </option>
                    @foreach ($levels as $level)
                        <option value="{{ $level->id }}" id="level">{{ $level->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="type" class="mt-2" />
            </div>



            <div class="mt-4" id="university-number">
                <x-jet-label for="acdamic-no" value="{{ __('site.acdamic-no') }}" />
                <x-jet-input id="acdamic-no" class="block mt-1 w-full" type="text" name="acdamic-no"
                    :value="old('acdamic-no')" />
            </div>


            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('site.email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('site.password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('site.password_confirmation') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('site.already_registered') }}
                </a>

                <x-jet-button class="mr-4">
                    {{ __('site.register') }}
                </x-jet-button>
            </div>
        </form>
        @push('js')
            <script>
                $(document).ready(function() {
                    var typeSelect = $("#type");

                    // Get a reference to the university select box
                    var universitySelect = $("#university-list");
                    var universityNumber = $("#university-number");
                    var major = $("#major");
                    var level = $("#level");

                    // hide the university list by default
                    universitySelect.hide();
                    universityNumber.hide();
                    major.hide();
                    level.hide();

                    // Bind an event handler to the change event of the type select box
                    typeSelect.change(function() {
                        if ($(this).val() === "student") {
                            universitySelect.show();
                            universityNumber.show();
                            major.show();
                            level.show();
                        } else {
                            universitySelect.hide();
                            universityNumber.hide();
                            major.hide();
                            level.hide();
                        }
                    });
                });

                $(document).ready(function() {
                    $('#university-list').on('change', function() {
                        var universityId = $(this).children('select').val();
                        console.log(universityId)
                        if (universityId) {
                            $.ajax({
                                url: '/major/getByUniversityId/' + universityId,
                                type: 'GET',
                                dataType: 'json',
                                success: function(data) {
                                    $('#major').children('select').empty();
                                    $.each(data, function(key, value) {
                                        $('#major').children('select').append(
                                            '<option value="' + key + '">' +
                                            value + '</option>');
                                    });
                                }
                            });
                        } else {
                            $('#major').empty();
                        }
                    });
                });
            </script>
        @endpush
    </x-jet-authentication-card>
</x-guest-layout>

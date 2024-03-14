@section('page_title', $boarder->fullName)
<x-app-layout>
    <x-page-heading :title="$boarder->fullName" />

    <x-content-wrap class="max-w-7xl py-0 sm:rounded-tl-none">

        <div class="flex gap-8">
            <div class="w-54">
                <div class="p-2 border border-slate-300">
                    @if ($boarder->profile_pic)
                        <img src="{{ asset('images/' . $boarder->profile_pic) }}" alt="{{ $boarder->fullName }}"
                            class="w-full">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="150px" height="150px"
                            enable-background="new 312.809 0 401 401" version="1.1" viewBox="312.809 0 401 401">
                            <g transform="matrix(1.223 0 0 1.223 -467.5 -843.44)">
                                <rect x="601.45" y="653.07" width="401" height="401" fill="#E4E6E7" />
                                <path
                                    d="m802.38 908.08c-84.515 0-153.52 48.185-157.38 108.62h314.79c-3.87-60.44-72.9-108.62-157.41-108.62z"
                                    fill="#AEB4B7" />
                                <path
                                    d="m881.37 818.86c0 46.746-35.106 84.641-78.41 84.641s-78.41-37.895-78.41-84.641 35.106-84.641 78.41-84.641c43.31 0 78.41 37.9 78.41 84.64z"
                                    fill="#AEB4B7" />
                            </g>
                        </svg>
                    @endif
                </div>
            </div>
            <div class="flex-1 w-xl">
                <h2 class="h2">Personal Info</h2>
                <div class="grid grid-cols-2 gap-2 items-start">

                    <label>Nickname: </label>
                    <p>{{ $boarder->nickname ? $boarder->nickname : 'n/a' }}</p>


                    <label>Gender: </label>
                    <p>{{ Str::ucfirst($boarder->gender) }}</p>

                    <label>Date of birth: </label>
                    <p>{{ $boarder->formatted_date_of_birth }}</p>

                    <label>Provincial Address:</label>
                    <div>{{ $boarder->provincial_address }}</div>

                </div>

                <h2 class="h2">Contact Info</h2>
                <div class="grid grid-cols-2 gap-2">

                    <label>Email: </label>

                    @if ($boarder->email)
                        <a href="mailto:{{ $boarder->email }}" class="text-slate-500 hover:underline">
                            {{ $boarder->email }}
                        </a>
                    @else
                        <p>n/a</p>
                    @endif

                    <label>Contact Number: </label>
                    @if ($boarder->contact_number)
                        <a href="tel:{{ $boarder->contact_number }}" class="text-slate-500 hover:underline">
                            {{ $boarder->contact_number }}
                        </a>
                    @else
                        <p>n/a</p>
                    @endif

                    <label>Facebook Account Name: </label>
                    <p>{{ $boarder->fb_account_name ? $boarder->fb_account_name : 'n/a' }}</p>

                    <label>Name of Father: </label>
                    <p>{{ $boarder->name_of_father ? $boarder->name_of_father : 'n/a' }}</p>

                    <label>Father's Contact Number: </label>
                    @if ($boarder->father_contact)
                        <a href="tel:{{ $boarder->father_contact }}" class="text-slate-500 hover:underline">
                            {{ $boarder->father_contact }}
                        </a>
                    @else
                        <p>n/a</p>
                    @endif

                    <label>Name of Mother: </label>
                    <p>{{ $boarder->name_of_mother ? $boarder->name_of_mother : 'n/a' }}</p>

                    <label>Mother's Contact Number: </label>
                    @if ($boarder->mother_contact)
                        <a href="tel:{{ $boarder->mother_contact }}" class="text-slate-500 hover:underline">
                            {{ $boarder->mother_contact }}
                        </a>
                    @else
                        <p>n/a</p>
                    @endif

                    <label>Name of Guardian: </label>
                    <p>{{ $boarder->name_of_guardian ? $boarder->name_of_guardian : 'n/a' }}</p>

                    <label>Guardian's Contact Number: </label>
                    @if ($boarder->guardian_contact)
                        <a href="tel:{{ $boarder->guardian_contact }}" class="text-slate-500 hover:underline">
                            {{ $boarder->guardian_contact }}
                        </a>
                    @else
                        <p>n/a</p>
                    @endif

                </div>
            </div>
            <div class="flex-1 w-xl">
                <h2 class="h2">
                    {{ Str::ucfirst($boarder->profile_type) }} Profile
                </h2>
                @if ($boarder->profile_type === 'working')
                    <x-worker-info :boarder="$boarder" />
                @elseif($boarder->profile_type === 'reviewee')
                    <x-reviewee-info :boarder="$boarder" />
                @elseif($boarder->profile_type === 'student')
                    <x-student-info :boarder="$boarder" />
                @endif
            </div>
        </div>

    </x-content-wrap>
</x-app-layout>

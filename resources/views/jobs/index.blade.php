<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}"
               class="block px-4 py-6 border border-gray-200 rounded-lg">
                @if($job->employer)
                    <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
                @else
                    <div class="font-bold text-blue-500 text-sm">Employer Unknown</div>
                @endif

                <div>
                    <strong>{{ $job['title'] }}</strong> Pays {{ $job['salary'] }} per year.
                </div>
            </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
